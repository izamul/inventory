@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Data Pemasok
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your i
                    nput.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('pemasok.update', $pemasok->idPemasok) }}" id="myForm" enctype="multipart/form-data">
                    {{-- <form action="/articles/{{$article->id}}" method="post" 
                        enctype="multipart/form-data"> --}}
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idPemasok">ID Pemasok</label>
                        <input type="text" name="idPemasok" class="form-control" id="idPemasok" value="{{ $pemasok->idPemasok }}"
                            aria-describedby="idPemasok">
                    </div>
                    <div class="form-group">
                        <label for="namaPemasok">Nama Pemasok</label>
                        <input type="text" name="namaPemasok" class="form-control" id="namaPemasok" value="{{ $pemasok->namaPemasok }}"
                            aria-describedby="namaPemasok">
                    </div>
                    <div class="form-group">
                        <label for="alamatPemasok">Alamat Pemasok</label>
                        <input type="text" name="alamatPemasok" class="form-control" id="alamatPemasok" value="{{ $pemasok->alamatPemasok }}"
                            aria-describedby="alamatPemasok">
                    </div>
                    <div class="form-group">
                        <label for="telpPemasok">No Telepon</label>
                        <input type="text" name="telpPemasok" class="form-control" id="telpPemasok" value="{{ $pemasok->telpPemasok }}"
                            aria-describedby="telpPemasok">
                    </div>
                    <div class="form-group">
                        <label for="fotoPemasok">Foto Pemasok</label>
                        <input type="file" class="form-control" required="required" name="fotoPemasok" value="">
                            <br>
                            <img width="150px" src="{{asset('storage/'.$pemasok->fotoPemasok)}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('pemasok.index') }}" class="btn btn-danger" role="button" aria-disabled="true" style="margin-left:5px">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>