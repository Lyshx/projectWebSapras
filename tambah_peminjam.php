<?php
include "koneksi.php";
if(isset($_POST['submit'])) {
    $id_peminjam = $_POST['id_peminjam'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam_pinjam = $_POST['jam_pinjam'];
    $jam_selesai = $_POST['jam_selesai'];
    $query = "INSERT INTO peminjam (id_peminjam, hari, tanggal, jam_pinjam, jam_selesai) VALUES ('$id_peminjam', '$hari', '$tanggal', '$jam_pinjam', '$jam_selesai')";
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
        <input type="text" name="id_peminjam" placeholder="ID Peminjam" required><br>
        <input type="text" name="hari" placeholder="Hari" required><br>
        <input type="text" name="tanggal" placeholder="Tanggal" required><br>
        <input type="text" name="jam_pinjam" placeholder="Jam Pinjam" required><br>
        <input type="text" name="jam_selesai" placeholder="Jam Selesai" required><br>
        <button type="submit" name="submit">Save</button>
        
    </form>
</body>
</html>