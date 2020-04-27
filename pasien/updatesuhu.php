<?php
session_start();

if( !isset($_SESSION['id'])){
    header("Location: http://localhost/corona/about/index.php");
  }
?>
<?php 
include '../koneksi.php';
$ID=$_GET['id_suhu'];
$suhu = mysqli_query($koneksi, "SELECT * FROM suhu WHERE suhu.id_suhu='$ID'");


if(isset($_POST['simpan'])){

    $id = $_GET['id_suhu'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $suhu = $_POST['suhu'];
    $petugas=$_SESSION['id'];
    

    $sql = "UPDATE suhu SET
            tgl_periksa='$tgl_periksa',
            suhu='$suhu',
            id_petugas='$petugas'
            WHERE id_suhu ='$id'
            ";

    $res = mysqli_query($koneksi, $sql);

    $count = mysqli_affected_rows($koneksi);

    //  var_dump($count);
         
    if($count==1){
        echo "<script>
                alert('Data Berhasil Diubah'); 
                document.location.href='ceksuhu.php';
              </script>";
        
    }
    else{
        echo "<script>
        alert('Data Gagal Diubah'); 
        document.location.href='ceksuhu.php';
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
    <title>Update Data Suhu Tubuh Pasien</title>
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
    <h2>Update Data Suhu Tubuh Pasien</h2>
    </div>
    <div class="card-body">
         <form method="post" action="">

         <?php while($p = mysqli_fetch_assoc($suhu)): ?>
                <div class="form-group">
                 <label for="buku">Tanggal Periksa</label>
                 <input type="date" class="form-control" name="tgl_periksa" id="tgl_periksa"  value="<?= $p['tgl_periksa']?>">
                </div>

                <div class="form-group">
                 <label for="suhu">Suhu</label>
                 <input type="text" class="form-control" name="suhu" id="suhu"value="<?= $p['suhu']?>">
                </div>  
                
                <?php
                     endwhile;
                ?>
                               
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
