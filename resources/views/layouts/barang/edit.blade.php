@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
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
                    <div class="form-group">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="text" name="namaBarang" class="form-control" id="namaBarang"
                            value="{{ $barang->namaBarang }}" aria-describedby="namaBarang">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" name="satuan" class="form-control" id="satuan"
                            value="{{ $barang->satuan }}" aria-describedby="satuan">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" class="form-control" id="harga"
                            value="{{ $barang->harga }}" aria-describedby="harga">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" class="form-control" id="stock"
                            value="{{ $barang->stock }}" aria-describedby="stock">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" class="form-control" id="kategori_id">
                            @foreach ($kategori as $k)
                                <option value="{{ $k->idKategori }}"
                                    {{ $k->idKategori == $barang->kategori_id ? 'selected' : '' }}>
                                    {{ $k->namaKategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pemasok_id">Pemasok</label>
                        <select name="pemasok_id" class="form-control" id="pemasok_id">
                            @foreach ($pemasok as $p)
                                <option value="{{ $p->idPemasok }}"
                                    {{ $p->idPemasok == $barang->pemasok_id ? 'selected' : '' }}>{{ $p->namaPemasok }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fotoBarang">Foto Barang</label>
                        <div class="d-flex flex-column align-items-start">
                            <img src="{{ asset('storage/' . $barang->fotoBarang) }}" alt="Foto Barang" width="100px"
                                class="mr-3">
                            <div class="custom-file mt-4">
                                <input type="file" name="fotoBarang" class="custom-file-input" id="fotoBarang">
                                <label class="custom-file-label" for="fotoPegawai">Pilih Foto</label>
                            </div>
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