@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

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
                        <div class="form-group">
                            <label for="idKategori">Id Kategori</label>
                            <input type="text" name="idKategori" class="form-control" id="idKategori" value="{{ $kategori->idKategori }}">
                        </div>
                        <div class="form-group">
                            <label for="namaKategori">Nama Kategori</label>
                            <input type="text" name="namaKategori" class="form-control" id="namaKategori" value="{{ $kategori->namaKategori }}">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-danger" role="button" aria-disabled="true">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
