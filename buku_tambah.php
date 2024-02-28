<h1 class="text-white mt-4">Buku</h1>
<div class="bg-dark card">
   <div class="card-body">
    <div class="row">
        <div class="col-md-12"> 
       <form method="post">
                <?php
                if(isset($_POST['submit'])) {
                $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
                $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
                $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
                $tahunTerbit = mysqli_real_escape_string($koneksi, $_POST['tahunTerbit']);
                $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
                
                $query = mysqli_query($koneksi, "INSERT INTO t_buku (judul, penulis, penerbit, tahunTerbit, stok) VALUES ('$judul', '$penulis', '$penerbit', '$tahunTerbit', '$stok')");
                    if($query) {
                        echo '<script>alert("Tambah buku berhasil.");</script>';
                    } else {
                        echo '<script>alert("Tambah buku gagal.");</script>';
                    } 
                }
                ?>
                        <div class="row mb-1">
                        <div class="text-white col-md-2">Kategori</div>
                              <div class="col mb-3">
                <select name="kategori" class="form-control">
                    <?php 
                    $kat = mysqli_query($koneksi, "SELECT * FROM t_kategoribuku");
                    while($kategori = mysqli_fetch_array($kat)) {
                    ?>
                    <option value="<?php echo $kategori['namaKategori']; ?>"><?php echo $kategori['namaKategori']; ?></option>
                    <?php
                    }
                    ?>
                </select>

            </div>
         </div> 
              <div class="row mb-3">
              <div class="text-white col-md-2">Judul</div>
              <div class="col-md-3"><input type="text" class="form-control" name="judul"></div>
         </div> 
              <div class="row mb-3">
              <div class="text-white col-md-2">Penulis</div>
              <div class="col-md-3"><input type="text" class="form-control" name="penulis"></div>
         </div> 
              <div class="row mb-3">
              <div class="text-white col-md-2">Penerbit</div>
              <div class="col-md-3"><input type="text" class="form-control" name="penerbit"></div>
         </div> 
              <div class="row mb-3">
              <div class="text-white col-md-2">Tahun Terbit</div>
              <div class="col-md-3"><input type="number" class="form-control" name="tahunTerbit"></div>
         </div> 
              <div class="row mb-3">
              <div class="text-white col-md-2">Stok</div>
              <div class="col-md-3"><input type="number" class="form-control" name="stok"></div>
         </div> 
         <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                  <button type="reset" class ="btn btn-secondary">Reset</button>
                  <a href="?page=buku" class="btn btn-danger">Kembali</a>
              </div>
         </div>
        </form>
        </div>
</div>
</div>
</div>
