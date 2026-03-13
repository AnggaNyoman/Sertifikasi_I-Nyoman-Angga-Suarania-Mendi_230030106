<?php
session_start();
require_once 'koneksi.php';
require_once 'includes/auth.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$filename = "laporan_anggota_".date('Y-m-d_H-i-s').".xls";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");

echo "<table border='1'>";
echo "<tr>
<th>ID</th>
<th>Nama</th>
<th>Alamat</th>
<th>No HP</th>
<th>Tanggal Gabung</th>
</tr>";

$sql = "SELECT * FROM anggota ORDER BY id DESC";
$result = $koneksi->query($sql);

while($row = $result->fetch_assoc()){

echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['nama']."</td>";
echo "<td>".$row['alamat']."</td>";
echo "<td>".$row['no_hp']."</td>";
echo "<td>".date('d-m-Y',strtotime($row['tanggal_gabung']))."</td>";
echo "</tr>";

}

echo "</table>";
exit;
?>