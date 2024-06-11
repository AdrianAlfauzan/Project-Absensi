<?php
require "../../../config/koneksi.php";
session_start();
if (isset($_POST["change_profile"])) {
    $nama_admin = mysqli_real_escape_string($database, $_POST["nama_admin"]);
    $username_admin = mysqli_real_escape_string($database, $_POST["username_admin"]);
    $password_admin = mysqli_real_escape_string($database, $_POST["password_admin"]);

    if (empty($nama_admin) || empty($username_admin) || empty($password_admin)) {
        $_SESSION["error"] = "Semua field harus diisi.";
        header("Location: ../../admin/website/index.php#Profile");
        exit;
    } else {
        $update_query = "UPDATE tabel_admin SET nama_admin='$nama_admin', password_admin='$password_admin' WHERE username_admin='$username_admin'";

        if (mysqli_query($database, $update_query)) {
            $_SESSION["alert_admin"] = "Profil admin berhasil diperbarui.";
            $_SESSION['Nama_Admin'] = $nama_admin;
            $_SESSION['Username_Admin'] = $username_admin;
            $_SESSION['Password_Admin'] = $password_admin;

            header("Location: ../../admin/website/index.php#Profile");
            exit;
        } else {
            $_SESSION["error"] = "Gagal memperbarui profil admin. Silakan coba lagi.";
            header("Location: ../../admin/website/index.php#Profile");
            exit;
        }
    }
}
?>
