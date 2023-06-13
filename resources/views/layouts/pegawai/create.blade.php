@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card shadow-lg" style="width: 24rem;">
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

                <form method="post" action="{{ route('pegawai.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idPegawai">Id Pegawai</label>
                        <input type="text" name="idPegawai" class="form-control" id="idPegawai"
                            aria-describedby="idPegawai">
                    </div>
                    <div class="form-group">
                        <label for="namaPegawai">Nama Pegawai</label>
                        <input type="namaPegawai" name="namaPegawai" class="form-control" id="namaPegawai"
                            aria-describedby="namaPegawai">
                    </div>
                    <div class="form-group">
                        <label for="alamatPegawai">Alamat</label>
                        <input type="alamatPegawai" name="alamatPegawai" class="form-control" id="alamatPegawai"
                            aria-describedby="alamatPegawai">
                    </div>
                    <div class="form-group">
                        <label for="telpPegawai">No Telepon</label>
                        <input type="telpPegawai" name="telpPegawai" class="form-control" id="telpPegawai"
                            aria-describedby="telpPegawai">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password Akun</label>
                        <input type="password" name="password" class="form-control" id="password"
                            aria-describedby="password">
                    </div>
                    <div class="form-group">
                        <label for="fotoPegawai">Foto Pegawai</label>
                        <div class="custom-file">
                            <input type="file" name="fotoPegawai" class="custom-file-input" id="fotoPegawai">
                            <label class="custom-file-label" for="fotoPegawai">Pilih Foto</label>
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
