<?php
session_start(); //hapus sesi
session_destroy(); //hapus data yang ada
header("Location: index.php");
exit();
?>
