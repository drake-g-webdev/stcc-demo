/**
 * Google Apps Script - Volunteer Form Handler
 *
 * SETUP INSTRUCTIONS:
 * 1. Create a new Google Sheet for volunteer applications
 * 2. Go to Extensions > Apps Script
 * 3. Delete any existing code and paste this entire script
 * 4. Update the SPREADSHEET_ID and SHEET_NAME below
 * 5. Update the email settings (FROM_EMAIL, REPLY_TO)
 * 6. Click Deploy > New deployment
 * 7. Select "Web app" as the type
 * 8. Set "Execute as" to "Me"
 * 9. Set "Who has access" to "Anyone"
 * 10. Click Deploy and copy the Web App URL
 * 11. Paste that URL into js/volunteer-form.js (replace YOUR_GOOGLE_APPS_SCRIPT_URL_HERE)
 */

// Configuration - UPDATE THESE VALUES
const SPREADSHEET_ID = 'YOUR_SPREADSHEET_ID_HERE'; // Get this from the Google Sheet URL
const SHEET_NAME = 'Volunteer Applications';
const FROM_EMAIL = 'info@curacaoturtles.org';
const REPLY_TO = 'info@curacaoturtles.org';

/**
 * Handle POST requests from the volunteer form
 */
function doPost(e) {
  try {
    // Parse the incoming data
    const data = JSON.parse(e.postData.contents);

    // Add to spreadsheet
    addToSpreadsheet(data);

    // Send confirmation email to applicant
    sendConfirmationEmail(data);

    // Send notification to STCC
    sendNotificationEmail(data);

    // Return success response
    return ContentService
      .createTextOutput(JSON.stringify({ success: true }))
      .setMimeType(ContentService.MimeType.JSON);

  } catch (error) {
    console.error('Error processing form:', error);
    return ContentService
      .createTextOutput(JSON.stringify({ success: false, error: error.message }))
      .setMimeType(ContentService.MimeType.JSON);
  }
}

/**
 * Handle GET requests (for testing)
 */
function doGet(e) {
  return ContentService
    .createTextOutput('Volunteer Form Handler is running.')
    .setMimeType(ContentService.MimeType.TEXT);
}

/**
 * Add volunteer application to Google Sheet
 */
function addToSpreadsheet(data) {
  const ss = SpreadsheetApp.openById(SPREADSHEET_ID);
  let sheet = ss.getSheetByName(SHEET_NAME);

  // Create sheet if it doesn't exist
  if (!sheet) {
    sheet = ss.insertSheet(SHEET_NAME);
    // Add headers
    sheet.getRange(1, 1, 1, 4).setValues([['Timestamp', 'Name', 'Country', 'Email']]);
    sheet.getRange(1, 1, 1, 4).setFontWeight('bold');
  }

  // Format timestamp
  const timestamp = new Date(data.timestamp).toLocaleString('en-US', {
    timeZone: 'America/Curacao',
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit'
  });

  // Add new row
  sheet.appendRow([
    timestamp,
    data.name,
    data.country,
    data.email
  ]);
}

/**
 * Send confirmation email to the volunteer applicant
 */
function sendConfirmationEmail(data) {
  const subject = 'Thank You for Your Volunteer Application - STCC';

  const htmlBody = `
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
      <div style="background-color: #052d67; padding: 30px; text-align: center;">
        <h1 style="color: #ffffff; margin: 0;">Sea Turtle Conservation Curaçao</h1>
      </div>

      <div style="padding: 30px; background-color: #f5f5f5;">
        <h2 style="color: #052d67;">Thank You, ${data.name}!</h2>

        <p style="color: #666; line-height: 1.8;">
          Thank you for your interest in becoming a volunteer with Sea Turtle Conservation Curaçao!
          We have received your application and are excited about the possibility of having you join our team.
        </p>

        <div style="background-color: #ebd5a3; padding: 20px; border-radius: 8px; margin: 20px 0;">
          <p style="margin: 0; color: #052d67;">
            <strong>Important:</strong> STCC only trains new volunteers from April - November.
            If you've applied during our winter slowdown, please be patient.
            We will contact you with our class schedule in early spring.
          </p>
        </div>

        <p style="color: #666; line-height: 1.8;">
          In the meantime, follow us on social media to stay updated on our conservation work:
        </p>

        <p style="color: #666;">
          <a href="https://www.facebook.com/curacaoturtles" style="color: #2d7d9e;">Facebook</a> |
          <a href="https://www.instagram.com/curacaoturtles" style="color: #2d7d9e;">Instagram</a>
        </p>

        <p style="color: #666; margin-top: 30px;">
          With gratitude,<br>
          <strong>The STCC Team</strong>
        </p>
      </div>

      <div style="background-color: #052d67; padding: 20px; text-align: center;">
        <p style="color: #ffffff; margin: 0; font-size: 14px;">
          Sea Turtle Conservation Curaçao<br>
          <a href="mailto:info@curacaoturtles.org" style="color: #f98613;">info@curacaoturtles.org</a> |
          <a href="tel:+59996647970" style="color: #f98613;">+5999 664 7970</a>
        </p>
      </div>
    </div>
  `;

  const plainBody = `
Thank You, ${data.name}!

Thank you for your interest in becoming a volunteer with Sea Turtle Conservation Curaçao!
We have received your application and are excited about the possibility of having you join our team.

IMPORTANT: STCC only trains new volunteers from April - November. If you've applied during our winter slowdown, please be patient. We will contact you with our class schedule in early spring.

In the meantime, follow us on social media:
- Facebook: https://www.facebook.com/curacaoturtles
- Instagram: https://www.instagram.com/curacaoturtles

With gratitude,
The STCC Team

---
Sea Turtle Conservation Curaçao
info@curacaoturtles.org | +5999 664 7970
  `;

  MailApp.sendEmail({
    to: data.email,
    replyTo: REPLY_TO,
    subject: subject,
    body: plainBody,
    htmlBody: htmlBody
  });
}

/**
 * Send notification email to STCC about new application
 */
function sendNotificationEmail(data) {
  const subject = `New Volunteer Application: ${data.name}`;

  const timestamp = new Date(data.timestamp).toLocaleString('en-US', {
    timeZone: 'America/Curacao'
  });

  const body = `
A new volunteer application has been submitted:

Name: ${data.name}
Country: ${data.country}
Email: ${data.email}
Submitted: ${timestamp}

View all applications in the spreadsheet:
https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}
  `;

  MailApp.sendEmail({
    to: FROM_EMAIL,
    subject: subject,
    body: body
  });
}
