<?php
require "../../../config/koneksi.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST["login_admin"])) {
    $username = $_POST["username_admin"];
    $password = $_POST["password_admin"];
    
    $query = "SELECT * FROM tabel_admin WHERE username_admin = ? AND password_admin = ?";
    $stmt = mysqli_prepare($database, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["ID_admin"] = $row['ID_admin'];
            $_SESSION["login_admin"] = true; 
            $_SESSION["Nama_Admin"] = $row['nama_admin']; 
            $_SESSION["Username_Admin"] = $username; 
            $_SESSION["Password_Admin"] = $password; 
            $_SESSION['alert'] = "Login berhasil"; 

            header("Location: ../../admin/website/index.php"); 
            exit;
        }
    }
    
    $_SESSION["error"] = "Username atau password salah.";
    header("Location: ../../admin/website/login.php");
    exit;
}
?>
