<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="bg-dark card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-white text-center font-weight-light my-4">Register</h3></div>
                                    <div class="card-body">
                                    <?php
                                        include "koneksi.php";
                                        
                                        if(isset($_POST['register'])) {
                                            $namaLengkap = $_POST['namaLengkap'];
                                            $username = $_POST['username'];
                                            $email = $_POST['email'];
                                            $password = md5($_POST['password']);
                                            $telp = $_POST['telp'];
                                            $alamat = $_POST['alamat'];
                                            
                                            // Periksa apakah username sudah terdaftar
                                            $check_username = mysqli_query($koneksi, "SELECT * FROM t_user WHERE username='$username'");
                                            if(mysqli_num_rows($check_username) > 0) {
                                                echo '<script>alert("Username sudah terdaftar. Silahkan gunakan username lain."); location.href="register.php";</script>';
                                                exit(); // Berhenti eksekusi script jika username sudah terdaftar
                                            }
                                            
                                            // Tambahkan level secara otomatis
                                            $level = "anggota";
                                        
                                            // Insert user baru ke database
                                            $insert = mysqli_query($koneksi, "INSERT INTO t_user (namaLengkap, username, email, password, telp, alamat, level) VALUES ('$namaLengkap', '$username', '$email', '$password', '$telp', '$alamat', '$level')");
                                        
                                            if($insert) {
                                                echo '<script>alert("Selamat, Registrasi berhasil. Silahkan Login."); location.href="login.php";</script>';
                                            } else {
                                                echo '<script>alert("Maaf, Registrasi gagal. Silahkan coba lagi."); location.href="register.php";</script>';
                                            }
                                        }
                                        ?>
                                        <form method="post">
                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" required name="namaLengkap" placeholder="Masukkan Nama Lengkap" />
                                                <label calss="small mb-1">Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" type="text" required name="username" placeholder="Masukkan Username" />
                                                <label calss="small mb-1">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" required name="email" placeholder="Masukkan Email" />
                                                <label calss="small mb-1">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" required name="password" type="password" placeholder="Masukkan Password" />
                                                <label calss="small mb-1">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" required name="telp" placeholder="Masukkan No Telp" />
                                                <label calss="small mb-1">No telp</label>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="alamat" rows="5" required class="form-control py-4" placeholder="Masukkan Alamat"></textarea>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                                <a class="btn btn-danger" href="login.php">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                <div class="card-footer text-center">
                                    <div class="text-white small">
                                        &copy; 2024 Perpustakaan Digital.
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
