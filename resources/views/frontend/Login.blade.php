<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('frontend-assets/img/favicons/favicon.png') }}" />
    <style>
        body {
            background: linear-gradient(135deg, #106c97, rgba(16, 108, 151, 0.9));
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border: none;
            border-radius: 1rem;
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            /* Enhanced box shadow */
            padding: 2rem;
            background-color: #fff;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #6c63ff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #5548c8;
        }

        h2 {
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #333;
        }

        .register-link {
            text-align: center;
            margin-top: 1rem;
        }

        .register-link a {
            color: #6c63ff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <div class="card">
            <h2>Login</h2>
            <form action="{{ route('loginUser') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>
</body>

</html>