<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    echo "<h1>Pesanan Anda</h1>";
    echo "<p>Nama: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Pesan: $message</p>";
} else {
    echo "Tidak ada data yang dikirim.";
}
?>
