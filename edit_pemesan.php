<?php
include 'koneksi.php'; // Pastikan koneksi ke database ada

// Ambil ID dari URL
$id_pemesan = $_GET['id'];

// Query untuk mengambil data pemesan berdasarkan ID
$query = "SELECT * FROM data_pemesan WHERE id_pemesan = $id_pemesan";
$result = mysqli_query($conn, $query);

// Periksa apakah data ditemukan
if ($result) {
    $data = mysqli_fetch_assoc($result);
} else {
    echo "Data tidak ditemukan.";
    exit;
}
?>
