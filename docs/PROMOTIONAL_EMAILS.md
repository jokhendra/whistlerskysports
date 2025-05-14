# Promotional Email System Documentation

The Whistler Sky Sports promotional email system allows administrators to create, schedule, and manage marketing emails to different recipient groups. This document explains how to use and maintain the system.

## Features

- Create and schedule promotional emails for future delivery
- Send to different recipient groups: all users, subscribers, or customers
- Save as draft or schedule for automatic sending
- Send test emails before scheduling
- View comprehensive statistics on email campaigns
- Automated sending of scheduled emails

## How It Works

### Creating a Promotional Email

1. Log in to the admin panel
2. Navigate to "Promotional Emails" in the sidebar
3. Click "Create New Email"
4. Fill in the form:
   - **Subject**: The email subject line
   - **Content**: Rich-text email content (supports HTML formatting)
   - **Recipient Group**: Choose between "All Users", "Subscribers Only", or "Customers Only"
   - **Schedule Date and Time**: When the email should be sent
   - **Status**: "Save as Draft" or "Schedule for Sending"
5. Click "Create Email"

### Testing an Email

Before sending to all recipients, you can send a test email:

1. Edit an existing email or view its details
2. Scroll to the "Send Test Email" section
3. Enter a test email address
4. Click "Send Test Email"

### Manually Sending an Email

To send an email immediately (regardless of scheduled time):

1. Go to the email details page or the email list
2. Click "Send Email"
3. Confirm that you want to send the email

### Understanding Recipient Groups

- **All Users**: Sends to all contacts and booking customers
- **Subscribers Only**: Sends to contacts who have opted into the newsletter
- **Customers Only**: Sends to users who have made a booking

## Technical Implementation

### Automated Scheduling

The system uses Laravel's scheduler to automatically send emails at their scheduled times:

- Scheduled emails are processed every 15 minutes
- Only emails with a "scheduled" status and a scheduled_at time in the past will be processed
- The system updates the status to "sent" after processing

### Setting Up the Scheduler

For the automated sending to work, the Laravel scheduler must be running. Add this Cron entry on your server:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

### Manual Processing

To manually process scheduled emails (for testing or if the scheduler isn't running):

```bash
php artisan promotional:process-scheduled
```

### Queued Processing

Emails are queued for delivery to prevent timeout issues with large recipient lists. Make sure your queue worker is running:

```bash
php artisan queue:work
```

## Troubleshooting

### Emails Not Sending Automatically

1. Verify the Laravel scheduler is running correctly
2. Check `storage/logs/scheduler.log` for any errors
3. Ensure the scheduled_at time has passed
4. Check the email status is set to "scheduled"

### Test Emails Not Being Received

1. Check your mail configuration in `.env`
2. Verify spam/junk folders
3. Review `storage/logs/laravel.log` for mail sending errors

## Extending the System

To add new recipient groups:

1. Update the validation in `AdminPromotionalEmailController` store/update methods
2. Add the new option to the form.blade.php select field
3. Implement the email collection logic in the `getRecipientEmails` method in the command and controller 