@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Data Pegawai
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your i
                    nput.<br><br>
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
                        <input type="text" name="idPegawai" class="form-control" id="idPegawai" value="{{ $pegawai->idPegawai }}"
                            aria-describedby="idPegawai">
                    </div>
                    <div class="form-group">
                        <label for="namaPegawai">Nama Pegawai</label>
                        <input type="text" name="namaPegawai" class="form-control" id="namaPegawai" value="{{ $pegawai->namaPegawai }}"
                            aria-describedby="namaPegawai">
                    </div>
                    <div class="form-group">
                        <label for="alamatPegawai">Alamat Pegawai</label>
                        <input type="text" name="alamatPegawai" class="form-control" id="alamatPegawai" value="{{ $pegawai->alamatPegawai }}"
                            aria-describedby="alamatPegawai">
                    </div>
                    <div class="form-group">
                        <label for="telpPegawai">No Telepon</label>
                        <input type="text" name="telpPegawai" class="form-control" id="telpPegawai" value="{{ $pegawai->telpPegawai }}"
                            aria-describedby="telpPegawai">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{ $pegawai->email }}"
                            aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="{{ $pegawai->password }}"
                            aria-describedby="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('pegawai.index') }}" class="btn btn-danger" role="button" aria-disabled="true" style="margin-left:5px">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>