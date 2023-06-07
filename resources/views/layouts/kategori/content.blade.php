<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">kategori</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kategori</h3>
                            <a class="btn btn-success float-right" href="{{ route('kategori.create') }}">Tambah Data Kategori</a>
                        </div>
                        <div class="card-body">
                            <form class="form-inline my-2" method="get" action="{{ route('searchKategori') }}">
                                <div class="input-group w-100">
                                    <input type="text" name="searchKategori" class="form-control" id="searchKategori" placeholder="Masukkan Nama Kategori">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-striped mt-4">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th width="220px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $ktg)
                                    <tr>
                                        <td>{{ $ktg->idKategori }}</td>
                                        <td>{{ $ktg->namaKategori }}</td>
                                        <td>
                                            <form action="{{ route('kategori.destroy', $ktg->idKategori) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('kategori.show', $ktg->idKategori) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('kategori.edit', $ktg->idKategori) }}">Edit</a>
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
                        <div class="card-footer">
                            {!! $kategori->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>