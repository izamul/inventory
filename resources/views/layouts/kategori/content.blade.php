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
                        </div><!-- /.col -->
                        </ol>
                    </div><!-- /.col -->
                    <div class="container">
                            <a class="btn btn-success right" href="{{ route('kategori.create') }}"
                                style="margin-left:20cm; margin-bottom:5px;"> Tambah Data Kategori</a>
                            <h2 style="text-align: left;">Kategori</h2></a>
                            <br>
                            <form class="form-right my-2" method="get" action="{{ route('searchKategori') }}">
                                <div class="tombol-cari mb-4">
                                    <input type="text" name="searchKategori" class="formcontrol w-50 d-inline p-2"
                                        id="searchKategori" placeholder="Masukkan Nama Kategori">
                                    <button type="submit" class="btn btn-primary mb1 px-3 py-2">Cari</button>
                                </div>
                            </form>
                            <table class="table table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th width="220px">Action</th>
                                </tr>
                                @foreach ($kategori as $ktg)
                                <tr>
                                    <td>{{ $ktg->idKategori }}</td>
                                    <td>{{ $ktg->namaKategori }}</td>
                                    <td>
                                        <form action="{{ route('kategori.destroy', $ktg->idKategori) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        
                                            <a class="btn btn-info" href="{{ route('kategori.show', $ktg->idKategori) }}">Show</a>
                                        
                                            <a class="btn btn-primary" href="{{ route('kategori.edit', $ktg->idKategori) }}">Edit</a>
                                        
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmation{{ $ktg->idKategori }}">Delete</button>
                                        
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
                        </table>
                        {!! $kategori->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
