<?php
require "../../../config/koneksi.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["simpan"])) {
    $tanggal = $_POST["tanggal"];
    $jam_masuk = $_POST["jam_masuk"];
    $jam_keluar = $_POST["jam_keluar"];
    $keterangan = $_POST["keterangan"];
    $ID_pengguna = $_SESSION['ID_pengguna']; 
    $ID_admin = 1; 

    $sql_count_absensi = "SELECT COUNT(*) AS total_absensi FROM tabel_absensi WHERE ID_pengguna = ? AND tanggal = ?";
    $stmt_count_absensi = $database->prepare($sql_count_absensi);
    $stmt_count_absensi->bind_param("is", $ID_pengguna, $tanggal);
    $stmt_count_absensi->execute();
    $result_count_absensi = $stmt_count_absensi->get_result();
    $row_count_absensi = $result_count_absensi->fetch_assoc();
    $total_absensi = $row_count_absensi['total_absensi'];
    $stmt_count_absensi->close();

    if ($total_absensi >= 2) {
        echo "<script>alert('Anda sudah melakukan absensi maksimal 2 kali hari ini.');</script>";
        echo "<script>window.location.href = '../../users/website/page-absensi.php#Absensi';</script>";
        exit();
    } else {
        $jam_masuk = date('H:i', strtotime($jam_masuk));
        $jam_keluar = date('H:i', strtotime($jam_keluar));

        $sql_absensi = "INSERT INTO tabel_absensi (ID_pengguna, ID_admin, tanggal, keterangan) VALUES (?, ?, ?, ?)";
        $stmt_absensi = $database->prepare($sql_absensi);
        $stmt_absensi->bind_param("iiss", $ID_pengguna, $ID_admin, $tanggal, $keterangan);

        if ($stmt_absensi->execute()) {
            $ID_absensi = $stmt_absensi->insert_id;

            $sql_kehadiran = "INSERT INTO tabel_kehadiran (ID_absensi, ID_admin, jam_masuk, jam_keluar) VALUES (?, ?, ?, ?)";
            $stmt_kehadiran = $database->prepare($sql_kehadiran);
            $stmt_kehadiran->bind_param("iiss", $ID_absensi, $ID_admin, $jam_masuk, $jam_keluar);

            if ($stmt_kehadiran->execute()) {
                echo "<script>alert('Data absensi dan kehadiran berhasil disimpan.');</script>";
                echo "<script>window.location.href = '../../users/website/page-absensi.php#Absensi';</script>";
            } else {
                echo "Error: " . $stmt_kehadiran->error;
            }

            $stmt_kehadiran->close();
        } else {
            echo "Error: " . $stmt_absensi->error;
        }

        $stmt_absensi->close();
    }
}

$database->close();
?>
