<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <h1 class="title">Data Pemesan</h1>
        <form method="get" action="tampil_data.php" class="search-form">
            <input type="text" name="cari" placeholder="Cari nama pemesan..." class="search-input" value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
            <button type="submit" class="search-button">Cari</button>
        </form>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesanan</th>
                    <th>Metode Bayar</th>
                    <th>Waktu Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Masukkan koneksi ke database
                include 'koneksi.php';

                // Tangkap parameter pencarian
                $cari = isset($_GET['cari']) ? $_GET['cari'] : '';

                // Query berdasarkan parameter pencarian
                if (!empty($cari)) {
                    $query = "SELECT * FROM data_pemesan WHERE nama LIKE '%$cari%'";
                } else {
                    $query = "SELECT * FROM data_pemesan";
                }

                // Eksekusi query
                $result = mysqli_query($conn, $query);

                // Periksa apakah ada data yang ditemukan
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['id_pemesan']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['pesan']}</td>
                            <td>{$row['metode_bayar']}</td>
                            <td>{$row['waktu_pesan']}</td>
                            <td>
                                <a href='edit_data.php?id={$row['id_pemesan']}' class='button edit-button'>Edit</a>
                                <a href='hapus_data.php?id={$row['id_pemesan']}' class='button delete-button'>Hapus</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data ditemukan</td></tr>";
                }

                // Tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
