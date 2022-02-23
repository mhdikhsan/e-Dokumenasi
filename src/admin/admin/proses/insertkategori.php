<?php
require_once ("../koneksi/conn.php");
date_default_timezone_set('Asia/Jakarta');

		
		
		//kategori
			$namakategori =  mysql_real_escape_string($_POST['nama_kategori']);
			$sql2="INSERT INTO tb_kategori_dokumentasi VALUES('id_kategori','$namakategori')";
			$res2=mysql_query($sql2) or die (mysql_error());
			
			if ($res2){
				echo "<script>alert('Input Kategori Berhasil !',document.location.href='../view/input_kategori.php')</script>";
			}else{
				echo "<script>alert('Proses Gagal !',document.location.href='../view/input_kategori.php')</script>";
			}
?>