<?php 
session_start();
session_destroy();
// echo "<script> window.confirm('Are you sure to logout?');</script>"; // Hapus baris ini
header('location:login.php');
exit();
?>
