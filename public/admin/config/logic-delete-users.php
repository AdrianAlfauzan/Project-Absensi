<?php
require "../../../config/koneksi.php"; 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function hapusPengguna($id) {
    global $database;
    $query = "DELETE FROM tabel_pengguna WHERE ID_pengguna = ?";
    $stmt = mysqli_prepare($database, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_affected_rows($stmt);
}

if (isset($_POST["delete_user"])) {
    $id = $_POST["id_pengguna"]; 

 
    if (hapusPengguna($id) > 0) {
        $_SESSION["success"] = "Pengguna berhasil dihapus.";
    } else {
        $_SESSION["error"] = "Gagal menghapus pengguna. Silakan coba lagi.";
    }

    header("Location: ../../admin/website/index.php#users");
    exit;
}
?>
