<?php
session_start();
require_once 'koneksi.php';
require_once 'includes/auth.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    $sql = "DELETE FROM anggota WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: index.php?success=hapus');
    } else {
        header('Location: index.php?error=hapus');
    }

} else {
    header('Location: index.php');
}

exit;
?>