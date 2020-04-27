<?php
session_start();

if( !isset($_SESSION['id'])){
    header("Location: http://localhost/corona/about/index.php");
  }
?>
<?php
include '../koneksi.php';
$query= mysqli_query($koneksi,"SELECT * FROM pasien");

if(isset($_POST['simpan'])){

    $id_pasien = $_POST['id_pasien'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $suhu = $_POST['suhu'];
    $id_petugas = $_SESSION['id'];

    $sql = "INSERT INTO suhu VALUES('','$id_pasien','$tgl_periksa','$suhu',$id_petugas)";

    $res = mysqli_query($koneksi, $sql);

    $count = mysqli_affected_rows($koneksi);
    //  var_dump($sql);
    if($count >0){
        echo 
        "<script> 
        alert('Data Berhasil Ditambahkan'); 
        document.location.href='ceksuhu.php';
        </script>";
    }
    
    else{
        "<script> 
        alert('Data Gagal Ditambahkan'); 
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
    <title>Tambah Data Suhu Badan Pasien</title>
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
                 <label for="pasien">Nama Pasien</label>
                 <select name="id_pasien" class="form-control" id="nama_pasien">
                      <option value="">-- Pilih Nama --</option>

                      <?php
                        while($nama = mysqli_fetch_assoc($query)):
                      ?>

                      <option value="<?php echo $nama['id_pasien']; ?>"><?php echo $nama["nama_pasien"]; ?></option>

                      <?php
                       endwhile;
                      ?>
                 </select>
                </div>

                <div class="form-group">
                 <label for="tgl_periksa">Tanggal Periksa</label>
                 <input type="date" class="form-control" name="tgl_periksa" id="tgl_periksa"  placeholder="tanggal periksa pasien">              
                </div>  

                <div class="form-group">
                 <label for="suhu">suhu</label>
                 <input type="text" class="form-control" name="suhu" id="suhu" placeholder="Masukkan suhu pasien">                 
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