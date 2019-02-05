<?php 
$ambil = $koneksi->query("SELECT * FROM makanan WHERE id_makanan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotomakanan = $pecah['foto_makanan'];
if (file_exists("../foto_makanan/$fotomakanan"))
{
	unlink("../foto_makanan/$fotomakanan");
}

$koneksi->query("DELETE FROM makanan WHERE id_makanan='$_GET[id]'");

echo "<script>alert('makanan terhapus');</script>";
echo "<script>location='index.php?halaman=makanan';</script>";

?>

