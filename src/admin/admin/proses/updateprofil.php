<?php
require_once ("../koneksi/conn.php");
date_default_timezone_set('Asia/Jakarta');

		$username= mysql_real_escape_string($_POST['username']);
		$password=  mysql_real_escape_string($_POST['password']);
		$nip= mysql_real_escape_string($_POST['nip_pegawai']);
        $nama= mysql_real_escape_string($_POST['nama_pegawai']);
		$telp= mysql_real_escape_string($_POST['telp_pegawai']);
		$email= mysql_real_escape_string($_POST['email_pegawai']);
		
		
		 $sql1="UPDATE tb_pegawai SET  nama_pegawai='$nama', username='$username', password='$password', telp_pegawai='$telp', email_pegawai='$email' WHERE nip_pegawai='$nip'";
			
			$res1=mysql_query($sql1) or die (mysql_error());
			
			if($res1){
				echo "<script>alert('Pengguna berhasil di perbaharui !',document.location.href='../view/profile.php')</script>";
			}else{
				echo "<script>alert('Proses Gagal !',document.location.href='../view/profile.php')</script>";
			}
?>