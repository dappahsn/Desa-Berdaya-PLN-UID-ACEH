<?php
    require "session.php";

    // Ambil nama halaman saat ini
    $currentPage = basename($_SERVER['PHP_SELF']);

    // Tentukan apakah submenu Program Desa aktif
    $isProgramDesaActive = in_array($currentPage, ['program-desa.php', 'produk-umkm.php', 'bank-sampah.php', 'kursus-bahasa-inggris.php']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>NAVBAR</title>
  <meta name="description" content="">
  <meta name="keywords" content="">


  <link href="img/Logo-PLN-Peduli-Kecil.png" rel="icon">
  <link href="img/Logo-PLN-Peduli.png" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  
  <link href="css/main.css" rel="stylesheet">

</head>

<style>
  #index-carousel {
    position: relative;
    height: 100vh;
    margin: 0;
    width: 100vw;
  }
  
  .index-waves {
    position: absolute;
    bottom: 2;
    left: 0;
    width: 100%;
    height: auto;
    z-index: 2;
    fill: #fff;
    rotate: 360;
  }
  
  #index-carousel .carousel-container {
    position: relative;
    /* z-index: 2; */
    color: #fff;
    text-align: center;
    padding: 0 15px;
  }
  
  #index-carousel::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
  }
  
  </style>

<body  style="overflow-x: hidden;" class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img style="width: auto; height: 70px" src="img/bandaaceh-header.png" alt="Logo 1">
        <img style="width: auto; height: 32px" src="img/bumn-header.png" alt="Logo 2">
        <img style="width: auto; height: 56px" src="img/plnpeduli-header.png" alt="Logo 3">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="logout.php" class="active">Logout</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/php-email-form/validate.js"></script>
<script src="vendor/aos/aos.js"></script>
<script src="vendor/glightbox/js/glightbox.min.js"></script>
<script src="vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="vendor/swiper/swiper-bundle.min.js"></script>

<script src="js/main.js"></script>



</body>

</html>
