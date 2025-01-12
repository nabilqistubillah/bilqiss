<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'cofee_rizz');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID yang akan dihapus dari URL
if (isset($_GET['id'])) {
    $id_pemesan = $_GET['id'];

    // Query untuk menghapus data
    $query = "DELETE FROM data_pemesan WHERE id_pemesan = $id_pemesan";

    if ($conn->query($query) === TRUE) {
        // Redirect kembali ke tampil_data.php setelah berhasil menghapus
        header("Location: tampil_data.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
