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
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>
<form method="post">
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $data['email'] ?>"><br>
    Pesanan: <input type="text" name="pesanan" value="<?= $data['pesan'] ?>"><br>
    Total Harga: <input type="number" name="total_harga" value="<?= $data['total_harga'] ?>"><br>
    Metode Bayar: 
    <select name="metode_bayar">
        <option value="COD" <?= $data['metode_bayar'] == 'COD' ? 'selected' : '' ?>>COD</option>
        <option value="Transfer" <?= $data['metode_bayar'] == 'Transfer' ? 'selected' : '' ?>>Transfer</option>
    </select><br>
    <button type="submit" name="update">Update</button>
</form>
