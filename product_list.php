<?php
include 'functions.php'; // Sertakan file fungsi

// Mendapatkan semua produk
$products = getAllProducts();

// Menangani permintaan untuk menambah stok
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_stock'])) {
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    // $tanggal = $_POST['tanggal'];
    // addStock($id_produk, $jumlah, );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            margin:auto;
            width: 1000px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 30px;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #27ae60;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type="number"],
        input[type="date"] {
            padding: 8px;
            font-size: 14px;
            width: 100px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 5px;
        }

        button {
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            background-color: #2980b9;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #3498db;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #2980b9;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <h1>Daftar Produk</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['nama']; ?></td>
                    <td>Rp <?php echo number_format($product['harga'], 2, ',', '.'); ?></td>
                    <td><?php echo $product['stok']; ?></td>
                    <td>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="id_produk" value="<?php echo $product['id']; ?>">
                            <input type="number" name="jumlah" placeholder="Jumlah" required>
                            <input type="date" name="tanggal" required>
                            <button type="submit" name="add_stock">Tambah Stok</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php">Kembali ke Halaman Utama</a>
</body>
</html>
