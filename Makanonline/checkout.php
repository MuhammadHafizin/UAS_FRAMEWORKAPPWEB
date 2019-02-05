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
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_makanan => $jumlah) : ?>
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
                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalbelanja += $subharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                    </tr>
                </tfoot>
            </table>

            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION[" pelanggan"]['nama_pelanggan'] ?>"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly
                                value="<?php echo $_SESSION[" pelanggan"]['telepon_pelanggan']
                                        ?>"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="id_ongkir">
                            <option value="">Pilih Alamat Pengiriman</option>
                            <?php 
                            $ambil = $koneksi->query("SELECT * FROM ongkir");
                            while ($perongkir = $ambil->fetch_assoc()) {
                                ?>
                            <option value="<?php $perongkir["id_ongkir"] ?>">
                                <?php echo $perongkir['nama_kota'] ?>
                                Rp. <?php echo number_format($perongkir['tarif']) ?>
                            </option>
                            <?php 
                        } ?>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" name="checkout">Deal</button>
            </form>
            <?php 
            if (isset($_POST["checkout"])) {
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $id_ongkir = $_POST["id_ongkir"];
                $tanggal_pembelian = date("y-m-d");
                $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                $arrayongkir = $ambil->fetch_assoc();
                $tarif = $arrayongkir['tarif'];
                $total_pembelian = $totalbelanja + $tarif;
                $koneksi->query("INSERT INTO pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian)
    VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian')");
                $id_pembelian_barusan = $koneksi->insert_id;
                foreach ($_SESSION["keranjang"] as $id_makanan => $jumlah) {
                    $koneksi->query("INSERT INTO pembelian_makanan (id_pembelian,id_makanan,jumlah) VALUES  ('$id_pembelian_barusan','$id_makanan','$jumlah') ");
                }
                unset($_SESSION["keranjang"]);
                echo "<script>alert('Pembelian Sukses');</script>";
                echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
            }

            ?>
        </div>
    </section>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>