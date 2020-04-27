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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/corona/aset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/corona/aset/fontawesome/css/all.min.css">
    <title>Data Pasien</title>
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand">About</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse-text navbar-collapse" id="navbarNav" >
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/corona/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pasien.php">Data Pasien</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/corona/login/index.php">Login</a>
      </li>
    </ul>
  </div>
</nav>
<br><br><br>
<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Pasien</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Umur</th>
      <th scope="col">alamat</th>
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
          </tr>
    <?php
        $no++;}
     ?> 

  </tbody>
</table>
</div>
<script src="http://localhost/corona/aset/jquery.js"></script>
<script src="http://localhost/corona/aset/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

