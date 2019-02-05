<?php 
$ambil = $koneksi->query("SELECT * FROM rokok WHERE id_rokok='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotorokok = $pecah['foto_rokok'];
if (file_exists("../foto_rokok/$fotorokok"))
{
	unlink("../foto_rokok/$fotorokok");
}

$koneksi->query("DELETE FROM rokok WHERE id_rokok='$_GET[id]'");

echo "<script>alert('rokok terhapus');</script>";
echo "<script>location='index.php?halaman=rokok';</script>";

?>

