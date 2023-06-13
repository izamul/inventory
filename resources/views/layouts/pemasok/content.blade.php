<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
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
    </div>
    <!-- /.content-header -->

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
                            <form class="form-right my-2" method="GET" action="{{ route('searchPemasok') }}">
                                <div class="tombol-cari mb-4">
                                    <input type="text" name="search" class="form-control w-50 d-inline p-2" id="searchPemasok" placeholder="Masukkan Nama / Alamat Pemasok">
                                    <button type="submit" class="btn btn-primary mb-1 px-3 py-2">Cari</button>
                                </div>
                            </form>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
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
                                            <td>{{ $masok->idPemasok }}</td>
                                            <td>{{ $masok->namaPemasok }}</td>
                                            <td>{{ $masok->alamatPemasok }}</td>
                                            <td>{{ $masok->telpPemasok }}</td>
                                            <td><img width="100px" src="{{ asset('storage/' . $masok->fotoPemasok) }}"></td>
                                            <td>
                                                <form action="{{ route('pemasok.destroy', $masok->idPemasok) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                    <a class="btn btn-info"
                                                        href="{{ route('pemasok.show', $masok->idPemasok) }}">Show</a>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('pemasok.edit', $masok->idPemasok) }}">Edit</a>

                                                    

                                                    
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
