<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pemasok</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pemasok</h3>
                            <a href="{{ route('pemasok.create') }}" class="btn btn-success float-right">Tambah Data Pemasok</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-right my-2" method="get" action="{{ route('searchPemasok') }}">
                                <div class="input-group">
                                    <input type="text" name="searchPemasok" class="form-control" placeholder="Masukkan Nama / Alamat Pemasok">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th width="220px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemasok as $masok)
                                        <tr>
                                            <td>{{ $masok->idPemasok }}</td>
                                            <td>{{ $masok->namaPemasok }}</td>
                                            <td>{{ $masok->alamatPemasok }}</td>
                                            <td>{{ $masok->telpPemasok }}</td>
                                            <td>
                                                <form action="{{ route('pemasok.destroy', $masok->idPemasok) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('pemasok.show', $masok->idPemasok) }}">Show</a>
                                                    <a class="btn btn-primary" href="{{ route('pemasok.edit', $masok->idPemasok) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
