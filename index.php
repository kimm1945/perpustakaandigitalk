<?php
  include "koneksi.php";
  if(!isset($_SESSION['t_user'])){
    header('location:login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perpustakaan Digital</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3">Perpustakaan Digital</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- Navbar-->

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="text-white sb-sidenav-menu-heading">Core</div>
                            <a class="text-white nav-link" href="?">
                                <div class="sb-nav-link-icon"><i class="text-white fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="text-white sb-sidenav-menu-heading">Navigasi</div>
                            <?php
                                if($_SESSION['t_user']['level'] !='anggota'){

                            ?>
                            <a class="text-white nav-link" href="?page=kategori">
                                <div class="text-white sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori
                            </a>
                            <a class="text-white nav-link" href="?page=buku">
                                <div class="text-white sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Buku
                            </a>
                            <?php
                                }else{
                            ?>
                            <?php
                                }
                            ?>
                            <a class="text-white nav-link" href="?page=peminjaman">
                                <div class="text-white sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Peminjaman
                            </a>    
                            <?php
                                 if($_SESSION['t_user']['level'] !='anggota'){
                                ?>
                            <a class="text-white nav-link" href="?page=laporan">
                                <div class="text-white sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Generate Laporan
                            </a>
                            <?php
                                }
                            ?>
                            <a class="text-white nav-link" href="logout.php">
                                <div class="text-white sb-nav-link-icon"><i class="fa fa-power-off"></i></div>
                                Logout
                            </a>                          
                        </div>
                    </div>
                    <div class="text-white sb-sidenav-footer">
                        <div class="text-white small">Logged in as:</div>
                        <?php echo $_SESSION ['t_user']['namaLengkap']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                     <?php
                      $page = isset($_GET['page']) ? $_GET['page'] :'home';
                      if(file_exists($page . '.php')){
                        include $page . '.php';
                      }else{
                        include '404.php';
                      }
                     ?>
                </div>
                </main>
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-white">Copyright &copy; Perpustakaan Digital 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>