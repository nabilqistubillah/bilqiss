<form method="GET" action="">
    <input type="text" name="cari" placeholder="Cari nama atau email" value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
    <button type="submit">Cari</button>
</form>

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
                            <td>Rp {$row['total_harga']}</td>
                            <td>{$row['metode_bayar']}</td>
                            <td>{$row['waktu_pesan']}</td>
                            <td>
                                <a href='edit_data.php?id={$row['id_pemesan']}' class='button edit-button'>Edit</a>
                                <a href='hapus_data.php?id={$row['id_pemesan']}' class='button delete-button'>Hapus</a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


<?php
include 'koneksi.php';

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$query = "SELECT * FROM data_pemesan";
if (!empty($cari)) {
    $query .= " WHERE nama LIKE '%$cari%' OR email LIKE '%$cari%'";
}
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pemesan</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data Pemesan</h2>
    <table>
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
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_pemesan'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['pesan'] . "</td>";
                echo "<td>Rp " . number_format($row['total_harga'], 0, ',', '.') . "</td>";
                echo "<td>" . $row['metode_bayar'] . "</td>";
                echo "<td>" . $row['waktu_pesan'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Belum ada data pemesan.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>
