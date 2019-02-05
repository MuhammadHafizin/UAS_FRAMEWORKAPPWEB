<?php 
$ambil = $koneksi->query("SELECT * FROM rokok WHERE id_rokok='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
echo "<pre>";
echo "</pre>";
?>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
	<label>Nama Rokok</label>
	<input type="text"  name="nama" class="form-control" value="<?php echo $pecah['nama_rokok']; ?>">
</div>
<div class="form-group">
	<label>Harga (Rp)</label>
	<input type="number"  class="form-control" name="harga" value="<?php echo $pecah['harga_rokok']; ?>"></div>
<div class="form-group">
	<label>Berat (Gr) </label>
	<input type="number"  class="form-control" name="berat" value="<?php echo $pecah['berat_rokok']; ?>"></div>
<div class="form-group">
	<img src="../foto_rokok/<?php echo $pecah ['foto_rokok'] ?>" width="200">
</div>
<div class="form-group">
	<label>Ubah Foto</label>
	<input type="file" name="foto"  class="form-control" >
</div>
<div class="form-group">
	<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"  rows="10"><?php echo $pecah['deskripsi_rokok']; ?></textarea>
</div>

<button class="btn btn-primary" name="ubahrokok">Ubah</button>
</form>
<?php 
if (isset($_POST['ubahrokok'])) 
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	// jk foto dirubah
	if (!empty($lokasifoto)) 
	{
		move_uploaded_file($lokasifoto, "../foto_rokok/$namafoto");
	$koneksi->query("UPDATE rokok SET nama_rokok='$_POST[nama]',harga_rokok='$_POST[harga]',berat_rokok='$_POST[berat]',foto_rokok='$namafoto',deskripsi_rokok='$_POST[deskripsi]'
		WHERE id_rokok='$_GET[id]'");
	}
	else
	{
        $koneksi->query("UPDATE rokok SET nama_rokok='$_POST[nama]',harga_rokok='$_POST[harga]',berat_rokok='$_POST[berat]',deskripsi_rokok='$_POST[deskripsi]' WHERE id_rokok='$_GET[id]'");
    }
echo "<script>alert('Data Makanan telah diubah');</script>";
echo "<script>location='index.php?halaman=rokok';</script>";
}
?>