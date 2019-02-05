<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "makanonline");
if (!isset($_SESSION["pelanggan"])) {
  echo "<script>alert('Silahkan login Dulu');</script>";
  echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Enjoy-Fooding</title>
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <style type="text/css">
    .dropdown:hover>.dropdown-menu {
        display: block;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Tmpilan Dropdown-->
            <li class="nav-item dropdown">
                <a class="navbar-brand dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="makanan.php">Makanan</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="minuman.php">Minuman</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="rokok.php">Rokok</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Buah</a>
                </div>
            </li>
            <!-- Tamoilan Navbar-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="navbar-brand" href="keranjang.php">Keranjang <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <?php if (isset($_SESSION["pelanggan"])) : ?>
                    <li class="nav-item">
                        <a class="navbar-brand" href="logout.php">Logout</a>
                    </li>
                    <?Php else : ?>
                    <li class="nav-item">
                        <a class="navbar-brand" href="login.php">Login</a>
                    </li>
                    <?php endif ?>
                </ul>
                <!-- Tamoilan pencarian-->
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <section class="konten">
        <div class="container">

            <h1>Detail Pembelian</h1>
            <?php 
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
  WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
    ?>

            <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
            <p>
                <?php echo $detail['telepon_pelanggan']; ?><br>
                <?php echo $detail['email_pelanggan']; ?>
            </p>

            <p>
                Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
                Total : <?php echo $detail['total_pembelian']; ?>
            </p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Makanan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM pembelian_makanan JOIN makanan ON pembelian_makanan.id_makanan=makanan.id_makanan WHERE pembelian_makanan.id_pembelian='$_GET[id]'");
            ?>

                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_makanan']; ?></td>
                        <td><?php echo $pecah['harga_makanan']; ?></td>
                        <td><?php echo $pecah['jumlah_makanan']; ?></td>
                        <td>
                            <?php echo $pecah['harga_makanan'] * $pecah['jumlah_makanan']; ?>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php 
          } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>