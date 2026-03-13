<?php
session_start();
require_once 'koneksi.php';
require_once 'includes/auth.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM anggota WHERE id = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header('Location: index.php');
    exit;
}

$anggota = $result->fetch_assoc();

$error="";
$success="";

if($_POST){

    $nama = trim($_POST['nama']);
    $alamat = trim($_POST['alamat']);
    $no_hp = trim($_POST['no_hp']);

    if(empty($nama) || empty($alamat) || empty($no_hp)){

        $error="Semua field wajib diisi";

    }else{

        $update = "UPDATE anggota SET nama=?,alamat=?,no_hp=? WHERE id=?";
        $stmt = $koneksi->prepare($update);
        $stmt->bind_param("sssi",$nama,$alamat,$no_hp,$id);

        if($stmt->execute()){
            header("Location:index.php");
            exit;
        }else{
            $error="Gagal update data";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota - SIMAKO PRO</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', sans-serif; 
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #f1f5f9;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            background: rgba(30,41,59,0.95);
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            border: 1px solid #334155;
            width: 100%;
            max-width: 500px;
            backdrop-filter: blur(20px);
        }
        .header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        .header h1 {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }
        .header p {
            color: #94a3b8;
            font-size: 1rem;
        }
        .form-group {
            margin-bottom: 1.75rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 600;
            color: #f1f5f9;
            font-size: 0.95rem;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 1.25rem 1.5rem;
            border: 2px solid #475569;
            border-radius: 12px;
            font-size: 16px;
            background: #1e293b;
            color: #f1f5f9;
            transition: all 0.3s ease;
            font-family: inherit;
            resize: vertical;
        }
        .form-group textarea {
            min-height: 120px;
            font-size: 15px;
            line-height: 1.5;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59,130,246,0.2);
        }
        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #64748b;
        }
        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        .btn {
            flex: 1;
            padding: 1.25rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        .btn-primary {
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(59,130,246,0.4);
        }
        .btn-secondary {
            background: linear-gradient(45deg, #64748b, #475569);
            color: white;
            border: 1px solid #475569;
        }
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(100,116,139,0.4);
        }
        .alert {
            padding: 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.75rem;
            font-weight: 500;
        }
        .alert-success {
            background: rgba(34,197,94,0.2);
            border: 1px solid #22c55e;
            color: #86efac;
        }
        .alert-error {
            background: rgba(239,68,68,0.2);
            border: 1px solid #ef4444;
            color: #fca5a5;
        }
        .anggota-info {
            background: rgba(59,130,246,0.2);
            border: 1px solid #3b82f6;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            text-align: center;
        }
        .anggota-info h3 {
            color: #3b82f6;
            margin-bottom: 0.5rem;
        }
        @media (max-width: 768px) {
            .form-container {
                margin: 1rem;
                padding: 2rem 1.5rem;
            }
            .btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="header">
            <h1><i class="fas fa-user-edit"></i> Edit Anggota</h1>
            <p>ID: #<?= $anggota['id'] ?></p>
        </div>

        <?php if ($success): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-triangle" style="margin-right: 0.5rem;"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <div class="anggota-info">
            <h3><i class="fas fa-user"></i> <?= htmlspecialchars($anggota['nama']) ?></h3>
            <p style="color: #94a3b8; font-size: 0.95rem;">
                <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars(substr($anggota['alamat'], 0, 50)) ?>...
            </p>
        </div>

        <form method="POST">
            <input type="hidden" name="id" value="<?= $anggota['id'] ?>">
            
            <div class="form-group">
                <label><i class="fas fa-user" style="margin-right: 0.5rem;"></i>Nama Lengkap</label>
                <input type="text" 
                       name="nama" 
                       value="<?= htmlspecialchars($anggota['nama']) ?>"
                       placeholder="Masukkan nama lengkap"
                       required>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-map-marker-alt" style="margin-right: 0.5rem;"></i>Alamat</label>
                <textarea name="alamat" 
                          placeholder="Masukkan alamat lengkap"
                          required><?= htmlspecialchars($anggota['alamat']) ?></textarea>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-phone" style="margin-right: 0.5rem;"></i>No. HP</label>
                <input type="tel" 
                       name="no_hp"
                       value="<?= htmlspecialchars($anggota['no_hp']) ?>"
                       placeholder="08xxxxxxxxx"
                       pattern="[0-9]{10,13}"
                       required>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Data
                </button>
                <a href="index.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>
