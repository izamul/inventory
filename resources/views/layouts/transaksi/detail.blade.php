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
        margin-top: 1rem;
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
                        Detail Transaksi
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Tanggal</b> : {{ $transaksi->tanggal }}</li>
                            <li class="list-group-item"><b>Status</b> : {{ $transaksi->status }}</li>
                            <li class="list-group-item"><b>Total Harga</b> : {{ $transaksi->totalHarga }}</li>
                            <li class="list-group-item"><b>Jumlah</b> : {{ $transaksi->jumlah }}</li>
                            <li class="list-group-item">
                                <b>Nama Pencatat</b> : {{ $transaksi->pencatat }}
                            </li>
                            <li class="list-group-item">
                                <b>Nama Barang</b> : {{ $transaksi->barang->namaBarang }}
                                <a class="btn btn-primary btn-sm ml-2" href="{{ route('barang.show', $transaksi->barang->idBarang) }}">Detail Barang</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="ml-auto">
                            <a class="btn btn-success" href="{{ route('transaksi.index') }}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset('storage/' . $transaksi->barang->fotoBarang)}}" alt="Foto Transaksi">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
