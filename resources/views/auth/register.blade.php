@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="idPegawai" class="col-md-4 col-form-label text-md-end">{{ __('ID Pegawai') }}</label>

                            <div class="col-md-6">
                                <input id="idPegawai" type="text" class="form-control @error('idPegawai') is-invalid @enderror" name="idPegawai" value="{{ old('idPegawai') }}" required autocomplete="idPegawai" autofocus>

                                @error('idPegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="namaPegawai" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="namaPegawai" type="text" class="form-control @error('namaPegawai') is-invalid @enderror" name="namaPegawai" value="{{ old('namaPegawai') }}" required autocomplete="namaPegawai" autofocus>

                                @error('namaPegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamatPegawai" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Pegawai') }}</label>

                            <div class="col-md-6">
                                <input id="alamatPegawai" type="alamatPegawai" class="form-control @error('alamatPegawai') is-invalid @enderror" name="alamatPegawai" value="{{ old('alamatPegawai') }}" required autocomplete="alamatPegawai">

                                @error('alamatPegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="telpPegawai" class="col-md-4 col-form-label text-md-end">{{ __('Nomor Telepon Pegawai') }}</label>

                            <div class="col-md-6">
                                <input id="telpPegawai" type="telpPegawai" class="form-control @error('telpPegawai') is-invalid @enderror" name="telpPegawai" value="{{ old('telpPegawai') }}" required autocomplete="telpPegawai">

                                @error('telpPegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Tingkatan Level') }}</label>

                            <div class="col-md-6">
                                <input id="level" type="level" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" required autocomplete="level">

                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-0 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
