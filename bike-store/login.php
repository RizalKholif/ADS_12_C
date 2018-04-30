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
<style type="text/css">
body{
	font-family: century gothic;
	font-size: 14px;
	background-image:url(pict.jpg);
}

#utama{
	width: 300px;
	margin: 0 auto;
	margin-top: 5%;
}

#judul{
	font-family: channel;
	padding:15px;
	text-align: center;
	color: #fff;
	font-size: 250%;
	
}

#inputan{
	
	padding: 20px;
	
}

input{
	padding: 10px;
	boder: 0;
}

.lg{
	width: 240px;
}

.btn{
	background-color: #fff;
	border-radius: 10px;
	color: #000000;
	margin-top: 5%;
}
.btn:hover{
	background-color: #336666;
	cursor: pointer;
}
</style>
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