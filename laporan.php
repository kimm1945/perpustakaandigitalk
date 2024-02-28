<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* Menambahkan warna putih pada judul */
        .text-white {
            color: #fff;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container">
        <h1 class="text-white mt-4">Laporan Peminjaman</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="cetak.php" target="_blank" class="btn btn-primary mb-2"><i class="fa fa-print"></i> Cetak Data</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-white">
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status Peminjaman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_peminjaman LEFT JOIN t_user ON t_user.userID = t_peminjaman.userID LEFT JOIN t_buku ON t_buku.bukuID = t_peminjaman.bukuID");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr class="text-white">
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo $data['judul']; ?></td>
                                            <td><?php echo $data['tgl_peminjaman']; ?></td>
                                            <td><?php echo $data['tgl_pengembalian']; ?></td>
                                            <td><?php echo $data['statusPeminjaman']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
