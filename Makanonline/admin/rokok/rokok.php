<h1>Menu Rokok</h1>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>HARGA</th>
			<th>BERAT</th>
			<th>FOTO</th>
			<th>OPSI</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM rokok");?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_rokok']; ?></td>
			<td><?php echo $pecah['harga_rokok']; ?></td>
			<td><?php echo $pecah['berat_rokok']; ?></td>
			<td>
				<img src="../foto_rokok/<?php echo $pecah['foto_rokok']; ?>" width="100">
			</td>
			<td>
	<a href="index.php?halaman=hapusrokok&id=<?php echo $pecah['id_rokok']; ?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubahrokok&id=<?php echo $pecah['id_rokok']; ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahrokok" class="btn btn_primary">Tambah Rokok</a>