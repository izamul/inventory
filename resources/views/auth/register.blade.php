<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
    <link rel="stylesheet" type="text/css" href="login.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
</head>
<body>
    @section('content')
<section class="h-100 gradient-form" style="background-color: #f8f9fa;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <a href="{{ route('welcome') }}" class="btn-back">
                    Kembali
                </a>
                <div class="card rounded-5 text-black shadow">
                    <div class="row g-10" height="50%">
                        <div class="col-lg-6" height="50%" width="50%">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center header-logo">
                                    <div class="container-logo">
                                        <img src="{{ asset('AdminLTE/dist') }}/img/Group 1.png" alt="Logo" class="logo-atas" style="width: 80px; border-radius: 50%;">
                                    </div>
                                    <h4 class="mt-1 mb-5 pb-1">SAHABAT TANI</h4>
                                </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf                               
                                    <div class="form-outline mb-4">
                                        {{-- <label for="namaPegawai" class="form-label">Name</label> --}}
                                        <input name="namaPegawai" type="text" class="form-control @error('namaPegawai') is-invalid @enderror" name="namaPegawai" value="{{ old('namaPegawai') }}" required autocomplete="namaPegawai" autofocus>
                                        <label class="form-label" for="namaPegawai">Nama Lengkap</label>
                                        @error('namaPegawai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        {{-- <label for="telpPegawai" class="form-label">Nomor Telepon Pegawai</label> --}}
                                        <input id="telpPegawai" type="number" class="form-control @error('telpPegawai') is-invalid @enderror" name="telpPegawai" value="{{ old('telpPegawai') }}" required autocomplete="telpPegawai">
                                        <label class="form-label" for="telpPegawai">Nomor Telepon</label>
                                        @error('telpPegawai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        {{-- <label for="email" class="form-label">Email Address</label> --}}
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <label class="form-label" for="level">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        {{-- <label for="password" class="form-label">Password</label> --}}
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <label class="form-label" for="level">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        {{-- <label for="password-confirm" class="form-label">Confirm Password</label> --}}
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <label class="form-label" for="level">Confirm Password</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mt-4">{{ __('Register') }}</button>
                                    <div class="text-center mt-3">
                                        <p>Sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></p>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
</body>
</html>
