<?php
session_start();
session_destroy();
echo "<script>alert('Anda telah dipecat');</script>";
echo "<script>location='index.php';</script>";
 

 ?>