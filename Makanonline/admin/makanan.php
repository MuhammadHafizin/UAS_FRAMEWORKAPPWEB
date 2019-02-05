<h1>Menu Makanan</h1>
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
		<?php $ambil=$koneksi->query("SELECT * FROM makanan");?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_makanan']; ?></td>
			<td><?php echo $pecah['harga_makanan']; ?></td>
			<td><?php echo $pecah['berat_makanan']; ?></td>
			<td>
				<img src="../foto_makanan/<?php echo $pecah['foto_makanan']; ?>" width="100">
			</td>
			<td>
		<a href="index.php?halaman=hapus&id=<?php echo $pecah['id_makanan']; ?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubah&id=<?php echo $pecah['id_makanan']; ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambah" class="btn btn_primary">Tambah Makanan</a>