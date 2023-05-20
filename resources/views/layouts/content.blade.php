        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                        <div class="container">
                            <table class="table table-striped">
                                <h2 style="text-align: center;">Tabel Kategori</h2>
                                <br>
                                <a class="btn btn-success right" href="{{ route('kategori.create') }}" style="margin-left:23cm; margin-bottom:5px;"> Tambah Kategori</a>
                                <br>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th width="220px">Action</th>
                                </tr>
                                @foreach ($kategori as $gori)
                                <tr>
                                    <td>{{ $gori->idKategori }}</td>
                                    <td>{{ $gori->namaKategori }}</td>
                                    <td>
                                        <form action="{{ route('kategori.destroy',$gori->idKategori) }}" method="POST">

                                            <a class="btn btn-info"
                                                href="{{ route('kategori.show',$gori->idKategori) }}">Show</a>

                                            <a class="btn btn-primary"
                                                href="{{ route('kategori.edit',$gori->idKategori) }}">Edit</a>

                                            @csrf

                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            {!! $kategori->withQueryString()->links('pagination::bootstrap-5') !!}                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
