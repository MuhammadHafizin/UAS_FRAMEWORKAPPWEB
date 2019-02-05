<?php
session_start();
$id_makanan=$_GET["id"];
unset($_SESSION["keranjang"][$id_makanan]);
echo "<script>alert('Pesanan Dihapus');</script>";
echo "<script>location='keranjang.php';</script>";
?>