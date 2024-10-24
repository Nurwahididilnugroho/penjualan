<?php
include 'functions.php'; // Sertakan file fungsi

// Contoh menambahkan produk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    addProduct($nama, $harga, $stok);
}

// Contoh mencatat penjualan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['record_sale'])) {
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    recordSale($id_produk, $jumlah);
}

// Mendapatkan total pendapatan dan pengeluaran
$total_revenue = getTotalRevenue();
$total_expenses = getTotalExpenses();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Penjualan</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            text-align: center;
            color: #2c3e50;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        button {
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #27ae60;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin:auto;
        }

        button:hover {
            background-color: #2ecc71;
        }

        a {
            color: #2980b9;
            text-decoration: none;
            font-size: 16px;
            display: inline-block;
            margin-top: 20px;
            text-align: center;
        }

        a:hover {
            text-decoration: underline;
        }

        .total {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            padding: 10px;
            background-color: #ecf0f1;
            border-radius: 5px;
        }

        .total h2 {
            margin: 0;
            font-size: 18px;
            color: #27ae60;
        }

        div {
            width: 600px;
            margin:auto;
        }
    </style>
</head>
<body>
    <div>
    <h1>Aplikasi Penjualan</h1>

    <h2>Total Pendapatan: Rp <?php echo number_format($total_revenue, 2, ',', '.'); ?></h2>
    <h2>Total Pengeluaran: Rp <?php echo number_format($total_expenses, 2, ',', '.'); ?></h2>

    <h2>Tambah Produk</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Produk" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="number" name="stok" placeholder="Stok" required>
        <button type="submit" name="add_product">Tambah Produk</button>
    </form>

    <h2>Catat Penjualan</h2>
    <form method="POST">
        <input type="number" name="id_produk" placeholder="ID Produk" required>
        <input type="number" name="jumlah" placeholder="Jumlah" required>
        <button type="submit" name="record_sale">Catat Penjualan</button>
    </form>

    <h2><a href="product_list.php">Lihat Daftar Produk</a></h2>
    </div>
</body>
</html>
