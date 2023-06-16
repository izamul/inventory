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

    .card {
        margin-top: 4rem;
    }

    .card-footer {
        display: flex;
        justify-content: flex-end;
    }
</style>

<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Detail Pemasok
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Nama Pemasok</b> : {{ $pemasok->namaPemasok }}</li>
                            <li class="list-group-item"><b>Alamat Pemasok</b> : {{ $pemasok->alamatPemasok }}</li>
                            <li class="list-group-item"><b>No Telepon Pemasok</b> : {{ $pemasok->telpPemasok }}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="ml-auto">
                            <a class="btn btn-success" href="{{ route('pemasok.index') }}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset('storage/' . $pemasok->fotoPemasok)}}" alt="Foto Pemasok">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
