<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Subbagian BMN dan Umum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="assets/img/logo-ulm.png" alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <form method="POST" action="{{ route('login.auth') }}" class="needs-validation" novalidate autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="nim">Username</label>
                                    <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required autofocus>
                                    @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Username is required
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                            <button type="button" class="btn btn-outline-secondary" id="togglePassword" onclick="togglePasswordVisibility()">
                                                <i id="passwordIcon" class="fa fa-eye-slash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <p style="text-align: center">Belum punya akun?
                                <a href="{{ route('register.show') }}">Register</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var passwordIcon = document.getElementById("passwordIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl1+PpL+4g1ZyA5lvS3LksylnQpeUZ4d+8Q5VZk/sgitBB9eD9A1/3W4MjN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIqPEY5g5RjE6RvMAK2E3jHh6N0V9KKXHOB6rS8SyaRJ+STs52r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

