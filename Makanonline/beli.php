<?php 
session_start();
$id_makanan = $_GET['id'];
if (isset($_SESSION['keranjang'][$id_makanan])) {
	$_SESSION['keranjang'][$id_makanan]++;
} else {
	$_SESSION['keranjang'][$id_makanan] = 1;
}
echo "<script>alert('produk telah masuk keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>