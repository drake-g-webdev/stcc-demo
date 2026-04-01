/**
 * Volunteer Application Form Handler (WordPress AJAX)
 */
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('volunteer-form');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Email confirmation check
        var email = document.getElementById('volunteer-email').value.trim();
        var emailConfirm = document.getElementById('volunteer-email-confirm').value.trim();
        if (email !== emailConfirm) {
            alert('Email addresses do not match. Please check and try again.');
            return;
        }

        var btnText = form.querySelector('.btn-text');
        var btnLoading = form.querySelector('.btn-loading');
        var submitBtn = form.querySelector('button[type="submit"]');

        btnText.style.display = 'none';
        btnLoading.style.display = 'inline';
        submitBtn.disabled = true;

        var formData = new FormData(form);
        formData.append('action', 'stcc_submit_form');

        fetch(stcc_ajax.url, {
            method: 'POST',
            body: formData,
        })
        .then(function(response) { return response.json(); })
        .then(function(data) {
            if (data.success) {
                form.style.display = 'none';
                document.getElementById('form-success').style.display = 'block';
            } else {
                document.getElementById('form-error').style.display = 'block';
            }
        })
        .catch(function() {
            document.getElementById('form-error').style.display = 'block';
        })
        .finally(function() {
            btnText.style.display = 'inline';
            btnLoading.style.display = 'none';
            submitBtn.disabled = false;
        });
    });
});
