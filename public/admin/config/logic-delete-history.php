<?php
require "../../../config/koneksi.php";

if (isset($_POST['delete_history'])) {
    // Get the date from the form
    $tanggal = $_POST['tanggal'];

    $sql_delete_kehadiran = "DELETE k FROM tabel_kehadiran k
                             JOIN tabel_absensi a ON k.ID_absensi = a.ID_absensi
                             WHERE a.tanggal = ?";
    $stmt_kehadiran = $database->prepare($sql_delete_kehadiran);
    $stmt_kehadiran->bind_param("s", $tanggal);

    if ($stmt_kehadiran->execute()) {
        $sql_delete_absensi = "DELETE FROM tabel_absensi WHERE tanggal = ?";
        $stmt_absensi = $database->prepare($sql_delete_absensi);
        $stmt_absensi->bind_param("s", $tanggal);

        if ($stmt_absensi->execute()) {
            echo "<script>alert('Data history berhasil dihapus.');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt_absensi->error . "');</script>";
        }

        $stmt_absensi->close();
    } else {
        echo "<script>alert('Error: " . $stmt_kehadiran->error . "');</script>";
    }

    $stmt_kehadiran->close();
}
echo "<script>window.location.href = '../../admin/website/index.php#historyUsers';</script>";
$database->close();
?>
