<?php
include "koneksi.php";
$id =$_GET['id'];
// var_dump ($id)
if (isset($_POST['submit'])){
    $id_peminjam = $_POST['id_peminjam'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam_pinjam = $_POST['jam_pinjam'];
    $jam_selesai = $_POST['jam_selesai'];

    $query = "UPDATE peminjam SET id_peminjam='$id_peminjam', hari='$hari', tanggal='$tanggal', jam_pinjam='$jam_pinjam', jam_selesai='$jam_selesai' WHERE id = '$id'";
    mysqli_query($koneksi,$query);
    header ("location: index.php");
    exit;
}
$query_lama = "SELECT * FROM peminjam WHERE id = '$id'";
$hasil_lama = mysqli_query  ($koneksi,$query_lama);
$data = mysqli_fetch_assoc ($hasil_lama);
// var_dump($lama)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sepatu</title>
</head>
<body>
    <form action = "" method = "POST">
        <input type = "text" name = "id_peminjam"
        value = "<?php echo $data ['id_peminjam'];?>">
        <input type = "text" name = "hari"
        value = "<?php echo $data ['hari'];?>">
        <input type = "text" name = "tanggal"
        value = "<?php echo $data ['tanggal'];?>">
        <input type = "text" name = "jam_pinjam"
        value = "<?php echo $data ['jam_pinjam'];?>">
        <input type = "text" name = "jam_selesai"
        value = "<?php echo $data ['jam_selesai'];?>">
        <button type = "submit" name = "submit">update</button>
</form>
</body>
</html>