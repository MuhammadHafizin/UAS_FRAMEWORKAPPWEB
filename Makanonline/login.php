<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "makanonline");
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

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="dropdown-divider"></div>
                        <h3 class="panel-title">Login Pelanggan</h3>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button class="btn btn-primary" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
  $akunyangcocok = $ambil->num_rows;
  if ($akunyangcocok == 1) {
    $akun = $ambil->fetch_assoc();
    $_SESSION["pelanggan"] = $akun;
    echo "<script>alert('Anda Sukses Login');</script>";
    echo "<script>location='checkout.php';</script>";
  } else {
    echo "<script>alert('Anda Gagal Login');</script>";
    echo "<script>location='login.php';</script>";
  }
}

?>
</body>

</html>