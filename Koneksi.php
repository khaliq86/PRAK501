<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";
$koneksi = mysqli_connect($servername, $username, $password, $dbname);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>