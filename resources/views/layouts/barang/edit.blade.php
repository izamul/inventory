@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4 mb-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        Edit Barang
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('barang.update', $barang->idBarang) }}" id="myForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="namaBarang" class="col-md-3 col-form-label">Nama Barang</label>
                                <div class="col-md-9">
                                    <input type="text" name="namaBarang" class="form-control" id="namaBarang"
                                        value="{{ $barang->namaBarang }}" aria-describedby="namaBarang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="satuan" class="col-md-3 col-form-label">Satuan</label>
                                <div class="col-md-9">
                                    <input type="text" name="satuan" class="form-control" id="satuan"
                                        value="{{ $barang->satuan }}" aria-describedby="satuan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-md-3 col-form-label">Harga</label>
                                <div class="col-md-9">
                                    <input type="text" name="harga" class="form-control" id="harga"
                                        value="{{ $barang->harga }}" aria-describedby="harga">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stock" class="col-md-3 col-form-label">Stock</label>
                                <div class="col-md-9">
                                    <input type="text" name="stock" class="form-control" id="stock"
                                        value="{{ $barang->stock }}" aria-describedby="stock">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategori_id" class="col-md-3 col-form-label">Kategori</label>
                                <div class="col-md-9">
                                    <select name="kategori_id" class="form-control" id="kategori_id">
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->idKategori }}"
                                                {{ $k->idKategori == $barang->kategori_id ? 'selected' : '' }}>
                                                {{ $k->namaKategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pemasok_id" class="col-md-3 col-form-label">Pemasok</label>
                                <div class="col-md-9">
                                    <select name="pemasok_id" class="form-control" id="pemasok_id">
                                        @foreach ($pemasok as $p)
                                            <option value="{{ $p->idPemasok }}"
                                                {{ $p->idPemasok == $barang->pemasok_id ? 'selected' : '' }}>
                                                {{ $p->namaPemasok }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fotoBarang" class="col-md-3 col-form-label">Foto Barang</label>
                                <div class="col-md-9">
                                    <div class="d-flex flex-column align-items-start">
                                        <img src="{{ asset('storage/' . $barang->fotoBarang) }}" alt="Foto Barang"
                                            width="100px" class="mr-3">
                                        <div class="custom-file mt-4">
                                            <input type="file" name="fotoBarang" class="custom-file-input"
                                                id="fotoBarang">
                                            <label class="custom-file-label" for="fotoBarang">Pilih Foto</label>
                                        </div>
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
    $('#fotoBarang').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });
</script>
