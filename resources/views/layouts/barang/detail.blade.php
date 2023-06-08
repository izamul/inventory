 @include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Detail Kategori
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id Kategori: </b>{{$kategori->idKategori}}</li>
                    <li class="list-group-item"><b>Nama Kategori: </b>{{$kategori->namaKategori}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('kategori.index') }}">Kembali</a>
        </div>
    </div>
</div>