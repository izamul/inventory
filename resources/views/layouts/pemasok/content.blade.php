<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pemasok</li>
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
                            <h3 class="card-title mt-2">Pemasok</h3>
                            <div class="float-right">
                                <a href="{{ route('pemasok.create') }}" class="btn btn-success">Tambah Data Pemasok</a>
                                <a href="{{ route('cetakPemasok') }}" class="btn btn-warning">Cetak PDF</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-right mt-1" method="GET" action="{{ route('searchPemasok') }}">
                                <div class="input-group">
                                    <input type="text" name="searchPemasok" class="form-control" id="searchPemasok"
                                        placeholder="Masukkan Nama Pemasok">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Foto Pemasok</th>
                                            <th width="220px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemasok as $masok)
                                            <tr>
                                                <td>{{ $masok->namaPemasok }}</td>
                                                <td>{{ $masok->alamatPemasok }}</td>
                                                <td>{{ $masok->telpPemasok }}</td>
                                                <td><img width="110px"
                                                        src="{{ asset('storage/' . $masok->fotoPemasok) }}"></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('pemasok.show', $masok->idPemasok) }}">Show</a>
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('pemasok.edit', $masok->idPemasok) }}">Edit</a>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#deleteConfirmation{{ $masok->idPemasok }}">Delete</button>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="deleteConfirmation{{ $masok->idPemasok }}" tabindex="-1"
                                                        role="dialog"
                                                        aria-labelledby="deleteConfirmationLabel{{ $masok->idPemasok }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteConfirmationLabel{{ $masok->idPemasok }}">
                                                                        Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus pemasok ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <form
                                                                        action="{{ route('pemasok.destroy', $masok->idPemasok) }}"
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
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {!! $pemasok->withQueryString()->links('pagination::bootstrap-5') !!}
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
