<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pemesan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 20px;
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-link {
            text-align: center;
            margin-top: 15px;
        }
        .back-link a {
            text-decoration: none;
            color: #007bff;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Pemesan</h2>
        <?php
        include 'koneksi.php'; // Pastikan koneksi database
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM data_pemesan WHERE id_pemesan = $id";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($result);
        }
        if (isset($_POST['update'])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $pesanan = $_POST['pesanan'];
            $total_harga = $_POST['total_harga'];
            $metode_bayar = $_POST['metode_bayar'];

            $updateQuery = "UPDATE data_pemesan SET 
                            nama='$nama', 
                            email='$email', 
                            pesan='$pesanan', 
                            total_harga='$total_harga', 
                            metode_bayar='$metode_bayar' 
                            WHERE id_pemesan=$id";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Data berhasil diupdate!";
                header("Location: tampil_data.php"); // Redirect kembali ke halaman data
                exit();
            } else {
                echo "Gagal mengupdate data: " . mysqli_error($conn);
            }
        }
        ?>
        <form method="post">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= $data['email'] ?>" required>
            
            <label for="pesanan">Pesanan</label>
            <input type="text" id="pesanan" name="pesanan" value="<?= $data['pesan'] ?>" required>
            
            <label for="total_harga">Total Harga</label>
            <input type="number" id="total_harga" name="total_harga" value="<?= $data['total_harga'] ?>" required>
            
            <label for="metode_bayar">Metode Bayar</label>
            <select id="metode_bayar" name="metode_bayar" required>
                <option value="COD" <?= $data['metode_bayar'] == 'COD' ? 'selected' : '' ?>>COD</option>
                <option value="Transfer" <?= $data['metode_bayar'] == 'Transfer' ? 'selected' : '' ?>>Transfer</option>
            </select>
            
            <button type="submit" name="update">Update</button>
        </form>
        <div class="back-link">
            <a href="tampil_data.php">Kembali ke Data Pemesan</a>
        </div>
    </div>
</body>
</html>
