<?php
session_start();

if( !isset($_SESSION['id'])){
  header("Location: http://localhost/corona/about/index.php");
}
?>
<?php
include '../koneksi.php';

$sql = "SELECT * FROM pasien ORDER BY nama_pasien";

$res = mysqli_query($koneksi,$sql);

$pasien = array();

while($data = mysqli_fetch_assoc($res)){
    $pasien[] = $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
        <a class="nav-link" href="../index.php">Home</a>
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
<h1><i class="fas fa-address-card"></i>Data Pasien
<a href="tambah.php"><button type="button" class="btn btn-outline-success" style="width:100%; height:40px">Tambah Data Pasien</button></a>
</h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Pasien</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Umur</th>
      <th scope="col">Alamat</th>
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
            <td><?= $p['jenis_kelamin']?></td>
            <td><?= $p['umur']?></td>
            <td><?= $p['alamat']?></td>
            <td>
                <a href="edit.php?id_pasien=<?= $p["id_pasien"];?>" class="badge badge-warning">Edit</a>
                <a href="hapus.php?id_pasien=<?= $p["id_pasien"];?>" onclick="return confirm('Yakin ingin menghapus data?')" class="badge badge-danger">Hapus</a>
            </td>
          </tr>
    <?php
        $no++;}
     ?> 

  </tbody>
</table>
<a href="ceksuhu.php"><button type="button" class="btn btn-outline-info" style="width:100%; height:40px">Cek Suhu</button></a>
</div>
<script src="http://localhost/corona/aset/jquery.js"></script>
<script src="http://localhost/corona/aset/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
