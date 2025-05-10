<?php
require "koneksi.php";

$queryProduk = mysqli_query($con, "SELECT produk.id, produk.nama, produk.harga, produk.foto, produk.detail, produk.kategori_id, kategori.nama AS nama_kategori FROM produk 
JOIN kategori ON produk.kategori_id = kategori.id");

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Produk UMKM | Desa Berdaya PLN Aceh</title>
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

  <heaer id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img style="width: auto; height: 70px" src="img/bandaaceh-header.png" alt="Logo 1">
        <img style="width: auto; height: 32px" src="img/bumn-header.png" alt="Logo 2">
        <img style="width: auto; height: 56px" src="img/plnpeduli-header.png" alt="Logo 3">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="">Beranda</a></li>
          <li class="dropdown"><a href="index.php" class="active"><span>Program Desa</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
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
  </heaer>


  <main class="main">

    <div class="page-title dark-background">
      <div class="container position-relative">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="index.php">Program Desa</a></li>
            <li class="current">Produk UMKM</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- produk-umkm Section -->
    <section id="produk-umkm" class="produk-umkm section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Desa Berdaya PLN</h2>
        <p>Produk UMKM</p>
      </div><!-- End Section Title -->



      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <ul class="produk-umkm-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Semua</li>
            <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
                <li data-filter=".filter-<?php echo strtolower(str_replace(' ', '-', $kategori['nama'])); ?>">
                    <?php echo $kategori['nama']; ?>
                 </li>
             <?php } ?>
        </ul>

        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <?php while($data = mysqli_fetch_array($queryProduk)){ 
            $kategoriClass = 'filter-' . strtolower(str_replace(' ', '-', $data['nama_kategori']));
            ?>
                    <div class="col-lg-4 col-md-6 produk-umkm-item isotope-item <?php echo $kategoriClass; ?>" onclick="window.location.href='detail-produk-umkm.php?nama=<?php echo urlencode($data['nama']) ?>'">
                        <img src="image/<?php echo $data['foto']; ?>" class="img-fluid" alt="...">
                        <div class="produk-umkm-info">
                        <h4><?php echo $data['nama']; ?></h4>
                        <h4>Rp. <?php echo number_format($data['harga'], 0, ',', '.'); ?></h4>
                        </div>
                    </div>
            <?php } ?>

        </div>

    </div>

      </div>

    </section><!-- /produk-umkm Section -->

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