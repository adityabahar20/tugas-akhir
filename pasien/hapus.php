<?php

include '../koneksi.php';

$id=$_GET['id_pasien'];

$query = mysqli_query($koneksi, "DELETE FROM pasien WHERE pasien.id_pasien='$id' ");

if($query>0){
    echo "<script> alert('Data Berhasil Dihapus'); 
            document.location.href='index.php';
          </script>";
}else{
    echo "<script> alert('Data Gagal Dihapus'); document.location.href='index.php';
          </script>";
}
    

?>