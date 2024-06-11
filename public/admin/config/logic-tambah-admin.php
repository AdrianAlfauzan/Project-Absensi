<?php
require "../../../config/koneksi.php";

if (isset($_POST["tambah_admin"])) {
    $nama_admin = mysqli_real_escape_string($database, $_POST["nama_admin"]);
    $username_admin = mysqli_real_escape_string($database, $_POST["username_admin"]);
    $password_admin = mysqli_real_escape_string($database, $_POST["password_admin"]);

    if (empty($nama_admin) || empty($username_admin) || empty($password_admin)) {
        echo "<script>
                alert('Semua kolom harus diisi.');
                window.location.href = '../../admin/website/index.php#tambahAdmin';
              </script>";
    } else {
        $check_username_query = "SELECT * FROM tabel_admin WHERE username_admin = '$username_admin'";
        $result = mysqli_query($database, $check_username_query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>
                    alert('Username sudah digunakan. Silakan gunakan username lain.');
                    window.location.href = '../../admin/website/index.php#tambahAdmin';
                  </script>";
        } else {
            // Hash the password before storing it
            // $hashed_password = password_hash($password_admin, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO tabel_admin (nama_admin, username_admin, password_admin) VALUES ('$nama_admin', '$username_admin', '$password_admin')";

            if (mysqli_query($database, $insert_query)) {
                echo "<script>
                        alert('Admin berhasil ditambahkan. Silakan login.');
                        window.location.href = '../../admin/website/index.php#tambahAdmin';
                      </script>";
            } else {
                echo "<script>
                        alert('Terjadi kesalahan saat melakukan Penambahan Admin.');
                        window.location.href = '../../admin/website/index.php#tambahAdmin';
                      </script>";
            }
        }
    }
}
?>
