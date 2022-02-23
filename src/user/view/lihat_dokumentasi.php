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
        <meta name="description" content="Sistem informasi Dokumentasii (e-Dokumentasii)">
        <meta name="author" content="Muhammad Ikhsan">
        <meta name="keyword" content="Dokumentasii, Pustaka Wilayah Soeman HS">
        <link rel="shortcut icon" href="../img/logo-big.png">

        <title>Lihat Dokumentasi | e-Dokumentasi</title>

        <!-- Bootstrap CSS -->    
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- google font -->
        <link href='../css/google-font.css' rel='stylesheet' type='text/css'>
        <!-- font icon -->
        <link href="../css/elegant-icons-style.css" rel="stylesheet" />
        <link href="../css/font-awesome.min.css" rel="stylesheet" />    
        <!-- full calendar css-->
        <link href="../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- owl carousel -->
        <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
        <link href="../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="../css/fullcalendar.css">
        <link href="../css/widgets.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/style-responsive.css" rel="stylesheet" />
        <link href="../css/xcharts.min.css" rel=" stylesheet">	
        <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
        <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
        <style>
            body{
                font-family	: Montserrat, sans-serif ;
            }

            h1{
                letter-spacing: 4px;
                font-family	: Montserrat, sans-serif ;
            }
            .jumbotron { 
                padding: 120px 25px ;
                color: white !important;
                background:  url('../img/jumbotron.jpg')  center fixed;
                background-size: cover;
            }  
            .input-src{
                padding-top: 30px; 
            }

            .input-lg{
                border-radius: 0;
            }
            .btn-lg{
                border-radius: 0;
            }
            .result{
                padding-top: 20px;
                font-family	: Montserrat, sans-serif;
            }

            hr{
                color : gray !important;
                border:  solid;
            }
            .navbar {
                margin-bottom: 0;
                background-color: transparent;
                z-index: 9999;
                border: 0;
                font-size: 12px !important;
                line-height: 1.42857143 !important;
                letter-spacing: 4px;
                border-radius: 0;
            }

            .navbar li a, .navbar .navbar-brand {
                color: white !important;

            }

            .navbar-nav li a:hover, .navbar-nav li.active a {
                color: #00ff80 !important;
                border: 1px solid;
                border-color: #00ff80;
            }

            .navbar-brand:hover{
                color:#00ff80 !important;
                border: 1px solid;
                border-color: #00ff80;
            }

            .navbar-default .navbar-toggle {
                border-color: transparent;
                color: #fff !important;
            }
            .input-lg{
                border-color: #00ff80 !important;
            }
            .input-lg:hover{
                border-color: #00ff80 !important;
                border : 5px solid;
            }
            .table{
                font-family	: Montserrat, sans-serif;

            }



            h3{
                font-family	: Montserrat, sans-serif;
                line-height: 1.42857143 !important;
                letter-spacing: 4px;
            }

            .btn-src:hover{
                background-color: transparent;
                color: #00ff80 !important;
                border: 1px solid;
                border-color: #00ff80;
            }
            .btn-src{
                color: white !important;
                background-color : #999900;
            }
            .btn-detail{
                color: white;
                background-color: gray;
            }
            .btn-detail:hover{
                background-color: transparent;
                border-color: gray;
                color: gray;
                border-radius: 0;
                border: 1px solid;
            }

            .input-lg::-webkit-input-placeholder {
                color: black;
            }
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: gray;
                color: white;
                text-align: center;
            }
            li{
                font-size: 14px;
            }
        </style>

    </head>

    <body class="bg-success">
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
        <!--main content start-->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="akhiri_sesi.php"> Buku Tamu</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="mainpage.php">Halaman Pencarian</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="jumbotron text-center">

            <h1 class="text-title">e-Dokumentasi</h1> 
            <p>Pusat Pencarian Dokumentasi Pustaka Soeman HS</p> 
        </div>
        <!-- page start-->
        <h3 class="text-center">Daftar Dokumentasi</h3>
        <hr class="container">
        <div class="container-fluid">
            <table id="myTable" class="table table-hover row-border" style = 'text-align : center' cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Tahun</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Tahun</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    $query = "SELECT M.* , A.nama_kategori FROM tb_dokumentasi AS M INNER JOIN tb_kategori_dokumentasi AS A ON M.id_kategori_dokumentasi = A.id_kategori order by M.judul_dokumentasi  ";
                    $sql = mysql_query($query);
                    while ($data = mysql_fetch_array($sql)) {
                        $id = $data['id_dokumentasi'];
                        $judul = $data['judul_dokumentasi'];
                        $kategori = $data['nama_kategori'];
                        $tanggal = $data['tanggal_dokumentasi'];
                        $tahun = $data['tahun_dokumentasi'];
                        $berkas = $data['berkas_dokumentasi'];
                        ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $judul ?></td>
                            <td><?php echo $kategori ?></td>
                            <td><?php echo tgl_indo($tanggal) ?></td>
                            <td><?php echo $tahun ?></td>
                            <?php
                            if ($data['id_kategori_dokumentasi'] == "2" || $data['id_kategori_dokumentasi'] == "6") {
                                ?>    

                                <td> <a href="hal_video.php?hal=edit&kd=<?php echo $data['id_dokumentasi']; ?>"><button class="btn btn-small btn-detail ">detail</button></a></td>
                                <?php
                            } else {
                                ?>	
                                <td> <a href="hal_dokumentasi.php?hal=edit&kd=<?php echo $data['id_dokumentasi']; ?>"><button class="btn btn-small btn-detail ">detail</button></a></td>
                                <?php
                            }
                            ?>	
                        </tr>	
                        <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>


        <!--end panel-->




        <!-- javascripts -->
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-ui-1.10.4.min.js"></script>
        <script src="../js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="../assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="../js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="../js/owl.carousel.js" ></script>
        <!-- jQuery full calendar -->
        <script src="../js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
        <script src="../assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <!--script for this page only-->
        <script src="../js/calendar-custom.js"></script>
        <script src="../js/jquery.rateit.min.js"></script>
        <!-- custom select -->
        <script src="../js/jquery.customSelect.min.js" ></script>
        <script src="../assets/chart-master/Chart.js"></script>

        <!--custome script for all page-->
        <script src="../js/scripts.js"></script>
        <!-- custom script for this page-->
        <script src="../js/sparkline-chart.js"></script>
        <script src="../js/easy-pie-chart.js"></script>
        <script src="../js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../js/xcharts.min.js"></script>
        <script src="../js/jquery.autosize.min.js"></script>
        <script src="../js/jquery.placeholder.min.js"></script>
        <script src="../js/gdp-data.js"></script>	
        <script src="../js/morris.min.js"></script>
        <script src="../js/sparklines.js"></script>	
        <script src="../js/charts.js"></script>
        <script src="../js/jquery.slimscroll.min.js"></script>
        <!--jquery-DataTable-->
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <!--JavaScript core-->
        <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
        <script>
            //knob
            $(function () {
                $(".knob").knob({
                    'draw': function () {
                        $(this.i).val(this.cv + '%')
                    }
                })
            });

            //carousel
            $(document).ready(function () {
                $("#owl-slider").owlCarousel({
                    navigation: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true

                });
            });

            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });
            //table1 
            $(document).ready(function () {
                var table = $('#myTable').DataTable({
                    scrollY: 200,
                    deferRender: true,
                    "paging": false,
                    scroller: true
                });

            });
            //table2
            $(document).ready(function () {
                var table2 = $('#tablekosmetik').DataTable({

                });

            });

        </script>

    </body>
</html>
