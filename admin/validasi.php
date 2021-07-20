<?php
session_start();
if ($_SESSION['status'] != "login") {
        echo "<script>alert('Lakukan Prosedur Login Terlebih Dahulu') </script>";
        Header("Location: ../login.php");
    }
?>