<?php
require_once ("conn.php");
date_default_timezone_set('Asia/Jakarta');

		
		$username= mysql_real_escape_string($_POST['username_user']);
		$password=  mysql_real_escape_string($_POST['password_user']);
        $nama= mysql_real_escape_string($_POST['nama_user']);
		$telp= mysql_real_escape_string($_POST['telp_user']);
		$email= mysql_real_escape_string($_POST['email_user']);
		
		
		$hashPasswd = password_hash($password, PASSWORD_DEFAULT);
		
		    $sql="INSERT INTO pengguna VALUES('','$nama','$username','$password','$telp','$email')";
			$res=mysql_query($sql) or die (mysql_error());
			
			if($res){
				echo "<script>alert('pengguna berhasil mendaftar !',document.location.href='index.php')</script>";
			}else{
				echo "<script>alert('pengguna gagal di mendaftar !',document.location.href='index.php')</script>";
			}
?>