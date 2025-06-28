<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - EasyBook</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light login-page">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px; border-radius: 16px;">
            <h3 class="text-center mb-4">Login to EasyBook</h3>

            <form id="loginForm">
                <div id="message"></div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <div class="text-center mt-3">
                <a href="/register">Don't have an account? Register</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>