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
        var genderEl = form.querySelector('input[name="gender"]:checked');
        var formData = {
            gender: genderEl ? genderEl.value : '',
            name: document.getElementById('volunteer-name').value.trim(),
            dob: document.getElementById('volunteer-dob').value,
            phone: document.getElementById('volunteer-phone').value.trim(),
            country: document.getElementById('volunteer-country').value.trim(),
            email: document.getElementById('volunteer-email').value.trim(),
            timestamp: new Date().toISOString()
        };

        var emailConfirm = document.getElementById('volunteer-email-confirm').value.trim();

        // Validate
        if (!formData.gender || !formData.name || !formData.dob || !formData.phone || !formData.country || !formData.email) {
            alert('Please fill in all required fields.');
            return;
        }

        if (formData.email !== emailConfirm) {
            alert('Email addresses do not match. Please check and try again.');
            return;
        }

        // Fallback: send via email if Google Apps Script is not configured
        if (!isScriptConfigured()) {
            var subject = encodeURIComponent('New Volunteer Application: ' + formData.name);
            var body = encodeURIComponent(
                'New volunteer application submitted from the website:\n\n' +
                'Gender: ' + formData.gender + '\n' +
                'Name: ' + formData.name + '\n' +
                'Date of Birth: ' + formData.dob + '\n' +
                'Phone: ' + formData.phone + '\n' +
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
            await fetch(GOOGLE_SCRIPT_URL, {
                method: 'POST',
                mode: 'no-cors',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });

            showSuccess();

        } catch (error) {
            console.error('Form submission error:', error);
            showError();
        } finally {
            btnText.style.display = 'inline';
            btnLoading.style.display = 'none';
            submitBtn.disabled = false;
        }
    });

    function showSuccess() {
        form.style.display = 'none';
        successMessage.style.display = 'block';
        errorMessage.style.display = 'none';
        successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function showError() {
        errorMessage.style.display = 'block';
        errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
})();
