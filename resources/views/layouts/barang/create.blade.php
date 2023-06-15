@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        Tambah Barang
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Terdapat beberapa masalah dengan inputan Anda.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('barang.store') }}" id="myForm"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="namaBarang" class="col-md-4 col-form-label text-md-right">Nama Barang</label>
                                <div class="col-md-6">
                                    <input type="text" name="namaBarang" class="form-control" id="namaBarang"
                                        aria-describedby="namaBarang">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="satuan" class="col-md-4 col-form-label text-md-right">Satuan</label>
                                <div class="col-md-6">
                                    <input type="text" name="satuan" class="form-control" id="satuan"
                                        aria-describedby="satuan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stock" class="col-md-4 col-form-label text-md-right">Stock</label>
                                <div class="col-md-6">
                                    <input type="number" name="stock" class="form-control" id="stock"
                                        aria-describedby="stock">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="harga" class="col-md-4 col-form-label text-md-right">Harga</label>
                                <div class="col-md-6">
                                    <input type="number" name="harga" class="form-control" id="harga"
                                        aria-describedby="harga">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pemasok_id" class="col-md-4 col-form-label text-md-right">Pemasok</label>
                                <div class="col-md-6">
                                    <select name="pemasok_id" class="form-control" id="pemasok_id">
                                        @foreach ($pemasok as $masok)
                                            <option value="{{ $masok->idPemasok }}">{{ $masok->namaPemasok }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kategori_id" class="col-md-4 col-form-label text-md-right">Kategori</label>
                                <div class="col-md-6">
                                    <select name="kategori_id" class="form-control" id="kategori_id">
                                        @foreach ($kategori as $ktg)
                                            <option value="{{ $ktg->idKategori }}">{{ $ktg->namaKategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fotoBarang" class="col-md-4 col-form-label text-md-right">Foto Barang</label>
                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input type="file" name="fotoBarang" class="custom-file-input" id="fotoBarang">
                                        <label class="custom-file-label" for="fotoBarang">Pilih Foto</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('barang.index') }}" class="btn btn-danger" role="button"
                                    aria-disabled="true">Kembali</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    $(document).ready(function () {
        $('#fotoBarang').on('change', function () {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });
    });
</script>
