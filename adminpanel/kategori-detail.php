<?php
require "session.php";
require "../koneksi.php";

if (!isset($_GET['p'])) {
    // Redirect jika parameter ID tidak ada
    header("Location: kategori.php");
    exit;
}

$id = $_GET['p'];
$query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
$data = mysqli_fetch_array($query);

if (!$data) {
    // Redirect jika data kategori tidak ditemukan
    header("Location: kategori.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/Logo-PLN-Peduli-Kecil.png" rel="icon">
    <link href="img/Logo-PLN-Peduli.png" rel="apple-touch-icon">
    <title>Detail Kategori</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
</head>
<style>
        body {
            background-color: #f7f9fc;
            font-family: 'Roboto', sans-serif;
        }

        .kategori-detail-card {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .kategori-detail-card label {
            font-weight: 600;
            color: #043873;
        }

        .kategori-detail-card input {
            border-radius: 10px;
        }

        .btn-edit {
            background-color: #043873;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-edit:hover {
            background-color: #032f5e;
            color: white;
        }

        .btn-danger {
            border-radius: 10px;
        }

        .breadcrumb a {
            text-decoration: none;
        }
</style>
<body>
    <?php require "navbar.php"; ?>

    <div style="padding-top:7rem;" class="col-12 col-md-6 mx-auto">
    <!-- Breadcrumb -->
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
            <li class="breadcrumb-item active" aria-current="page">
                <span class="text-muted">
                    <i class=""></i> Detail Kategori
                </span>
            </li>
        </ol>
    </nav>

    <!-- Judul -->
    <h2 style="color: #043873; font-size: 40px; font-weight: 900;">Detail Kategori</h2>

    <!-- Card Form -->
    <div class="kategori-detail-card mt-5">
        <form action="" method="post">
            <div class="mb-4">
                <label for="kategori" class="form-label">Nama Kategori</label>
                <input type="text" name="kategori" id="kategori" class="form-control" 
                    value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button style="background-color: #032f5e; color: #ffffff;" type="submit" class="btn btn-edit px-4 py-2" name="editBtn">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </button>
                <button type="submit" class="btn btn-danger px-4 py-2" name="deleteBtn">
                    <i class="bi bi-trash-fill me-1"></i> Hapus
                </button>
            </div>
        </form>

        <!-- Notifikasi (dari PHP) -->
        <?php
            if(isset($_POST['editBtn'])){
                $kategori = htmlspecialchars($_POST['kategori']);
                if($data['nama']==$kategori){
                    echo '<meta http-equiv="refresh" content="0;url=kategori.php" />';
                }
                else {
                    $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
                    $jumlahData = mysqli_num_rows($query);
                    if($jumlahData > 0){
                        echo '<div class="alert alert-warning mt-3" role="alert">Kategori Sudah Ada</div>';
                    }
                    else {
                        $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");
                        if($querySimpan){
                            echo '<div class="alert alert-primary mt-3" role="alert">Kategori Berhasil Diupdate</div>';
                            echo '<meta http-equiv="refresh" content="1;url=kategori.php" />';
                        }
                        else {
                            echo mysqli_error($con);
                        }
                    }
                }
            }

            if(isset($_POST['deleteBtn'])){
                $queryCheck = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$id'");
                $dataCount = mysqli_num_rows($queryCheck);
                if($dataCount>0){
                    echo '<div class="alert alert-warning mt-3" role="alert">Kategori tidak bisa dihapus karena sudah digunakan di produk</div>';
                    die();
                }
                $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");
                if($queryDelete){
                    echo '<div class="alert alert-warning mt-3" role="alert">Kategori Berhasil Dihapus</div>';
                    echo '<meta http-equiv="refresh" content="1;url=kategori.php" />';
                }
                else {
                    echo mysqli_error($con);
                }
            }
        ?>
    </div>
</div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>