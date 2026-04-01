/**
 * Internship Application Form Handler (WordPress AJAX)
 */
document.addEventListener('DOMContentLoaded', function() {
    // Modal handling
    var applyBtn = document.getElementById('intern-apply-btn');
    var modal = document.getElementById('intern-modal');
    var interestForm = document.querySelector('.intern-interest-form');

    if (applyBtn && modal) {
        applyBtn.addEventListener('click', function() {
            modal.style.display = 'flex';
        });

        var closeBtn = modal.querySelector('.modal-close');
        var dismissBtn = modal.querySelector('.modal-dismiss');

        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
                if (interestForm) interestForm.style.display = 'block';
            });
        }

        if (dismissBtn) {
            dismissBtn.addEventListener('click', function() {
                modal.style.display = 'none';
                if (interestForm) interestForm.style.display = 'block';
            });
        }

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
                if (interestForm) interestForm.style.display = 'block';
            }
        });
    }

    // Form submission
    var form = document.getElementById('intern-form');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();

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
                document.getElementById('intern-form-success').style.display = 'block';
            } else {
                document.getElementById('intern-form-error').style.display = 'block';
            }
        })
        .catch(function() {
            document.getElementById('intern-form-error').style.display = 'block';
        })
        .finally(function() {
            btnText.style.display = 'inline';
            btnLoading.style.display = 'none';
            submitBtn.disabled = false;
        });
    });
});
