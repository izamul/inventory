@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
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
                    <form method="post" action="{{ route('pemasok.update', $pemasok->idPemasok) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="idPemasok">ID Pemasok</label>
                            <input type="text" name="idPemasok" class="form-control" id="idPemasok" value="{{ $pemasok->idPemasok }}">
                        </div>
                        <div class="form-group">
                            <label for="namaPemasok">Nama Pemasok</label>
                            <input type="text" name="namaPemasok" class="form-control" id="namaPemasok" value="{{ $pemasok->namaPemasok }}">
                        </div>
                        <div class="form-group">
                            <label for="alamatPemasok">Alamat Pemasok</label>
                            <input type="text" name="alamatPemasok" class="form-control" id="alamatPemasok" value="{{ $pemasok->alamatPemasok }}">
                        </div>
                        <div class="form-group">
                            <label for="telpPemasok">No Telepon</label>
                            <input type="text" name="telpPemasok" class="form-control" id="telpPemasok" value="{{ $pemasok->telpPemasok }}">
                        </div>
                        <div class="form-group">
                            <label for="fotoPemasok">Foto Pemasok</label>
                            <div class="d-flex flex-column align-items-start">
                                <img src="{{ asset('storage/' . $pemasok->fotoPemasok) }}" alt="Foto Pegawai" width="100px" class="mr-3">
                                <div class="custom-file mt-4">
                                    <input type="file" name="fotoPemasok" class="custom-file-input" id="fotoPemasok">
                                    <label class="custom-file-label" for="fotoPegawai">Pilih Foto</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pemasok.index') }}" class="btn btn-danger" role="button" aria-disabled="true">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
