@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<style>
    .print-icon {
        display: inline-flex;
        align-items: center;
        cursor: pointer;
    }

    .print-icon:hover .print-text {
        color: blue;
    }

    .print-text {
        margin-left: 5px;
        transition: color 0.3s;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            @if (request()->is('data-masuk'))
                                Data Masuk
                            @elseif(request()->is('data-keluar'))
                                Data Keluar
                            @endif
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">
                                @if (request()->is('data-masuk'))
                                    Data Masuk
                                @elseif(request()->is('data-keluar'))
                                    Data Keluar
                                @endif
                            </h3>
                            <div class="float-right">
                                <div class="btn-group mr-2">
                                    <a href="{{ route('dataMasuk') }}" class="btn btn-success">Data Masuk</a>
                                    <a href="{{ route('dataKeluar') }}" class="btn btn-danger">Data Keluar</a>
                                </div>
                                <a href="{{ route('transaksi.create', ['type' => request()->is('data-keluar') ? 'data-keluar' : 'data-masuk']) }}"
                                    class="btn btn-success">
                                    Tambah Data Transaksi
                                </a>
                                @if (request()->is('data-masuk'))
                                    <a href="{{ route('cetakTransaksiMasuk') }}" class="btn btn-warning"><span
                                            class="print-icon">
                                            <i class="fas fa-print"></i>
                                            <span class="print-text">Cetak PDF</span>
                                        </span></a>
                                @elseif(request()->is('data-keluar'))
                                    <a href="{{ route('cetakTransaksiKeluar') }}" class="btn btn-warning"><span
                                            class="print-icon">
                                            <i class="fas fa-print"></i>
                                            <span class="print-text">Cetak PDF</span>
                                        </span></a>
                                @endif
                            </div>
                        </div>

                        <div class="card-body">
                            <form class="form-right mt-1" method="GET" action="{{ route('searchTransaksiData') }}">
                                <div class="tombol-cari mb-4">
                                    <div class="input-group">
                                        <input type="text" name="searchTransaksi" class="form-control"
                                            id="searchTransaksi" placeholder="Masukkan Nama Barang">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>@sortablelink('tanggal', 'Tanggal', ['icon' => ''])</th>
                                            <th>Status</th>
                                            <th>Total Harga</th>
                                            <th>Jumlah</th>
                                            <th>Nama Barang</th>
                                            <th>Pencatat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $trx)
                                            <tr>
                                                <td>{{ $trx->tanggal }}</td>
                                                <td>{{ $trx->status }}</td>
                                                <td>{{ $trx->totalHarga }}</td>
                                                <td>{{ $trx->jumlah }}</td>
                                                <td>{{ $trx->barang->namaBarang }}</td>
                                                <td>{{ $trx->pencatat }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('transaksi.show', $trx->idTransaksi) }}">Show</a>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#deleteConfirmation{{ $trx->idTransaksi }}">Delete</button>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="deleteConfirmation{{ $trx->idTransaksi }}" tabindex="-1"
                                                        role="dialog"
                                                        aria-labelledby="deleteConfirmationLabel{{ $trx->idTransaksi }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteConfirmationLabel{{ $trx->idTransaksi }}">
                                                                        Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus transaksi ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <form
                                                                        action="{{ route('transaksi.destroy', $trx->idTransaksi) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            {!! $transaksi->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
