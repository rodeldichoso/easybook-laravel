<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - EasyBook</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light register-page">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-sm" style="width: 100%; max-width: 450px; border-radius: 16px;">
            <h3 class="text-center mb-4">Create Your Account</h3>

            <form id="registerForm">
                <div id="message"></div>
                <div class="mb-3">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" id="first-name" name="first_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Last Name</label>
                    <input type="text" id="last-name" name="last_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <div class="text-center mt-3">
                <a href="/login">Already have an account? Login</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/register.js') }}"></script>
</body>

</html>