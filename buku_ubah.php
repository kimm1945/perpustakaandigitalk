<h1 class="text-white mt-4">Ubah Buku</h1>
<div class="bg-dark card">
   <div class="card-body">
    <div class="row">
        <div class="col-md-12"> 
       <form method="post">
                     <?php
                       $id = $_GET["id"];
                         if(isset($_POST['submit'])) {
                          $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
                          $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
                          $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
                          $tahunTerbit = mysqli_real_escape_string($koneksi, $_POST['tahunTerbit']);
                          $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
                          
                          $query = mysqli_query($koneksi, "UPDATE t_buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahunTerbit='$tahunTerbit', stok='$stok' WHERE bukuID='$id'");
             
                             if($query) {
                                 echo '<script>alert("Ubah buku berhasil.");</script>';
                             }else{
                                 echo '<script>alert("Ubah buku gagal.");</script>';
                             } 
                         }
                         $query = mysqli_query($koneksi, "SELECT*FROM t_buku WHERE bukuID=$id");
                         $data = mysqli_fetch_array($query);
                     ?>
                     <div class="row mb-1">
                     <div class="text-white col-md-2">Kategori</div>
                           <div class="col mb-3">
                              <select name="bukuID" calss="form-control">
                                 <?php 
                                   $kat = mysqli_query($koneksi, "SELECT*FROM t_kategoribuku");
                                   while($kategori = mysqli_fetch_array($kat)) {
                                     ?>
                                     <option <?php if($kategori['kategoriID'] == $data['bukuID']) echo 'selected'; ?> value="<?php echo $kategori['kategoriID']; ?>"><?php echo $kategori['namaKategori']; ?></option>
                                     <?php
                                   }
                                   ?>
                            </select>
                         </div>
                      </div> 
              <div class="row mb-3">
              <div class="text-white col-md-2">Judul</div>
              <div class="col-md-3"><input type="hidden" value="<?php echo $data['bukuID']; ?>" class="form-control" name="id">
               <input type="text" value="<?php echo $data['judul']; ?>" class="form-control" name="judul"></div>
         </div> 
              <div class="row mb-3">
              <div class="text-white col-md-2">Penulis</div>
              <div class="col-md-3"><input type="text" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis"></div>
         </div> 
              <div class="row mb-3">
              <div class="text-white col-md-2">Penerbit</div>
              <div class="col-md-3"><input type="text" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit"></div>
         </div> 
              <div class="row mb-3">
              <div class="text-white col-md-2">Tahun Terbit</div>
              <div class="col-md-3"><input type="nomber" value="<?php echo $data['tahunTerbit']; ?>" class="form-control" name="tahunTerbit"></div>
         </div> 
              <div class="row mb-3">
              <div class="text-white col-md-2">Stok</div>
              <div class="col-md-3"><input type="nomber" value="<?php echo $data['stok']; ?>" class="form-control" name="stok"></div>
         </div> 
         <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-3">
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