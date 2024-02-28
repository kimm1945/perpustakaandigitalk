<?php
$id =$_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM t_kategoribuku WHERE kategoriID='$id'");
?>
<script>
    alert('Hapus data berhasil');
      location.href = "index.php?page=kategori";
</script>