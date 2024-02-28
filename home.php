<h1 class="mt-4">Dashboard</h1>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM t_kategoribuku"));
                ?>    
                Total Kategori
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <?php if ($_SESSION['t_user']['level'] != 'anggota') { ?>
                    <a class="small text-white stretched-link" href="?page=kategori">View</a>
                <?php } ?>
                <div class="small text-white"><i class="fas fa-angel-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM t_buku"));
                ?>    
                Total Buku
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <?php if ($_SESSION['t_user']['level'] != 'anggota') { ?>
                    <a class="small text-white stretched-link" href="?page=buku">View</a>
                <?php } ?>
                <div class="small text-white"><i class="fas fa-angel-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM t_user"));
                ?>        
                Total User
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <?php if ($_SESSION['t_user']['level'] != 'anggota') { ?>
                    <a class="small text-white stretched-link"></a>
                <?php } ?>
                <div class="small text-white"><i class="fas fa-angel-right"></i></div>
            </div>
        </div>
    </div>
    <div class="bg-dark card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr class="text-white"> 
                    <td width="200">Nama</td>
                    <td width="1">:</td>
                    <td><?php echo $_SESSION['t_user']['username']; ?></td>
                </tr>
                <tr class="text-white"> 
                    <td width="200">Tanggal Login</td>
                    <td width="1">:</td>
                    <td><?php echo date('d-m-y'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
