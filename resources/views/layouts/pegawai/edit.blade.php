@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3 mb-5">
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
                        <form method="post" action="{{ route('pegawai.update', $pegawai->idPegawai) }}" id="myForm"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="namaPegawai" class="col-md-3 col-form-label">Nama Pegawai</label>
                                <div class="col-md-9">
                                    <input type="text" name="namaPegawai" class="form-control" id="namaPegawai"
                                        value="{{ $pegawai->namaPegawai }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamatPegawai" class="col-md-3 col-form-label">Alamat Pegawai</label>
                                <div class="col-md-9">
                                    <input type="text" name="alamatPegawai" class="form-control" id="alamatPegawai"
                                        value="{{ $pegawai->alamatPegawai }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telpPegawai" class="col-md-3 col-form-label">No Telepon</label>
                                <div class="col-md-9">
                                    <input type="text" name="telpPegawai" class="form-control" id="telpPegawai"
                                        value="{{ $pegawai->telpPegawai }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="level" class="col-md-3 col-form-label">Level</label>
                                <div class="col-md-9">
                                    <select name="level" class="form-control" id="level">
                                        <option value="1" {{ $pegawai->level == 1 ? 'selected' : '' }}>Manager</option>
                                        <option value="2" {{ $pegawai->level == 2 ? 'selected' : '' }}>Pegawai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label">Email</label>
                                <div class="col-md-9">
                                    <input type="text" name="email" class="form-control" id="email"
                                        value="{{ $pegawai->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control" id="password" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fotoPegawai" class="col-md-3 col-form-label">Foto Pegawai</label>
                                <div class="col-md-9">
                                    <div class="d-flex flex-column align-items-start">
                                        <img src="{{ asset('storage/' . $pegawai->fotoPegawai) }}"
                                            alt="Foto Pegawai" width="100px" class="mr-3">
                                        <div class="custom-file mt-4">
                                            <input type="file" name="fotoPegawai" class="custom-file-input"
                                                id="fotoPegawai">
                                            <label class="custom-file-label" for="fotoPegawai">Pilih Foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 offset-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            name="perubahanData" id="perubahanData">
                                        <label class="form-check-label" for="perubahanData">
                                            Saya yakin melakukan perubahan data
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Kembali</a>
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
    $('#fotoPegawai').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
    });

    const checkbox = document.getElementById('perubahanData');
    const submitButton = document.getElementById('submitButton');

    checkbox.addEventListener('change', function() {
        submitButton.disabled = !checkbox.checked;
    });
</script>
