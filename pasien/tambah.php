<?php
session_start();

if( !isset($_SESSION['id'])){
  header("Location: http://localhost/corona/about/index.php");
}
?>
<?php

include '../koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_pasien'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO pasien VALUES('','$nama','$jenis_kelamin','$umur','$alamat')";

    $res = mysqli_query($koneksi, $sql);

    $count = mysqli_affected_rows($koneksi);
    // var_dump($count);
    if($count >0){
        echo 
        "<script> 
        alert('Data Berhasil Ditambahkan'); 
        document.location.href='index.php';
        </script>";
    }
    
    else{
        "<script> 
        alert('Data Gagal Ditambahkan'); 
        document.location.href='index.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/corona/aset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/corona/aset/fontawesome/css/all.min.css">
    <title>tambah data pasien</title>
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
 <div class="row mt-4">
  <div class="col-md-9">
   <div class="card">
    <div class="card-header">
    <h2>Tambah Data Pasien</h2>
    </div>
    <div class="card-body">
         <form method="post" action="">
                <div class="form-group">
                 <label for="anggota">Nama Lengkap</label>
                 <input type="text" class="form-control" name="nama_pasien" id="pasien" placeholder="Masukkan nama lengkap">
                </div>

                <div class="form-group">
                 <label for="kelas">jenis Kelamin</label>
                 <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kalamin"  placeholder="jenis kelamin anda">
              
                </div>  

                <div class="form-group">
                 <label for="anggota">umur</label>
                 <input type="text" class="form-control" name="umur" id="umur" placeholder="Masukkan umur anda">
                 
                </div>

                <div class="form-group">
                 <label for="anggota">alamat</label>
                 <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat anda">
                </div>

                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
         </form>        
    </div>
   </div>
  </div>
 </div>
</div>    

<script src="http://localhost/corona/aset/jquery.js"></script>
<script src="http://localhost/corona/aset/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>