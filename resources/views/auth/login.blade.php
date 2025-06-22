<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container-fluid p-0 vh-100">
        <div class="row g-0 h-100">
            <!-- Image Section - 70% -->
            <div class="col-lg-8 col-md-7 d-none d-md-block">
                <div class="image-section">
                    <div class="overlay">
                        <div class="overlay-content">
                            <h1 class="display-4 fw-bold text-white mb-4">Welcome to Al Hadi</h1>
                            <p class="lead text-white-50 mb-0">Experience the future of digital innovation with our cutting-edge solutions</p>
                        </div>
                    </div>
                    <img src="https://dekayu.id/wp-content/uploads/2024/05/KELOMPOK-HAMPERS-HAJI-UMROH-2-1199x800.webp" alt="Login Background" class="img-fluid w-100 h-100 object-cover">
                </div>
            </div>
            
            <!-- Login Form Section - 30% -->
            <div class="col-lg-4 col-md-5 col-12">
                <div class="login-section d-flex align-items-center justify-content-center h-100">
                    <div class="login-container w-100">
                        <div class="text-center mb-5">
                            <div class="logo-container mb-4">
                                <div class="logo-circle">
                                    <i class="fas fa-user-circle fa-3x text-primary"></i>
                                </div>
                            </div>
                            <h2 class="fw-bold text-dark mb-2">Welcome Back</h2>
                            <p class="text-muted">Please sign in to your account</p>
                        </div>

                        <!-- Error Alert -->
                        <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <span id="errorMessage"></span>
                        </div>
                        
                        <form id="loginForm">
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-transparent">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" class="form-control border-start-0 ps-0" name="email" id="email" placeholder="name@example.com" required>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label for="password" class="form-label fw-semibold mb-0">Password</label>
                                    <a href="#" class="forgot-password text-decoration-none">Forgot password?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-transparent">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0 border-end-0 ps-0" name="password" id="password" placeholder="Enter your password" required>
                                    <span class="input-group-text border-start-0 bg-transparent cursor-pointer" onclick="togglePassword()">
                                        <i class="fas fa-eye-slash text-muted" id="toggleIcon"></i>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label text-muted" for="remember">Remember me</label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 py-3 mb-4 fw-semibold">
                                <i class="fas fa-sign-in-alt me-2"></i> Sign In
                            </button>
                            
                            <div class="divider-section mb-4">
                                <div class="divider">
                                    <span class="divider-text">Or continue with</span>
                                </div>
                            </div>
                            
                            <div class="row g-2 mb-4">
                                <div class="col-6">
                                    <button type="button" class="btn btn-outline-secondary w-100 py-2">
                                        <i class="fab fa-google me-2"></i> Google
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-outline-secondary w-100 py-2">
                                        <i class="fab fa-facebook-f me-2"></i> Facebook
                                    </button>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <p class="mb-0 text-muted">Don't have an account? <a href="/register" class="register-link text-decoration-none fw-semibold">Register now</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
            }
        }

        // Form submission handler
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Simple validation demo
            if (!email || !password) {
                showError('Please fill in all fields');
                return;
            }
            
            // Here you would normally send the data to your server
            console.log('Login attempt:', { email, password });
            
            // Show success message (demo)
            showSuccess('Login successful! Redirecting...');
            
            // Simulate redirect after 2 seconds
            setTimeout(() => {
                window.location.href = '/dashboard';
            }, 2000);
        });

        function showError(message) {
            const errorAlert = document.getElementById('errorAlert');
            const errorMessage = document.getElementById('errorMessage');
            
            errorMessage.textContent = message;
            errorAlert.classList.remove('d-none');
            
            setTimeout(() => {
                errorAlert.classList.add('d-none');
            }, 5000);
        }

        function showSuccess(message) {
            const errorAlert = document.getElementById('errorAlert');
            const errorMessage = document.getElementById('errorMessage');
            
            errorAlert.classList.remove('alert-danger');
            errorAlert.classList.add('alert-success');
            errorMessage.innerHTML = '<i class="fas fa-check-circle me-2"></i>' + message;
            errorAlert.classList.remove('d-none');
        }
    </script>

    <style>
        :root {
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --secondary-color: #f8fafc;
            --text-color: #1e293b;
            --muted-color: #64748b;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--secondary-color);
        }

        .object-cover {
            object-fit: cover;
        }

        .image-section {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .image-section img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.8) 0%, rgba(139, 92, 246, 0.6) 100%);
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay-content {
            text-align: center;
            padding: 2rem;
            max-width: 600px;
        }

        .login-section {
            background: white;
            padding: 2rem;
            min-height: 100vh;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .logo-container {
            text-align: center;
        }

        .logo-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
            border-radius: 50%;
            color: white;
            margin-bottom: 1rem;
        }

        .form-control {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 0.95rem;
            background-color: #fafbfc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            background-color: white;
        }

        .input-group-text {
            border: 2px solid var(--border-color);
            background-color: #fafbfc;
            border-radius: 12px;
        }

        .input-group .form-control:not(:first-child) {
            border-left: none;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .input-group .input-group-text:not(:last-child) {
            border-right: none;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group .input-group-text:not(:first-child) {
            border-left: none;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
            border: none;
            border-radius: 12px;
            padding: 1rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
            background: linear-gradient(135deg, var(--primary-hover), #7c3aed);
        }

        .btn-outline-secondary {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            color: var(--text-color);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background-color: #f1f5f9;
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-1px);
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .forgot-password {
            color: var(--muted-color);
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--primary-color);
        }

        .register-link {
            color: var(--primary-color);
            transition: color 0.3s ease;
        }

        .register-link:hover {
            color: var(--primary-hover);
        }

        .divider {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: var(--border-color);
        }

        .divider-text {
            background-color: white;
            padding: 0 1rem;
            color: var(--muted-color);
            font-size: 0.9rem;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .alert {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .login-section {
                padding: 1.5rem;
            }
            
            .overlay-content {
                padding: 1rem;
            }
            
            .overlay-content h1 {
                font-size: 2rem;
            }
        }

        /* Animation */
        .login-container {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>
</html>