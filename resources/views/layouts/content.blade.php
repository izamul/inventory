        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <h3>Data Pegawai</h3>
                </div><!-- /.container-fluid -->
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Alamat </th>
                    <th>No Telepon</th>
                    <th>Level</th>
                    <th>Foto</th>
                </tr>
                @foreach ($pegawais as $pgw)
                <tr>
            
                    <td>{{ $pgw->idPegawai }}</td>
                    <td>{{ $pgw->namaPegawai }}</td>
                    <td>{{ $pgw->alamatPegawai }}</td>
                    <td>{{ $pgw->telpPegawai }}</td>
                    <td>{{ $pgw->level }}</td>
                    <td>{{ $pgw->fotoPegawai }}</td>

                </tr>
                @endforeach
            </table>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->