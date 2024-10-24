<?php
include 'db.php'; // Sertakan file koneksi

// Fungsi untuk menambahkan produk
function addProduct($nama, $harga, $stok) {
    $conn = getConnection();
    
    // Mencegah SQL Injection
    $nama = $conn->real_escape_string($nama);
    $harga = floatval($harga);
    $stok = intval($stok);
    
    $sql = "INSERT INTO produk (nama, harga, stok) VALUES ('$nama', $harga, $stok)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Produk berhasil ditambahkan.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    closeConnection($conn);
}

// Fungsi untuk mencatat penjualan
function recordSale($id_produk, $jumlah) {
    $conn = getConnection();
    
    // Mencegah SQL Injection
    $id_produk = intval($id_produk);
    $jumlah = intval($jumlah);
    
    // Ambil harga dan stok produk
    $result = $conn->query("SELECT harga, stok FROM produk WHERE id = $id_produk");
    
    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
        
        // Cek apakah stok cukup
        if ($product['stok'] >= $jumlah) {
            $total_harga = $product['harga'] * $jumlah;
            $sql = "INSERT INTO penjualan (id_produk, jumlah, total_harga) VALUES ($id_produk, $jumlah, $total_harga)";
            
            if ($conn->query($sql) === TRUE) {
                // Kurangi stok produk
                $new_stok = $product['stok'] - $jumlah;
                $conn->query("UPDATE produk SET stok = $new_stok WHERE id = $id_produk");
                echo "Penjualan berhasil dicatat.<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Stok tidak cukup untuk produk ini.<br>";
        }
    } else {
        echo "Produk tidak ditemukan.<br>";
    }

    // closeConnection($conn);
}

// Fungsi untuk menghitung total pendapatan
function getTotalRevenue() {
    $conn = getConnection();
    
    $sql = "SELECT SUM(total_harga) AS total_revenue FROM penjualan";
    $result = $conn->query($sql);
    
    if ($result) {
        $data = $result->fetch_assoc();
        return $data['total_revenue'] ? $data['total_revenue'] : 0; // Mengembalikan 0 jika tidak ada penjualan
    } else {
        return 0;
    }

    closeConnection($conn);
}

// Fungsi untuk menghitung total pengeluaran
function getTotalExpenses() {
    $conn = getConnection();
    
    $sql = "SELECT SUM(total_harga) AS total_expenses FROM penjualan";
    $result = $conn->query($sql);
    
    if ($result) {
        $data = $result->fetch_assoc();
        return $data['total_expenses'] ? $data['total_expenses'] : 0; // Mengembalikan 0 jika tidak ada penjualan
    } else {
        return 0;
    }

    closeConnection($conn);
}

// Fungsi untuk mendapatkan semua produk dan stoknya
function getAllProducts() {
    $conn = getConnection();
    $sql = "SELECT * FROM produk";
    $result = $conn->query($sql);
    
    $products = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row; // Menyimpan data produk ke dalam array
        }
    }

    // closeConnection($conn);
    return $products;
}


