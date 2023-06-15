@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="content-wrapper">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        Edit Kategori
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
                        <form method="post" action="{{ route('kategori.update', $kategori->idKategori) }}" id="myForm">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="namaKategori" class="col-md-3 col-form-label">Nama Kategori</label>
                                <div class="col-md-9">
                                    <input type="text" name="namaKategori" class="form-control" id="namaKategori"
                                        value="{{ $kategori->namaKategori }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 offset-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="pengaruhBarang" name="pengaruhBarang">
                                        <label class="form-check-label" for="pengaruhBarang">Perubahan akan mempengaruhi data barang</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('kategori.index') }}" class="btn btn-danger" role="button" aria-disabled="true">Kembali</a>
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
    const checkbox = document.getElementById('pengaruhBarang');
    const submitButton = document.getElementById('submitButton');

    checkbox.addEventListener('change', function() {
        submitButton.disabled = !checkbox.checked;
    });
</script>
