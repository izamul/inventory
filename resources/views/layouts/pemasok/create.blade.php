@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Data Pemasok
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

                <form method="post" action="{{ route('pemasok.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idPemasok">Id Pemasok</label>
                        <input type="text" name="idPemasok" class="form-control" id="idPemasok" aria-describedby="idPemasok">
                    </div>
                    <div class="form-group">
                        <label for="namaPemasok">Nama Pemasok</label>
                        <input type="namaPemasok" name="namaPemasok" class="form-control" id="namaPemasok" aria-describedby="namaPemasok">
                    </div>
                    <div class="form-group">
                        <label for="alamatPemasok">Alamat</label>
                        <input type="alamatPemasok" name="alamatPemasok" class="form-control" id="alamatPemasok" aria-describedby="alamatPemasok">
                    </div>
                    <div class="form-group">
                        <label for="telpPemasok">No Telepon</label>
                        <input type="telpPemasok" name="telpPemasok" class="form-control" id="telpPemasok" aria-describedby="telpPemasok">
                    </div>
                    <div class="form-group">
                        <label for="fotoPemasok">Foto Pemasok</label>
                        <input type="file" class="form-control" required="required" id="fotoPemasok" name="fotoPemasok" aria-describedby="fotoPemasok">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
