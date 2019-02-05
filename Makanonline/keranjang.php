<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "makanonline");
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Kernjang Kosong Silahkan Belanja Dulu');</script>";
    echo "<script>location='index.php';</script>";
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
            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>MAKANAN</th>
                        <th>HARGA</th>
                        <th>JUMLAH</th>
                        <th>SUBHARGA</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_makanan => $jumlah) : ?>
                    <?php 
                    $ambil = $koneksi->query("SELECT * FROM makanan WHERE id_makanan='$id_makanan'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["harga_makanan"] * $jumlah;
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["nama_makanan"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["harga_makanan"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($subharga); ?></td>
                        <td>
                            <a href="hapuskeranjang.php?id=<?php echo $id_makanan ?>"
                                class="btn btn-danger btn-xs">Hapus</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-danger">Tambah Belanja</a>
            <a href="checkout.php" class="btn btn-primary">Checkout</a>
        </div>
    </section>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>