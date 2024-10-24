<?php
include 'functions.php'; // Sertakan file functions.php untuk koneksi dan fungsi update

// Cek apakah ID produk diberikan melalui URL dan apakah form telah dikirim
if (isset($_GET['id']) && isset($_POST['update_product'])) {
    $id_produk = intval($_GET['id']);
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = floatval($_POST['harga_produk']);
    $stok_produk = intval($_POST['stok_produk']);
    
    // Panggil fungsi untuk memperbarui produk
    updateProduct($id_produk, $nama_produk, $harga_produk, $stok_produk);
    
    // Redirect kembali ke halaman daftar produk setelah update
    header("Location: product_list.php");
    exit();
} else {
    // Jika data tidak lengkap, tampilkan pesan error
    echo "Data produk tidak lengkap.";
}
?>
