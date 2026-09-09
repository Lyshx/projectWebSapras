<?php
session_start();

// Proteksi Halaman: Cek apakah user adalah admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.php");
    exit();
}

// Inisialisasi data peminjaman jika belum ada
if (!isset($_SESSION['peminjaman'])) {
    $_SESSION['peminjaman'] = [];
}

// Aksi Update Status (Ubah jadi Dikembalikan)
if (isset($_GET['action']) && $_GET['action'] === 'kembali' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if (isset($_SESSION['peminjaman'][$id])) {
        $_SESSION['peminjaman'][$id]['status'] = 'Dikembalikan';
    }
    header("Location: admin.php");
    exit();
}

// Aksi Hapus Data Peminjaman
if (isset($_GET['action']) && $_GET['action'] === 'hapus' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if (isset($_SESSION['peminjaman'][$id])) {
        array_splice($_SESSION['peminjaman'], $id, 1);
    }
    header("Location: admin.php");
    exit();
}

// Proses Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['is_admin']);
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Sarpras SMK 1 Maja</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .btn-action {
            padding: 6px 12px;
            font-size: 0.85rem;
            text-decoration: none;
            border-radius: 4px;
            color: white;
            font-weight: 600;
        }
        .btn-success { background-color: #16a34a; }
        .btn-danger { background-color: #dc2626; }
        .btn-logout { background-color: #e11d48; padding: 8px 16px; border-radius: 6px; text-decoration: none; color: white; font-weight: 600;}
    </style>
</head>
<body>

    <header>
        <h1>Panel Kelola Sarpras (Administrator)</h1>
    </header>

    <div class="container" style="margin-top: 30px;">
        
        <div class="admin-header">
            <h2>Kelola Data Peminjaman</h2>
            <div>
                <a href="index.php" style="margin-right: 15px; color: #2563eb; font-weight: 600;">Lihat Web utama</a>
                <a href="admin.php?action=logout" class="btn-logout">Logout</a>
            </div>
        </div>

        <input type="text" id="searchPeminjaman" class="search-box" placeholder="Cari data peminjaman...">

        <table id="tabelPeminjaman">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Barang Dipinjam</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($_SESSION['peminjaman'])): ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data peminjaman.</td>
                </tr>
                <?php else: ?>
                    <?php 
                    $no = 1;
                    foreach ($_SESSION['peminjaman'] as $index => $row): 
                        $badgeClass = ($row['status'] == 'Dipinjam') ? 'badge-dipinjam' : 'badge-dikembalikan';
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><strong><?= htmlspecialchars($row['nama']); ?></strong></td>
                        <td><?= htmlspecialchars($row['barang']); ?></td>
                        <td><?= $row['tgl']; ?></td>
                        <td><span class="badge <?= $badgeClass; ?>"><?= $row['status']; ?></span></td>
                        <td>
                            <?php if ($row['status'] === 'Dipinjam'): ?>
                                <a href="admin.php?action=kembali&id=<?= $index; ?>" class="btn-action btn-success" onclick="return confirm('Tandai barang sudah dikembalikan?')">Set Kembali</a>
                            <?php endif; ?>
                            <a href="admin.php?action=hapus&id=<?= $index; ?>" class="btn-action btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

    <script src="script.js"></script>
</body>
</html>