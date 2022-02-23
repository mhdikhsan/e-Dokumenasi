<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.html');
} else {
    require_once "../koneksi/conn.php";
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

        <title>Home| e-Dokumentasi</title>

        <!-- Bootstrap CSS -->    
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
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
        <!-- =======================================================
            Theme Name: NiceAdmin
            Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
            Author: BootstrapMade
            Author URL: https://bootstrapmade.com
        ======================================================= -->
    </head>

    <body>
        <!-- container section start -->
        <section id="container" class="">


            <header class="header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>

                <!--logo start-->
                <a href="mainpage.php" class="logo">e-<span class="lite">Dokumentasi</span></a>
                <!--logo end-->

                <div class="top-nav notification-row">                
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username"><?php echo $_SESSION['nama_pegawai']; ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="profile.php""><i class="icon_profile"></i> My Profile</a>
                                </li>
                                <li>
                                    <a href="../proses/logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
            </header>      
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <?php include "menu.php"; ?>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">            
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-home"></i> Beranda</h3>
                            <ol class="breadcrumb">		  	
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="info-box blue-bg">
                                <?php
                                $tampil = mysql_query("select * from tb_dokumentasi order by id_dokumentasi desc");
                                $total = mysql_num_rows($tampil);
                                ?>
                                <i class="fa fa-folder"></i>
                                <div class="count"><?php echo "$total"; ?></div>
                                <div class="title">Dokumentasi</div>						
                            </div><!--/.info-box-->			
                        </div><!--/.col-->

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="info-box brown-bg">
                                <?php
                                $tampil = mysql_query("select * from tb_kategori_dokumentasi order by id_kategori desc");
                                $total = mysql_num_rows($tampil);
                                ?>
                                <i class="fa fa-list"></i>
                                <div class="count"><?php echo "$total"; ?></div>
                                <div class="title">Kategori</div>						
                            </div><!--/.info-box-->			
                        </div><!--/.col-->	

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="info-box dark-bg">
                                <?php
                                $tampil = mysql_query("select * from tb_pengunjung order by id_pengunjung desc");
                                $total = mysql_num_rows($tampil);
                                ?>
                                <i class="fa fa-users"></i>
                                <div class="count"><?php echo "$total"; ?></div>
                                <div class="title">Pengunjung</div>	

                            </div><!--/.info-box-->			
                        </div><!--/.col-->
                    </div><!--/.row-->


                    <!-- Daftar Pengunjung -->
                    <div class="row">
                        <div class="col-md-4 portlets">
                            <!-- Widget -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="pull-left">Daftar Pengunjung Terbaru</div>
                                </div>

                                <div class="panel-body">
                                    <table class="table table-hover personal-task">
                                        <tbody>

                                            <?php
                                            $no = 1;
                                            $query = "SELECT * from tb_pengunjung order by tanggal_kunjungan desc limit 5 ";
                                            $sql = mysql_query($query);
                                            while ($data = mysql_fetch_array($sql)) {
                                                $nama = $data['nama_pengunjung'];
                                                $telp = $data['telp_pengunjung'];
                                                $email = $data['email_pengunjung'];
                                                $instansi = $data['instansi_pengunjung'];
                                                $tgl = date('d / m / Y', strtotime($data['tanggal_kunjungan']));
                                                ?>
                                                <tr>
                                                    <td><?php echo $nama ?></td>
                                                    <td><?php echo $tgl ?></td>

                                                </tr>	
    <?php $no++;
} ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-8">
                            <!--Daftar Dokumentasi-->
                            <section class="panel">
                                <div class="panel-body progress-panel">
                                    <div class="row">
                                        <div class="col-lg-8 task-progress pull-left">
                                            <h1>Berkas Dokumentasi Terbaru</h1>                                  
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-hover personal-task">
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = "SELECT M.* , A.nama_kategori FROM tb_dokumentasi AS M INNER JOIN tb_kategori_dokumentasi AS A ON M.id_kategori_dokumentasi = A.id_kategori order by M.tanggal_dokumentasi desc limit 5 ";
                                        $sql = mysql_query($query);
                                        while ($data = mysql_fetch_array($sql)) {
                                            $id = $data['id_dokumentasi'];
                                            $judul = $data['judul_dokumentasi'];
                                            $kategori = $data['nama_kategori'];
                                            $tanggal = date('d / m / Y', strtotime($data['tanggal_dokumentasi']));
                                            $tahun = $data['tahun_dokumentasi'];
                                            $berkas = $data['berkas_dokumentasi'];
                                            ?>
                                            <tr>

                                                <td><?php echo $judul ?></td>
                                                <td><?php echo $tanggal ?></td>
                                                <td><?php echo $tahun ?></td>
                                                <td>
                                                    <!-- Detail-->
                                                    <a href="detail_dokumentasi.php?hal=edit&kd=<?php echo $data['id_dokumentasi']; ?>" class="btn btn-default btn-small btn-dark">Detail</a>
                                                </td>
                                            </tr>	
                                    <?php $no++;
                                            } ?>
                                    </tbody>
                                </table>
                            </section>
                            <!-- end-->
                        </div>
                    </div><br><br>
                </section>
                <footer class="text-center">
                    <p>Application Made By <a href="#" data-toggle="tooltip" title="Muhammad Ikhsan">Muhammad Ikhsan</a></p>
                </footer>

            </section>
            <!--main content end-->
        </section>
        <!-- container section start -->

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
        <<script src="../js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
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

            /* ---------- Map ---------- */
            $(function () {
                $('#map').vectorMap({
                    map: 'world_mill_en',
                    series: {
                        regions: [{
                                values: gdpData,
                                scale: ['#000', '#000'],
                                normalizeFunction: 'polynomial'
                            }]
                    },
                    backgroundColor: '#eef3f7',
                    onLabelShow: function (e, el, code) {
                        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                    }
                });
            });

        </script>
        <script type="text/javascript">
            $(function () {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [

                        {
                            label: "My dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [0, 0, 0, 0, 0, 0, 0]
                        }
                    ]
                };
                new Chart(document.getElementById("linechart").getContext("2d")).Line(data, {
                    responsive: true,
                    maintainAspectRatio: false,
                });

            });
            // Chart.defaults.global.responsive = true;
        </script>
    </body>
</html>
