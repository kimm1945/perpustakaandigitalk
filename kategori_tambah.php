<h1 class="text-white mt-4">Kategori Buku</h1>
<div class="bg-dark card">
   <div class="card-body">
    <div class="row">
        <div class="col-md-12"> 
       <form method="post">
        <?php
            if(isset($_POST['submit'])) {
                $kategori = $_POST['kategori'];
                $query = mysqli_query($koneksi, "INSERT INTO t_kategoribuku(namaKategori) values('$kategori')");

                if($query) {
                    echo '<script>alert("Tambah data berhasil.");</script>';
                }else{
                    echo '<script>alert("Tambah data gagal.");</script>';
                } 
            }
            ?>
         <div class="row mb-3">
              <div class="row mb-3">
              <div class="text-white col-md-2">Nama Kategori</div>
              <div class="col-md-3"><input type="text" class="form-control" name="kategori"></div>
         </div> 
         <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                  <button type="reset" class ="btn btn-secondary">Reset</button>
                  <a href="?page=kategori" class="btn btn-danger">Kembali</a>
              </div>
         </div>
        </form>
        </div>
</div>
</div>
</div>