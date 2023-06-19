<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">Transaksi</h3>
                            <div class="float-right">
                                <div class="btn-group mr-2">
                                    <a href="{{ route('dataMasuk') }}" class="btn btn-success">Data Masuk</a>
                                    <a href="{{ route('dataKeluar') }}" class="btn btn-danger">Data Keluar</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-right mt-1" method="GET" action="{{ route('searchTransaksi') }}">
                                <div class="input-group">
                                    <input type="text" name="searchTransaksi" class="form-control" id="searchTransaksi" placeholder="Masukkan Nama Barang">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
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
                                                        <a class="btn btn-info btn-sm" href="{{ route('transaksi.show', $trx->idTransaksi) }}">Show</a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmation{{ $trx->idTransaksi }}">Delete</button>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteConfirmation{{ $trx->idTransaksi }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel{{ $trx->idTransaksi }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteConfirmationLabel{{ $trx->idTransaksi }}">Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus transaksi ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <form action="{{ route('transaksi.destroy', $trx->idTransaksi) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
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
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <nav aria-label="Page navigation">
                                {!! $transaksi->withQueryString()->links('pagination::bootstrap-5') !!}
                            </nav>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
