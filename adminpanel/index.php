<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    $jumlahProduk = mysqli_num_rows($queryProduk);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/Logo-PLN-Peduli-Kecil.png" rel="icon">
    <link href="img/Logo-PLN-Peduli.png" rel="apple-touch-icon">
    <title>Beranda</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">

</head>

<style>
    .kotak{
        border: solid;
    }

    .summary-kategori{
        background-color: #A7CEFC;
        border-radius: 15px;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25)"
    }   
    .no-decoration{
        text-decoration: none;
    }
</style>
<body>
    <?php require "navbar.php" ?>
    <div style="padding-top:5rem;" class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i> Home
                </li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <h2 style="width: 100%; color: #043873; font-size: 40px; font-family: Roboto; font-weight: 900; line-height: 41px; word-wrap: break-word;">SELAMAT DATANG DI DESA BERDAYA</h2>
    </div>
   
        
        <div style="font-family: Roboto; word-wrap: break-word;" class="container mt-5">
            <div class="row">
                <div  class="col-lg-4 col-md-6 col-12 mb-4">
                    <div style="box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25)" class="summary-kategori p-3">
                        <div  class="row">
                            <div class="col-6">
                                <i style="color:#043873;" class="fas fa-align-justify fa-7x"></i>
                            </div>
                            <div class="col-6 text-#043873">
                                <h3 style="color:#043873;font-weight:700; line-height: 41px" class="fs-2">Kategori</h3>
                                <p style="color:#043873; font-weight:500;" class="fs-4"><?php echo $jumlahKategori?> Kategori</pcl>
                                <p><a href="kategori.php" class=" text-white no-decoration"> Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div  class="col-lg-4 col-md-6 col-12 mb-4">
                    <div style="box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25)" class="summary-kategori p-3">
                        <div  class="row">
                            <div class="col-6">
                                <i style="color:#043873;" class="fas fa-box fa-7x"></i>
                            </div>
                            <div class="col-6 text-#043873">
                                <h3 style="color:#043873; font-weight:700; line-height: 41px;" class="fs-2">Produk</h3>
                                <p style="color:#043873; font-weight:500;" class="fs-4"><?php echo $jumlahProduk?> Produk</pcl>
                                <p><a href="produk.php" class=" text-white no-decoration"> Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
