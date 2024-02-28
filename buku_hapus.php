<?php
$id =$_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM t_buku WHERE bukuID='$id'");
?>
<script>
    alert('Hapus data berhasil');
      location.href = "index.php?page=buku";
</script>
