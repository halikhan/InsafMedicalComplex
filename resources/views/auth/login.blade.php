<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('https://img.freepik.com/premium-photo/photo-new-modern-private-hospital-building-outside_483949-8711.jpg');
            /* background-image: url('{{ asset("assets/img/hospital-background.jpg") }}'); */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-container img {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }

        .login-container h1 {
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .login-container h1 span {
            color: #009cd9;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .login-container a {
            text-decoration: none;
            color: #007bff;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        /* Customizing the logo size */
        .logosize {
            height: 150px !important;
            width: 150px !important;
        }

        /* Make inputs responsive */
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        /* Make the container responsive */
        @media (max-width: 576px) {
            .login-container {
                padding: 20px;
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="flex justify-center">
            <img src="{{ asset('assets/img/logo-rem.png') }}" alt="Logo" class="logosize">
        </div>

        <h1>
            <span>Insaaf</span> <span style="color: red;">Medical Complex</span>
        </h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn btn-primary">Log In</button>
        </form>

        <a href="#" class="d-block mt-3">Forgot your password?</a>
    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
