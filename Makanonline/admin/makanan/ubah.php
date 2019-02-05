<?php 
$ambil = $koneksi->query("SELECT * FROM makanan WHERE id_makanan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


echo "<pre>";
echo "</pre>";
?>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
	<label>Nama Makanan</label>
	<input type="text"  name="nama" class="form-control" value="<?php echo $pecah['nama_makanan']; ?>">
</div>
<div class="form-group">
	<label>Harga (Rp)</label>
	<input type="number"  class="form-control" name="harga" value="<?php echo $pecah['harga_makanan']; ?>"></div>
<div class="form-group">
	<label>Berat (Gr) </label>
	<input type="number"  class="form-control" name="berat" value="<?php echo $pecah['berat_makanan']; ?>"></div>
<div class="form-group">
	<img src="../foto_makanan/<?php echo $pecah ['foto_makanan'] ?>" width="200">
</div>
<div class="form-group">
	<label>Ubah Foto</label>
	<input type="file" name="foto"  class="form-control" >
</div>
<div class="form-group">
	<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"  rows="10"><?php echo $pecah['deskripsi_makanan']; ?></textarea>
</div>

<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php 
if (isset($_POST['ubah'])) 
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	// jk foto dirubah
	if (!empty($lokasifoto)) 
	{
		move_uploaded_file($lokasifoto, "../foto_makanan/$namafoto");
	$koneksi->query("UPDATE makanan SET nama_makanan='$_POST[nama]',harga_makanan='$_POST[harga]',berat_makanan='$_POST[berat]',foto_makanan='$namafoto',deskripsi_makanan='$_POST[deskripsi]'
		WHERE id_makanan='$_GET[id]'");
	}
	else
	{
        $koneksi->query("UPDATE makanan SET nama_makanan='$_POST[nama]',harga_makanan='$_POST[harga]',berat_makanan='$_POST[berat]',deskripsi_makanan='$_POST[deskripsi]' WHERE id_makanan='$_GET[id]'");
    }
echo "<script>alert('Data Makanan telah diubah');</script>";
echo "<script>location='index.php?halaman=makanan';</script>";
}
?>