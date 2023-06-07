        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pegawai</li>
                        </div><!-- /.col -->
                        </ol>
                    </div><!-- /.col -->
                    <div class="container">
                        <table class="table table-striped">
                            <a class="btn btn-success right" href="{{ route('pegawai.create') }}"
                                style="margin-left:23cm; margin-bottom:5px;"> Tambah Data Pegawai</a>
                            <h2 style="text-align: left;">Pegawai</h2></a>
                            <br>
                            {{-- <a class="btn btn-success right" href="{{ route('Pegawai.create') }}" style="margin-left:23cm; margin-bottom:5px;"> Tambah Data Pegawai</a> --}}
                            {{-- <br> --}}
                            <form class="form-right my-2" method="get" action="{{ route('searchPegawai') }}">
                                <a class="form-group w-80 mb-3">
                                    <div class="tombol-cari mb-4">
                                        <input type="text" name="searchPegawai" class="formcontrol w-50 d-inline p-2 "
                                        id="searchPegawai" placeholder="Masukkan Nama Pegawai">
                                        <button type="submit" class="btn btn-primary mb1 px-3 py-2">Cari</button>
                                    </div>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Foto</th>
                                        <th width="220px">Action</th>
                                    </tr>
                                    @foreach ($pegawai as $pgw)
                                        <tr>
                                            <td>{{ $pgw->idPegawai }}</td>
                                            <td>{{ $pgw->namaPegawai }}</td>
                                            <td>{{ $pgw->alamatPegawai }}</td>
                                            <td>{{ $pgw->telpPegawai }}</td>
                                            <td>{{ $pgw->fotoPegawai }}</td>
                                            <td>
                                                <form action="{{ route('pegawai.destroy', $pgw->idPegawai) }}"
                                                    method="POST">

                                                    <a class="btn btn-info"
                                                        href="{{ route('pegawai.show', $pgw->idPegawai) }}">Show</a>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('pegawai.edit', $pgw->idPegawai) }}">Edit</a>

                                                    @csrf

                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </a>
                        </table>
                        {!! $pegawai->withQueryString()->links('pagination::bootstrap-5') !!}
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