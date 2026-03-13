<?php
session_start();

/* ===================================
   IMPLEMENTASI OOP UNTUK TUGAS
===================================*/

/* INTERFACE */
interface RepositoryInterface {
    public function create($data);
    public function read();
    public function update($id,$data);
    public function delete($id);
}

/* CLASS USER */
class User {

    /* PROPERTY + ACCESS MODIFIER */
    protected $username;

    /* CONSTRUCTOR */
    public function __construct($username="Admin") {
        $this->username = $username;
    }

    /* METHOD LOGIN */
    public function login() {
        return "Login sebagai User";
    }

    /* METHOD GET USERNAME */
    public function getUsername(){
        return $this->username;
    }
}

/* CLASS ADMIN (INHERITANCE) */
class Admin extends User implements RepositoryInterface {

    /* POLYMORPHISM (OVERRIDE METHOD) */
    public function login() {
        return "Login sebagai Admin : ".$this->username;
    }

    /* METHOD CRUD */

    public function create($data){
        return "Create data anggota";
    }

    public function read(){
        return "Read data anggota";
    }

    /* OVERLOADING SEDERHANA */
    public function update($id,$data,$status=null){

        if($status){
            return "Update data anggota dengan status";
        }

        return "Update data anggota";
    }

    public function delete($id){
        return "Delete data anggota";
    }
}

require_once 'koneksi.php';
require_once 'includes/auth.php';

/* MEMBUAT OBJECT ADMIN */
$admin = new Admin($_SESSION['username'] ?? "Admin");

/* CEK LOGIN */
if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

/* LOGOUT */
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

/* SEARCH */
$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";
$params = [];

if (!empty($search)) {
    $where = "WHERE nama LIKE ? OR alamat LIKE ? OR no_hp LIKE ?";
    $params = ["%$search%","%$search%","%$search%"];
}

/* QUERY DATABASE */
$sql = "SELECT * FROM anggota $where ORDER BY id DESC";
$stmt = $koneksi->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param("sss", ...$params);
}

$stmt->execute();
$hasil = $stmt->get_result();
$total = $hasil->num_rows;
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIMAKO PRO</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>

*{margin:0;padding:0;box-sizing:border-box;}

body{
font-family:'Inter',sans-serif;
background:#0f172a;
color:#f1f5f9;
min-height:100vh;
}

.container{
max-width:1400px;
margin:0 auto;
min-height:100vh;
background:linear-gradient(135deg,#1e293b,#334155);
display:flex;
flex-direction:column;
}

.header{
background:rgba(15,23,42,0.95);
padding:1.5rem 2rem;
border-bottom:1px solid #334155;
display:flex;
justify-content:space-between;
align-items:center;
}

.header h1{
font-size:1.75rem;
font-weight:700;
color:#3b82f6;
}

.user-info{
display:flex;
align-items:center;
gap:1rem;
}

.stats{
background:rgba(30,41,59,0.8);
padding:1.5rem 2rem;
border-bottom:1px solid #334155;
display:flex;
gap:2rem;
align-items:center;
flex-wrap:wrap;
}

.btn{
display:inline-flex;
align-items:center;
gap:0.5rem;
padding:0.75rem 1.5rem;
color:white;
text-decoration:none;
border-radius:8px;
font-weight:600;
font-size:0.95rem;
border:1px solid transparent;
cursor:pointer;
}

.btn-export{background:#10b981;}
.btn-primary{background:#3b82f6;}
.btn-logout{background:#ef4444;}

.search-container{
background:rgba(30,41,59,0.8);
padding:1.5rem 2rem;
border-bottom:1px solid #334155;
}

#searchBox{
width:100%;
max-width:450px;
padding:1rem;
border:2px solid #475569;
border-radius:8px;
font-size:16px;
background:#1e293b;
color:#f1f5f9;
}

.table-container{flex:1;overflow:auto;}

.content{
padding:2rem;
background:rgba(15,23,42,0.9);
flex:1;
}

table{
width:100%;
border-collapse:collapse;
background:#1e293b;
border-radius:12px;
overflow:hidden;
}

th{
background:#1e40af;
color:#f8fafc;
padding:1.25rem 1rem;
text-align:left;
}

td{
padding:1.25rem 1rem;
border-bottom:1px solid #334155;
}

tr:hover{
background:rgba(59,130,246,0.1);
}

.empty{
text-align:center;
padding:6rem 2rem;
color:#64748b;
}

.btn-small{padding:0.5rem 1rem;font-size:0.8rem;}
.btn-edit{background:#3b82f6;}
.btn-delete{background:#ef4444;}

.actions{display:flex;gap:0.5rem;}

</style>
</head>

<body>

<div class="container">

<div class="header">

<div>
<h1><i class="fas fa-layer-group"></i> SIMAKO PRO</h1>
<small style="color:#94a3b8"><?= $admin->login(); ?></small>
</div>

<div class="user-info">

<span><?= $_SESSION['username'] ?? 'Admin' ?></span>

<a href="?logout=1" class="btn btn-logout btn-small" onclick="return confirm('Yakin logout?')">
<i class="fas fa-sign-out-alt"></i> Logout
</a>

</div>

</div>

<?php
$all_total = mysqli_fetch_row(mysqli_query($koneksi,"SELECT COUNT(*) FROM anggota"))[0];
?>

<div class="stats">

<div>
<h2><i class="fas fa-users"></i> <?= $all_total ?></h2>
<div style="font-size:0.8rem;color:#94a3b8">Total Anggota</div>
</div>

<?php if($search): ?>

<div>
<h2><i class="fas fa-search"></i> <?= $total ?></h2>
<div style="font-size:0.8rem;color:#94a3b8">Hasil Pencarian</div>
</div>

<?php endif; ?>

<div style="margin-left:auto">

<a href="tambah.php" class="btn btn-primary">
<i class="fas fa-user-plus"></i> Tambah Anggota
</a>

<a href="export.php<?= $search ? '?search='.urlencode($search) : '' ?>" class="btn btn-export">
<i class="fas fa-file-excel"></i> Export
</a>

</div>

</div>

<div class="search-container">

<form method="GET">

<input type="text"
id="searchBox"
name="search"
placeholder="Cari nama • alamat • no HP..."
value="<?= htmlspecialchars($search) ?>">

<?php if($search): ?>
<br><a href="index.php" style="color:#ef4444;font-weight:600">✕ Clear</a>
<?php endif; ?>

</form>

</div>

<div class="content">

<div class="table-container">

<?php if($total==0): ?>

<div class="empty">
<h3><?= $search ? 'No results' : 'No data' ?></h3>
<p><?= $search ? 'Try different keyword' : 'Add first member' ?></p>
</div>

<?php else: ?>

<table>

<tr>
<th>ID</th>
<th>Nama</th>
<th>Alamat</th>
<th>HP</th>
<th>Tanggal Gabung</th>
<th></th>
</tr>

<?php while($row=$hasil->fetch_assoc()): ?>

<tr>

<td><strong>#<?= $row['id'] ?></strong></td>

<td><?= htmlspecialchars($row['nama']) ?></td>

<td><?= htmlspecialchars(substr($row['alamat'],0,40)) ?></td>

<td><?= $row['no_hp'] ?></td>

<td><?= date('d/m/Y',strtotime($row['tanggal_gabung'])) ?></td>

<td class="actions">

<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-small btn-edit">
<i class="fas fa-edit"></i>
</a>

<a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-small btn-delete"
onclick="return confirm('Hapus <?= htmlspecialchars($row['nama']) ?>?')">
<i class="fas fa-trash"></i>
</a>

</td>

</tr>

<?php endwhile; ?>

</table>

<?php endif; ?>

</div>

</div>

</div>

<script>

document.getElementById('searchBox').addEventListener('keypress',function(e){
if(e.key==='Enter'){this.form.submit();}
});

</script>

</body>
</html>