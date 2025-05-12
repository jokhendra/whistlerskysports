<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayPalService
{
    protected $mode;
    protected $clientId;
    protected $clientSecret;
    protected $baseUrl;
    protected $accessToken;

    public function __construct()
    {
        $this->mode = config('paypal.mode', 'sandbox');
        $this->clientId = config("paypal.{$this->mode}.client_id");
        $this->clientSecret = config("paypal.{$this->mode}.client_secret");
        $this->baseUrl = $this->mode === 'sandbox' 
            ? 'https://api-m.sandbox.paypal.com' 
            : 'https://api-m.paypal.com';
    }

    /**
     * Get an access token from PayPal API
     * 
     * @return string|null Access token
     */
    public function getAccessToken()
    {
        if ($this->accessToken) {
            return $this->accessToken;
        }

        try {
            $response = Http::withBasicAuth($this->clientId, $this->clientSecret)
                ->asForm()
                ->post("{$this->baseUrl}/v1/oauth2/token", [
                    'grant_type' => 'client_credentials'
                ]);

            if ($response->successful()) {
                $this->accessToken = $response->json('access_token');
                return $this->accessToken;
            }

            Log::error('PayPal API: Failed to get access token', [
                'status' => $response->status(),
                'body' => $response->json()
            ]);
            return null;
        } catch (\Exception $e) {
            Log::error('PayPal API: Exception when getting access token', [
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }

    /**
     * Create a PayPal order for checkout
     * 
     * @param float $amount Order amount
     * @param string $currency Currency code (default: USD)
     * @param string $returnUrl Successful payment return URL
     * @param string $cancelUrl Cancelled payment return URL
     * @param string $reference Order reference/number
     * @param string $description Order description
     * @param array $shippingDetails Shipping address details
     * @param float $shippingCost Shipping cost (default: 20.00)
     * @return array|null Order details or null on failure
     */
    public function createOrder($amount, $currency = 'USD', $returnUrl, $cancelUrl, $reference, $description = '', $shippingDetails = [], $shippingCost = 20.00)
    {
        $token = $this->getAccessToken();
        if (!$token) {
            return null;
        }

        try {
            // Calculate item total (total minus shipping)
            $itemTotal = max(0, $amount - $shippingCost);
            
            $orderPayload = [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    [
                        'reference_id' => $reference,
                        'description' => $description,
                        'amount' => [
                            'currency_code' => $currency,
                            'value' => number_format($amount, 2, '.', ''),
                            'breakdown' => [
                                'item_total' => [
                                    'currency_code' => $currency,
                                    'value' => number_format($itemTotal, 2, '.', '')
                                ],
                                'shipping' => [
                                    'currency_code' => $currency,
                                    'value' => number_format($shippingCost, 2, '.', '')
                                ]
                            ]
                        ]
                    ]
                ],
                'application_context' => [
                    'return_url' => $returnUrl,
                    'cancel_url' => $cancelUrl,
                    'brand_name' => 'Whistler Sky Sports',
                    'landing_page' => 'BILLING',
                    'shipping_preference' => 'SET_PROVIDED_ADDRESS',
                    'user_action' => 'PAY_NOW'
                ]
            ];

            // Add shipping address if provided
            if (!empty($shippingDetails)) {
                $orderPayload['purchase_units'][0]['shipping'] = [
                    'name' => [
                        'full_name' => $shippingDetails['name'] ?? 'Customer'
                    ],
                    'address' => [
                        'address_line_1' => $shippingDetails['address'] ?? '',
                        'admin_area_2' => $shippingDetails['city'] ?? '',
                        'admin_area_1' => $shippingDetails['state'] ?? '',
                        'postal_code' => $shippingDetails['postal_code'] ?? '',
                        'country_code' => $shippingDetails['country_code'] ?? 'US'
                    ]
                ];
            }

            $response = Http::withToken($token)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'PayPal-Request-Id' => uniqid('order_', true)
                ])
                ->post("{$this->baseUrl}/v2/checkout/orders", $orderPayload);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('PayPal order created', [
                    'order_id' => $data['id'] ?? null,
                    'status' => $data['status'] ?? null,
                    'amount' => $amount,
                    'currency' => $currency
                ]);
                return $data;
            }

            Log::error('PayPal API: Failed to create order', [
                'status' => $response->status(),
                'body' => $response->json(),
                'amount' => $amount
            ]);
            return null;
        } catch (\Exception $e) {
            Log::error('PayPal API: Exception when creating order', [
                'error' => $e->getMessage(),
                'amount' => $amount
            ]);
            return null;
        }
    }

    /**
     * Capture payment for a PayPal order
     * 
     * @param string $orderId PayPal order ID
     * @return array|null Capture details or null on failure
     */
    public function captureOrder($orderId)
    {
        $token = $this->getAccessToken();
        if (!$token) {
            return null;
        }

        try {
            // PayPal's capture endpoint doesn't accept a request body, use an empty string instead of []
            $url = "{$this->baseUrl}/v2/checkout/orders/{$orderId}/capture";
            $requestId = uniqid('capture_', true);
            
            // Using curl directly to avoid any JSON serialization issues
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '',  // Empty string, NOT an empty array
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $token,
                    'PayPal-Request-Id: ' . $requestId,
                    'Prefer: return=representation'
                ],
            ]);
            
            $responseBody = curl_exec($curl);
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $error = curl_error($curl);
            curl_close($curl);
            
            if ($error) {
                Log::error('PayPal API: cURL error when capturing payment', [
                    'error' => $error,
                    'order_id' => $orderId
                ]);
                return null;
            }
            
            $data = json_decode($responseBody, true);
            
            if ($statusCode >= 200 && $statusCode < 300 && $data) {
                Log::info('PayPal payment captured', [
                    'order_id' => $orderId,
                    'status' => $data['status'] ?? null,
                    'capture_id' => $data['purchase_units'][0]['payments']['captures'][0]['id'] ?? null
                ]);
                return $data;
            }

            Log::error('PayPal API: Failed to capture payment', [
                'status' => $statusCode,
                'body' => $data ?? $responseBody,
                'order_id' => $orderId
            ]);
            return null;
        } catch (\Exception $e) {
            Log::error('PayPal API: Exception when capturing payment', [
                'error' => $e->getMessage(),
                'order_id' => $orderId
            ]);
            return null;
        }
    }

    /**
     * Get order details from PayPal
     * 
     * @param string $orderId PayPal order ID
     * @return array|null Order details or null on failure
     */
    public function getOrderDetails($orderId)
    {
        $token = $this->getAccessToken();
        if (!$token) {
            return null;
        }

        try {
            $response = Http::withToken($token)
                ->get("{$this->baseUrl}/v2/checkout/orders/{$orderId}");

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('PayPal API: Failed to get order details', [
                'status' => $response->status(),
                'body' => $response->json(),
                'order_id' => $orderId
            ]);
            return null;
        } catch (\Exception $e) {
            Log::error('PayPal API: Exception when getting order details', [
                'error' => $e->getMessage(),
                'order_id' => $orderId
            ]);
            return null;
        }
    }

    /**
     * Refund a captured payment
     * 
     * @param string $captureId Payment capture ID
     * @param float|null $amount Amount to refund (null for full refund)
     * @param string $currency Currency code
     * @param string $note Refund note
     * @return array|null Refund details or null on failure
     */
    public function refundPayment($captureId, $amount = null, $currency = 'USD', $note = '')
    {
        $token = $this->getAccessToken();
        if (!$token) {
            return null;
        }

        try {
            $payload = [];
            
            if (!empty($note)) {
                $payload['note_to_payer'] = $note;
            }
            
            // If amount is specified, include it in the request
            if ($amount !== null) {
                $payload['amount'] = [
                    'value' => number_format($amount, 2, '.', ''),
                    'currency_code' => $currency
                ];
            }

            $response = Http::withToken($token)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->post("{$this->baseUrl}/v2/payments/captures/{$captureId}/refund", $payload);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('PayPal payment refunded', [
                    'capture_id' => $captureId,
                    'refund_id' => $data['id'] ?? null,
                    'status' => $data['status'] ?? null,
                    'amount' => $amount
                ]);
                return $data;
            }

            Log::error('PayPal API: Failed to refund payment', [
                'status' => $response->status(),
                'body' => $response->json(),
                'capture_id' => $captureId
            ]);
            return null;
        } catch (\Exception $e) {
            Log::error('PayPal API: Exception when refunding payment', [
                'error' => $e->getMessage(),
                'capture_id' => $captureId
            ]);
            return null;
        }
    }
    
    /**
     * Extract payment details from PayPal response
     *
     * @param array $capture
     * @return array
     */
    public function extractPaymentDetails($capture)
    {
        $details = [
            'order_id' => $capture['id'] ?? null,
            'payment_id' => null,
            'amount' => 0,
            'currency' => 'USD',
            'status' => $capture['status'] ?? 'unknown',
            'payer_email' => null,
            'payer_name' => null,
            'payer_id' => null,
            'payer_phone' => null,
        ];
        
        if (isset($capture['purchase_units'][0]['payments']['captures'][0]['id'])) {
            $details['payment_id'] = $capture['purchase_units'][0]['payments']['captures'][0]['id'];
        }
        
        if (isset($capture['purchase_units'][0]['payments']['captures'][0]['amount'])) {
            $details['amount'] = $capture['purchase_units'][0]['payments']['captures'][0]['amount']['value'] ?? 0;
            $details['currency'] = $capture['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'] ?? 'USD';
        } elseif (isset($capture['purchase_units'][0]['amount'])) {
            $details['amount'] = $capture['purchase_units'][0]['amount']['value'] ?? 0;
            $details['currency'] = $capture['purchase_units'][0]['amount']['currency_code'] ?? 'USD';
        }
        
        if (isset($capture['payer'])) {
            $details['payer_email'] = $capture['payer']['email_address'] ?? null;
            $details['payer_id'] = $capture['payer']['payer_id'] ?? null;
            
            if (isset($capture['payer']['name'])) {
                $details['payer_name'] = ($capture['payer']['name']['given_name'] ?? '') . ' ' . 
                                       ($capture['payer']['name']['surname'] ?? '');
            }
            
            if (isset($capture['payer']['phone'])) {
                $details['payer_phone'] = $capture['payer']['phone']['phone_number']['national_number'] ?? null;
            }
        }
        
        return [
            'payment_info' => $details,
            'provider_response' => $capture
        ];
    }
} 