<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Buku</title>
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
        <h1 class="text-white mt-4">Kategori Buku</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="?page=kategori_tambah" class="btn btn-primary row mb-2">+ Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-white">
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_kategoribuku");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr class="text-white">
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $data['namaKategori']; ?></td>
                                            <td>
                                                <a href="?page=kategori_ubah&&id=<?php echo $data['kategoriID']; ?>" class="btn btn-info">Ubah</a>
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" href="?page=kategori_hapus&&id=<?php echo $data['kategoriID']; ?>" class="btn btn-danger">Hapus</a>
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
