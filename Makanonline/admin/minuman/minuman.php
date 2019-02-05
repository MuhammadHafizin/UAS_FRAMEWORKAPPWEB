<h1>Aik Enem</h1>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>HARGA</th>
			<th>FOTO</th>
			<th>OPS</I</th>
		tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM minuman");?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_minuman']; ?></td>
			<td><?php echo $pecah['harga_minuman']; ?></td>
			
			<td>
				<img src="../foto_minuman/<?php echo $pecah['foto_minuman']; ?>" width="100">
			</td>
			<td>
		<a href="index.php?halaman=hapusminuman&id=<?php echo $pecah['id_minuman']; ?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubahminuman&id=<?php echo $pecah['id_minuman']; ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahminuman" class="btn btn_primary">Tambah Makanan</a>