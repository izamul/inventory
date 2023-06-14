@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<style>
    .list-group-item {
        display: flex;
        align-items: center;
    }

    .list-group-item b {
        min-width: 180px;
        margin-right: 10px;
    }

    .card-footer {
        display: flex;
        justify-content: flex-end;
    }
</style>

{{-- konten --}}
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img width="235px" src="{{ asset('storage/' . $pegawai->fotoPegawai)}}" alt="Foto Pegawai">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Detail Pegawai</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Nama pegawai</b> : {{ $pegawai->namaPegawai }}</li>
                                <li class="list-group-item"><b>Email pegawai</b> : {{ $pegawai->email }}</li>
                                <li class="list-group-item"><b>Alamat pegawai</b> : {{ $pegawai->alamatPegawai }}</li>
                                <li class="list-group-item"><b>No Telepon pegawai</b> : {{ $pegawai->telpPegawai }}</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="ml-auto">
                                <a class="btn btn-success" href="{{ route('pegawai.index') }}">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- konten --}}
@include('layouts.footer')