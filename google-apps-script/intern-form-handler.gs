/**
 * Google Apps Script - Intern Form Handler
 *
 * SETUP INSTRUCTIONS:
 * 1. Create a new Google Sheet for intern applications
 * 2. Go to Extensions > Apps Script
 * 3. Delete any existing code and paste this entire script
 * 4. Update the SPREADSHEET_ID and SHEET_NAME below
 * 5. Update the email settings (FROM_EMAIL, REPLY_TO)
 * 6. Click Deploy > New deployment
 * 7. Select "Web app" as the type
 * 8. Set "Execute as" to "Me"
 * 9. Set "Who has access" to "Anyone"
 * 10. Click Deploy and copy the Web App URL
 * 11. Paste that URL into js/intern-form.js (replace YOUR_GOOGLE_APPS_SCRIPT_URL_HERE)
 */

// Configuration - UPDATE THESE VALUES
const SPREADSHEET_ID = 'YOUR_SPREADSHEET_ID_HERE'; // Get this from the Google Sheet URL
const SHEET_NAME = 'Intern Applications';
const FROM_EMAIL = 'info@curacaoturtles.org';
const REPLY_TO = 'info@curacaoturtles.org';

/**
 * Handle POST requests from the intern form
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
    .createTextOutput('Intern Form Handler is running.')
    .setMimeType(ContentService.MimeType.TEXT);
}

/**
 * Add intern application to Google Sheet
 */
function addToSpreadsheet(data) {
  const ss = SpreadsheetApp.openById(SPREADSHEET_ID);
  let sheet = ss.getSheetByName(SHEET_NAME);

  // Create sheet if it doesn't exist
  if (!sheet) {
    sheet = ss.insertSheet(SHEET_NAME);
    // Add headers
    sheet.getRange(1, 1, 1, 6).setValues([['Timestamp', 'Name', 'Country', 'University', 'Degree Program', 'Email']]);
    sheet.getRange(1, 1, 1, 6).setFontWeight('bold');
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
    data.university,
    data.degree,
    data.email
  ]);
}

/**
 * Send confirmation email to the intern applicant
 */
function sendConfirmationEmail(data) {
  const subject = 'Thank You for Your Interest in Interning with STCC';

  const htmlBody = `
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
      <div style="background-color: #052d67; padding: 30px; text-align: center;">
        <h1 style="color: #ffffff; margin: 0;">Sea Turtle Conservation Curaçao</h1>
      </div>

      <div style="padding: 30px; background-color: #f5f5f5;">
        <h2 style="color: #052d67;">Thank You, ${data.name}!</h2>

        <p style="color: #666; line-height: 1.8;">
          Thank you for your interest in interning with Sea Turtle Conservation Curaçao!
          We have received your information and will keep it on file.
        </p>

        <div style="background-color: #ffffff; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #2d7d9e;">
          <h3 style="color: #052d67; margin-top: 0;">Your Submission Details:</h3>
          <p style="color: #666; margin: 5px 0;"><strong>University:</strong> ${data.university}</p>
          <p style="color: #666; margin: 5px 0;"><strong>Degree Program:</strong> ${data.degree}</p>
          <p style="color: #666; margin: 5px 0;"><strong>Country:</strong> ${data.country}</p>
        </div>

        <p style="color: #666; line-height: 1.8;">
          When internship positions become available, we will reach out to discuss opportunities
          that match your background and interests.
        </p>

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

Thank you for your interest in interning with Sea Turtle Conservation Curaçao!
We have received your information and will keep it on file.

Your Submission Details:
- University: ${data.university}
- Degree Program: ${data.degree}
- Country: ${data.country}

When internship positions become available, we will reach out to discuss opportunities
that match your background and interests.

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
 * Send notification email to STCC about new intern interest
 */
function sendNotificationEmail(data) {
  const subject = `New Intern Interest: ${data.name} - ${data.university}`;

  const timestamp = new Date(data.timestamp).toLocaleString('en-US', {
    timeZone: 'America/Curacao'
  });

  const body = `
A new internship interest form has been submitted:

Name: ${data.name}
Country: ${data.country}
University: ${data.university}
Degree Program: ${data.degree}
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
