<!DOCTYPE html>
<html>

<head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>



    <style>
        .full-height-section {
            height: 100vp;
        }

        .small-font {
            font-size: 12px;
        }

        .medium-font {
            font-size: 12px;
        }

        .home {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <section class="full-height-section" style="background-color: #eee">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="home text-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center mt-4">
                            <img src="{{ asset('storage/' . $pegawai->fotoPegawai) }}" alt="avatar"
                                class="rounded-2 img-fluid" style="width: 150px" />
                            <div class="d-flex justify-content-center mb-2 mt-4">
                                <button type="button" class="btn btn-outline-primary ms-1 medium-font"
                                    onclick="showFloatingForm()">
                                    Ganti Gambar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $pegawai->namaPegawai }}</p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $pegawai->email }}</p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">No Telepon</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $pegawai->telpPegawai }}</p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jabatan</p>
                                </div>
                                <div class="col-sm-9">
                                    @if ($pegawai->status != 2)
                                        <p class="text-muted mb-0">Manager</p>
                                    @else
                                        <p class="text-muted mb-0">Pegawai</p>
                                    @endif
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Alamat</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $pegawai->alamatPegawai }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-primary medium-font" onclick="showFloatingFormEdit()">
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col mt-4">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item small-font"><span class="text-primary">Kelompok 1</span> - TI 2F
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Ganti Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('gantiFoto', $pegawai->idPegawai) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fotoPegawai">Upload Foto Pegawai</label>
                            <input type="file" name="fotoPegawai" class="custom-file-input" id="fotoPegawai">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editDataPegawaiModal" tabindex="-1" aria-labelledby="editDataPegawaiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataPegawaiModalLabel">Edit Data Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('updateData', $pegawai->idPegawai) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="namaPegawai" class="form-label">Nama Pegawai</label>
                            <input type="text" class="form-control" id="namaPegawai" name="namaPegawai"
                                value="{{ $pegawai->namaPegawai }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamatPegawai" class="form-label">Alamat Pegawai</label>
                            <input type="text" class="form-control" id="alamatPegawai" name="alamatPegawai"
                                value="{{ $pegawai->alamatPegawai }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="telpPegawai" class="form-label">No Telepon Pegawai</label>
                            <input type="tel" class="form-control" id="telpPegawai" name="telpPegawai"
                                value="{{ $pegawai->telpPegawai }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $pegawai->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- MDB -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <script>
        function showFloatingForm() {
            var modal = new bootstrap.Modal(document.getElementById('editProfileModal'));
            modal.show();
        }
    </script>
    <script>
        function showFloatingFormEdit() {
            var modal = new bootstrap.Modal(document.getElementById('editDataPegawaiModal'));
            modal.show();
        }
    </script>

</body>

</html>
