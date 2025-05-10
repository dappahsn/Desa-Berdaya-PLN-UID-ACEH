<?php
$con = mysqli_connect("localhost:3307", "root", "", "desa-berdaya-pln-uid-aceh");

// Check Connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
