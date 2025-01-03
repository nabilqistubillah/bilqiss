<?php
$host = 'localhost';
$user = 'root';
$password = ''; // Jika tidak ada password, kosongkan saja
$database = 'cofee_rizz'; // Nama database Anda

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}
?>
