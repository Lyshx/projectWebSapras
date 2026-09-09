<?php
session_start();

if (!isset($_SESSION['peminjaman'])) {
    $_SESSION['peminjaman'] = [
        ["nama" => "Ahmad (X TKJ 1)", "barang" => "Infocus Epson Model X400", "tgl" => "2026-09-01", "status" => "Dipinjam"],
        ["nama" => "Siti Nurhaliza (XI RPL 2)", "barang" => "Set Alat Pel & Ember", "tgl" => "2026-09-02", "status" => "Dikembalikan"],
        ["nama" => "Rizky (XII TKR 3)", "barang" => "Kabel HDMI 10m", "tgl" => "2026-09-03", "status" => "Dipinjam"]
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_peminjam = htmlspecialchars($_POST['nama']);
    $nama_barang = htmlspecialchars($_POST['barang']);
    $tanggal = date("Y-m-d");

    $_SESSION['peminjaman'][] = [
        "nama" => $nama_peminjam,
        "barang" => $nama_barang,
        "tgl" => $tanggal,
        "status" => "Dipinjam"
    ];
    
    header("Location: index.php#daftar-peminjaman");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Sarpras - SMK 1 Maja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>SMK Negeri 1 Maja</h1>
    </header>

    <nav>
        <a href="#beranda">Kegunaan</a>
        <a href="#staff">Staff Sarpras</a>
        <a href="#inventaris">Daftar Alat</a>
        <a href="#peminjaman">Form Peminjaman</a>
        <a href="#daftar-peminjaman">Data Peminjaman</a>
    </nav>

    <div class="hero-banner">
        <h2>Sistem Informasi Sarpras</h2>
        <p>Layanan integrasi sarana belajar & fasilitas sekolah secara cepat dan transparan.</p>
    </div>

    <div class="container">
        
        <!-- Kegunaan Sarpras -->
        <section id="beranda">
            <h2>Kegunaan Sarpras di SMK 1 Maja</h2>
            <p>Divisi Sarana dan Prasarana (Sarpras) SMK 1 Maja memegang peranan krusial dalam menyediakan, memelihara, serta mengoptimalkan seluruh aset sekolah. Mulai dari penyediaan perangkat penunjang digital pembelajaran hingga kebersihan area kampus sekolah, Sarpras hadir untuk memastikan proses belajar-mengajar berlangsung aman dan nyaman.</p>
        </section>

        <!-- Staff Sarpras -->
        <section id="staff">
            <h2>Daftar Staff Tim Sarpras</h2>
            <div class="staff-grid">
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=11" alt="Drs. H. Maman Suparman">
                    <h3>Drs. H. Maman Suparman</h3>
                    <p>Kepala Tim Sarpras</p>
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=60" alt="Budi Santoso">
                    <h3>Budi Santoso, S.ST</h3>
                    <p>Penanggung Jawab Inventaris</p>
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=47" alt="Rina Kartika">
                    <h3>Rina Kartika</h3>
                    <p>Pengelola Peralatan Kebersihan</p>
                </div>

                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=47" alt="Rina Kartika">
                    <h3>Rina Kartika</h3>
                    <p>Pengelola Peralatan Kebersihan</p>    
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=47" alt="Rina Kartika">
                    <h3>Rina Kartika</h3>
                    <p>Pengelola Peralatan Kebersihan</p>    
                </div>
                <div class="staff-card">
                    <img src="https://i.pravatar.cc/150?img=47" alt="Rina Kartika">
                    <h3>Rina Kartika</h3>
                    <p>Pengelola Peralatan Kebersihan</p>    
                </div>
            </div>
        </section>

        <!-- Kartu Visual Inventaris -->
        <section id="inventaris">
            <h2>Peralatan Utama (Infocus & Kebersihan)</h2>
            <div class="inventory-grid">
                <div class="inventory-card">
                    <Image src="image_agent_tag_14008797723907526218" alt="Infocus Proyektor" caption="Infocus Epson X400" />
                    <div>
                        <h4>Infocus Epson X400</h4>
                        <p>Stok: 5 Unit (Tersedia)</p>
                    </div>
                </div>
                <div class="inventory-card">
                    <Image src="image_agent_tag_14008797723907523089" alt="Alat Kebersihan" caption="Set Kebersihan & Pel" />
                    <div>
                        <h4>Set Alat Pel & Ember</h4>
                        <p>Stok: 8 Set (Tersedia)</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Form Peminjaman -->
        <section id="peminjaman">
            <h2>Form Pengajuan Peminjaman</h2>
            <form action="index.php" method="POST" id="formPeminjaman">
                <label for="nama">Nama Peminjam:</label>
                <input type="text" id="nama" name="nama" placeholder="Contoh: Budi Santoso (XII TKR 1)" required>
                <label for="nama">Jam Peminjaman</label>
                <input type="text" id="nama" name="jam_peminjaman " placeholder="Contoh: 14:14" required>
                <label for="barang">Pilih Barang Inventaris:</label>
                <select id="barang" name="barang" required>
                    <option value="">-- Pilih Barang --</option>
                    <option value="Infocus Epson Model X400">Infocus Epson Model X400</option>
                    <option value="Kabel HDMI 10m">Kabel HDMI 10m</option>
                    <option value="Layar Proyektor Portable">Layar Proyektor Portable</option>
                    <option value="Set Alat Pel & Ember">Set Alat Pel & Ember</option>
                    <option value="Sapu & Pengki Set">Sapu & Pengki Set</option>
                </select>

                <button type="submit">Kirim Ajukan Peminjaman</button>
            </form>
        </section>

        <!-- Daftar Peminjaman + Fitur Pencarian Realtime -->
        <section id="daftar-peminjaman">
            <h2>Daftar Peminjaman Aktif</h2>
            <input type="text" id="searchPeminjaman" class="search-box" placeholder="Cari nama peminjam atau nama barang secara instan...">
            
            <table id="tabelPeminjaman">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Barang Dipinjam</th>
                        <th>Tanggal</th>
                        <th>Jam Peminjaman</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($_SESSION['peminjaman'] as $row): 
                        $badgeClass = ($row['status'] == 'Dipinjam') ? 'badge-dipinjam' : 'badge-dikembalikan';
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><strong><?= $row['nama']; ?></strong></td>
                        <td><?= $row['barang']; ?></td>
                        <td><?= $row['tgl']; ?></td>
                        <td><?= $row['jam_peminjaman']; ?></td>
                        <td><span class="badge <?= $badgeClass; ?>"><?= $row['status']; ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

    </div>

    <footer>
        <p>&copy; 2026 SMK Negeri 1 Maja — Tim Sarana dan Prasarana</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>