<?php
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/Logo-PLN-Peduli-Kecil.png" rel="icon">
    <link href="img/Logo-PLN-Peduli.png" rel="apple-touch-icon">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</head>

<style>
    
    body {
        margin: 0;
        padding: 0;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow-x: hidden;
        overflow-y: hidden;
    }

    .main {
        height: 100vh;
    }

    .login-box {
        /* box-sizing: border-box; */
        display: flex;
        flex-direction: column;
        gap: 2rem;
        padding-bottom: 5rem;
    }

    header {
        background-color: #28A8E0;
        color: #28A8E0;
        padding: 20px;
        text-align: center;
    }

    footer {
        background-color: #043873;
        color: #043873;
        height: 100%;
        width: 100%;
    }

    .bg-image {
        width: 100vw;
        height: auto;
        position: fixed;
        top: 0;
        left: 0;
        z-index: -10;
    }

    .lottie-asset {
        box-sizing: border-box;
        width: 50%;
        padding-left: 20rem;
    }
   
</style>

<body>
    <img style="padding-top: 30vh" src="images/kota-background.png" class="bg-image" alt="background">
    <header style="position:absolute; top: 0; width: 100%; justify-content: center; align-items: center; gap: 20px; display: flex; background-color:#A7CEFC; padding-bottom:16px; padding-top:16px;">
        <img style="width: 53px; height: 69.80px" src="images/bandaaceh-header.png">
        <img style="width: 178px; height: 32px" src="images/bumn-header.png">
        <img style="width: 73px; height: 56px" src="images/plnpeduli-header.png">
        </div>
    </header>
    <div class="login-box p-2">
        <div style="width: 100%; color: #043873; font-size: 40px; font-family: Roboto; font-weight: 900; line-height: 41px; word-wrap: break-word">SILAHKAN MASUK KE AKUN ANDA</div>
        <form action="" method="post">
            <div>
                <label style="width: 100%; color: black; font-size: 18px; font-family: Roboto; font-weight: 400; word-wrap: break-word;" for="username">Nama Pengguna</label>
                <input style="width: 600px; height: 50px; position: relative" type="text" class="form-control" name="username"
                    id="username">
            </div>
            <div style="padding-top:30px;">
                <label style="width: 100%; color: black; font-size: 18px; font-family: Roboto; font-weight: 400; word-wrap: break-word;" for="password">Kata Sandi</label>
                <input style="width: 600px; height: 50px; position: relative" type="password" class="form-control" name="password"
                    id="password">
            </div>
            <div style="padding-top: 36px;">
                <button style="width: 600px; height: 50px; padding-left: 199px; padding-right: 199px; padding-top: 6px; padding-bottom: 6px; background: #043873; border-radius: 9px; overflow: hidden; justify-content: center; align-items: center; gap: 10px; display: inline-flex" class="btn btn-success form-control" type="submit" name="loginbtn">Masuk</button>
            </div>
        </form>
        <div class="mt-3">
            <?php
            if (isset($_POST['loginbtn'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $query = mysqli_query($con, "SELECT * FROM  users WHERE username ='$username'");
                $countdata = mysqli_num_rows($query);
                $data = mysqli_fetch_array($query);
                if ($countdata > 0) {
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['login'] = true;
                        header('location: index.php');
                        exit();
                    } else {
            ?>
                        <div style="width: 600px;" class="alert alert-warning" role="alert">
                            Kata Sandi Salah!
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div style="width: 600px;" class="alert alert-warning" role="alert">
                        Nama Pengguna Tidak Tersedia!
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>    
    <div class="lottie-asset">
        <dotlottie-player src="https://lottie.host/1150df3d-1eb6-42a8-bc65-e71a3784caf5/CFCFx52SNy.lottie" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></dotlottie-player>
    </div>

    <!-- <div>
    <footer style="padding-top: 40px; padding-bottom: 60px" class="footer">
        <div class="footer-left">
            <h3  style="color: white; font-size: 28px; font-family: Roboto; font-weight: 700; line-height: 36px; word-wrap: break-word; margin-left:140px; margin-top:40">Hubungi Kami</h3>
            <img style="margin-left:140px; margin-top: 30px" src="images/pln-footer.svg">
           
        </div>
        <div class="footer-center">
            <div>
                <i class="fa fa-phone"></i>
                <p style="color: white; font-size: 16px; font-family: Roboto; font-weight: 700; line-height: 20px; word-wrap: break-word">(0651) 22188</p>
                <img src="images/telepon.svg">
            </div>
        </div>
        <div style="width: 100%; height: 100%; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border: 1px #2E4E73 solid; margin-top:13px"></div>
        <p style="color: white; align-items:center; align-content:center; text-align:center; margin-bottom:-50px; margin-top: 20px;font-size: 16px; font-family: Roboto; font-weight: 400; line-height: 20px; word-wrap: break-word">Copyright ©2024 PT PLN (Persero) Unit Induk Distribusi Aceh All Right Reserved</p>
     </footer> -->

        <?php
        if (isset($_POST['loginbtn']))
        ?>
</body>

</html>