<?php 
$ambil = $koneksi->query("SELECT * FROM minuman WHERE id_minuman='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


echo "<pre>";
echo "</pre>";
?>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
	<label>Nama Makanan</label>
	<input type="text"  name="nama" class="form-control" value="<?php echo $pecah['nama_minuman']; ?>">
</div>
<div class="form-group">
	<label>Harga (Rp)</label>
	<input type="number"  class="form-control" name="harga" value="<?php echo $pecah['harga_minuman']; ?>"></div>
<div class="form-group">
	<img src="../foto_minuman/<?php echo $pecah ['foto_minuman'] ?>" width="200">
</div>
<div class="form-group">
	<label>Ubah Foto</label>
	<input type="file" name="foto"  class="form-control" >
</div>


<button class="btn btn-primary" name="ubahminuman">Ubah</button>
</form>
<?php 
if (isset($_POST['ubahminuman'])) 
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	// jk foto dirubah
	if (!empty($lokasifoto)) 
	{
		move_uploaded_file($lokasifoto, "../foto_minuman/$namafoto");
	$koneksi->query("UPDATE minuman SET nama_minuman='$_POST[nama]',harga_minuman='$_POST[harga]',foto_minuman='$namafoto'
		WHERE id_minuman='$_GET[id]'");
	}
	else
	{
        $koneksi->query("UPDATE minuman SET nama_minuman='$_POST[nama]',harga_minuman='$_POST[harga]' WHERE id_minuman='$_GET[id]'");
    }
echo "<script>alert('Data Makanan telah diubah');</script>";
echo "<script>location='index.php?halaman=minuman';</script>";
}
?>