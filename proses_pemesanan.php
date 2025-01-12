<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <link rel="stylesheet" href="styless.css"> <!-- Tambahkan CSS eksternal -->
</head>
<body>
    <div class="confirmation-container">
        <div class="confirmation-box">
            <h1 class="success-title">Pesanan Berhasil!</h1>
            <p class="success-message">Terima kasih telah memesan di Cofee Rizz. Kami akan memproses pesanan Anda segera.</p>
            <p class="success-note">Pesanan Anda berhasil disimpan!</p>
            <div class="button-container">
                <a href="tampil_data.php" class="action-button">Data Pemesan</a>
                <a href="index.php" class="action-button primary-button">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
</html>


<?php

// Konfigurasi koneksi ke database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database-mu
$password = ""; // Sesuaikan dengan password database-mu
$dbname = "cofee_rizz"; // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari form
$nama = $_POST['name'];
$email = $_POST['email'];
$pesan = isset($_POST['message']) ? $_POST['message'] : ''; // Pesan opsional
$menu_harga = $_POST['menu_harga'];
$metode_bayar = $_POST['payment_method'];
$total_harga = floatval($menu_harga); // Konversi harga ke float

// Query untuk memasukkan data ke tabel
$sql = "INSERT INTO data_pemesan (nama, email, pesan, total_harga, metode_bayar)
        VALUES ('$nama', '$email', '$pesan', '$total_harga', '$metode_bayar')";

if ($conn->query($sql) === TRUE) {
    echo "Pesanan Anda berhasil disimpan!";
    // Redirect ke halaman lain jika perlu, misalnya:
    // header("Location: sukses.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if (isset($_POST['menu_harga']) && isset($_POST['payment_method'])) {
    $menu_harga = $_POST['menu_harga'];
    $payment_method = $_POST['payment_method'];
} else {
    echo "Error: Data tidak lengkap!";
    exit;
}


// Tutup koneksi
$conn->close();
?>
