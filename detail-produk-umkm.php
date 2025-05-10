<?php
    require "koneksi.php";
    $nama= htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
    $produk = mysqli_fetch_array($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Detail Produk UMKM | Desa Berdaya PLN Aceh</title>
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



</style>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img style="width: auto; height: 70px" src="img/bandaaceh-header.png" alt="Logo 1">
        <img style="width: auto; height: 32px" src="img/bumn-header.png" alt="Logo 2">
        <img style="width: auto; height: 56px" src="img/plnpeduli-header.png" alt="Logo 3">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="">Beranda</a></li>
          <li class="dropdown"><a href="index.php " class="active"><span>Program Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="produk-umkm.php">Produk UMKM</a></li>
              <li><a href="kursus-bahasa-inggris.php">Kursus Bahasa Inggris</a></li>
              <li><a href="bank-sampah.php">Bank Sampah</a></li>
            </ul>
          </li>
          <li><a href="index.php">Tentang Kami</a></li>
          <li><a href="index.php">Hubungi Kami</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>


  <main class="main">

    <div class="page-title dark-background">
      <div class="container position-relative">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="index.php">Program Desa</a></li>
            <li><a href="produk-umkm.php">Produk UMKM</a></li>
            <li class="current">Detail Produk UMKM</li>
          </ol>
        </nav>
      </div>
    </div>

      <!-- ======= detail-produk-umkm Details Section ======= -->
      <section id="detail-produk-umkm" class="detail-produk-umkm">
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-8">
              <div class="detail-produk-umkm-slider swiper">
                <div class="swiper-wrapper align-items-center">
  
                  <div class="swiper-slide">
                    <img src="image/<?php echo $produk['foto']; ?>" alt="">
                  </div>
  
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
  
            <div class="col-lg-4">
              <div class="detail-produk-umkm-info">
                <h3>
                <?php echo $produk['nama']; ?><br>
                Rp. <?php echo $produk['harga']; ?>
                </h3>
                <ul>
                  <li><strong>Deskripsi</strong>: <?php echo $produk['detail']; ?>
                </ul>
                <a href="https://wa.me/6282183422583">
                  <button type="button" class="btn btn-outline-dark" style="width: 100%; height: 2.5rem; font-weight: 600; font-size: 18px; gap: 1rem;">                  
                    <i class="bi bi-whatsapp" style="font-weight: 600;"></i>
                    Hubungi Penjual
                    </button>
                </a>


              </div>
              <div class="detail-produk-umkm-description">
                
              </div>
           
            </div>
  
          </div>
                
        </div>
      </section><!-- End detail-produk-umkm Details Section -->
      

  </main>
  <footer id="footer" class="footer dark-background">
    <div class="container">
      <div style=" justify-content: center; align-items: center; display: flex; " class="d-flex">
        <div class="container">
          <h2 style="color: white; font-size: 28px; font-family: Roboto; font-weight: 700; line-height: 36px; word-wrap: break-word"> Hubungi Kami</h2>
          <img src="img/pln-footer.svg" alt="">
        </div>

        <div class="container">
          <div class="social-links" style="align-items: start; gap: 0.5rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
              <a href="https://www.youtube.com/@plnuidaceh"><i class="bi bi-youtube"></i></a>
              <p style="margin: 0; color: white; font-size: 16px; font-family: Roboto; font-weight: 700; line-height: 20px; word-wrap: break-word">PLN UID Aceh</p>
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem; color: white; font-size: 16px; font-family: Roboto; font-weight: 700; line-height: 20px; word-wrap: break-word;">
              <a href="https://www.instagram.com/plnaceh/"><i class="bi bi-instagram"></i></a>
              <p style="margin: 0;">plnaceh</p>
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem; color: white; font-size: 16px; font-family: Roboto; font-weight: 700; line-height: 20px; word-wrap: break-word">
              <a href="https://www.facebook.com/profile.php?id=100057241368943"><i class="bi bi-facebook"></i></a>
              <p style="margin: 0;">PLN Wilayah Aceh</p>
            </div>
          </div>
        </div>
        
      </div>
          <div class="container" style="padding-top: 1rem;">
            <div class="copyright">
              <span>Copyright © 2025</span> <strong class="px-1 sitename">PT PLN (Persero) Unit Induk Distribusi Aceh</strong> <span>All Rights Reserved</span>
            </div>
            <div class="credits">
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

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