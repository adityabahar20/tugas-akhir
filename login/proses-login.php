<?php
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password' ";
    $res = mysqli_query($koneksi,$sql);

    $count = mysqli_affected_rows($koneksi);

    if($count == 1){
        $data_login = mysqli_fetch_assoc($res);

        $_SESSION['id_petugas'] = $data_login['id_petugas'];

        $_SESSION['nama'] = $data_login['nama'];

        $_SESSION['status'] = "login";
    

        header("Location:../index.php");

        setcookie("message", "delete",time()-1);
    }else{

        setcookie("message", "Maaf, Username atau Password salah", time()+3600);

        header("Location: ../login/index.php?pesan=gagal");

    }
}
?>