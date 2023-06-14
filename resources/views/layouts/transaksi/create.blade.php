@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    Tambah Data Transaksi
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
                    <form method="post" action="{{ route('transaksi.store') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" id="status"
                                value="{{ $status }}" readonly style="display: none;">
                            <input type="text" name="statusDump" class="form-control" id="statusDump"
                                value="{{ $status === 'out' ? 'Data Keluar' : 'Data Masuk' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="namaBarang">Nama Barang</label>
                            <select name="namaBarang" class="form-control" id="namaBarang">
                                @foreach ($barang as $brg)
                                    <option value="{{ $brg->idBarang }}" data-stok="{{ $brg->stock }}">
                                        {{ $brg->namaBarang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" id="jumlah" max=""
                                min="1">
                        </div>
                        <div class="form-group">
                            <label for="totalHarga">Total Harga</label>
                            <input type="number" name="totalHarga" class="form-control" id="totalHarga" readonly
                                style="display: none">
                            <input type="text" name="totalHargaDump" class="form-control" id="totalHargaDump"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="pencatat">Pencatat</label>
                            <input type="text" name="pencatat" class="form-control" id="pencatat"
                                value="{{ auth()->user()->namaPegawai }}" aria-describedby="pencatat" readonly>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="checklist">
                            <label class="form-check-label" for="checklist">
                                Saya telah memeriksa dan memastikan bahwa data yang dimasukkan benar
                            </label>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('transaksi.index') }}" class="btn btn-danger" role="button"
                                aria-disabled="true">Kembali</a>
                            <button type="submit" class="btn btn-success" id="submitBtn" disabled>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Peringatan</h4>
                <button type="button" class="close" id="closeModalBtn">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Jumlah yang dimasukkan melebihi stok tersedia.
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning closeModalBtn">Tutup</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal untuk nilai kurang dari 1 -->
<div id="errorModal" class="modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Peringatan</h4>
                <button type="button" class="close" id="closeErrorModalBtn">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Jumlah yang dimasukkan harus lebih dari atau sama dengan 1.
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="closeErrorModal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    var namaBarangSelect = document.getElementById("namaBarang");
    var jumlahInput = document.getElementById("jumlah");
    var modalDialog = document.getElementById("myModal");
    var totalHargaInput = document.getElementById("totalHarga");
    var totalHargaInputDump = document.getElementById("totalHargaDump");
    var status = "{{ $status }}";
    var errorModal = document.getElementById("errorModal");

    var barang = @json($barang);

    namaBarangSelect.addEventListener("change", function() {
        var selectedBarang = this.options[this.selectedIndex];
        var selectedBarangId = selectedBarang.value;

        for (var i = 0; i < barang.length; i++) {
            if (barang[i].idBarang == selectedBarangId) {
                var maxStock = barang[i].stock;
                jumlahInput.max = maxStock;

                // Update nilai total harga
                var hargaBarang = barang[i].harga;
                var jumlah = parseInt(jumlahInput.value);
                var totalHarga = hargaBarang * jumlah;
                totalHargaInput.value = totalHarga;

                break;
            }
        }
    });

    jumlahInput.addEventListener("input", function() {
        var selectedBarang = namaBarangSelect.options[namaBarangSelect.selectedIndex];
        var selectedBarangId = selectedBarang.value;

        for (var i = 0; i < barang.length; i++) {
            if (barang[i].idBarang == selectedBarangId) {
                var maxStock = barang[i].stock;

                if (parseInt(this.value) < 1) {
                    errorModal.style.display =
                        "block"; // Tampilkan modal pesan kesalahan jika nilai kurang dari 1
                    this.value = 1; // Ubah nilai menjadi 1 jika nilai kurang dari 1
                } else {
                    errorModal.style.display = "none"; // Sembunyikan modal pesan kesalahan jika nilai valid
                }

                // Tambahkan kondisi untuk membatasi jumlah jika status adalah "out" (keluar)
                if (status === "out" && parseInt(this.value) > maxStock) {
                    this.value = maxStock;
                    modalDialog.style.display = "block"; // Tampilkan dialog box
                }

                // Update nilai total harga
                var hargaBarang = barang[i].harga;
                var jumlah = parseInt(jumlahInput.value);
                var totalHarga = hargaBarang * jumlah;
                totalHargaInput.value = totalHarga;
                totalHargaInput.value = parseInt(totalHargaInput.value);
                totalHargaInputDump.value = "Rp" + totalHarga.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                break;
            }
        }
    });

    var closeModalBtns = document.getElementsByClassName("closeModalBtn");
    for (var i = 0; i < closeModalBtns.length; i++) {
        closeModalBtns[i].addEventListener("click", function() {
            modalDialog.style.display = "none"; // Sembunyikan dialog box
        });
    }

    // Mengaktifkan tombol submit jika checkbox dicentang
    var checklist = document.getElementById('checklist');
    var submitBtn = document.getElementById('submitBtn');

    checklist.addEventListener('change', function() {
        submitBtn.disabled = !checklist.checked;
    });


    var closeErrorModalBtn = document.getElementById("closeErrorModalBtn");
    closeErrorModalBtn.addEventListener("click", function() {
        errorModal.style.display = "none"; // Sembunyikan modal pesan kesalahan
    });

    var closeErrorModal = document.getElementById("closeErrorModal");
    closeErrorModal.addEventListener("click", function() {
        errorModal.style.display = "none"; // Sembunyikan modal pesan kesalahan
    });

    var closeModalBtns = document.getElementsByClassName("closeModalBtn");
    for (var i = 0; i < closeModalBtns.length; i++) {
        closeModalBtns[i].addEventListener("click", function() {
            modalDialog.style.display = "none"; // Sembunyikan dialog box
        });
    }

    $('#closeModalBtn').click(function() {
        modalDialog.style.display = "none"; // Sembunyikan dialog box
    });

    $('#closeErrorModalBtn').click(function() {
        errorModal.style.display = "none"; // Sembunyikan modal pesan kesalahan
    });
</script>

@include('layouts.footer')
