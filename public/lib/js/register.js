function showLoading() {
    const loadingOverlay = document.getElementById('loadingOverlay');
    loadingOverlay.classList.add('show');
}

function hideLoading() {
    const loadingOverlay = document.getElementById('loadingOverlay');
    loadingOverlay.classList.remove('show');
}

function showAlert(message, type) {
    const alertPlaceholder = document.getElementById('alertPlaceholder');
    const wrapper = document.createElement('div');
    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible fade show" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
    ].join('');
    alertPlaceholder.append(wrapper);

    // Auto-dismiss after 5 seconds
    setTimeout(() => {
        const alert = bootstrap.Alert.getOrCreateInstance(wrapper.firstElementChild);
        alert.close();
    }, 5000);
}

function handleSuccess(message, redirectUrl) {
    showLoading();
    setTimeout(() => {
        hideLoading();
        showAlert(message, 'success');
        setTimeout(() => {
            window.location.href = redirectUrl;
        }, 2000);
    }, 3500); // Show loading for 3.5 seconds
}

$(document).ready(function () {
    $("#registerForm").submit(function (e) {
        e.preventDefault();
        showLoading();
        $.ajax({
            type: "post",
            url: "../../src/routes/routes.php",
            data: {
                type: "register",
                user: $("#username").val(),
                pass: $("#password").val(),
            },
            success: function (response) {
                hideLoading();
                try {
                    var data = JSON.parse(response);
                    if (data.status === 'success') {
                        handleSuccess(data.message, 'login.php');
                    } else {
                        showAlert(data.message || 'Registration failed. Please try again.', 'danger');
                    }
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                    showAlert("An unexpected error occurred. Please try again.", 'danger');
                }
            },
            error: function (xhr, status, error) {
                hideLoading();
                console.error("AJAX error:", status, error);
                showAlert("An error occurred. Please try again.", 'danger');
            }
        });
    });
});
