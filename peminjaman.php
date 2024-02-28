<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Menambahkan warna putih pada judul */
        .text-white {
            color: #fff;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container">
        <h1 class="text-white mt-4">Laporan Peminjaman Buku</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                        // Periksa apakah pengguna yang login adalah anggota
                        if ($_SESSION['t_user']['level'] == 'anggota') {
                            echo '<a href="?page=peminjaman_tambah" class="btn btn-primary mb-2">+ Tambah Peminjaman</a>';
                        }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-white">
                                        <th>No</th>
                                        <th>ID User</th>
                                        <th>Username</th>
                                        <th>Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status Peminjaman</th>
                                        <?php
                                        // Periksa apakah pengguna yang login bukan anggota (petugas atau admin)
                                        if ($_SESSION['t_user']['level'] != 'anggota') {
                                            echo '<th>Aksi</th>';
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$i = 1;
$query = mysqli_query($koneksi, "SELECT t_peminjaman.*, t_buku.judul, t_user.username 
                                    FROM t_peminjaman 
                                    LEFT JOIN t_buku ON t_buku.bukuID = t_peminjaman.bukuID 
                                    LEFT JOIN t_user ON t_user.userID = t_peminjaman.userID");

while($data = mysqli_fetch_array($query)){
?>
<tr class="text-white">
    <td><?php echo $i++; ?></td>
    <td><?php echo $data['userID']; ?></td>
    <td><?php echo $data['username']; ?></td>
    <td><?php echo $data['judul']; ?></td>
    <td><?php echo $data['tgl_peminjaman']; ?></td>
    <td><?php echo $data['tgl_pengembalian']; ?></td>
    <td><?php echo $data['statusPeminjaman']; ?></td>
    <?php
    // Periksa apakah pengguna yang login bukan anggota (petugas atau admin)
    if ($_SESSION['t_user']['level'] != 'anggota') {
        echo '<td><a href="?page=peminjaman_ubah&&id='.$data['peminjamanID'].'" class="btn btn-info">Ubah</a></td>';
    }
    ?>
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
