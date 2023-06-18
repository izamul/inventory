<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
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
                    <div class="card mt">
                        <div class="card-header">
                            <h3 class="card-title">Kategori</h3>
                            <div class="float-right">
                                <a href="{{ route('kategori.create') }}" class="btn btn-success">Tambah Data Kategori</a>
                                <a href="{{ route('cetakKategori') }}" class="btn btn-warning">Cetak PDF</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-right my-2" method="GET" action="{{ route('searchKategori') }}">
                                <div class="input-group">
                                    <input type="text" name="searchKategori" class="form-control" id="searchKategori" placeholder="Masukkan Nama Kategori">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped mt-3">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th width="220px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori as $ktg)
                                            <tr>
                                                <td>{{ $ktg->namaKategori }}</td>
                                                <td>
                                                    <form action="{{ route('kategori.destroy', $ktg->idKategori) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="btn-group" role="group">
                                                            <a class="btn btn-info btn-sm" href="{{ route('kategori.show', $ktg->idKategori) }}">Show</a>
                                                            <a class="btn btn-primary btn-sm" href="{{ route('kategori.edit', $ktg->idKategori) }}">Edit</a>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmation{{ $ktg->idKategori }}">Delete</button>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteConfirmation{{ $ktg->idKategori }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel{{ $ktg->idKategori }}" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteConfirmationLabel{{ $ktg->idKategori }}">Konfirmasi Hapus</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Apakah Anda yakin ingin menghapus kategori ini?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {!! $kategori->withQueryString()->links('pagination::bootstrap-5') !!}
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
