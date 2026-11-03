
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | {{ config('app.name', 'SMS') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: #080b18;
            color: #fff;
            overflow-x: hidden;
        }

        /* Background */
        .background {
            position: fixed;
            inset: 0;
            overflow: hidden;
            z-index: -1;
            background:
                radial-gradient(circle at 15% 20%, rgba(99,102,241,.22), transparent 35%),
                radial-gradient(circle at 85% 80%, rgba(14,165,233,.18), transparent 35%),
                #080b18;
        }

        .glow {
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            filter: blur(100px);
            opacity: .35;
            animation: float 8s ease-in-out infinite alternate;
        }

        .glow-one {
            background: #6366f1;
            top: -100px;
            left: -100px;
        }

        .glow-two {
            background: #0ea5e9;
            bottom: -100px;
            right: -100px;
            animation-delay: 2s;
        }

        @keyframes float {
            from { transform: translate(0, 0); }
            to { transform: translate(50px, 40px); }
        }

        /* Main Layout */
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .login-card {
            width: 100%;
            max-width: 460px;
            padding: 45px;
            background: rgba(17, 24, 45, .82);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 24px;
            backdrop-filter: blur(20px);
            box-shadow: 0 25px 80px rgba(0,0,0,.4);
            animation: appear .7s ease;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Logo */
        .logo {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            border-radius: 18px;
            background: linear-gradient(135deg, #6366f1, #0ea5e9);
            box-shadow: 0 8px 30px rgba(99,102,241,.35);
            font-size: 28px;
        }

        .welcome-title {
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -1px;
            text-align: center;
            margin-bottom: 10px;
        }

        .welcome-subtitle {
            text-align: center;
            color: #94a3b8;
            font-size: 14px;
            margin-bottom: 35px;
        }

        .gradient-text {
            background: linear-gradient(90deg, #818cf8, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Inputs */
        .form-label {
            color: #cbd5e1;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .form-control {
            height: 52px;
            padding: 12px 16px;
            color: white;
            background: rgba(255,255,255,.04);
            border: 1px solid rgba(148,163,184,.2);
            border-radius: 12px;
            font-size: 14px;
            transition: .3s;
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .form-control:focus {
            color: white;
            background: rgba(255,255,255,.07);
            border-color: #818cf8;
            box-shadow: 0 0 0 4px rgba(99,102,241,.15);
        }

        .invalid-feedback {
            color: #fb7185;
        }

        .form-control.is-invalid {
            border-color: #fb7185;
        }

        /* Remember */
        .form-check-input {
            background-color: rgba(255,255,255,.05);
            border-color: #475569;
        }

        .form-check-input:checked {
            background-color: #6366f1;
            border-color: #6366f1;
        }

        .form-check-label {
            color: #94a3b8;
            font-size: 13px;
        }

        /* Button */
        .btn-login {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(110deg, #6366f1, #3b82f6);
            color: white;
            font-weight: 700;
            font-size: 15px;
            transition: .3s;
            box-shadow: 0 8px 25px rgba(99,102,241,.25);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99,102,241,.4);
            background: linear-gradient(110deg, #4f46e5, #2563eb);
            color: white;
        }

        .register-text {
            color: #94a3b8;
            font-size: 13px;
            text-align: center;
            margin-top: 28px;
        }

        .register-text a {
            color: #818cf8;
            font-weight: 700;
            text-decoration: none;
        }

        .register-text a:hover {
            color: #38bdf8;
        }

        .alert {
            border-radius: 12px;
        }

        .footer-text {
            color: #475569;
            text-align: center;
            font-size: 11px;
            margin-top: 25px;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 30px 23px;
            }

            .welcome-title {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="background">
        <div class="glow glow-one"></div>
        <div class="glow glow-two"></div>
    </div>

    <div class="container login-wrapper">
        <div class="login-card">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Logo -->
            <div class="logo">
                🎓
            </div>

            <!-- Heading -->
            <h2 class="welcome-title">
                Welcome <span class="gradient-text">Back!</span>
            </h2>

            <p class="welcome-subtitle">
                Sign in to access your Student Management System
            </p>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="form-label">EMAIL ADDRESS</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="name@example.com"
                        class="form-control @error('email') is-invalid @enderror"
                        required
                        autofocus
                    >

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">PASSWORD</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        class="form-control @error('password') is-invalid @enderror"
                        required
                    >

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="remember"
                            id="remember"
                        >
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-login">
                    Sign In →
                </button>

            </form>

            <!-- Register -->
            <div class="register-text">
                Don't have an account?
                <a href="{{ route('register') }}">Create Account</a>
            </div>

            <div class="footer-text">
                © {{ date('Y') }} {{ config('app.name', 'SMS') }}. All rights reserved.
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
