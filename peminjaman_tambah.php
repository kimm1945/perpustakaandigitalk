<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Menambahkan margin top pada judul */
        .mt-4 {
            margin-top: 1.5rem !important;
        }

        /* Menambahkan warna putih pada judul */
        .text-white {
            color: #fff;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container">
        <h1 class="text-white mt-4">Tambah Peminjaman Buku</h1>
        <div class="bg-dark card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post">
                           <?php
if(isset($_POST['submit'])) {
    $bukuID = $_POST['bukuID'];
    $userID = $_SESSION['t_user']['userID'];
    $tgl_peminjaman = $_POST['tgl_peminjaman'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $status_peminjaman = $_POST['statusPeminjaman'];

    // Periksa stok buku sebelum melakukan peminjaman
    $query_stok = mysqli_query($koneksi, "SELECT stok FROM t_buku WHERE bukuID = '$bukuID'");
    $data_stok = mysqli_fetch_assoc($query_stok);
    $stok_buku = $data_stok['stok'];

    if ($stok_buku > 0) {
        // Lakukan peminjaman jika stok tersedia
        $query = mysqli_query($koneksi, "INSERT INTO t_peminjaman(bukuID,userID,tgl_peminjaman,tgl_pengembalian,statusPeminjaman) values('$bukuID','$userID','$tgl_peminjaman','$tgl_pengembalian','$status_peminjaman')");

        if($query) {
            // Mengurangi stok buku setelah berhasil melakukan peminjaman
            $query_update_stok = mysqli_query($koneksi, "UPDATE t_buku SET stok = stok - 1 WHERE bukuID = '$bukuID'");
            if($query_update_stok) {
                echo '<script>alert("Tambah peminjaman berhasil.");</script>';
            } else {
                echo '<script>alert("Tambah peminjaman berhasil, tetapi gagal mengurangi stok buku.");</script>';
            }
        } else {
            echo '<script>alert("Tambah peminjaman gagal.");</script>';
        }
    } else {
        echo '<script>alert("Maaf, buku yang Anda pilih tidak tersedia saat ini.");</script>';
    }
}
?>
                            <div class="row mb-3">
                                <div class="text-white col-md-2">Buku</div>
                                <div class="col-md-3">
                                    <select name="bukuID" class="form-control">
                                        <?php 
                                        $kat = mysqli_query($koneksi, "SELECT * FROM t_buku WHERE stok > 0");
                                        while($kategori = mysqli_fetch_array($kat)) {
                                        ?>
                                        <option value="<?php echo $kategori['bukuID']; ?>"><?php echo $kategori['judul']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <div class="text-white col-md-2">Tanggal Peminjaman</div>
                                <div class="col-md-8"><input type="date" class="form-control" name="tgl_peminjaman"></div>
                            </div> 
                            <div class="row mb-3">
                                <div class="text-white col-md-2">Tanggal Pengembalian</div>
                                <div class="col-md-8"><input type="date" class="form-control" name="tgl_pengembalian"></div>
                            </div> 
                            <div class="row mb-3">
                                <div class="text-white col-md-2">Status Peminjaman</div>
                                <div class="col-md-8">
                                    <select name="statusPeminjaman" class="form-control">
                                        <option value="dipinjam">Dipinjam</option>
                                        <option value="dikembalikan">Dikembalikan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>