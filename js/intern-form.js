/**
 * Intern Form Handler
 * Handles modal popup and form submission for internship interest
 */

(function() {
    // Google Apps Script Web App URL - Replace with your deployed script URL
    const GOOGLE_SCRIPT_URL = 'YOUR_GOOGLE_APPS_SCRIPT_URL_HERE';

    // Modal elements
    const modal = document.getElementById('intern-modal');
    const applyBtn = document.getElementById('intern-apply-btn');
    const closeBtn = modal ? modal.querySelector('.modal-close') : null;
    const dismissBtn = modal ? modal.querySelector('.modal-dismiss') : null;

    // Form elements
    const form = document.getElementById('intern-form');
    const successMessage = document.getElementById('intern-form-success');
    const errorMessage = document.getElementById('intern-form-error');

    // Modal functionality
    if (applyBtn && modal) {
        applyBtn.addEventListener('click', function() {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    if (dismissBtn) {
        dismissBtn.addEventListener('click', closeModal);
    }

    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.style.display === 'flex') {
            closeModal();
        }
    });

    function closeModal() {
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }

    function isScriptConfigured() {
        return GOOGLE_SCRIPT_URL && !GOOGLE_SCRIPT_URL.includes('YOUR_GOOGLE_APPS_SCRIPT_URL_HERE');
    }

    // Form submission
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitBtn = form.querySelector('button[type="submit"]');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');

            // Get form data
            const formData = {
                name: document.getElementById('intern-name').value.trim(),
                country: document.getElementById('intern-country').value.trim(),
                university: document.getElementById('intern-university').value.trim(),
                degree: document.getElementById('intern-degree').value.trim(),
                email: document.getElementById('intern-email').value.trim(),
                timestamp: new Date().toISOString(),
                type: 'internship'
            };

            // Validate
            if (!formData.name || !formData.country || !formData.university ||
                !formData.degree || !formData.email) {
                alert('Please fill in all required fields.');
                return;
            }

            // Fallback: send via email if Google Apps Script is not configured
            if (!isScriptConfigured()) {
                var subject = encodeURIComponent('New Internship Interest: ' + formData.name);
                var body = encodeURIComponent(
                    'New internship interest form submitted from the website:\n\n' +
                    'Name: ' + formData.name + '\n' +
                    'Country: ' + formData.country + '\n' +
                    'University: ' + formData.university + '\n' +
                    'Degree Program: ' + formData.degree + '\n' +
                    'Email: ' + formData.email + '\n' +
                    'Submitted: ' + new Date().toLocaleString()
                );
                window.location.href = 'mailto:info@curacaoturtles.org?subject=' + subject + '&body=' + body;
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
    }

    function showSuccess() {
        if (form) form.style.display = 'none';
        if (successMessage) {
            successMessage.style.display = 'block';
            successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        if (errorMessage) errorMessage.style.display = 'none';
    }

    function showError() {
        if (errorMessage) {
            errorMessage.style.display = 'block';
            errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }
})();
