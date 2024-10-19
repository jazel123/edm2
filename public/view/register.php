<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        }
        .card-title {
            color: #1877f2;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #1877f2;
            border-color: #1877f2;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #166fe5;
            border-color: #166fe5;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            transform: translateY(-1px);
        }
        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #1877f2;
            box-shadow: 0 0 0 0.2rem rgba(24, 119, 242, 0.25);
        }
        .input-group-text {
            background-color: #f0f2f5;
            border-color: #ced4da;
            color: #495057;
        }
        #alertPlaceholder {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            min-width: 300px;
            max-width: 90%;
        }
        #loadingOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        #loadingOverlay.show {
            visibility: visible;
            opacity: 1;
        }

        .loader {
            width: 100px;
            height: 100px;
        }

        .loading-text {
            position: absolute;
            top: calc(50% + 60px);
            font-size: 1.2rem;
            color: #1877f2;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: text-pulse 1.5s ease-in-out infinite alternate;
        }

        @keyframes text-pulse {
            0% {
                opacity: 0.5;
            }
            100% {
                opacity: 1;
            }
        }

        .loader-circle {
            fill: none;
            stroke: #1877f2;
            stroke-width: 5;
            stroke-linecap: round;
            animation: loader-animation 2s ease-in-out infinite;
        }

        @keyframes loader-animation {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -35;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124;
            }
        }
    </style>
</head>
<body>
    <div id="loadingOverlay">
        <svg class="loader" viewBox="0 0 50 50">
            <circle class="loader-circle" cx="25" cy="25" r="20"></circle>
        </svg>
        <div class="loading-text">Loading...</div>
    </div>
    <div id="alertPlaceholder"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body p-5">
                        <h2 class="card-title text-center mb-5"><i class="fas fa-user-plus me-2"></i>Register</h2>
                        <form id="registerForm">
                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>
                        </form>
                        <p class="text-center mt-4">Already have an account? <a href="login.php" class="text-primary">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/js/register.js"></script>
    <script>
        function showLoading() {
            document.getElementById('loadingOverlay').classList.add('show');
        }

        function hideLoading() {
            document.getElementById('loadingOverlay').classList.remove('show');
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
    </script>
</body>
</html>
