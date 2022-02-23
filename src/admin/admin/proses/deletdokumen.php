<?php
include "../koneksi/conn.php";
$id = $_GET['kd'];

$query = mysql_query("DELETE FROM tb_dokumentasi WHERE id_dokumentasi='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = '../view/lihat_dokumentasi.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../view/lihat_dokumentasi.php'</script>";	
}
?>