<?php
session_start();

if( !isset($_SESSION['id'])){
  header("Location: http://localhost/corona/about/index.php");
}
?>
<?php 

include '../koneksi.php';
$ID=$_GET["id_pasien"];
$query = mysqli_query($koneksi, "SELECT * FROM pasien WHERE pasien.id_pasien='$ID'");


if(isset($_POST['simpan'])){

    $id = $_GET['id_pasien'];
    $nama_pasien = $_POST['nama_pasien'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $alamat= $_POST['alamat'];
    

    $sql = "UPDATE pasien SET
            nama_pasien='$nama_pasien',
            jenis_kelamin='$jenis_kelamin',
            umur='$umur',
            alamat='$alamat'
            WHERE id_pasien ='$id'
            ";

    $res = mysqli_query($koneksi, $sql);

    $count = mysqli_affected_rows($koneksi);

    // var_dump($sql);
         
    if($count==1){
        echo "<script>
                alert('Data Berhasil Diubah'); 
                document.location.href='index.php';
              </script>";
        
    }
    else{
        echo "<script>
        alert('Data Gagal Diubah'); 
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
    <title>edit data</title>
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
    <h2>Edit Data Pasien</h2>
    </div>
    <div class="card-body">
         <form method="post" action="">

         <?php while($edit = mysqli_fetch_assoc($query)): ?>
                <div class="form-group">
                 <label for="buku">Nama</label>
                 <input type="text" class="form-control" name="nama_pasien" id="nama_pasien"  value="<?= $edit['nama_pasien']?>">
                </div>

                <div class="form-group">
                 <label for="buku">jenis kelamin</label>
                 <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin"value="<?= $edit['jenis_kelamin']?>">
                </div>  

                <div class="form-group">
                 <label for="buku">umur</label>
                 <input type="text" class="form-control" name="umur" id="umur"  value="<?= $edit['umur']?>">
                </div>

                <div class="form-group">
                 <label for="buku">alamat</label>
                 <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $edit['alamat']?>">
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
