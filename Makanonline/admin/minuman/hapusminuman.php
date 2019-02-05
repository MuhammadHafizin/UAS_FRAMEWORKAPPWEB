<?php 
$ambil = $koneksi->query("SELECT * FROM minuman WHERE id_minuman='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotominuman = $pecah['foto_minuman'];
if (file_exists("../foto_minuman/$fotominuman"))
{
	unlink("../foto_minuman/$fotominuman");
}

$koneksi->query("DELETE FROM minuman WHERE id_minuman='$_GET[id]'");

echo "<script>alert('minuman terhapus');</script>";
echo "<script>location='index.php?halaman=minuman';</script>";

?>

