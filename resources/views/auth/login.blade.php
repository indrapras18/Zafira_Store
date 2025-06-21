<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-container">
        <div class="card">
            <div class="card-header text-center">
                <h3 class="mb-0">Welcome Back</h3>
                <p class="text-white-50 mb-0">Please sign in to your account</p>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <div>{{ session('error') }}</div>
                    </div>
                @endif
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-envelope text-muted"></i>
                            </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="password" class="form-label">Password</label>
                            <a href="#" class="forgot-password">Forgot password?</a>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-lock text-muted"></i>
                            </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password" required>
                            <span class="input-group-text bg-light" onclick="togglePassword()">
                                <i class="fas fa-eye-slash text-muted" id="toggleIcon"></i>
                            </span>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 mb-3 py-3">
                        <i class="fas fa-sign-in-alt me-2"></i> Sign In
                    </button>
                    
                    <div class="text-center mt-4">
                        <p class="mb-0 text-muted">Don't have an account? <a href="/register" class="register-link">Register now</a></p>
                    </div>
                </form>
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
    </script>

<style>
    body {
        background: linear-gradient(120deg, #ffd8b5, #ffe8d6);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-container {
        max-width: 450px;
        width: 100%;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
    }
    .card-header {
        background: linear-gradient(60deg, #F97316, #fb923c);
        color: white;
        border-bottom: none;
        padding: 25px;
    }
    .form-control {
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #e5e7eb;
        transition: all 0.3s;
    }
    .form-control:focus {
        border-color: #F97316;
        box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.2);
    }
    .btn-primary {
        background: linear-gradient(60deg, #F97316, #fb923c);
        border: none;
        border-radius: 8px;
        padding: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 14px rgba(249, 115, 22, 0.3);
    }
    .input-group-text {
        background-color: transparent;
        border-left: none;
        cursor: pointer;
    }
    .form-label {
        font-weight: 500;
        color: #4b5563;
    }
    .alert {
        border-radius: 8px;
    }
    .card-body {
        padding: 30px;
    }
    .forgot-password {
        color: #6b7280;
        text-decoration: none;
        font-size: 14px;
        transition: color 0.3s;
    }
    .forgot-password:hover {
        color: #F97316;
    }
    .register-link {
        color: #F97316;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s;
    }
    .register-link:hover {
        color: #ea580c;
        text-decoration: underline;
    }
    .form-check-input:checked {
        background-color: #F97316;
        border-color: #F97316;
    }
</style>