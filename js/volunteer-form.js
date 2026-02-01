/**
 * Volunteer Form Handler
 * Submits volunteer applications to Google Sheets and sends confirmation email
 */

(function() {
    // Google Apps Script Web App URL - Replace with your deployed script URL
    const GOOGLE_SCRIPT_URL = 'YOUR_GOOGLE_APPS_SCRIPT_URL_HERE';

    const form = document.getElementById('volunteer-form');
    const successMessage = document.getElementById('form-success');
    const errorMessage = document.getElementById('form-error');

    if (!form) return;

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

        // Show loading state
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline';
        submitBtn.disabled = true;

        try {
            // Submit to Google Sheets
            const response = await fetch(GOOGLE_SCRIPT_URL, {
                method: 'POST',
                mode: 'no-cors',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });

            // Since no-cors mode doesn't give us response details,
            // we assume success if no error was thrown
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
