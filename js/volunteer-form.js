/**
 * Volunteer Form Handler
 * Submits volunteer applications to Google Sheets and sends confirmation email.
 * Falls back to mailto if Google Apps Script is not yet configured.
 */

(function() {
    // Google Apps Script Web App URL - Replace with your deployed script URL
    const GOOGLE_SCRIPT_URL = 'YOUR_GOOGLE_APPS_SCRIPT_URL_HERE';
    const STCC_EMAIL = 'info@curacaoturtles.org';

    const form = document.getElementById('volunteer-form');
    const successMessage = document.getElementById('form-success');
    const errorMessage = document.getElementById('form-error');

    if (!form) return;

    function isScriptConfigured() {
        return GOOGLE_SCRIPT_URL && !GOOGLE_SCRIPT_URL.includes('YOUR_GOOGLE_APPS_SCRIPT_URL_HERE');
    }

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const submitBtn = form.querySelector('button[type="submit"]');
        const btnText = submitBtn.querySelector('.btn-text');
        const btnLoading = submitBtn.querySelector('.btn-loading');

        // Get form data
        const formData = {
            name: document.getElementById('volunteer-name').value.trim(),
            country: document.getElementById('volunteer-country').value.trim(),
            email: document.getElementById('volunteer-email').value.trim(),
            timestamp: new Date().toISOString()
        };

        // Validate
        if (!formData.name || !formData.country || !formData.email) {
            alert('Please fill in all required fields.');
            return;
        }

        // Fallback: send via email if Google Apps Script is not configured
        if (!isScriptConfigured()) {
            var subject = encodeURIComponent('New Volunteer Application: ' + formData.name);
            var body = encodeURIComponent(
                'New volunteer application submitted from the website:\n\n' +
                'Name: ' + formData.name + '\n' +
                'Country: ' + formData.country + '\n' +
                'Email: ' + formData.email + '\n' +
                'Submitted: ' + new Date().toLocaleString()
            );
            window.location.href = 'mailto:' + STCC_EMAIL + '?subject=' + subject + '&body=' + body;
            showSuccess();
            return;
        }

        // Show loading state
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline';
        submitBtn.disabled = true;

        try {
            // Submit to Google Sheets
            await fetch(GOOGLE_SCRIPT_URL, {
                method: 'POST',
                mode: 'no-cors',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });

            // no-cors mode doesn't expose response details,
            // but the request does reach the server when the URL is valid
            showSuccess();

        } catch (error) {
            console.error('Form submission error:', error);
            showError();
        } finally {
            // Reset button state
            btnText.style.display = 'inline';
            btnLoading.style.display = 'none';
            submitBtn.disabled = false;
        }
    });

    function showSuccess() {
        form.style.display = 'none';
        successMessage.style.display = 'block';
        errorMessage.style.display = 'none';

        // Scroll to message
        successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function showError() {
        errorMessage.style.display = 'block';

        // Scroll to message
        errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
})();
