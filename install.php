<?php
// Konfigurasi database
$host = 'localhost'; // atau alamat server database Anda
$user = 'root'; // username database
$password = ''; // password database
$dbname = 'jualkan'; // ganti dengan nama database Anda

// Membuat koneksi ke MySQL
$conn = new mysqli($host, $user, $password);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Membuat database jika belum ada
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database '$dbname' berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Menggunakan database yang baru dibuat
$conn->select_db($dbname);

// SQL untuk membuat tabel produk
$sql_produk = "CREATE TABLE produk (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    stok INT(11) NOT NULL,
    tanggal_pembelian DATE
)";


// SQL untuk membuat tabel penjualan
$sql_penjualan = "CREATE TABLE IF NOT EXISTS penjualan (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    id_produk INT(11) NOT NULL,
    jumlah INT(11) NOT NULL,
    total_harga DECIMAL(10, 2) NOT NULL,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_produk) REFERENCES produk(id)
)";

// Eksekusi query untuk membuat tabel
if ($conn->query($sql_produk) === TRUE) {
    echo "Tabel produk berhasil dibuat.<br>";
} else {
    echo "Error creating table produk: " . $conn->error . "<br>";
}

if ($conn->query($sql_penjualan) === TRUE) {
    echo "Tabel penjualan berhasil dibuat.<br>";
} else {
    echo "Error creating table penjualan: " . $conn->error . "<br>";
}

// Tutup koneksi
$conn->close();
?>
