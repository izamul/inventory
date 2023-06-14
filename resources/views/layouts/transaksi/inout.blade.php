@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if (request()->is('data-masuk'))
                                    Data Masuk
                                @elseif(request()->is('data-keluar'))
                                    Data Keluar
                                @endif
                            </h3>
                            <a href="{{ route('transaksi.create', ['type' => request()->is('data-keluar') ? 'keluar' : 'masuk']) }}"
                                class="btn btn-success float-right">
                                Tambah Data Transaksi
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-right my-2" method="GET" action="{{ route('searchTransaksi') }}">
                                <div class="tombol-cari mb-4">
                                    <input type="text" name="search" class="form-control w-50 d-inline p-2"
                                        id="searchTransaksi" placeholder="Masukkan Keterangan / Tanggal Transaksi">
                                    <button type="submit" class="btn btn-primary mb-1 px-3 py-2">Cari</button>
                                    <a href="{{ route('dataMasuk') }}" class="btn btn-success ml-4">Data Masuk</a>
                                    <a href="{{ route('dataKeluar') }}" class="btn btn-danger ml-2">Data Keluar</a>
                                </div>
                            </form>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Total Harga</th>
                                        <th>Jumlah</th>
                                        <th>Nama Barang</th>
                                        <th>Pencatat</th>
                                        <th width="220px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $trx)
                                        <tr>
                                            <td>{{ $trx->idTransaksi }}</td>
                                            <td>{{ $trx->keterangan }}</td>
                                            <td>{{ $trx->tanggal }}</td>
                                            <td>{{ $trx->status }}</td>
                                            <td>{{ $trx->totalHarga }}</td>
                                            <td>{{ $trx->jumlah }}</td>
                                            <td>{{ $trx->barang->namaBarang }}</td>
                                            <td>{{ $trx->pegawai->namaPegawai }}</td>
                                            <td>
                                                <a class="btn btn-info"
                                                    href="{{ route('transaksi.show', $trx->idTransaksi) }}">Show</a>
                                                <a class="btn btn-primary"
                                                    href="{{ route('transaksi.edit', $trx->idTransaksi) }}">Edit</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteConfirmation{{ $trx->idTransaksi }}">Delete</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteConfirmation{{ $trx->idTransaksi }}"
                                                    tabindex="-1" role="dialog"
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
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {!! $transaksi->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
