<?php
    require "session.php";
    require "../koneksi.php";

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
    $jumlahProduk = mysqli_num_rows($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    function generateRandomString($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/Logo-PLN-Peduli-Kecil.png" rel="icon">
    <link href="img/Logo-PLN-Peduli.png" rel="apple-touch-icon">
    <title>Produk</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">

</head>

<style>
    .no-decoration {
        text-decoration: none;
    }

    form div{
        margin-bottom: 10px;
    }
  .form-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
  }
  .form-label {
    font-weight: 600;
    color: #043873;
  }
  .form-control, .form-select {
    border-radius: 10px;
  }
  .btn-primary {
    background-color: #043873;
    border: none;
    border-radius: 10px;
    padding: 10px 30px;
  }
  .btn-primary:hover {
    background-color: #032f5b;
  }

  .table thead {
        background-color: #043873;
        color: white;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .btn-info {
        background-color: #032f5b;
        border: none;
    }

    .btn-info:hover {
        background-color: #032f5b;
    }

    .table-container {
        background-color: #fff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
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
                        <a href="../adminpanel/produk.php" class="no-decoration text-muted">
                            <i class="bi bi-box-seam-fill"></i> Produk
                        </a> 
                    </li>
                </ol>
            </nav>
            <!-- tambah produk -->
    <div class="form-container my-5 col-12 col-md-6">
        <h3 style="width: 100%; color: #043873; font-size: 40px; font-family: Roboto; font-weight: 900; line-height: 41px; word-wrap: break-word;">Tambah Produk</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-select" required>
                    <option value="">Pilih Satu</option>
                    <?php while($data = mysqli_fetch_array($queryKategori)){ ?>
                     <option value="<?php echo $data['id'] ?>"><?php echo $data['nama']; ?></option>
                     <?php } ?>
               </select>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" required>
            </div>

            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="nomor_telepon" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">Detail</label>
                <textarea name="detail" id="detail" rows="5" class="form-control"></textarea>
            </div>

        <div class="mb-4">
            <label for="ketersediaan_stok" class="form-label">Ketersediaan Stok</label>
            <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-select">
                <option value="tersedia">Tersedia</option>
                <option value="habis">Habis</option>
            </select>
        </div>

        <div class="text-end">
            <button style="background-color: #032f5b;" type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        </div>
    </form>

        <?php
            if(isset($_POST['simpan'])){
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);
                $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);
                $nomor_telepon = htmlspecialchars($_POST['nomor_telepon']);

                $target_dir = "../image/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if($nama=='' || $kategori=='' || $harga==''){
        ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Nama, kategori dan harga wajib diisi
                    </div>
        <?php
                } else {
                    if($nama_file!=''){
                        if($image_size > 500000){
        ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File tidak boleh lebih dari 500 kb
                            </div>
        <?php
                        } else {
                            if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif'){
        ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    File wajib bertipe png, jpg, atau gif
                                </div>
        <?php
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                            }
                        }   
                    }

                    $queryTambah = mysqli_query($con, "INSERT INTO produk(kategori_id, nama, harga, foto, detail, ketersediaan_stok, nomor_telepon) 
                    VALUES ('$kategori', '$nama', '$harga', '$new_name', '$detail', '$ketersediaan_stok', '$nomor_telepon')");

                    if($queryTambah){
        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Produk berhasil tersimpan
                        </div>
                        <meta http-equiv="refresh" content="0; url=produk.php" />
        <?php
                    } else {
                        echo mysqli_error($con);
                    }
                }
            }
        ?>
    </div>

    <div class="mt-3 mb-5"> 
      <h3 style="width: 100%; color: #043873; font-size: 40px; font-family: Roboto; font-weight: 900; line-height: 41px; word-wrap: break-word;">List Produk</h3>

        <div class="table-responsive mt-5">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Ketersediaan Stok</th>
                        <th>Nomor Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($jumlahProduk==0){
                    ?>
                        <tr>
                            <td colspan="7" class="text-center">Data Produk Tidak Tersedia</td>
                        </tr>
                    <?php
                }        else {
                            $jumlah = 1;
                            while($data=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $jumlah; ?></td>
                            <td><?php echo $data['nama'];?></td>
                            <td><?php echo $data['nama_kategori'];?></td>
                            <td>Rp. <?php echo number_format($data['harga'], 0, ',', '.');?></td>
                            <td class="text-center">
                                <?php if($data['ketersediaan_stok'] == 'tersedia'): ?>
                                    <span class="badge bg-success">Tersedia</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Habis</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $data['nomor_telepon'];?></td>
                            <td class="text-center">
                                <a style="background-color: #032f5b;" href="produk-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info btn-sm" title="Lihat Detail">
                                    <i class="bi bi-search text-white"></i>
                                </a>
                            </td>
                        </tr>
            <?php   
                    $jumlah++;
                    }
                }
            ?>
                </tbody>
             </table>
        </div>
    </div>
    </div>



    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
