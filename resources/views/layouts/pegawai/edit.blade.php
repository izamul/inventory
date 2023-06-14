@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    Edit Data Pegawai
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
                    <form method="post" action="{{ route('pegawai.update', $pegawai->idPegawai) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="namaPegawai">Nama Pegawai</label>
                            <input type="text" name="namaPegawai" class="form-control" id="namaPegawai" value="{{ $pegawai->namaPegawai }}">
                        </div>
                        <div class="form-group">
                            <label for="alamatPegawai">Alamat Pegawai</label>
                            <input type="text" name="alamatPegawai" class="form-control" id="alamatPegawai" value="{{ $pegawai->alamatPegawai }}">
                        </div>
                        <div class="form-group">
                            <label for="telpPegawai">No Telepon</label>
                            <input type="text" name="telpPegawai" class="form-control" id="telpPegawai" value="{{ $pegawai->telpPegawai }}">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" class="form-control" id="level">
                                <option value="1">Manager</option>
                                <option value="2">Pegawai</option>
                            </select>
                        </div>                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{ $pegawai->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="">
                        </div>
                        <div class="form-group">
                            <label for="fotoPegawai">Foto Pegawai</label>
                            <div class="d-flex flex-column align-items-start">
                                <img src="{{ asset('storage/' . $pegawai->fotoPegawai) }}" alt="Foto Pegawai" width="100px" class="mr-3">
                                <div class="custom-file mt-4">
                                    <input type="file" name="fotoPegawai" class="custom-file-input" id="fotoPegawai">
                                    <label class="custom-file-label" for="fotoPegawai">Pilih Foto</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#fotoPegawai').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });
</script>