<?php

$koneksi = mysqli_connect("localhost", "root", "", "projectWebSapras");

if (mysqli_connect_errno()) {
    echo "Gagal koneksi ke databse";
} else {
    echo "Berhasil koneksi ke database";
}

$main_url = "http://localhost/projectWebSapras/";
?>