<?php

namespace App\Services;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class WaiverService
 * 
 * Handles the generation, storage, and management of waiver PDFs for bookings.
 * This service manages the entire lifecycle of waiver documents, including:
 * - PDF generation with customer data
 * - Secure storage with organized directory structure
 * - Signature validation and formatting
 * - Document retrieval and download
 */
class WaiverService
{
    /**
     * Generate and store a waiver PDF for a booking
     *
     * This method:
     * 1. Generates a unique reference number for the waiver
     * 2. Validates the signature data
     * 3. Creates a PDF with booking and waiver information
     * 4. Stores the PDF in an organized directory structure
     * 5. Updates the booking with waiver information
     *
     * @param Booking $booking The booking record requiring a waiver
     * @return string The storage path of the generated PDF
     * @throws \Exception If signature data is missing or invalid
     */
    public function generateAndStoreWaiver(Booking $booking)
    {
        try {
            // Generate a unique reference number for the waiver
            $referenceNumber = 'WVR-' . strtoupper(Str::random(8));
            
            // Ensure signature data exists
            if (empty($booking->signature_data)) {
                throw new \Exception('No signature data found for the booking');
            }

            // Prepare data for PDF generation
            $data = [
                'referenceNumber' => $referenceNumber,
                'booking' => $booking,
                'waiverData' => [
                    'signature' => $this->formatSignatureData($booking->signature_data),
                    'signed_at' => now(),
                    'emergency_contact' => [
                        'name' => $booking->emergency_contact_name ?? 'Not provided',
                        'relationship' => $booking->emergency_contact_relationship ?? 'Not provided',
                        'phone' => $booking->emergency_contact_phone ?? 'Not provided',
                    ],
                ],
            ];

            Log::info('Generating PDF with data:', $data);

            // Generate PDF using the waiver template
            $pdf = Pdf::loadView('waivers.template', $data);
            
            // Create organized storage path structure (year/month/day)
            $year = now()->format('Y');
            $month = now()->format('m');
            $day = now()->format('d');
            $path = "waivers/{$year}/{$month}/{$day}/{$referenceNumber}.pdf";
            
            // Create directory structure if it doesn't exist
            Storage::disk('public')->makeDirectory(dirname($path));
            
            // Store the generated PDF
            $pdfContent = $pdf->output();
            Storage::disk('public')->put($path, $pdfContent);
            
            Log::info('PDF stored successfully at: ' . $path);
            
            // Update booking with waiver details
            $booking->update([
                'waiver_pdf_path' => $path,
                'waiver_reference_number' => $referenceNumber,
                'waiver_signed_at' => now(),
                'waiver_status' => 'completed',
            ]);
            
            return $path;
        } catch (\Exception $e) {
            Log::error('Error generating waiver PDF: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Format signature data for PDF generation
     *
     * Ensures signature data is properly formatted as a data URL.
     * Handles both direct data URLs and base64 encoded strings.
     *
     * @param string $signatureData The raw signature data
     * @return string Formatted signature data URL
     * @throws \Exception If signature data format is invalid
     */
    protected function formatSignatureData($signatureData)
    {
        // Return if already in data URL format
        if (strpos($signatureData, 'data:image') === 0) {
            return $signatureData;
        }

        // Convert base64 encoded data to data URL
        if (base64_encode(base64_decode($signatureData, true)) === $signatureData) {
            return 'data:image/png;base64,' . $signatureData;
        }

        throw new \Exception('Invalid signature data format');
    }

    /**
     * Get the public URL for accessing the waiver PDF
     *
     * @param Booking $booking The booking containing the waiver
     * @return string|null The public URL of the waiver PDF, or null if not found
     */
    public function getWaiverUrl(Booking $booking)
    {
        if (!$booking->waiver_pdf_path || !Storage::disk('public')->exists($booking->waiver_pdf_path)) {
            return null;
        }
        
        // Generate a signed URL that expires in 5 minutes
        return URL::signedRoute('waiver.view', [
            'booking' => $booking->id,
            'expires' => now()->addMinutes(5)
        ]);
    }

    /**
     * Generate a download response for the waiver PDF
     *
     * @param Booking $booking The booking containing the waiver
     * @return \Symfony\Component\HttpFoundation\Response|null
     *         The download response, or null if waiver not found
     */
    public function downloadWaiver(Booking $booking)
    {
        if (!$booking->waiver_pdf_path || !Storage::disk('public')->exists($booking->waiver_pdf_path)) {
            return null;
        }
        
        // Get the PDF content
        $content = Storage::disk('public')->get($booking->waiver_pdf_path);
        
        // Return download response
        return new Response($content, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="waiver_' . $booking->waiver_reference_number . '.pdf"',
        ]);
    }
} 