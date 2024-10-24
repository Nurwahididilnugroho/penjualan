<?php
// Konfigurasi database
$host = 'localhost'; // atau alamat server database Anda
$user = 'root'; // username database
$password = ''; // password database
$dbname = 'jualkan'; // ganti dengan nama database Anda

// Fungsi untuk menghubungkan ke database
function getConnection() {
    global $host, $user, $password, $dbname;
    
    // Membuat koneksi
    $conn = new mysqli($host, $user, $password, $dbname);
    
    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    
    return $conn;
}

