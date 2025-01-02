<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
        }
        .container h1 {
            color: #28a745;
            margin-bottom: 10px;
        }
        .container p {
            color: #6c757d;
            margin: 0;
        }
        .btn {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pemesanan Berhasil!</h1>
        <p>Terima kasih telah memesan di Cofee Rizz.</p>
        <p>Kami akan memproses pesanan Anda segera.</p>
        <a href="index.html" class="btn">Kembali ke Beranda</a>
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
