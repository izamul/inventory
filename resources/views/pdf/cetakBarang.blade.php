<!DOCTYPE html>
<html>
<head>
    <title>Cetak PDF</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:400,700" rel="stylesheet">
    <style>
        /* CSS tambahan untuk tampilan PDF */
        @media print {
            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                border: 1px solid #000;
                padding: 8px;
            }

            thead {
                background-color: #d0d0d0;
            }

            h1 {
                page-break-before: always;
            }

            img {
                max-width: 100px;
                max-height: 100px;
            }
        }

        /* CSS untuk tampilan halaman */
        body {
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .content-wrapper {
            margin: 0 auto;
            max-width: 800px;
            text-align: center;
        }

        .card {
            border: 1px solid #cccccc;
            border-radius: 4px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #d0d0d0;
            border-bottom: 1px solid #ccc;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
        }

        .card-title {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        .medium-text {
            font-size: 12px;
            margin-top: 10px;
            color: #777;
        }

        .table-wrapper {
            padding: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            font-size: 12px;
            color: #333;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        img {
            max-width: 80px;
            max-height: 80px;
            object-fit: cover;
            border-radius: 50%;
        }

        .footer {
            margin-top: 30px;
            font-size: 10px;
            color: #777;
        }
    </style>
    <script>
    </script>
</head>
<body>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Barang</h3>
                <p class="medium-text">Sahabat Tani</p>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Stock</th>
                            <th>Harga</th>
                            <th>Pemasok</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $bg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bg->namaBarang }}</td>
                                <td>{{ $bg->satuan }}</td>
                                <td>{{ $bg->stock }}</td>
                                <td><span>Rp</span> {{ $bg->harga }}</td>
                                <td>{{ $bg->pemasok->namaPemasok }}</td>
                                <td>{{ $bg->kategori->namaKategori }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">
            Kelompok 1 - TI 2F
        </div>
    </div>
</body>
</html>
