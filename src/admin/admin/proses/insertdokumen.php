<?php
require_once ("../koneksi/conn.php");
date_default_timezone_set('Asia/Jakarta');

$namafolder="../berkas/"; //tempat menyimpan file		
	
if (!empty($_FILES["berkas_dokumentasi"]["tmp_name"]))
{
			$id =  mysql_real_escape_string($_POST['id_dokumentasi']);
			$judul =  mysql_real_escape_string($_POST['judul_dokumentasi']);
			$kategori =  mysql_real_escape_string($_POST['id_kategori_dokumentasi']);
			$tanggal =  mysql_real_escape_string($_POST['tanggal_dokumentasi']);
			$tahun =  mysql_real_escape_string($_POST['tahun_dokumentasi']);
			$deskripsi =  mysql_real_escape_string($_POST['deskripsi_dokumentasi']);
			$berkas = $namafolder . basename($_FILES['berkas_dokumentasi']['name']);
			
			if (move_uploaded_file($_FILES['berkas_dokumentasi']['tmp_name'], $berkas)) {
			$sql2="INSERT INTO tb_dokumentasi VALUES('$id','$judul','$kategori','$tanggal','$tahun','$deskripsi','$berkas')";
			$res2=mysql_query($sql2) or die (mysql_error());
			echo "<script>alert('Berkas Berhasil di Tambahkan !',document.location.href='../view/input_dokumentasi.php')</script>";
			} else {
			echo "<script>alert('Berkas Gagal di Tambahkan !',document.location.href='../view/input_dokumentasi.php')</script>";
			}
  
   } else {
	echo "<script>alert('Berkas belum dipilih untuk diupload !',document.location.href='../view/input_dokumentasi.php')</script>";
}			
		
?>