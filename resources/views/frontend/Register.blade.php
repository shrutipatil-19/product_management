<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h2>Register</h2>
                    <form action="{{ route('storeUser') }}" method="POST" class="row">
                        @csrf
                        <div class="mb-3 col-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <div class="register-link">
                        <p class="mt-3">Already have an account? <a href="{{ route('loginNormal') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>