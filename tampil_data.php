<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <h1 class="title">Data Pemesan</h1>
        <form method="get" action="tampil_data.php" class="search-form">
            <input type="text" name="cari" placeholder="Cari nama pemesan..." class="search-input">
            <button type="submit" class="search-button">Cari</button>
        </form>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesanan</th>
                    <th>Total Harga</th>
                    <th>Metode Bayar</th>
                    <th>Waktu Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $query = "SELECT * FROM data_pemesan";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['id_pemesan']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['pesan']}</td>
                        <td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>
                        <td>{$row['metode_bayar']}</td>
                        <td>{$row['waktu_pesan']}</td>
                        <td>
                            <a href='edit_data.php?id={$row['id_pemesan']}' class='button edit-button'>Edit</a>
                            <a href='hapus_data.php?id={$row['id_pemesan']}' class='button delete-button'>Hapus</a>
                        </td>
                    </tr>";
                } ?>
            </tbody>
        </table>
    </div>

</body>
</html>

<?php
mysqli_close($conn);
?>
