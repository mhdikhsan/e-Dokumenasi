<?php
require_once ("../koneksi/conn.php");
date_default_timezone_set('Asia/Jakarta');

$namafolder="../berkas/"; //tempat menyimpan file		
	

			$id =  mysql_real_escape_string($_POST['id_dokumentasi']);
			$judul =  mysql_real_escape_string($_POST['judul_dokumentasi']);
			$kategori =  mysql_real_escape_string($_POST['id_kategori_dokumentasi']);
			$tanggal =  mysql_real_escape_string($_POST['tanggal_dokumentasi']);
			$tahun =  mysql_real_escape_string($_POST['tahun_dokumentasi']);
			$deskripsi =  mysql_real_escape_string($_POST['deskripsi_dokumentasi']);
			
			
			
			
			if (!empty($_FILES["berkas_dokumentasi"]["tmp_name"]))
			{
			$berkas = $namafolder . basename($_FILES['berkas_dokumentasi']['name']);
			move_uploaded_file($_FILES['berkas_dokumentasi']['tmp_name'], $berkas);
			}else{
			$query = "SELECT M.* , A.nama_kategori FROM tb_dokumentasi AS M INNER JOIN tb_kategori_dokumentasi AS A ON M.id_kategori_dokumentasi = A.id_kategori where M.id_dokumentasi = '$id' ";
			$sql = mysql_query ($query);
			$data  = mysql_fetch_array($sql);
				$berkas = $data['berkas_dokumentasi'];
			}
			$sql2 = "UPDATE tb_dokumentasi set judul_dokumentasi ='$judul', id_kategori_dokumentasi ='$kategori', tanggal_dokumentasi = '$tanggal', tahun_dokumentasi = '$tahun', deskripsi_dokumentasi 
			= '$deskripsi', berkas_dokumentasi = '$berkas' where id_dokumentasi = '$id'";
			$res2=mysql_query($sql2) or die (mysql_error());
			if($res2){
			echo "<script>alert('Berkas Berhasil di Perbaharui !',document.location.href='../view/lihat_dokumentasi.php')</script>";
			} else {
			echo "<script>alert('Berkas Gagal di Perbaharui !',document.location.href='../view/lihat_dokumentasi.php')</script>";
			}
  
  
		
?>