<?php
$host_koneksi = "localhost:3307";
$username_koneksi = "root";
$password_koneksi = "";
$database_koneksi = "ecommerce";

$koneksi = mysqli_connect(
    $host_koneksi,
    $username_koneksi,
    $password_koneksi,
    $database_koneksi
);

if (!$koneksi) {
    die('Koneksi Error :' . mysqli_connect_error());
}
