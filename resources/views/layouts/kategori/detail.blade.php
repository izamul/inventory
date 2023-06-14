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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Detail Kategori
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Nama Kategori</b> : {{ $kategori->namaKategori }}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="ml-auto">
                            <a class="btn btn-success" href="{{ route('kategori.index') }}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')


