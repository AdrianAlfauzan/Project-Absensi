<?php

require "../../../config/koneksi.php";


if(isset($_POST["daftar"])) {
    $nama_pengguna = mysqli_real_escape_string($database, $_POST["nama_pengguna"]);
    $id_pekerjaan = mysqli_real_escape_string($database, $_POST["id_pekerjaan"]);
    $jabatan_pengguna = mysqli_real_escape_string($database, $_POST["jabatan_pengguna"]);
    $username = mysqli_real_escape_string($database, $_POST["username"]);
    $password = mysqli_real_escape_string($database, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($database, $_POST["confirm_password"]);
    
    if(isset($_SESSION["ID_admin"])) {
        $id_admin = $_SESSION["ID_admin"]; 
    } else {
        $id_admin = "1";
    }

    if(empty($nama_pengguna) || empty($id_pekerjaan) || empty($jabatan_pengguna) || empty($username) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('Semua kolom harus diisi.');</script>";
    } else {
        $check_username_query = "SELECT * FROM tabel_pengguna WHERE username = '$username'";
        $result = mysqli_query($database, $check_username_query);

        if(mysqli_num_rows($result) > 0) {
            echo "<script>alert('Username sudah digunakan. Silakan gunakan username lain.');</script>";
        } else {
            if($password !== $confirm_password) {
                echo "<script>alert('Konfirmasi Password tidak sesuai.');</script>";
                header("Refresh:0; url=../../users/website/index.php#daftar");
                exit();
            } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $insert_query = "INSERT INTO tabel_pengguna (ID_admin, nama_pengguna, ID_pekerjaan, jabatan_pengguna, username, password, confirm_password) VALUES ('$id_admin', '$nama_pengguna', '$id_pekerjaan', '$jabatan_pengguna', '$username', '$hashed_password', '$confirm_password')";

                    if(mysqli_query($database, $insert_query)) {
                        echo "<script>alert('Pendaftaran berhasil. Silakan login.');</script>";
                        header("Refresh:0; url=../website/index.php#login"); 
                        exit(); 
                    } else {
                        echo "<script>alert('Terjadi kesalahan saat melakukan pendaftaran.');</script>";
                        header("Refresh:0; url=../../users/website/index.php#daftar");
                    exit();
                    }
            }
        }
    }
}

?>
