<?php
session_start();
$koneksi = new mysqli("localhost","root","","makanonline");

if (!isset($_SESSION['admin']))
{
 echo "<script>alert('Anda harus Masuk');</script>";
 echo "<script>location='login.php';</script>";
 header('location:login.php');
 exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                  <span class="sr-only">Toggel navigation</span>
                  <span class="icon-bar"></span>  
                  <span class="icon-bar"></span>  
                  <span class="icon-bar"></span>  
                  
                </button>
                <a class="navbar-brand" href="index.html">Enjoy fooding</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
</nav>   
           <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
    <ul class="nav" style="padding-right: 30px; padding-left: 30px;" id="main-menu">
		<li>
            <img src="" class="user-image img-responsive"/>
		</li>
				
					
        <li> 
            <a href="index.php"><i class="fa fa-home fa-3x"></i>Home</a>
        </li>
        <li> 
            <a href="index.php?halaman=makanan"><i class="fa fa-dashboard fa-3x"></i>Makanan</a>
        </li>
        <li> 
            <a href="index.php?halaman=minuman"><i class="fa fa-dashboard fa-3x"></i>Minuman</a>
        </li>
        <li> 
            <a href="index.php?halaman=pembelian"><i class="fa fa-dashboard fa-3x"></i>Pembelian</a>
        </li>
        <li> 
            <a href="index.php?halaman=pelanggan"><i class="fa fa-dashboard fa-3x"></i>Pelanggan</a>
        </li>
        <li> 
            <a href="index.php?halaman=rokok"><i class="fa fa-dashboard fa-3x"></i>Rokok</a>
        </li>
        <li> 
            <a href="index.php?halaman=logout"><i class="fa fa-sign-out fa-3x"></i>Logout</a>
        </li>
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="makanan")
                    {
                        include 'makanan/makanan.php';
                    }
                    elseif ($_GET['halaman']=="pembelian")
                    {
                        include 'pembelian.php';
                    }
                    elseif ($_GET['halaman']=="pelanggan")
                    {
                        include 'pelanggan.php';
                    }
                    elseif ($_GET['halaman']=="detail")
                    {
                        include 'detail.php';
                    }
                    elseif ($_GET['halaman']=="tambah")
                    {
                        include 'makanan/tambah.php';
                    }
                    elseif ($_GET['halaman']=="tambahrokok")
                    {
                        include 'rokok/tambahrokok.php';
                    }
                    elseif ($_GET['halaman']=="hapus")
                    {
                        include 'makanan/hapus.php';
                    }
                    elseif ($_GET['halaman']=="hapusrokok")
                    {
                        include 'rokok/hapusrokok.php';
                    }
                    elseif ($_GET['halaman']=="ubah")
                    {
                        include 'makanan/ubah.php';
                    }
                    elseif ($_GET['halaman']=="ubahrokok")
                    {
                        include 'rokok/ubahrokok.php';
                    }
                     elseif ($_GET['halaman']=="rokok")
                    {
                        include 'rokok/rokok.php';
                    }
                    
                     elseif ($_GET['halaman']=="minuman")
                    {
                        include 'minuman/minuman.php';
                    }
                     elseif ($_GET['halaman']=="tambahminuman")
                    {
                        include 'minuman/tambahminuman.php';
                    }
                    elseif ($_GET['halaman']=="hapusminuman")
                    {
                        include 'minuman/hapusminuman.php';
                    }
                    elseif ($_GET['halaman']=="ubahminuman")
                    {
                        include 'minuman/ubahminuman.php';
                    }
                    elseif ($_GET['halaman']=="logout")
                    {
                        include 'logout.php';
                    }
                    
                }
                else
                {
                    include 'home.php'; 
                }
                ?>
            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
