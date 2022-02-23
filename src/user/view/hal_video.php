<?php
session_start();
if (empty($_SESSION['nama_pengunjung'])) {
    header('location:../index.php');
} else {
    require_once "../koneksi/conn.php";
}
date_default_timezone_set('Asia/Jakarta');

function tgl_indo($tanggal) {
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistem informasi Dokumentasi (e-Dokumentasi)">
        <meta name="author" content="Muhammad Ikhsan">
        <meta name="keyword" content="Dokumentasi, Pustaka Wilayah Soeman HS">
        <link rel="shortcut icon" href="../img/logo-big.png">

        <title>e-Dokumentasi </title>

        <!--CSS-->
        <link href="../css/w3.css" rel="stylesheet">
        <!-- Bootstrap CSS -->    
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <!-- font icon -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" /> 
        <!-- google font -->
        <link href='../css/google-font.css' rel='stylesheet' type='text/css'>
        <!--CSSS custom -->
        <style>
            .w3-sidebar a {font-family: "Roboto", sans-serif}
            body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}

            video::-internal-media-controls-download-button {
                display:none;
            }

            video::-webkit-media-controls-enclosure {
                overflow:hidden;
            }

            video::-webkit-media-controls-panel {
                width: calc(100% + 30px); /* Adjust as needed */
            }
        </style>
    </head>
    <body class="bg-success w3-content" style="max-width:1600px">
        <?php
        $timeout = 10; // Set timeout minutes
        $logout_redirect_url = "../index.php"; // Set logout URL

        $timeout = $timeout * 60; // Converts minutes to seconds
        if (isset($_SESSION['start_time'])) {
            $elapsed_time = time() - $_SESSION['start_time'];
            if ($elapsed_time >= $timeout) {
                session_destroy();
                echo "<script>alert('Silahkan Mengisi Buku Tamu Terlebih Dahulu!'); window.location = '$logout_redirect_url'</script>";
            }
        }
        $_SESSION['start_time'] = time();
        ?>
        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
            <h3 class="w3-padding-64 w3-center"><b>e-Dokumentasi</b></h3>
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
            <a href="akhiri_sesi.php" onclick="w3_close()" class="w3-bar-item w3-button">BUKU TAMU</a> 
            <a href="mainpage.php" onclick="w3_close()" class="w3-bar-item w3-button">HALAMAN UTAMA</a> 
            <a href="lihat_dokumentasi.php" onclick="w3_close()" class="w3-bar-item w3-button">LIHAT SEMUA</a>
        </nav>

        <!-- Top menu on small screens -->
        <header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
            <span class="w3-left w3-padding">SOME NAME</span>
            <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
        </header>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <?php
        $query = "SELECT M.* , A.nama_kategori FROM tb_dokumentasi AS M INNER JOIN tb_kategori_dokumentasi AS A ON M.id_kategori_dokumentasi = A.id_kategori where M.id_dokumentasi = '$_GET[kd]' ";
        $sql = mysql_query($query);
        $data = mysql_fetch_array($sql);
        $judul = $data['judul_dokumentasi'];
        $kategori = $data['nama_kategori'];
        $tanggal = $data['tanggal_dokumentasi'];
        $tahun = $data['tahun_dokumentasi'];
        $deskripsi = $data['deskripsi_dokumentasi'];
        $berkas = $data['berkas_dokumentasi'];
        ?>	
        <div class="w3-main" style="margin-left:300px">

            <!-- Push down content on small screens --> 
            <div class="w3-hide-large" style="margin-top:83px"></div>
            <!-- About section -->
            <div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="about">
                <h4><b><?php echo $judul; ?></b></h4>
                <video style="border:solid" width="1000" height="750" controls=""  controlsList="nodownload">
                    <source src="../../admin/berkas/<?php echo $berkas; ?>" type="video/mp4">
                </video>
                <br>
                <br>
                <div class="w3-content w3-justify" style="max-width:1000px">
                    <h4><i class="fa fa-clock-o"></i> <?php echo tgl_indo($tanggal); ?></h4>
                    <hr class="w3-opacity">
                    <p>
                        <?php echo $deskripsi; ?>
                    </p>

                    <hr class="w3-opacity">
                </div>
            </div>
            <!-- Footer -->
            <footer class="w3-container w3-padding-32 w3-grey">  
                <div class="w3-row-padding">
                    <div class="w3-third">
                        <h3>INFO</h3>
                        <p>Aplikasi ini dimiliki oleh Badan Perpustakaan Arsip dan Dokumentasi Pemerintah Provinsi Riau</p>      
                    </div>
                    <div class="w3-third">
                        <h3>TAGS</h3>
                        <p>
                            <span class="w3-tag w3-black w3-margin-bottom"><?php echo $kategori ?></span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">e-Dokumentasi</span> 
                            <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Riau</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">BPAD</span> 
                            <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">DIPERSIP</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom"></span>
                        </p>
                    </div>
                    <div class="w3-third">
                        <h3>DOC. POSTS</h3>
                        <ul class="w3-ul">
                            <li class="w3-padding-16 w3-hover-black">
                                <img src="../img/logo-big.png" class="w3-left w3-margin-right" style="width:50px">
                                <span class="w3-large">BADAN PERPUSTAKAAN ARSIP DAN DOKUMENTASI </span><br>
                                <span>PEMERINTAH PROVINSI RIAU</span>
                            </li>
                        </ul>
                    </div>


                </div>
            </footer>

            <div class="w3-black w3-center w3-padding-24">Created by Muhammad Ikhsan</div>

            <!-- End page content -->
        </div>

        <script>
            // Script to open and close sidebar
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("myOverlay").style.display = "block";
            }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("myOverlay").style.display = "none";
            }

            // Modal Image Gallery
            function onClick(element) {
                document.getElementById("img01").src = element.src;
                document.getElementById("modal01").style.display = "block";
                var captionText = document.getElementById("caption");
                captionText.innerHTML = element.alt;
            }

        </script>
        <!-- javascripts -->
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-ui-1.10.4.min.js"></script>
        <script src="../js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>	