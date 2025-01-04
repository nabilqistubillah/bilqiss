
<?php
include 'koneksi.php'; 

// mengambil ID dari URL
$id_pemesan = $_GET['id'];


$query = "SELECT * FROM data_pemesan WHERE id_pemesan = $id_pemesan";
$result = mysqli_query($conn, $query);


if ($result) {
    $data = mysqli_fetch_assoc($result);
} else {
    echo "Data tidak ditemukan.";
    exit;
}
?>
