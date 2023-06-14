@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Detail Kategori</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><b>Nama Kategori:</b> {{$kategori->namaKategori}}</li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('kategori.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')


