<?php
session_start();
//mendapatkan url
$id_menu = $_GET['id'];


if (isset($_SESSION['keranjang'][$id_menu])) {
    $_SESSION['keranjang'][$id_menu]+=1;
}
else {
    $_SESSION['keranjang'][$id_menu]=1;
}

echo "<script>alert('Sukses, Menu berhasil ditambahkan')</script>";
echo "<script>location='keranjang.php';</script>";
?>