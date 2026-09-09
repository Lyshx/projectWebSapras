<?php
include "koneksi.php";
if(isset($_POST['submit'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $stok_barang = $_POST['stok_barang'];
    $lokasi = $_POST['lokasi'];
    $query = "INSERT INTO barang (id_barang, nama_barang, jumlah, kondisi, stok_barang, lokasi) VALUES ('$id_barang', '$nama_barang', '$jumlah', '$kondisi', '$stok_barang', '$lokasi')";
    mysqli_query($koneksi, $query);
    header("Location: tampil.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Purchase Table</title>
</head>
<body>
    <h2>Flower Purchase Form</h2>
    <form action="" method="POST">
        <input type="text" name="id_barang" placeholder="ID Barang" required><br>
        <input type="text" name="nama_barang" placeholder="Nama Barang" required><br>
        <input type="text" name="jumlah" placeholder="Jumlah" required><br>
        <input type="text" name="kondisi" placeholder="Kondisi" required><br>
        <input type="text" name="stok_barang" placeholder="Stok Barang" required><br>
        <input type="text" name="lokasi" placeholder="Lokasi" required><br>
        <button type="submit" name="submit">Save</button>
    </form>
</body>
</html>