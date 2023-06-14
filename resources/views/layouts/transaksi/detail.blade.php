@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')



<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Detail Transaksi
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Transaksi: </b>{{ $transaksi->idTransaksi }}</li>
                        <li class="list-group-item"><b>Keterangan: </b>{{ $transaksi->keterangan }}</li>
                        <li class="list-group-item"><b>Tanggal: </b>{{ $transaksi->tanggal }}</li>
                        <li class="list-group-item"><b>Status: </b>{{ $transaksi->status }}</li>
                        <li class="list-group-item"><b>Total Harga: </b>{{ $transaksi->totalHarga }}</li>
                        <li class="list-group-item"><b>Jumlah: </b>{{ $transaksi->jumlah }}</li>
                        <li class="list-group-item">
                            <b>Nama Barang:</b> {{ $transaksi->barang->namaBarang }}
                            <a class="btn btn-primary btn-sm ml-2" href="{{ route('barang.show', $transaksi->barang->idBarang) }}">Detail Barang</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nama Pencatat:</b> {{ $transaksi->pegawai->namaPegawai }}
                            <a class="btn btn-primary btn-sm ml-2" href="{{ route('pegawai.show', $transaksi->pegawai->idPegawai) }}">Detail Pencatat</a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('transaksi.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')