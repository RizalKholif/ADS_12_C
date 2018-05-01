<!DOCTYPE html>
<html>
<head>
	<title>Halaman Register</title>
	<link rel='stylesheet' href="css/stylephp.css" />
</head>
<body>

<div id="utama" style="margin-top:10%;">
	<div id="judul">
		Halaman Register
	</div>
	
	<div id="inputan">
		<form action="" method="post">
			<div>
				<input type="text" name="user" placeholder="Username" class="lg" />
			</div>
			<div style="margin-top:10px;">
				<input type="password" name="pass" placeholder="Password" class="lg" />
			</div>
			<div style="margin-top:10px;">
				<input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="lg" />
			</div>
			<div style="margin-top:10px;">
				<input type="email" name="email" placeholder="Email" class="lg" />
			</div>
			<div style="margin-top:10px;">
				<textarea name="alamat" placeholder="Alamat" class="lg" ></textarea>
			</div>
			<div style="margin-top=10px;">
				<input type="submit" name="register" value="Register" class="btn" />
				<span style='margin-left:120px;'>
					<a href='login.php' class="btn-right">Login</a>
				</span>
			</div>
		</form>
		<?php
		include "inc/koneksi.php";
		
		if(@$_POST['register']){
			$user = @$_POST['user'];
			$pass = @$_POST['pass'];
			$nama_lengkap = @$_POST['nama_lengkap'];
			$email = @$_POST['email'];
			$alamat = @$_POST['alamat'];
			
			if($user == '' || $pass == '' || $nama_lengkap == '' || $email == '' || $alamat == ''){
				?> <script type="text/javascript">alert("Inputan tidak boleh ada yang kosong");</script> <?php
		} else{
			$sql_insert = mysql_query("insert into tb_login values ('', '$user', '$pass', '$nama_lengkap', '$email', '$alamat', 'user')") or die (mysql_error());
			if($sql_insert){
				?> <script type="text/javascript">alert("pendaftaran berhasil, silahkan login");</script> <?php
			}
			}
			
		}
		?>
	</div>
</div>

</body>
</html>
		</div>