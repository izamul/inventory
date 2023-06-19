@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="content-wrapper">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        Edit Data Pemasok
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
                        <form method="post" action="{{ route('pemasok.update', $pemasok->idPemasok) }}" id="myForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="namaPemasok" class="col-md-3 col-form-label">Nama Pemasok</label>
                                <div class="col-md-9">
                                    <input type="text" name="namaPemasok" class="form-control" id="namaPemasok"
                                        value="{{ $pemasok->namaPemasok }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamatPemasok" class="col-md-3 col-form-label">Alamat Pemasok</label>
                                <div class="col-md-9">
                                    <input type="text" name="alamatPemasok" class="form-control" id="alamatPemasok"
                                        value="{{ $pemasok->alamatPemasok }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telpPemasok" class="col-md-3 col-form-label">No Telepon</label>
                                <div class="col-md-9">
                                    <input type="text" name="telpPemasok" class="form-control" id="telpPemasok"
                                        value="{{ $pemasok->telpPemasok }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fotoPemasok" class="col-md-3 col-form-label">Foto Pemasok</label>
                                <div class="col-md-9">
                                    <div class="d-flex flex-column align-items-start">
                                        <img src="{{ asset('storage/' . $pemasok->fotoPemasok) }}" alt="Foto Pegawai"
                                            width="200px" class="mr-3">
                                        <div class="custom-file mt-4">
                                            <input type="file" name="fotoPemasok" class="custom-file-input"
                                                id="fotoPemasok">
                                            <label class="custom-file-label" for="fotoPegawai">Pilih Foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 offset-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="pengaruhDataBarang"
                                            name="pengaruhDataBarang">
                                        <label class="form-check-label" for="pengaruhDataBarang">Perubahan akan mempengaruhi data barang</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pemasok.index') }}" class="btn btn-danger" role="button"
                                    aria-disabled="true">Kembali</a>
                                <button type="submit" class="btn btn-success" id="submitButton" disabled>Submit</button>
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
    $('#fotoPemasok').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });

    const checkbox = document.getElementById('pengaruhDataBarang');
    const submitButton = document.getElementById('submitButton');

    checkbox.addEventListener('change', function() {
        submitButton.disabled = !checkbox.checked;
    });
</script>
``
