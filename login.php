<?php
session_start();
require_once 'includes/auth.php';

if (isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$error = "";

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (login($username,$password)) {

        header('Location:index.php');
        exit;

    } else {

        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIMAKO PRO</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; 
            background: #0f172a;
            color: #f1f5f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            background: rgba(30,41,59,0.95);
            padding: 3rem 2.5rem;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            border: 1px solid #334155;
            width: 100%;
            max-width: 420px;
            backdrop-filter: blur(20px);
        }
        .logo {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        .logo h1 {
            font-size: 2.25rem;
            font-weight: 800;
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.75rem;
        }
        .logo p {
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
        }
        .form-group input {
            width: 100%;
            padding: 1.25rem 1.5rem;
            border: 2px solid #475569;
            border-radius: 12px;
            font-size: 16px;
            background: #1e293b;
            color: #f1f5f9;
            transition: all 0.3s ease;
            font-family: inherit;
        }
        .form-group input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59,130,246,0.2);
        }
        .form-group input::placeholder {
            color: #64748b;
        }
        .btn-login {
            width: 100%;
            padding: 1.25rem 1.5rem;
            background: linear-gradient(45deg, #3b82f6, #1d4ed8);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(59,130,246,0.4);
        }
        .error {
            background: rgba(239,68,68,0.2);
            border: 1px solid #ef4444;
            color: #fca5a5;
            padding: 1rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        .credentials {
            background: rgba(59,130,246,0.2);
            border: 1px solid #3b82f6;
            color: #93c5fd;
            padding: 1.25rem;
            border-radius: 12px;
            margin-top: 1.75rem;
            text-align: center;
            font-size: 0.9rem;
        }
        .credentials code {
            background: rgba(59,130,246,0.3);
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            font-weight: 600;
        }
        @media (max-width: 768px) {
            .login-card { padding: 2rem 1.5rem; margin: 1rem 0; }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo">
            <h1><i class="fas fa-layer-group"></i> SIMAKO PRO</h1>
            <p>Sistem Manajemen Anggota Koperasi</p>
        </div>

        <?php if ($error): ?>
            <div class="error">
                <i class="fas fa-exclamation-triangle" style="margin-right: 0.5rem;"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label><i class="fas fa-user" style="margin-right: 0.5rem;"></i> Username</label>
                <input type="text" 
                       name="username" 
                       placeholder="admin"
                       value="<?= htmlspecialchars($_POST['username'] ?? 'admin') ?>"
                       required autocomplete="username">
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-lock" style="margin-right: 0.5rem;"></i> Password</label>
                <input type="password" 
                       name="password" 
                       placeholder="admin123"
                       required autocomplete="current-password">
            </div>
            
            <button type="submit" name="login" class="btn-login">
                <i class="fas fa-sign-in-alt" style="margin-right: 0.5rem;"></i>
                MASUK KE DASHBOARD
            </button>
        </form>

        <div class="credentials">
            <strong>Akun Default:</strong><br>
            Username: <code>admin</code><br>
            Password: <code>admin123</code>
        </div>
    </div>
</body>
</html>
