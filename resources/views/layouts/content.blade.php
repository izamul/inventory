<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahStokBarang }}</h3>
                            <p>Stok Barang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <a href="{{ route('barang.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $jumlahTransaksi }}</h3>
                            <p>Transaksi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('transaksi.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $jumlahPegawai }}</h3>
                            <p>Pegawai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="{{ route('pegawai.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $jumlahPemasok }}</h3>
                            <p>Pemasok</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <a href="{{ route('pemasok.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <!-- Tabel Top 5 Barang Cepat Habis -->
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Top 5 Barang Cepat Habis</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Terjual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topBarangCepatHabis as $index => $transaksi)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $transaksi->barang->namaBarang }}</td>
                                        <td>{{ $transaksi->totalTerjual }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <!-- Tabel Top 5 Barang Masuk -->
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Top 5 Barang Masuk</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topBarangMasuk as $index => $transaksi)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $transaksi->barang->namaBarang }}</td>
                                        <td>{{ $transaksi->totalMasuk }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>
