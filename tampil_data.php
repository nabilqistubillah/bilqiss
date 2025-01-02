<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "cofee_rizz");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query data pemesan
$sql = "SELECT * FROM data_pemesan";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesan</title>
    <link rel="stylesheet" href="styles.css"> <!-- Gunakan file CSS untuk desain -->
</head>
<body>
    <h1>Data Pemesan</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesanan</th>
            <th>Total Harga</th>
            <th>Metode Bayar</th>
            <th>Waktu Pesan</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_pemesan']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['pesan']}</td>
                        <td>{$row['total_harga']}</td>
                        <td>{$row['metode_bayar']}</td>
                        <td>{$row['waktu_pesan']}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data pemesan</td></tr>";
        }
        $koneksi->close();
        ?>
    </table>
</body>
</html>
