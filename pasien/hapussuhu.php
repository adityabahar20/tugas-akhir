<?php

include '../koneksi.php';

$id=$_GET['id_suhu'];

$query = mysqli_query($koneksi, "DELETE FROM suhu WHERE suhu.id_suhu='$id' ");

if($query>0){
    echo "<script> alert('Data Berhasil Dihapus'); 
            document.location.href='ceksuhu.php';
          </script>";
}else{
    echo "<script> alert('Data Gagal Dihapus'); document.location.href='ceksuhu.php';
          </script>";
}
    

?>