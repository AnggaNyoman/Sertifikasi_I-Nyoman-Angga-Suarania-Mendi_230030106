<?php
session_start();
require_once 'koneksi.php';
require_once 'includes/auth.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$success = $error = '';

if ($_POST) {

    $nama   = trim($_POST['nama']);
    $alamat = trim($_POST['alamat']);
    $no_hp  = trim($_POST['no_hp']);

    if (empty($nama) || empty($alamat) || empty($no_hp)) {

        $error = "Semua field wajib diisi!";

    } else {

        $sql = "INSERT INTO anggota (nama, alamat, no_hp, tanggal_gabung) VALUES (?, ?, ?, NOW())";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sss", $nama, $alamat, $no_hp);

        if ($stmt->execute()) {

            $success = "Anggota berhasil ditambahkan!";
            $_POST = array();

        } else {

            $error = "Gagal menyimpan data!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota - SIMAKO PRO</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; 
            background: #0f172a;
            color: #f1f5f9;
            min-height: 100vh;
        }
        .container { 
            max-width: 1400px; 
            margin: 0 auto; 
            padding: 2rem;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            min-height: 100vh;
        }
        .header { 
            background: rgba(15,23,42,0.95);
            padding: 1.5rem 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            border: 1px solid #334155;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 { font-size: 1.5rem; font-weight: 700; color: #3b82f6; }
        .btn-back { 
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.75rem 1.5rem; color: white; text-decoration: none;
            background: #6b7280; border: 1px solid #9ca3af; border-radius: 8px;
            font-weight: 600; transition: all 0.2s;
        }
        .btn-back:hover { background: #4b5563; transform: translateY(-1px); }
        
        .form-container {
            background: rgba(30,41,59,0.9);
            padding: 2.5rem;
            border-radius: 20px;
            border: 1px solid #334155;
            max-width: 600px;
            margin: 0 auto;
            backdrop-filter: blur(20px);
        }
        .form-title { 
            text-align: center; 
            margin-bottom: 2rem;
            font-size: 1.75rem;
            font-weight: 700;
            color: #f1f5f9;
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .form-group {
            margin-bottom: 1.75rem;
        }
        .form-group label {
            display: block; margin-bottom: 0.75rem;
            font-weight: 600; color: #f1f5f9;
        }
        .form-group input, .form-group textarea {
            width: 100%; padding: 1.25rem;
            border: 2px solid #475569; border-radius: 12px;
            font-size: 16px; background: #1e293b;
            color: #f1f5f9; transition: all 0.3s;
            font-family: inherit;
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none; border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59,130,246,0.2);
        }
        .form-group input::placeholder, .form-group textarea::placeholder {
            color: #64748b;
        }
        .form-group textarea { resize: vertical; min-height: 120px; }
        .info-auto {
            background: rgba(16,185,129,0.2);
            border: 1px solid #10b981; color: #86efac;
            padding: 1rem; border-radius: 12px;
            margin-bottom: 1.5rem; font-size: 0.9rem;
        }
        .btn-submit {
            width: 100%; padding: 1.25rem;
            background: linear-gradient(45deg, #10b981, #059669);
            color: white; border: none; border-radius: 12px;
            font-size: 1.1rem; font-weight: 700;
            cursor: pointer; transition: all 0.3s;
            margin-top: 1rem;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(16,185,129,0.4);
        }
        .success {
            background: rgba(16,185,129,0.2);
            border: 1px solid #10b981; color: #86efac;
            padding: 1rem; border-radius: 12px;
            margin-bottom: 1.5rem; text-align: center;
        }
        .error {
            background: rgba(239,68,68,0.2);
            border: 1px solid #ef4444; color: #fca5a5;
            padding: 1rem; border-radius: 12px;
            margin-bottom: 1.5rem; text-align: center;
        }
        @media (max-width: 768px) {
            .container { padding: 1rem; }
            .header, .form-container { padding: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-plus-circle"></i> Tambah Anggota</h1>
            <a href="index.php" class="btn-back">
                <i class="fas fa-arrow-left"></i> Dashboard
            </a>
        </div>

        <div class="form-container">
            <h2 class="form-title">Data Anggota Baru</h2>

            <!-- ✅ INFO TANGGAL OTOMATIS -->
            <div class="info-auto">
                <i class="fas fa-calendar-check"></i>
                Tanggal gabung akan <strong>otomatis terisi</strong> saat data disimpan (hari ini)
            </div>

            <?php if($success): ?>
                <div class="success">
                    <i class="fas fa-check-circle"></i> <?= $success ?>
                </div>
            <?php endif; ?>

            <?php if($error): ?>
                <div class="error">
                    <i class="fas fa-exclamation-triangle"></i> <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label><i class="fas fa-user"></i> Nama Lengkap <span style="color: #10b981;">*</span></label>
                    <input type="text" name="nama" placeholder="Masukkan nama lengkap" required 
                           value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label><i class="fas fa-map-marker-alt"></i> Alamat Lengkap <span style="color: #10b981;">*</span></label>
                    <textarea name="alamat" placeholder="Masukkan alamat lengkap" required><?= htmlspecialchars($_POST['alamat'] ?? '') ?></textarea>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-phone"></i> No. HP <span style="color: #10b981;">*</span></label>
                    <input type="tel" name="no_hp" placeholder="081234567890" required 
                           value="<?= htmlspecialchars($_POST['no_hp'] ?? '') ?>">
                </div>

                <!-- ✅ HIDDEN TANGGAL GABUNG (OTOMATIS) -->
                <input type="hidden" name="tanggal_gabung" value="<?= date('Y-m-d H:i:s') ?>">

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> SIMPAN ANGGOTA BARU
                </button>
            </form>
        </div>
    </div>
</body>
</html>
