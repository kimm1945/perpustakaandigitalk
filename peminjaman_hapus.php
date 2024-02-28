<?php
$id =$_GET['peminjamanID'];
$query = mysqli_query($koneksi, "DELETE FROM t_peminjaman WHERE peminjamanID='$peminjamanID'");
?>
<script>
    alert('Hapus data berhasil');
      location.href = "index.php?page=peminjaman";
</script>