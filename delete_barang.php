<?php
include "koneksi.php";
$id = $_GET ['id'];
$query = "DELETE FROM barang WHERE id='$id'";
mysqli_query ($koneksi, $query);
header ("location : tampil.php");
exit;
?>