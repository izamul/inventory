@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    Tambah Kategori
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
                    <form method="post" action="{{ route('kategori.store') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                            <label for="idKategori">Id Kategori</label>
                            <input type="text" name="idKategori" class="form-control" id="idKategori">
                        </div>
                        <div class="form-group">
                            <label for="namaKategori">Nama Kategori</label>
                            <input type="text" name="namaKategori" class="form-control" id="namaKategori">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-3">Submit</button>
                            <a class="btn btn-danger mt-3" href="{{ route('kategori.index') }}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
