<?php
require "../../admin/config/logic-tampil-users.php";
require "../../admin/config/logic-delete-users.php";

foreach ($users as $user) {
    echo "<tr>";
    echo "<td class='py-2 px-4 border-b text-center'>" . $user['nama_pengguna'] . "</td>";
    $jobs = array(
        '1' => 'Pemerintahan',
        '2' => 'Polisi',
        '3' => 'EMS',
        '4' => 'Pedagang',
        '5' => 'Mekanik'
    );
    if (isset($jobs[$user['ID_pekerjaan']])) {
        echo "<td class='py-2 px-4 border-b text-center'>" . $jobs[$user['ID_pekerjaan']] . "</td>";
    } else {
        echo "<td class='py-2 px-4 border-b text-center'>Tidak Diketahui</td>";
    }
    echo "<td class='py-2 px-4 border-b text-center'>" . $user['jabatan_pengguna'] . "</td>";
    echo "<td class='py-2 px-4 border-b text-center'>" . $user['username'] . "</td>";
    echo "<td class='py-2 px-4 border-b text-center'>" . $user['confirm_password'] . "</td>";
    echo "<td class='py-2 px-4 border-b text-center item-center'>
            <form method='POST' action='../../admin/config/logic-delete-users.php' onsubmit='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>
                <input type='hidden' name='id_pengguna' value='" . $user['ID_pengguna'] . "'>
                <button type='submit' name='delete_user' class='bg-red-500 text-white px-2 py-1 rounded'>Delete</button>
            </form>
          </td>";
    echo "</tr>";
}
?>


