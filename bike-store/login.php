<?php
session_start();
include "inc/koneksi.php";

if(@$_SESSION['customer']){
	header("location: index.php");
} else {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman login</title>
	<link rel='stylesheet' href="css/stylephp.css" />
</head>
<body>

<div id="utama">
	<div id="judul">
	Login
	</div>
	
	<div id="inputan">
	<form action="" method="post">
		<div>
			<input type="text" name="user" placeholder="Username" class="lg" />
		</div>
		<div style="margin-top:10px;">
			<input type="password" name="pass" placeholder="Password" class="lg" />
		</div>
		<div style="margin-top=10px;">
			<input type="submit" name="login" value="Login" class="btn" />
			<span style="margin-left:130px;">
				<a href='register.php' clas="btn-right">Register</a>
			</span>
		</div>
	</form>
	
	<?php
	$user = @$_POST['user'];
	$pass = @$_POST['pass'];
	$login = @$_POST['login'];
	
	if($login){
		if($user == "" ||$pass == ""){
			?> <script type="text/javascript">alert("Username / password tidak boleh kosong");</script> <?php
		} else{
			$sql = mysql_query("select * from tb_login where username = '$user' and password = '$pass'") or die (mysql_error());
			$data = mysql_fetch_array($sql);
			$cek = mysql_num_rows($sql);
			if($cek >= 1){
				if($data['level'] == "customer"){
					@$_SESSION['customer'] = $data['kode_user'];
					header("location: index.php");
			} else {
				echo "login gagal";
			}
			}
		}
	}
	
	?>
	
	</div>
</div>
</body>
</html>

<?php
}
?>