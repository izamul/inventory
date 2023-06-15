<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="login.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />

    <style>
        body {
            opacity: 0;
            transition: opacity 0.5s;
        }
        .smooth-show {
            opacity: 1 !important;
        }
    </style>
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #f8f9fa;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <a href="{{ route('welcome') }}" class="btn-back">Kembali</a>
                    <div class="card rounded-5 text-black shadow">
                        <div class="row g-10" height="50%">
                            <div class="col-lg-6" height="50%" width="50%">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center header-logo">
                                        <div class="container-logo">
                                            <img src="{{ asset('AdminLTE/dist') }}/img/Group 1.png" alt="Logo" class="logo-atas" style="width: 80px; border-radius: 50%;">
                                        </div>
                                        <h4 class="mt-3 mb-3 pb-1">SAHABAT TANI</h4>
                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="text-center pb-1">
                                            <p>Please login to your account</p>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                            <label class="form-label" for="email">{{ __('Email') }}</label>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <label class="form-label" for="password">{{ __('Password') }}</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="text-center pb-1">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mt-4" type="submit">{{ __('Login') }}</button>
                                            <p class="mt-3 mb-0">Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 img-kanan"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>

    <script>
        window.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add("smooth-show");
        });
    </script>
</body>

</html>
