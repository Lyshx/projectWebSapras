<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sapras";

$koneksi = mysqli_connect($hostname, $username, $password, $dbname);

if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM barang";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Purchase Table</title>
</head>
<body>
    <section id="staff">
            <h2>Daftar Staff Sarpras</h2>
            <div class="staff-grid">
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=11" alt="Drs. H. Maman Suparman">
                    <h3>Budi Priatna, M.T </h3>
                    <p>Wakasek Bidang Sarpas</p>
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=60" alt="Budi Santoso">
                    <h3>Dede Ibrahim</h3>
                    <p>Staff Sapras Bidang Teknisi</p>
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=47" alt="Rina Kartika">
                    <h3>Lala Kusmala, S.Pd</h3>
                    <p>Staff Sapras Bidang Lingkungan</p>
                </div>

                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=47" alt="Rina Kartika">
                    <h3>Agus Santosa, S.T. M.T</h3>
                    <p>Staff Sapras Bidang Jaringan </p>    
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=47" alt="Rina Kartika">
                    <h3>Ade Ali Ridwan, S. Pd </h3>
                    <p>Staff Sapras Bidang Aset</p>    
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=47" alt="Rina Kartika">
                    <h3>Nanda Juanda Dipura Atmaja, S. Kom</h3>
                    <p>Staff Sapras Bidang Aset</p>    
                </div>
            </div>
        </section>


</body>
</html>


