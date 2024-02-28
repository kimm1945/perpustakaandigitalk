<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Menambahkan warna putih pada judul dan tombol */
        .text-white {
            color: #fff;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container">
        <h1 class="text-white mt-4">Daftar Buku</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="?page=buku_tambah" class="btn btn-primary row mb-2">+ Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-white">
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Stok Buku</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_buku LEFT JOIN t_kategoribuku on t_buku.bukuID = t_kategoribuku.kategoriID");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr class="text-white">
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $data['judul']; ?></td>
                                            <td><?php echo $data['penulis']; ?></td>
                                            <td><?php echo $data['penerbit']; ?></td>
                                            <td><?php echo $data['tahunTerbit']; ?></td>
                                            <td><?php echo $data['stok']; ?></td>

                                            <td>
                                                <a href="?page=buku_ubah&&id=<?php echo $data['bukuID']; ?>" class="btn btn-info">Ubah</a>
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" href="?page=buku_hapus&&id=<?php echo $data['bukuID']; ?>" class="btn btn-danger">Hapus</a>
                                            </td>
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
