<?php
require "../../../config/koneksi.php";

if (isset($_POST["change_profile"])) {
    $nama_pengguna = mysqli_real_escape_string($database, $_POST["nama_pengguna"]);
    $nama_pekerjaan = mysqli_real_escape_string($database, $_POST["nama_pekerjaan"]);
    $jabatan_pengguna = mysqli_real_escape_string($database, $_POST["jabatan_pengguna"]);
    $username = mysqli_real_escape_string($database, $_POST["username"]);
    $password = mysqli_real_escape_string($database, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($database, $_POST["confirm_password"]);


    if (empty($nama_pengguna) || empty($nama_pekerjaan) || empty($jabatan_pengguna) || empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION["error"] = "Semua field harus diisi.";
        header("Location: ../../users/website/page-absensi.php#Profile");
        exit;
    } else if ($password !== $confirm_password) {
        $_SESSION["error"] = "Password dan konfirmasi password tidak sesuai.";
        header("Location: ../../users/website/page-absensi.php#Profile");
        exit;
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

        $update_query = "UPDATE tabel_pengguna SET nama_pengguna='$nama_pengguna', ID_pekerjaan='$nama_pekerjaan', jabatan_pengguna='$jabatan_pengguna', password='$hashed_password' WHERE username='$username'";

        if (mysqli_query($database, $update_query)) {
            $_SESSION["success"] = "Profil berhasil diperbarui.";
            $_SESSION['Nama_Pengguna'] = $nama_pengguna;
            $_SESSION['Nama_Pekerjaan'] = $nama_pekerjaan;
            $_SESSION['Jabatan_Pengguna'] = $jabatan_pengguna;
            $_SESSION['Username'] = $username;
            $_SESSION['Password'] = $hashed_password;
            $_SESSION['Confirm_Password'] = $confirm_password;

            header("Location: ../../users/website/page-absensi.php#Profile");
            exit;
        } else {
            $_SESSION["error"] = "Gagal memperbarui profil. Silakan coba lagi.";
            header("Location: ../../users/website/page-absensi.php#Profile");
            exit;
        }
    }
}
?>