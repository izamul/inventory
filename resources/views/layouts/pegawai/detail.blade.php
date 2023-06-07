@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Pegawai
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id pegawai: </b>{{ $pegawai->idPegawai }}</li>
                    <li class="list-group-item"><b>Nama pegawai: </b>{{ $pegawai->namaPegawai }}</li>
                    <li class="list-group-item"><b>Email pegawai : </b>{{ $pegawai->email }}</li>
                    <li class="list-group-item"><b>Alamat pegawai : </b>{{ $pegawai->alamatPegawai }}</li>
                    <li class="list-group-item"><b>No Telepon pegawai : </b>{{ $pegawai->telpPegawai }}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('pegawai.index') }}">Kembali</a>
        </div>
    </div>
</div>
