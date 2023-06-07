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
                        <table class="table table-striped">
                            <a class="btn btn-success right" href="{{ route('kategori.create') }}"
                                style="margin-left:20cm; margin-bottom:5px;"> Tambah Data Kategori</a>
                            <h2 style="text-align: left;">Kategori</h2></a>
                            <br>
                            {{-- <a class="btn btn-success right" href="{{ route('Kategori.create') }}" style="margin-left:23cm; margin-bottom:5px;"> Tambah Data Kategori</a> --}}
                            {{-- <br> --}}
                            <form class="form-right my-2" method="get" action="{{ route('search') }}">
                                <a class="form-group w-80 mb-3">
                                    <div class="tombol-cari mb-4">
                                        <input type="text" name="searchKategori" class="formcontrol w-50 d-inline p-2 "
                                        id="searchKategori" placeholder="Masukkan Nama">
                                        <button type="submit" class="btn btn-primary mb1 px-3 py-2">Cari</button>
                                    </div>
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
                                                <form action="{{ route('kategori.destroy', $ktg->idKategori) }}"
                                                    method="POST">

                                                    <a class="btn~ btn-info"
                                                        href="{{ route('kategori.show', $ktg->idKategori) }}">Show</a>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('kategori.edit', $ktg->idKategori) }}">Edit</a>

                                                    @csrf

                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </a>
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

        {{-- <a class="btn btn-success right" href="{{ route('Pegawai.index') }}"
        style="margin-left:165px"> Show All Pegawai</a> --}}