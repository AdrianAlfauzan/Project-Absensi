<?php
require "../../../config/koneksi.php";

$recordsPerPage = 5;

$halamanAktif = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$offset = ($halamanAktif - 1) * $recordsPerPage;

$totalRecordsQuery = "SELECT COUNT(*) as total FROM tabel_pengguna";
$totalRecordsResult = mysqli_query($database, $totalRecordsQuery);
$totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
$totalRecords = $totalRecordsRow['total'];

$jumlahHalaman = ceil($totalRecords / $recordsPerPage);

$query = "SELECT * FROM tabel_pengguna LIMIT $offset, $recordsPerPage";
$result = mysqli_query($database, $query);

$users = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

$database->close();
?>
