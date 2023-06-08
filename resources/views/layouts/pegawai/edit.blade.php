@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    Edit Data Pegawai
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
                    <form method="post" action="{{ route('pegawai.update', $pegawai->idPegawai) }}" id="myForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="idPegawai">ID Pegawai</label>
                            <input type="text" name="idPegawai" class="form-control" id="idPegawai" value="{{ $pegawai->idPegawai }}">
                        </div>
                        <div class="form-group">
                            <label for="namaPegawai">Nama Pegawai</label>
                            <input type="text" name="namaPegawai" class="form-control" id="namaPegawai" value="{{ $pegawai->namaPegawai }}">
                        </div>
                        <div class="form-group">
                            <label for="alamatPegawai">Alamat Pegawai</label>
                            <input type="text" name="alamatPegawai" class="form-control" id="alamatPegawai" value="{{ $pegawai->alamatPegawai }}">
                        </div>
                        <div class="form-group">
                            <label for="telpPegawai">No Telepon</label>
                            <input type="text" name="telpPegawai" class="form-control" id="telpPegawai" value="{{ $pegawai->telpPegawai }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{ $pegawai->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="{{ $pegawai->password }}">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
