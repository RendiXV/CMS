<!doctype html>
<html lang="en">

<head>
    <title>Login AYOGO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/login/css/style.css') }}">


</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section"></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex align-items-center justify-content-center">
                            <h1 style="color: orange">AYOGO</h1>
                            {{-- <img src="{{ asset('images/LOGO-DAMKAR.png') }}" width="100" alt="Logo Damkar"> --}}
                        </div>
                        <h3 class="text-center mb-4">Sign In</h3>

                        <form class="login-form" action="/admin/login/proses" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="form-control rounded-left @error('email') is-invalid @enderror"
                                    placeholder="Email" required>
                                @error('email')
                                    <span class="invalid-feedback" style="text-align: left; padding-left: 20px;"
                                        role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password"
                                    class="form-control rounded-left @error('password') is-invalid @enderror"
                                    id="exampleInputPassword1" placeholder="Password" required>
                                @error('password')
                                    <span class="invalid-feedback" style="text-align: left; padding-left: 20px;"
                                        role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
                            {{-- <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/login/js/popper.js') }}"></script>
    <script src="{{ asset('assets/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login/js/main.js') }}"></script>

</body>

</html>
