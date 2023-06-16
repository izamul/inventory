@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .toggle-password {
        cursor: pointer;
    }
</style>

<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        Tambah Data Pegawai
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('pegawai.store') }}" id="myForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="namaPegawai" class="col-md-4 col-form-label">Nama Pegawai</label>
                                <div class="col-md-8">
                                    <input type="text" name="namaPegawai" class="form-control" id="namaPegawai"
                                        aria-describedby="namaPegawai">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamatPegawai" class="col-md-4 col-form-label">Alamat</label>
                                <div class="col-md-8">
                                    <input type="text" name="alamatPegawai" class="form-control" id="alamatPegawai"
                                        aria-describedby="alamatPegawai">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telpPegawai" class="col-md-4 col-form-label">No Telepon</label>
                                <div class="col-md-8">
                                    <input type="number" name="telpPegawai" class="form-control" id="telpPegawai"
                                        aria-describedby="telpPegawai">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="level" class="col-md-4 col-form-label">Level</label>
                                <div class="col-md-8">
                                    <select name="level" class="form-control" id="level">
                                        <option value="2">Pegawai</option>
                                        <option value="1">Manager</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label">Email</label>
                                <div class="col-md-8">
                                    <input type="email" name="email" class="form-control" id="email"
                                        aria-describedby="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label">Password Akun</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="password"
                                            aria-describedby="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-eye-slash toggle-password"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fotoPegawai" class="col-md-4 col-form-label">Foto Pegawai</label>
                                <div class="col-md-8">
                                    <div class="custom-file">
                                        <input type="file" name="fotoPegawai" class="custom-file-input"
                                            id="fotoPegawai">
                                        <label class="custom-file-label" for="fotoPegawai">Pilih Foto</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pegawai.index') }}" class="btn btn-danger" role="button"
                                    aria-disabled="true">Kembali</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include necessary JavaScript files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.toggle-password').on('click', function() {
            var inputPassword = $('#password');
            var icon = $(this).find('i');

            if (inputPassword.attr('type') === 'password') {
                inputPassword.attr('type', 'text');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                inputPassword.attr('type', 'password');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });

        $('#fotoPegawai').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').html(fileName);
        });
    });
</script>


@include('layouts.footer')
