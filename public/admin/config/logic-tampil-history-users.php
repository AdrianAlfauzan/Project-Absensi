<?php
require "../../../config/koneksi.php";


$recordsPerPage = 5;

$halamanAktif = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$offset = ($halamanAktif - 1) * $recordsPerPage;

$totalRecordsQuery = "SELECT COUNT(*) as total FROM tabel_pengguna p INNER JOIN tabel_absensi a ON p.ID_pengguna = a.ID_pengguna";
$totalRecordsResult = mysqli_query($database, $totalRecordsQuery);
$totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
$totalRecords = $totalRecordsRow['total'];

$jumlahHalaman = ceil($totalRecords / $recordsPerPage);

$query = "SELECT pe.*, p.*, a.*, k.*
          FROM tabel_pengguna p
          INNER JOIN tabel_absensi a ON p.ID_pengguna = a.ID_pengguna
          LEFT JOIN tabel_kehadiran k ON a.ID_absensi = k.ID_absensi
          LEFT JOIN tabel_pekerjaan pe ON p.ID_pekerjaan = pe.ID_pekerjaan
          LIMIT $offset, $recordsPerPage";

$result = mysqli_query($database, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td class='py-2 px-4 border-b text-center'>" . $row['nama_pengguna'] . "</td>";
        $jobs = array(
            '1' => 'Pemerintahan',
            '2' => 'Polisi',
            '3' => 'EMS',
            '4' => 'Pedagang',
            '5' => 'Mekanik'
        );
        if (isset($jobs[$row['ID_pekerjaan']])) {
            echo "<td class='py-2 px-4 border-b text-center'>" . $jobs[$row['ID_pekerjaan']] . "</td>";
        } else {
            echo "<td class='py-2 px-4 border-b text-center'>Tidak Diketahui</td>";
        }
        echo "<td class='py-2 px-4 border-b text-center'>" . $row['jabatan_pengguna'] . "</td>";
        echo "<td class='py-2 px-4 border-b text-center'>" . $row['tanggal']  . "</td>";
        echo "<td class='py-2 px-4 border-b text-center'>" . date("H:i", strtotime($row['jam_masuk'])) . "</td>";
        echo "<td class='py-2 px-4 border-b text-center'>" . date("H:i", strtotime($row['jam_keluar'])) . "</td>";
        echo "<td class='py-2 px-4 border-b text-center'>" . $row['keterangan'] . "</td>";
        echo "<td class='py-2 px-4 border-b text-center'>
                <form method='POST' action='../../admin/config/logic-delete-history.php' onsubmit='return confirmDelete()'>
                    <input type='hidden' name='id_pengguna' value='" . $row['ID_pengguna'] . "'>
                    <input type='hidden' name='tanggal' value='" . $row['tanggal'] . "'>
                    <button type='submit' name='delete_history' class='bg-red-500 text-white px-2 py-1 rounded'>Delete</button>
                </form>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8' class='py-2 px-4 border-b text-center'>Tidak ada data tersedia.</td></tr>";
}

$database->close();
?>


<script>
function confirmDelete() {
    return confirm("Apakah yakin ingin menghapus?");
}
</script>
