@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Detail Barang</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><b>Nama Barang:</b> {{$barang->namaBarang}}</li>
                        <li class="list-group-item"><b>Satuan:</b> {{$barang->satuan}}</li>
                        <li class="list-group-item"><b>Harga:</b> {{$barang->harga}}</li>
                        <li class="list-group-item"><b>Stock:</b> {{$barang->stock}}</li>
                        <li class="list-group-item"><b>Kategori:</b> {{$barang->kategori->namaKategori}}</li>
                        <li class="list-group-item"><b>Foto Barang: </b><img width="100px" src="{{ asset('storage/' . $barang->fotoBarang)}}"></li>
                        <li class="list-group-item">
                            <b>Pemasok:</b> {{$barang->pemasok->namaPemasok}}
                            <a class="btn btn-primary btn-sm ml-2" href="{{ route('pemasok.show', $barang->pemasok->idPemasok) }}">Detail Pemasok</a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('barang.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')