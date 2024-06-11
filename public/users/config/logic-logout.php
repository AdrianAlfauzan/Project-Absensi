<?php
session_start();
session_unset();
session_destroy();
header("Location: ../../users/website/index.php");
exit;
?>
