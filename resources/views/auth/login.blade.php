<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Lapangan Badminton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: sans-serif;
            color: #333;
        }

        .signup-container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
            max-width: 900px;
            width: 100%;
        }

        .signup-left {
            background: url('https://images.unsplash.com/photo-1531694611359-4769014840ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center/cover no-repeat;
            color: #fff;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex: 1;
        }

        .signup-left h2 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .signup-left p {
            font-size: 1.2em;
            opacity: 0.8;
        }

        .signup-right {
            padding: 30px;
            flex: 1;
        }

        .signup-right h4 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #FEA116;
            border-color: #0F172B;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #FEA116;
            border-color: #5e070d;
        }

        .signup-social {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .btn-outline-secondary {
            border-color: #ced4da;
            color: #333;
            transition: background-color 0.3s ease;
            margin-bottom: 10px; /* Add spacing between the buttons */
        }

        .btn-outline-secondary:hover {
            background-color: #f8f9fa;
        }


        .signup-footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
        }

        .signup-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .signup-footer a:hover {
            text-decoration: underline;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .signup-container {
                flex-direction: column;
            }

            .signup-left {
                text-align: center;
                padding: 20px;
            }

            .signup-left h2 {
                font-size: 2em;
            }

            .signup-left p {
                font-size: 1em;
            }

            .signup-right {
                padding: 20px;
            }

        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card login-card">
                    <div class="card-header">
                        <h4 style="text-align: center;"><strong>{{ __('Login your Account') }}</strong></h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="login-footer">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        @endif
                         @if (Route::has('register'))
                            <p class="mb-1">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
