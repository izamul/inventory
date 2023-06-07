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
                        </div><!-- /.col -->
                        </ol>
                    </div><!-- /.col -->
                    <div class="container">
                        <table class="table table-striped">
                            <a class="btn btn-success right" href="{{ route('pemasok.create') }}"
                                style="margin-left:20cm; margin-bottom:5px;"> Tambah Data Pemasok</a>
                            <h2 style="text-align: left;">Pemasok</h2></a>
                            <br>
                            {{-- <a class="btn btn-success right" href="{{ route('pemasok.create') }}" style="margin-left:23cm; margin-bottom:5px;"> Tambah Data Pemasok</a> --}}
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
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th width="220px">Action</th>
                                    </tr>
                                    @foreach ($pemasok as $masok)
                                        <tr>
                                            <td>{{ $masok->idPemasok }}</td>
                                            <td>{{ $masok->namaPemasok }}</td>
                                            <td>{{ $masok->alamatPemasok }}</td>
                                            <td>{{ $masok->telpPemasok }}</td>
                                            <td>
                                                <form action="{{ route('pemasok.destroy', $masok->idPemasok) }}"
                                                    method="POST">

                                                    <a class="btn btn-info"
                                                        href="{{ route('pemasok.show', $masok->idPemasok) }}">Show</a>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('pemasok.edit', $masok->idPemasok) }}">Edit</a>

                                                    @csrf

                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </a>
                        </table>
                        {!! $pemasok->withQueryString()->links('pagination::bootstrap-5') !!}
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

        {{-- <a class="btn btn-success right" href="{{ route('pemasok.index') }}"
        style="margin-left:165px"> Show All Pemasok</a> --}}