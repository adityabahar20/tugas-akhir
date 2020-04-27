<?php
session_start();

if( !isset($_SESSION['id'])){
  header("Location: http://localhost/corona/about/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="http://localhost/corona/aset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/corona/aset/fontawesome/css/all.min.css">
    <title>HOME</title>
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
        <a class="nav-link" href="index.php">Home</a>
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
<br><br><br><br>
<div class="card-deck">
  <div class="card">
    <img src="img/2.svg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">ODP(Orang Dalam Pemantauan)</h5>
      <p class="card-text">Orang yang mengalami gejala ringan, seperti demam, batuk, pilek, dan sakit tenggorokan.
Pada 14 hari terakir memiliki riwayat perjalanan ke negara yang menjadi tempat penyebaran virus corona atau melakukan kontak dengan kasus konfirmasi COVID-19 sehingga butuh pemantauan.</p>
    </div>

  </div>
  <div class="card">
    <img src="img/1.svg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">PDP(Pasien Dalam Pengawasan)</h5>
      <p class="card-text">Orang dengan gejala infeksi saluran pernapasan akut (ISPA), seperti demam yang disertai satu di antara gejala berikut, batuk, sesak napas, sakit tenggorokan, pilek, dan pneumonia ringan atau berat.
Pada 14 hari terakhir memiliki riwayat perjalanan ke negara yang menjadi tempat penyebaran virus corona atau melakukan kontak dengan kasus konfirmasi COVID-19.
PDP biasanya membutuhkan perawatan di rumah sakit.</p>
    </div>
 </div>

  <div class="card">
    <img src="img/5.svg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">OTG(Orang Tanpa Gejala)</h5>
      <p class="card-text">Seseorang yang tidak punya gejala, namu memiliki risiko tertular dari orang konfirmasi COVID-19. Biasanya orang tanpa gejala melakukan kontak fisik atau pernah seruangan (radius satu meter) dengan pasien dalam pengawasan atau konfirmasi.
Pada dua hari sebelum kasus timbul gejala sampai 14 hari setelah timbul kasus gejala.</p>
    </div>
  </div>


  <script src="http://localhost/corona/aset/jquery.js"></script>
 <script src="http://localhost/corona/aset/bootstrap/js/bootstrap.min.js"></script>

</div>
</body>
</html>