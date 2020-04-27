<?php
session_start();

if( !isset($_SESSION['id'])){
  header("Location: http://localhost/corona/about/index.php");
}
?>

<?php
include '../koneksi.php';

$sql = "SELECT * FROM suhu INNER JOIN pasien ON suhu.id_pasien=pasien.id_pasien
INNER JOIN petugas ON suhu.id_petugas=petugas.id_petugas ORDER BY suhu.tgl_periksa";

$res = mysqli_query($koneksi,$sql);

$pasien = array();

while($data = mysqli_fetch_assoc($res)){
    $pasien[] = $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/corona/aset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/corona/aset/fontawesome/css/all.min.css">
    <title>Data Pasien</title>
</head>
<body>
    
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand"><i class="fas fa-user-nurse"></i>Petugas: <?= $_SESSION['nama']?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse-text navbar-collapse" id="navbarNav" >
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/corona/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/corona/pasien/index.php">Data Pasien</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/corona/login/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<br><br><br>
<div class="container">
<h2><i class="fas fa-thermometer-half"></i>data suhu pasien</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal periksa</th>
      <th scope="col">Suhu</th>
      <th scope="col">Status</th>
      <th scope="col">Petugas</th>
      <th scope="col">Aksi</th>

    </tr>
  </thead>
  <tbody>
  <?php
         $no=1;
         foreach($pasien as $p){?>
          <tr>
            <th scope="row"><?=$no ?></th>
            <td><?= $p['nama_pasien']?></td>
            <td><?= $p['tgl_periksa']?></td>
            <td><?= $p['suhu']?></td>
            <td>
                <?php
                if($p['suhu']<=36)
                {
                echo '<h5><span class="badge badge-primary">normal</span></h5>';
                }else{
                echo '<h5><span class="badge badge-danger">waspada</span></h5>';
                }
                ?>
             </td>
            <td><?= $p['nama']?></td>
            <td>
                <a href="updatesuhu.php?id_suhu=<?= $p["id_suhu"];?>" class="badge badge-warning">Edit</a>
                <a href="hapussuhu.php?id_suhu=<?= $p["id_suhu"];?>" onclick="return confirm('Yakin ingin menghapus data?')" class="badge badge-danger">Hapus</a>
            </td>
          </tr>
    <?php
        $no++;}
     ?> 

  </tbody>
</table>
<a href="tambahsuhu.php"><button type="button" class="btn btn-outline-info" style="width:100%; height:40px">Tambah data Suhu</button></a>
</div>
<script src="http://localhost/corona/aset/jquery.js"></script>
<script src="http://localhost/corona/aset/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>