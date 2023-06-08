        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Barang</li>
                        </div><!-- /.col -->
                        </ol>
                    </div><!-- /.col -->
                    <div class="container">
                            <a class="btn btn-success right" href="{{ route('barang.create') }}"
                                style="margin-left:20cm; margin-bottom:5px;"> Tambah Data Barang</a>
                            <h2 style="text-align: left;">Barang</h2></a>
                            <br>
                            <form class="form-right my-2" method="GET" action="{{ route('searchBarang') }}">
                                <div class="tombol-cari mb-4">
                                    <input type="text" name="searchBarang" class="formcontrol w-50 d-inline p-2"
                                        id="searchBarang" placeholder="Masukkan Nama Kategori">
                                    <button type="submit" class="btn btn-primary mb1 px-3 py-2">Cari</button>
                                </div>
                            </form>
                                <table class="table table-striped">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Satuan</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>Pemasok</th>
                                        <th>Kategori</th>
                                        <th>Foto</th>
                                        <th width="220px">Action</th>
                                    </tr>
                                    @foreach ($barang as $brg)
                                    <tr>
                                        <td>{{ $brg->idBarang }}</td>
                                        <td>{{ $brg->namaBarang }}</td>
                                        <td>{{ $brg->satuan }}</td>
                                        <td>{{ $brg->stock }}</td>
                                        <td>{{ $brg->harga }}</td>
                                        <td>{{ $brg->pemasok->namaPemasok }}</td>
                                        <td>{{ $brg->kategori->namaKategori }}</td>
                                        <td>{{ $brg->fotoBarang}}</td>
                                        <td>
                                            <form action="{{ route('barang.destroy', $brg->idBarang) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            
                                                <a class="btn btn-info" href="{{ route('barang.show', $brg->idBarang) }}">Show</a>
                                            
                                                <a class="btn btn-primary" href="{{ route('barang.edit', $brg->idBarang) }}">Edit</a>
                                            
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmation{{ $brg->idBarang }}">Delete</button>
                                            
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteConfirmation{{ $brg->idBarang }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel{{ $brg->idBarang}}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteConfirmationLabel{{ $brg->idBarang }}">Konfirmasi Hapus</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus barang ini?
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
                        {!! $barang->withQueryString()->links('pagination::bootstrap-5') !!}
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