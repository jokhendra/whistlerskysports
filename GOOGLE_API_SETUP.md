# Google API Setup for Whistler Sky Sports

This document provides instructions on how to set up Google API credentials for the Whistler Sky Sports booking system.

## Prerequisites

1. A Google Cloud Platform account
2. Access to create projects and enable APIs

## Step 1: Create a Google Cloud Project

1. Go to the [Google Cloud Console](https://console.cloud.google.com/)
2. Click on the project dropdown at the top of the page and select "New Project"
3. Enter a name for your project (e.g., "Whistler Sky Sports") and click "Create"

## Step 2: Enable Required APIs

1. In the Google Cloud Console, navigate to "APIs & Services" > "Library"
2. Search for and enable the following APIs:
   - Google Calendar API
   - Google Sheets API

## Step 3: Create Service Account Credentials

1. In the Google Cloud Console, navigate to "APIs & Services" > "Credentials"
2. Click "Create Credentials" and select "Service Account"
3. Enter a name for the service account (e.g., "whistler-sky-sports-booking")
4. Click "Create and Continue"
5. For the role, select "Editor" (or a more restrictive role if needed)
6. Click "Done"

## Step 4: Generate and Download the JSON Key

1. In the service accounts list, find the service account you just created
2. Click on the service account name to view its details
3. Go to the "Keys" tab
4. Click "Add Key" > "Create new key"
5. Select "JSON" as the key type and click "Create"
6. The JSON key file will be downloaded to your computer

## Step 5: Set Up Google Calendar

1. Go to [Google Calendar](https://calendar.google.com/)
2. Create a new calendar for bookings (or use an existing one)
3. Click on the three dots next to the calendar name and select "Settings and sharing"
4. Scroll down to "Share with specific people" and click "Add people"
5. Add the email address of the service account (found in the JSON key file under `client_email`)
6. Give it "Make changes to events" permission and click "Send"

## Step 6: Set Up Google Sheets

1. Go to [Google Sheets](https://sheets.google.com/)
2. Create a new spreadsheet for bookings (or use an existing one)
3. Click the "Share" button in the top right
4. Add the email address of the service account (found in the JSON key file under `client_email`)
5. Give it "Editor" permission and click "Share"

## Step 7: Configure the Application

1. Rename the downloaded JSON key file to `google-credentials.json`
2. Place the file in the `storage/app` directory of your Laravel application
3. Update the `.env` file with the following variables:
   ```
   GOOGLE_CALENDAR_ID=your-calendar-id@group.calendar.google.com
   GOOGLE_SPREADSHEET_ID=your-spreadsheet-id
   ```
   - Replace `your-calendar-id@group.calendar.google.com` with the ID of your Google Calendar (found in the calendar settings)
   - Replace `your-spreadsheet-id` with the ID of your Google Sheets document (found in the URL of the spreadsheet)

## Step 8: Test the Integration

1. Make a test booking through the application
2. Verify that:
   - A confirmation email is sent
   - An event is created in the Google Calendar
   - A row is added to the Google Sheets document

## Troubleshooting

If you encounter issues with the Google API integration:

1. Check the Laravel logs for error messages
2. Verify that the service account has the correct permissions
3. Ensure that the API keys and credentials are correctly configured
4. Check that the calendar and spreadsheet IDs are correct

For more information, refer to the [Google API documentation](https://developers.google.com/apis-explorer). 