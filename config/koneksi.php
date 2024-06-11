<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "absensi_infini";

$database = mysqli_connect($host, $user, $pass, $db);

if (!$database) {
    echo "Koneksi gagal: " . mysqli_connect_error();
} 
?>
