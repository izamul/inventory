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
        }

        .small-text {
            font-size: 9px;
            margin-top: 10px;
        }

        .Medium-text {
            font-size: 12px;
            margin-top: 10px;
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
                <h3 class="card-title">Daftar Kategori</h3>
                <p class="medium-text">Sahabat Tani</p>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $kat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kat->namaKategori }}</td>
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
