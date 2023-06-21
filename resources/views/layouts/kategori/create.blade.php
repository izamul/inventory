@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        Tambah Kategori
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
                        <form method="post" action="{{ route('kategori.store') }}" id="myForm">
                            @csrf
                            <div class="form-group row">
                                <label for="namaKategori" class="col-md-4 col-form-label text-md-right">Nama Kategori</label>
                                <div class="col-md-8">
                                    <input type="text" name="namaKategori" class="form-control" id="namaKategori">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('kategori.index') }}" class="btn btn-danger" role="button"
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
