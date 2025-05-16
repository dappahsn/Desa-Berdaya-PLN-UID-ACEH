<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/Logo-PLN-Peduli-Kecil.png" rel="icon">
    <link href="img/Logo-PLN-Peduli.png" rel="apple-touch-icon">
    <title>Kategori</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }

    .form-kategori-container {
        max-width: 500px;
        margin: 30px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: 600;
        color: #043873;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-primary {
        background-color: #043873;
        border: none;
        border-radius: 10px;
        padding: 10px 25px;
    }

    .btn-primary:hover {
        background-color: #032f5b;
    }

    .table-container {
        background-color: #ffffff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    .table thead {
        background-color: #043873;
        color: white;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .btn-info {
        background-color: #043873;
        border: none;
        border-radius: 8px;
    }

    .btn-info:hover {
        background-color: #032f5b;
    }

    .table-title {
        color: #043873;
        font-weight: bold;
        margin-bottom: 20px;
    }
</style>

<body>
    <?php require "navbar.php" ?>
    <div style="padding-top:5rem;" class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel/" class="no-decoration text-muted">
                        <i class="bi bi-house-door-fill"></i> Home
                    </a> 
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel/kategori.php" class="no-decoration text-muted">
                        <i class="bi bi-tags-fill"></i> Kategori
                    </a> 
                </li>
            </ol>
        </nav>

        <div class="form-kategori-container my-5 col-12 col-md-6">
            <h3 style="width: 100%; color: #043873; font-size: 40px; font-family: Roboto; font-weight: 900; line-height: 41px; word-wrap: break-word;">Tambah Kategori</h3>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="kategori" class="form-label"></label>
                    <input type="text" id="kategori" name="kategori" placeholder="Masukkan nama kategori" class="form-control" required>
                </div>
                <div class="text-end">
                    <button style="background-color: #032f5b;" class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>
            <?php
                if(isset($_POST['simpan_kategori'])){
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                    $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

                    if ($jumlahDataKategoriBaru > 0){
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Kategori Sudah Ada
                        </div>
                        <?php
                    }
                    else{
                        $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                        if($querySimpan){
                            ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Kategori Berhasil Tersimpan
                            </div>
                            <meta http-equiv="refresh" content="0"; url="kategori.php" />
                            <?php
                        }
                        else{
                            echo mysqli_error($con);
                        }
                    }
                }
            ?>
        </div>

        <div class="mt-3">
            <h2 style="width: 100%; color: #043873; font-size: 40px; font-family: Roboto; font-weight: 900; line-height: 41px; word-wrap: break-word;">List Kategori</h2>

            <div class="table-container mt-5">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Jenis Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($jumlahKategori == 0): ?>
                            <tr>
                                <td colspan="3" class="text-center">Data Kategori Tidak Tersedia</td>
                            </tr>
                        <?php else:
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($queryKategori)): ?>
                                <tr>
                                    <td class="text-center"><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td class="text-center">
                                        <a style="border-color: #032f5b; color: #032f5b;" href="kategori-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info btn-sm" title="Lihat Detail">
                                            <i class="bi bi-search text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php $jumlah++; endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
