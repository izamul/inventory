@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Barang
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

                <form method="post" action="{{ route('barang.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="namaBarang" name="namaBarang" class="form-control" id="namaBarang" aria-describedby="namaBarang">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="satuan" name="satuan" class="form-control" id="satuan" aria-describedby="satuan">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" id="stock" aria-describedby="stock">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" aria-describedby="harga">
                    </div>
                    <div class="form-group">
                        <label for="pemasok_id">Pemasok</label>
                        <select name="pemasok_id" class="form-control" id="pemasok_id">
                            @foreach ($pemasok as $masok)
                            <option value="{{ $masok->idPemasok }}">{{ $masok->namaPemasok }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" class="form-control" id="kategori_id">
                            @foreach ($kategori as $ktg)
                            <option value="{{ $ktg->idKategori }}">{{ $ktg->namaKategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fotoBarang">Foto Barang</label>
                        <div class="custom-file">
                            <input type="file" name="fotoBarang" class="custom-file-input" id="fotoBarang">
                            <label class="custom-file-label" for="fotoPegawai">Pilih Foto</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('barang.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#fotoBarang').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });
</script>