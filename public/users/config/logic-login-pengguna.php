<?php
require "../../../config/koneksi.php";
session_start();

if (isset($_POST["login_pengguna"])) {
    $username = mysqli_real_escape_string($database, $_POST["username"]);
    $password = mysqli_real_escape_string($database, $_POST["password"]);

    if (empty($username) || empty($password)) {
        $_SESSION["error"] = "Username dan password tidak boleh kosong.";
        header("Location: ../../users/website/index.php");
        exit;
    } else {
        $result = mysqli_query($database, "SELECT * FROM tabel_pengguna WHERE username = '$username'");

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row["password"])) {
                $_SESSION["login_pengguna"] = true;
                $_SESSION["success"] = "Login berhasil.";
                $_SESSION['Nama_Pengguna'] = $row['nama_pengguna'];
                $_SESSION['ID_pengguna'] = $row['ID_pengguna'];
                $_SESSION['Nama_Pekerjaan'] = $row['ID_pekerjaan'];
                $_SESSION['Jabatan_Pengguna'] = $row['jabatan_pengguna'];
                $_SESSION['Username'] = $row['username'];
                $_SESSION['Confirm_Password'] = $row['confirm_password'];

                unset($_SESSION["error"]);

                header("Location: ../../users/website/page-absensi.php");
                exit;
            } else {
                $_SESSION["error"] = "Password anda salah.";
                header("Location: ../../users/website/index.php#login");
                exit;
            }
        } else {
            $_SESSION["error"] = "Username anda salah.";
            header("Location: ../../users/website/index.php#login");
            exit;
        }
    }
}

?>
