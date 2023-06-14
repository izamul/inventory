@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Detail Pegawai</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nama pegawai:</b> {{ $pegawai->namaPegawai }}</li>
                        <li class="list-group-item"><b>Email pegawai:</b> {{ $pegawai->email }}</li>
                        <li class="list-group-item"><b>Alamat pegawai:</b> {{ $pegawai->alamatPegawai }}</li>
                        <li class="list-group-item"><b>No Telepon pegawai:</b> {{ $pegawai->telpPegawai }}</li>
                        <li class="list-group-item"><b>Foto Pegawai: </b><img width="100px" src="{{ asset('storage/' . $pegawai->fotoPegawai)}}"></li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('pegawai.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>