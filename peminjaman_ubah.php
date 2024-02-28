<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Peminjam Buku</title>
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
        <h1 class="mt-4">Ubah Peminjam Buku</h1>
        <div class="bg-dark card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post">
                            <?php
                            $id = $_GET['id'];
                            if(isset($_POST['submit'])) {
                                // Mendapatkan nilai dari formulir
                                $bukuID = $_POST['bukuID'];
                                $userID = $_SESSION['t_user']['userID'];
                                $tgl_peminjaman = isset($_POST['tgl_peminjaman']) ? $_POST['tgl_peminjaman'] : null; // Periksa apakah data tgl_peminjaman tersedia
                                $tgl_pengembalian = $_POST['tgl_pengembalian'];
                                $status_peminjaman = $_POST['statusPeminjaman'];

                                // Periksa apakah tgl_peminjaman tidak kosong sebelum melakukan UPDATE
                                if($tgl_peminjaman !== null) {
                                    $query = mysqli_query($koneksi, "UPDATE t_peminjaman SET bukuID='$bukuID', tgl_peminjaman='$tgl_peminjaman', tgl_pengembalian ='$tgl_pengembalian', statusPeminjaman='$status_peminjaman' WHERE peminjamanID=$id");

                                    if($query) {
                                        echo '<script>alert("Ubah peminjaman berhasil.");</script>';
                                    } else {
                                        echo '<script>alert("Ubah peminjaman gagal.");</script>';
                                    }
                                } else {
                                    // Jika tgl_peminjaman kosong, berikan pesan kesalahan
                                    echo '<script>alert("Tanggal peminjaman tidak boleh kosong.");</script>';
                                }
                            }
                            $query = mysqli_query($koneksi, "SELECT*FROM t_peminjaman where peminjamanID");
                            $data = mysqli_fetch_array($query);
                            ?>
                            <div class="row mb-3">
                                <div class="text-white col-md-2">Buku</div>
                                <div class="col-md-8">
                                    <select name="bukuID" class="form-control">
                                        <?php 
                                        $buk = mysqli_query($koneksi, "SELECT*FROM t_buku");
                                        while($bukuID = mysqli_fetch_array($buk)) {
                                        ?>
                                        <option <?php if($bukuID['bukuID'] == $data['bukuID']) echo 'selected'; ?> value="<?php echo $bukuID['bukuID']; ?>"><?php echo $bukuID['judul']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="row mb-3">
                                <div class="text-white col-md-2">Tanggal Peminjaman</div>
                                <div class="col-md-8"><input type="date" class="form-control" value="<?php echo $data['tgl_peminjaman']; ?>" name="tgl_peminjaman"></div>
                            </div> 
                            <div class="row mb-3">
                                <div class="text-white col-md-2">Tanggal Pengembalian</div>
                                <div class="col-md-8"><input type="date" class="form-control" value="<?php echo $data['tgl_pengembalian']; ?>" name="tgl_pengembalian"></div>
                            </div> 
                            <div class="row mb-3">
                                <div class="text-white col-md-2">Status Peminjaman</div>
                                <div class="col-md-8">
                                    <select name="statusPeminjaman" class="form-control">
                                        <option value="dipinjam" <?php if($data['statusPeminjaman'] == 'dipinjam') echo 'selected'; ?>>Dipinjam</option>
                                        <option value="dikembalikan" <?php if($data['statusPeminjaman'] == 'dikembalikan') echo 'selected'; ?>>Dikembalikan</option>
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
