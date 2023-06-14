@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

@include('layouts.footer')

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
                    <form method="post" action="{{ route('transaksi.store') }}" id="myForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" id="status" value="out"
                                readonly style="display: none;">
                            <input type="text" name="statusDump" class="form-control" id="statusDump"
                                value="Transaksi Keluar" readonly>
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
                            <input type="number" name="jumlah" class="form-control" id="jumlah" max="">
                        </div>
                        <div class="form-group">
                            <label for="totalHarga">Total Harga</label>
                            <input type="number" name="totalHarga" class="form-control" id="totalHarga" readonly
                                style="display: none">
                            <input type="text" name="totalHarga" class="form-control" id="totalHargaDump" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pencatat">Pencatat</label>
                            <input type="text" name="pencatat" class="form-control" id="pencatat"
                                value="{{ auth()->user()->namaPegawai }}" aria-describedby="pencatat" readonly>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('transaksi.index') }}" class="btn btn-danger" role="button"
                                aria-disabled="true">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
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

<!-- Modal -->
<div id="confirmModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menambahkan data transaksi?</br>
                <span style="color: red; font-weight:bold;">Data yang sudah dimasukkan tidak dapat dilakukan
                    perubahan/edit</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="submitBtn">Submit</button>
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
                if (parseInt(this.value) > maxStock) {
                    this.value = maxStock;
                    modalDialog.style.display = "block"; // Tampilkan dialog box
                }

                // Update nilai total harga
                var hargaBarang = barang[i].harga;
                var jumlah = parseInt(jumlahInput.value);
                var totalHarga = hargaBarang * jumlah;
                totalHargaInput.value = totalHarga;
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

    function validateForm() {
        var inputs = document.querySelectorAll('form input[type="text"], form input[type="number"], form select');
        var isFormValid = true;

        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value === "") {
                isFormValid = false;
                break;
            }
        }

        return isFormValid;
    }

    // Mengatur event listener pada tombol "Submit"
    $('#submitBtn').click(function() {
        if (validateForm()) {
            $('#confirmModal').modal('show'); // Tampilkan dialog konfirmasi jika formulir valid
        } else {
            alert(
            "Harap isi semua data sebelum melakukan submit!"); // Tampilkan pesan kesalahan jika formulir tidak valid
        }
    });


    // ...

    // Menampilkan dialog box konfirmasi sebelum submit
    $('form').submit(function(event) {
        event.preventDefault(); // Menghentikan aksi submit default

        $('#confirmModal').modal('show');
    });
</script>
