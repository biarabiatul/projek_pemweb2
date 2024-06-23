<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Register - Subbagian BMN dan Umum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
                            <h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
                            <form method="POST" action="{{ route('register.store') }}" class="needs-validation" novalidate="" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="namaInput">Nama</label>
                                    <input id="namaInput" type="text" class="form-control @error('namaInput') is-invalid @enderror" name="namaInput" value="{{ old('namaInput') }}" required autofocus>
                                    @error('namaInput')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Nama is required
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="emailInput">Email</label>
                                    <input id="emailInput" type="email" class="form-control @error('emailInput') is-invalid @enderror" name="emailInput" value="{{ old('emailInput') }}" required autofocus>
                                    @error('emailInput')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Email is required
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="nimInput">NIM</label>
                                    <input id="nimInput" type="text" class="form-control @error('nimInput') is-invalid @enderror" name="nimInput" value="{{ old('nimInput') }}" required autofocus>
                                    @error('nimInput')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        NIM is required
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="passwordInput">Password</label>
                                    </div>
                                    <input id="passwordInput" type="password" class="form-control @error('passwordInput') is-invalid @enderror" name="passwordInput" required>
                                    @error('passwordInput')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @else
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="passwordInput_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control @error('passwordInput_confirmation') is-invalid @enderror" id="passwordInput_confirmation" name="passwordInput_confirmation">
                                    @error('passwordInput_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                                <p style="text-align: center">Sudah punya Akun?
                                    <a href="{{ route('login') }}">Login</a>
                                </p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl1+PpL+4g1ZyA5lvS3LksylnQpeUZ4d+8Q5VZk/sgitBB9eD9A1/3W4MjN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIqPEY5g5RjE6RvMAK2E3jHh6N0V9KKXHOB6rS8SyaRJ+STs52r" crossorigin="anonymous"></script>
</body>
</html>
