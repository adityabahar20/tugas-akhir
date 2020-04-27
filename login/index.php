<!-- proses pengolahan data -->
<?php
session_start();
include '../koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password' ";
    $res = mysqli_query($koneksi,$sql);

    $count = mysqli_affected_rows($koneksi);
    $data_login = mysqli_fetch_assoc($res);

    if($count == 1){

        $_SESSION['id'] = $data_login['id_petugas'];
        $_SESSION['nama'] = $data_login['nama'];


        header("Location:../index.php");

        
    }else{

        header("Location:index.php");

	}	
}
?>

<!-- form login -->

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="http://localhost/corona/aset/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/corona/aset/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="login-box">
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="login.svg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">LOGIN</h5>
		<form action="" method="post">
		<div class="textbox">	
		<input type="text" name="username"  placeholder="Username" required="required">
		</div>

		<div class="textbox">
		<input type="password" name="password" placeholder="Password" required="required">
		</div>
		
		<input type="submit" class="btn" value="LOGIN" name="login">

			<br/>
			<br/>
			<center>
				<a class="link" href="#"></a>
			</center>
		</form>
		
	</div>
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>
<!-- <div class="login-box">
		<h1>LOGIN</h1>
        	
 
		<form action="" method="post">
		<div class="textbox">	
		<input type="text" name="username"  placeholder="Username" required="required">
		</div>

		<div class="textbox">
		<input type="password" name="password" placeholder="Password" required="required">
		</div>
		
		<input type="submit" class="btn" value="LOGIN" name="login">

			<br/>
			<br/>
			<center>
				<a class="link" href="#"></a>
			</center>
		</form>
		
	</div> -->

