<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesan</title>
</head>
<body>
    <h2>Edit Data Pemesan</h2>
    <form action="edit_pemesan.php" method="POST">
        <input type="hidden" name="id_pemesan" value="<?php echo $data['id_pemesan']; ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $data['email']; ?>" required><br>

        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" required><?php echo $data['pesan']; ?></textarea><br>

        <label for="metode_bayar">Metode Bayar:</label>
        <select id="metode_bayar" name="metode_bayar" required>
            <option value="COD" <?php if ($data['metode_bayar'] == 'COD') echo 'selected'; ?>>COD</option>
            <option value="Transfer" <?php if ($data['metode_bayar'] == 'Transfer') echo 'selected'; ?>>Transfer</option>
        </select><br>

        <button type="submit">Update Data</button>
    </form>
</body>
</html>

