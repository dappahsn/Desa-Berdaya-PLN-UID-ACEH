<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['p'];

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
    $data = mysqli_fetch_array($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

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
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/Logo-PLN-Peduli-Kecil.png" rel="icon">
    <link href="img/Logo-PLN-Peduli.png" rel="apple-touch-icon">
    <title>Produk Detail</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<style>
    form div {
        margin-bottom: 10px;
    }
</style>
<body>
<?php require "navbar.php"; ?>

<div style="padding-top:5rem;" class="container mt-5">
    <h2 style="color: #043873; font-size: 40px; font-family: Roboto; font-weight: 900;">Detail Produk</h2>

    <div class="col-12 col-md-6 mb-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="<?php echo $data['nama'] ?>" class="form-control" required>
            </div>
            <div>
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>
                    <?php while($dataKategori=mysqli_fetch_array($queryKategori)){ ?>
                        <option value="<?php echo $dataKategori['id'] ?>"><?php echo $dataKategori['nama']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" class="form-control" value="<?php echo $data['harga']; ?>" name="harga" required>
            </div>
            <div>
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text" class="form-control" value="<?php echo $data['nomor_telepon']; ?>" name="nomor_telepon" required>
            </div>
            <div>
                <label for="currentFoto">Foto Produk Sekarang</label><br>
                <img src="../image/<?php echo $data['foto'] ?>" alt="" width="300px">
            </div>
            <div>
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
            <div>
                <label for="detail">Detail</label>
                <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"><?php echo $data['detail']; ?></textarea>
            </div>
            <div>
                <label for="ketersediaan_stok">Ketersediaan Stok</label>
                <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                    <option value="<?php echo $data['ketersediaan_stok'] ?>"><?php echo $data['ketersediaan_stok'] ?></option>
                    <option value="<?php echo $data['ketersediaan_stok'] == 'tersedia' ? 'habis' : 'tersedia'; ?>">
                        <?php echo $data['ketersediaan_stok'] == 'tersedia' ? 'habis' : 'tersedia'; ?>
                    </option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
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
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if($nama == '' || $kategori == '' || $harga == ''){
                    echo '<div class="alert alert-warning mt-3">Nama, kategori dan harga wajib diisi</div>';
                } else {
                    $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori', nama='$nama', harga='$harga', detail='$detail', ketersediaan_stok='$ketersediaan_stok', nomor_telepon='$nomor_telepon' WHERE id=$id");

                    if($nama_file != ''){
                        if($image_size > 500000){
                            echo '<div class="alert alert-warning mt-3">File tidak boleh lebih dari 500 kb</div>';
                        } elseif(!in_array($imageFileType, ['jpg', 'png', 'gif'])){
                            echo '<div class="alert alert-warning mt-3">File wajib bertipe png, jpg, atau gif</div>';
                        } else {
                            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                            mysqli_query($con, "UPDATE produk SET foto='$new_name' WHERE id='$id'");
                        }
                    }

                    echo '<div class="alert alert-primary mt-3">Produk Berhasil Diupdate</div>';
                    echo '<meta http-equiv="refresh" content="2; url=produk.php" />';
                }
            }

            if(isset($_POST['hapus'])){
                $queryHapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");
                if($queryHapus){
                    echo '<div class="alert alert-primary mt-3">Produk berhasil dihapus</div>';
                    echo '<meta http-equiv="refresh" content="2; url=produk.php" />';
                }
            }
        ?>
    </div>
</div>

<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
