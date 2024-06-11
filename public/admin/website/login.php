<?php
require "../../../config/koneksi.php";
require "../config/logic-login.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-slate-700 h-screen flex items-center justify-center">
    <div class="w-full max-w-sm">
        <form class="form" action="" method="POST">
            <p class="form-heading">LOGIN ADMIN</p>
            <?php
            if (isset($_SESSION["error"])) {
                echo '<div class="alert alert-danger text-red-600">' . $_SESSION["error"] . '</div>';
                unset($_SESSION["error"]);
            }
            // if (isset($_SESSION["success"])) {
            // echo '<div class="alert alert-success">' . $_SESSION["success"] . '</div>';
            // unset($_SESSION["success"]);
            // }
            ?>
            <div class="form-field">
                <input required="" placeholder="Username" class="input-field" name="username_admin" type="text" />
            </div>

            <div class="form-field">
                <input required="" placeholder="Password" class="input-field" name="password_admin" type="password" />
            </div>

            <button class="sendMessage-btn mt-5 mb-10" type="submit" name="login_admin">LOGIN</button>
        </form>
    </div>
</body>

</html>