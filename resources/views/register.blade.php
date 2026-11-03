
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | {{ config('app.name', 'SMS') }}</title>

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
        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 15px;
        }

        .register-card {
            width: 100%;
            max-width: 460px;
            padding: 40px 45px;
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
            margin: 0 auto 22px;
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
            margin-bottom: 32px;
        }

        .gradient-text {
            background: linear-gradient(90deg, #818cf8, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Form */
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

        .form-control.is-invalid {
            border-color: #fb7185;
        }

        .invalid-feedback {
            color: #fb7185;
        }

        /* Button */
        .btn-register {
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

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99,102,241,.4);
            background: linear-gradient(110deg, #4f46e5, #2563eb);
            color: white;
        }

        /* Login Link */
        .login-text {
            color: #94a3b8;
            font-size: 13px;
            text-align: center;
            margin-top: 27px;
            margin-bottom: 0;
        }

        .login-text a {
            color: #818cf8;
            font-weight: 700;
            text-decoration: none;
        }

        .login-text a:hover {
            color: #38bdf8;
        }

        .footer-text {
            color: #475569;
            text-align: center;
            font-size: 11px;
            margin-top: 23px;
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 30px 23px;
            }

            .welcome-title {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <!-- Background Effects -->
    <div class="background">
        <div class="glow glow-one"></div>
        <div class="glow glow-two"></div>
    </div>

    <div class="container register-wrapper">

        <div class="register-card">

            <!-- Logo -->
            <div class="logo">
                🎓
            </div>

            <!-- Heading -->
            <h2 class="welcome-title">
                Create <span class="gradient-text">Account</span>
            </h2>

            <p class="welcome-subtitle">
                Join our Student Management System today
            </p>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Full Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">FULL NAME</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        class="form-control @error('name') is-invalid @enderror"
                        required
                        autofocus
                    >

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">EMAIL ADDRESS</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="name@example.com"
                        class="form-control @error('email') is-invalid @enderror"
                        required
                    >

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="form-label">PASSWORD</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create a secure password"
                        class="form-control @error('password') is-invalid @enderror"
                        required
                    >

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-register">
                    Create Account →
                </button>

            </form>

            <!-- Login Link -->
            <p class="login-text">
                Already have an account?
                <a href="{{ route('login') }}">Sign In</a>
            </p>

            <!-- Footer -->
            <div class="footer-text">
                © {{ date('Y') }} {{ config('app.name', 'SMS') }}. All rights reserved.
            </div>

        </div>

    </div>

</body>
</html>
