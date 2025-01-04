<?php
include 'koneksi.php'; // Pastikan koneksi ke database ada

// Ambil data dari form
$id_pemesan = $_POST['id_pemesan'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];
$metode_bayar = $_POST['metode_bayar'];


$query = "UPDATE data_pemesan SET 
    nama = '$nama', 
    email = '$email', 
    pesan = '$pesan', 
    metode_bayar = '$metode_bayar' 
    WHERE id_pemesan = $id_pemesan";

if (mysqli_query($conn, $query)) {
    echo "Data berhasil diupdate.";
    echo "<br><a href='tampil_data.php'>Kembali ke Data Pemesan</a>";
} else {
    echo "Gagal mengupdate data: " . mysqli_error($conn);
}
?>
