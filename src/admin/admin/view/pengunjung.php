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
        <meta name="description" content="Sistem informasi Dokumentasii (e-Dokumentasii)">
        <meta name="author" content="Muhammad Ikhsan">
        <meta name="keyword" content="Dokumentasii, Pustaka Wilayah Soeman HS">
        <link rel="shortcut icon" href="../img/logo-big.png">

        <title>Pengunjung | e-Dokumentasi</title>

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
        <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
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
                <a href="mainpage.php" class="logo">e- <span class="lite">Dokumentasi</span></a>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa fa-table"></i>Pengunjung</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="mainpage.php">Home</a></li>
                                <li><i class="fa fa-table"></i>Pengunjung</li>
                            </ol>
                        </div>
                    </div>

                    <!-- page start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!--heading-->
                            <section class="panel">
                                <header class="panel-heading tab-bg-info">
                                    <ul class="nav nav-tabs">
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div id="recent-activity" class="tab-pane active">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table id="myTable" class="table table-hover row-border" style = 'text-align : center' cellspacing="0" width="100%">
                                                        <thead class="bg-info">
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Nama Pengunjung</th>
                                                                <th>Telepon Pengunjung</th>
                                                                <th>Email Pengunjung</th>
                                                                <th>Instansi Pengunjung</th>
                                                                <th>Tanggal Kunjungan</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Nama Pengunjung</th>
                                                                <th>Telepon Pengunjung</th>
                                                                <th>Email Pengunjung</th>
                                                                <th>Instansi Pengunjung</th>
                                                                <th>Tanggal Kunjungan</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>

                                                            <?php
                                                            $no = 1;
                                                            $query = "SELECT * from tb_pengunjung order by nama_pengunjung ";
                                                            $sql = mysql_query($query);
                                                            while ($data = mysql_fetch_array($sql)) {
                                                                $nama = $data['nama_pengunjung'];
                                                                $telp = $data['telp_pengunjung'];
                                                                $email = $data['email_pengunjung'];
                                                                $instansi = $data['instansi_pengunjung'];
                                                                $tgl = date('d / m / Y', strtotime($data['tanggal_kunjungan']));
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $no ?></td>
                                                                    <td><?php echo $nama ?></td>
                                                                    <td><?php echo $telp ?></td>
                                                                    <td><?php echo $email ?></td>
                                                                    <td><?php echo $instansi ?></td>
                                                                    <td><?php echo $tgl ?></td>

                                                                </tr>	
                                                                <?php $no++;
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Table end-->
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <!--end section-->
                        </div>
                    </div>

                    <!-- page end-->
                </section>
            </section>
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
