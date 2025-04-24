<?php

namespace App\Services;

use Google\Client as GoogleClient;
use Google\Service\Calendar;
use Google\Service\Calendar\Event as CalendarEvent;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;
use Google\Service\Sheets\BatchUpdateSpreadsheetRequest;
use Google\Service\Sheets\Request;
use Google\Service\Sheets\RepeatCellRequest;
use Google\Service\Sheets\CellData;
use Google\Service\Sheets\CellFormat;
use Google\Service\Sheets\TextFormat;
use Google\Service\Sheets\Color;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;

/**
 * Class GoogleService
 * 
 * Handles integration with Google Calendar and Google Sheets for booking management.
 * This service provides functionality to:
 * - Add bookings to Google Calendar
 * - Record booking details in Google Sheets
 * - Format and maintain the booking spreadsheet
 */
class GoogleService
{
    /** @var GoogleClient */
    private $client;

    /** @var Calendar */
    private $calendarService;

    /** @var Sheets */
    private $sheetsService;

    /** @var string */
    private $calendarId;

    /** @var string */
    private $spreadsheetId;

    /**
     * Initialize Google services with proper authentication and configuration
     *
     * @throws \Exception If initialization fails
     */
    public function __construct()
    {
        try {
            // Initialize Google Client
            $this->client = new GoogleClient();
            $this->client->setAuthConfig(storage_path('app/google-credentials.json'));
            $this->client->setScopes([
                Calendar::CALENDAR,
                Sheets::SPREADSHEETS
            ]);
            $this->client->setAccessType('offline');
            
            // Get configuration values
            $this->calendarId = config('services.google.calendar_id');
            $this->spreadsheetId = config('services.google.spreadsheet_id');
            
            // Initialize Google services
            $this->calendarService = new Calendar($this->client);
            $this->sheetsService = new Sheets($this->client);
            
            Log::info('Google services initialized successfully');
        } catch (\Exception $e) {
            Log::error('Google service initialization error: ' . $e->getMessage());
            Log::error('Error trace: ' . $e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Add a booking to Google Calendar
     *
     * Creates a calendar event with booking details including:
     * - Customer information
     * - Package details
     * - Add-ons selected
     * - Payment information
     *
     * @param Booking $booking The booking to add to the calendar
     * @return string|null The event ID if successful, null otherwise
     */
    public function addBookingToCalendar(Booking $booking)
    {
        try {
            // Format the booking date
            $bookingDate = $booking->preferred_dates->format('Y-m-d');
            
            // Create event title
            $eventTitle = "Booking: {$booking->name} - {$booking->package} Package";
            
            // Build detailed event description
            $description = $this->buildEventDescription($booking);
            
            // Create the calendar event
            $event = new CalendarEvent([
                'summary' => $eventTitle,
                'description' => $description,
                'start' => [
                    'date' => $bookingDate,
                    'timeZone' => 'America/Vancouver',
                ],
                'end' => [
                    'date' => $bookingDate,
                    'timeZone' => 'America/Vancouver',
                ],
                'reminders' => [
                    'useDefault' => false,
                    'overrides' => [
                        ['method' => 'email', 'minutes' => 24 * 60], // 24 hours
                        ['method' => 'popup', 'minutes' => 60],      // 1 hour
                    ],
                ],
            ]);
            
            // Insert the event and get response
            $calendarEvent = $this->calendarService->events->insert($this->calendarId, $event);
            
            Log::info('Booking added to Google Calendar', [
                'booking_id' => $booking->id,
                'event_id' => $calendarEvent->id
            ]);
            
            return $calendarEvent->id;
        } catch (\Exception $e) {
            Log::error('Error adding booking to Google Calendar: ' . $e->getMessage());
            Log::error('Error trace: ' . $e->getTraceAsString());
            return null;
        }
    }

    /**
     * Build event description for Google Calendar
     *
     * @param Booking $booking
     * @return string
     */
    private function buildEventDescription(Booking $booking): string
    {
        $description = "Customer: {$booking->name}\n";
        $description .= "Email: {$booking->email}\n";
        $description .= "Phone: {$booking->primary_phone}\n";
        $description .= "Package: {$booking->package}\n";
        $description .= "Sunrise Flight: {$booking->sunrise_flight}\n";
        
        if ($booking->video_package) {
            $description .= "Add-ons: Video Package\n";
        }
        
        if ($booking->deluxe_package) {
            $description .= "Add-ons: Deluxe Package\n";
        }
        
        if ($booking->merch_package > 0) {
            $description .= "Add-ons: Merchandise Package ({$booking->merch_package} items)\n";
        }
        
        $description .= "Total Amount: CAD {$booking->total_amount}\n";
        
        return $description;
    }

    /**
     * Add a booking to Google Sheets
     *
     * Records booking details in a spreadsheet with formatted columns including:
     * - Booking information
     * - Customer details
     * - Package selection
     * - Payment status
     *
     * @param Booking $booking The booking to add to the spreadsheet
     * @return bool True if successful, false otherwise
     */
    public function addBookingToSheet(Booking $booking)
    {
        try {
            // Ensure headers exist and are formatted
            $this->ensureSheetHeaders();

            // Prepare row data
            $rowData = $this->prepareSheetRowData($booking);
            
            // Create value range object
            $valueRange = new ValueRange();
            $valueRange->setValues([$rowData]);
            
            // Append data to sheet
            $result = $this->sheetsService->spreadsheets_values->append(
                $this->spreadsheetId,
                'Sheet1!A1',
                $valueRange,
                ['valueInputOption' => 'RAW']
            );
            
            Log::info('Booking added to Google Sheets', [
                'booking_id' => $booking->id,
                'updates' => $result->getUpdates()
            ]);
            
            return true;
        } catch (\Exception $e) {
            Log::error('Error adding booking to Google Sheets: ' . $e->getMessage());
            Log::error('Error trace: ' . $e->getTraceAsString());
            return false;
        }
    }

    /**
     * Prepare row data for Google Sheets
     *
     * @param Booking $booking
     * @return array
     */
    private function prepareSheetRowData(Booking $booking): array
    {
        return [
            $booking->id,
            $booking->name,
            $booking->email,
            $booking->primary_phone,
            $booking->timezone,
            $booking->local_phone,
            $booking->package,
            $booking->preferred_dates->format('Y-m-d'),
            $booking->sunrise_flight,
            $booking->video_package ? 'Yes' : 'No',
            $booking->deluxe_package ? 'Yes' : 'No',
            $booking->merch_package,
            $booking->total_amount,
            $booking->status,
            $booking->created_at->format('Y-m-d H:i:s')
        ];
    }

    /**
     * Ensure sheet has headers and proper formatting
     */
    private function ensureSheetHeaders()
    {
        try {
            // Check if headers exist
            $response = $this->sheetsService->spreadsheets_values->get(
                $this->spreadsheetId,
                'Sheet1!A1:O1'
            );

            $values = $response->getValues();

            // Add headers if they don't exist
            if (empty($values)) {
                $this->addSheetHeaders();
                $this->formatSheet();
            }
        } catch (\Exception $e) {
            Log::error('Error checking/adding sheet headers: ' . $e->getMessage());
            Log::error('Error trace: ' . $e->getTraceAsString());
        }
    }

    /**
     * Add headers to the sheet
     */
    private function addSheetHeaders()
    {
        $headers = [
            'Booking ID',
            'Name',
            'Email',
            'Primary Phone',
            'Timezone',
            'Local Phone',
            'Package',
            'Preferred Date',
            'Sunrise Flight',
            'Video Package',
            'Deluxe Package',
            'Merchandise Items',
            'Total Amount',
            'Status',
            'Created At'
        ];

        $headerRange = new ValueRange();
        $headerRange->setValues([$headers]);

        $this->sheetsService->spreadsheets_values->update(
            $this->spreadsheetId,
            'Sheet1!A1:O1',
            $headerRange,
            ['valueInputOption' => 'RAW']
        );

        Log::info('Added headers to Google Sheet');
    }

    /**
     * Format the sheet with styling
     */
    private function formatSheet()
    {
        try {
            // Create header formatting
            $headerFormat = $this->createHeaderFormat();
            
            // Create formatting requests
            $requests = [
                $this->createHeaderFormatRequest($headerFormat),
                $this->createColumnResizeRequest(),
                $this->createBandingRequest(),
                $this->createDataAlignmentRequest()
            ];

            // Execute batch update
            $batchUpdateRequest = new BatchUpdateSpreadsheetRequest([
                'requests' => $requests
            ]);

            $this->sheetsService->spreadsheets->batchUpdate(
                $this->spreadsheetId, 
                $batchUpdateRequest
            );

            Log::info('Applied formatting to Google Sheet');
        } catch (\Exception $e) {
            Log::error('Error applying sheet formatting: ' . $e->getMessage());
            Log::error('Error trace: ' . $e->getTraceAsString());
        }
    }

    /**
     * Create header format configuration
     *
     * @return CellFormat
     */
    private function createHeaderFormat(): CellFormat
    {
        $headerFormat = new CellFormat();
        
        // Set background color
        $headerFormat->setBackgroundColor(new Color([
            'red' => 0.2,
            'green' => 0.6,
            'blue' => 0.8
        ]));
        
        // Set text format
        $textFormat = new TextFormat();
        $textFormat->setBold(true);
        $textFormat->setForegroundColor(new Color([
            'red' => 1,
            'green' => 1,
            'blue' => 1
        ]));
        
        $headerFormat->setTextFormat($textFormat);
        $headerFormat->setHorizontalAlignment('CENTER');
        
        return $headerFormat;
    }

    /**
     * Create header formatting request
     *
     * @param CellFormat $headerFormat
     * @return Request
     */
    private function createHeaderFormatRequest(CellFormat $headerFormat): Request
    {
        return new Request([
            'repeatCell' => new RepeatCellRequest([
                'range' => [
                    'sheetId' => 0,
                    'startRowIndex' => 0,
                    'endRowIndex' => 1,
                    'startColumnIndex' => 0,
                    'endColumnIndex' => 15
                ],
                'cell' => new CellData([
                    'userEnteredFormat' => $headerFormat
                ]),
                'fields' => 'userEnteredFormat(backgroundColor,textFormat,horizontalAlignment)'
            ])
        ]);
    }

    /**
     * Create column auto-resize request
     *
     * @return Request
     */
    private function createColumnResizeRequest(): Request
    {
        return new Request([
            'autoResizeDimensions' => [
                'dimensions' => [
                    'sheetId' => 0,
                    'dimension' => 'COLUMNS',
                    'startIndex' => 0,
                    'endIndex' => 15
                ]
            ]
        ]);
    }

    /**
     * Create banding (alternating colors) request
     *
     * @return Request
     */
    private function createBandingRequest(): Request
    {
        return new Request([
            'addBanding' => [
                'bandedRange' => [
                    'range' => [
                        'sheetId' => 0,
                        'startRowIndex' => 1,
                        'endRowIndex' => 1000,
                        'startColumnIndex' => 0,
                        'endColumnIndex' => 15
                    ],
                    'rowProperties' => [
                        'headerColor' => new Color(['red' => 0.9, 'green' => 0.9, 'blue' => 0.9]),
                        'firstBandColor' => new Color(['red' => 1, 'green' => 1, 'blue' => 1]),
                        'secondBandColor' => new Color(['red' => 0.95, 'green' => 0.95, 'blue' => 0.95])
                    ]
                ]
            ]
        ]);
    }

    /**
     * Create data alignment request
     *
     * @return Request
     */
    private function createDataAlignmentRequest(): Request
    {
        return new Request([
            'repeatCell' => new RepeatCellRequest([
                'range' => [
                    'sheetId' => 0,
                    'startRowIndex' => 1,
                    'endRowIndex' => 1000,
                    'startColumnIndex' => 0,
                    'endColumnIndex' => 15
                ],
                'cell' => new CellData([
                    'userEnteredFormat' => [
                        'horizontalAlignment' => 'CENTER'
                    ]
                ]),
                'fields' => 'userEnteredFormat(horizontalAlignment)'
            ])
        ]);
    }
} 