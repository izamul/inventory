<!-- Main content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Barang</h3>
                        <a href="{{ route('barang.create') }}" class="btn btn-success float-right">Tambah Data Barang</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-right my-2" method="GET" action="{{ route('searchBarang') }}">
                            <div class="input-group">
                                <input type="text" name="searchBarang" class="form-control" id="searchBarang"
                                    placeholder="Masukkan Nama Kategori">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Satuan</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>Pemasok</th>
                                        <th>Kategori</th>
                                        <th>Foto</th>
                                        <th width="220px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $brg)
                                        <tr>
                                            <td>{{ $brg->namaBarang }}</td>
                                            <td>{{ $brg->satuan }}</td>
                                            <td>{{ $brg->stock }}</td>
                                            <td>{{ $brg->harga }}</td>
                                            <td>{{ $brg->pemasok->namaPemasok }}</td>
                                            <td>{{ $brg->kategori->namaKategori }}</td>
                                            <td><img width="100px" src="{{ asset('storage/' . $brg->fotoBarang) }}"></td>
                                            <td>
                                                <form action="{{ route('barang.destroy', $brg->idBarang) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-info"
                                                        href="{{ route('barang.show', $brg->idBarang) }}">Show</a>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('barang.edit', $brg->idBarang) }}">Edit</a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteConfirmation{{ $brg->idBarang }}">Delete</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="deleteConfirmation{{ $brg->idBarang }}" tabindex="-1"
                                                        role="dialog"
                                                        aria-labelledby="deleteConfirmationLabel{{ $brg->idBarang }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteConfirmationLabel{{ $brg->idBarang }}">Konfirmasi
                                                                        Hapus</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus barang ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {!! $barang->withQueryString()->links('pagination::bootstrap-5') !!}
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

<!-- Tampilkan dialog konfirmasi -->
<div id="deleteConfirmationModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus Pemasok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus pemasok ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan gaya CSS langsung -->
@push('styles')
    <style>
        .modal-dialog {
            margin-top: 200px;
        }

        .modal-title {
            font-weight: bold;
        }

        .modal-footer {
            justify-content: flex-start;
        }

        .modal-footer form {
            display: inline-block;
        }
    </style>
@endpush

<!-- ... konten lainnya ... -->

@push('scripts')
    <script>
        function showConfirmationModal(url) {
            // Set action pada form untuk menghapus pemasok
            document.getElementById('deleteForm').action = url;

            // Tampilkan dialog konfirmasi
            $('#deleteConfirmationModal').modal('show');
        }
    </script>
@endpush
