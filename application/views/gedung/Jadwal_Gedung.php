<?php
$session_id = $this->session->userdata('username');
$this->load->helper('text');
$user = $this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicons-->
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/home/assets/img/favicon/apple-touch-icon-152x152.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/home/assets/img/favicon/mstile-144x144.png">
        <link rel="icon" href="<?php echo base_url(); ?>assets/home/assets/img/favicon/favicon-32x32.png" sizes="32x32">
        <title>Jadwal Gedung</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize core CSS -->
        <link href="<?php echo base_url(); ?>assets/home/materialize/css/materialize.css" rel="stylesheet" type="text/css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        <link href="<?php echo base_url(); ?>assets/home/template.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <nav class="top-nav">
                <div class="container">
                    <div class="nav-wrapper">
                        <a class="page-title"><?php echo $session_id ?></a>
                    </div>
                </div>
            </nav>
            <div class="container">
                <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full"><i class="mdi-navigation-menu"></i></a>
            </div>
            <ul id="nav-mobile" class="side-nav fixed" style="width: 240px;">
                <li class="logo">
</li>
                <li class="bold">
                    <a href="<?php echo site_url('home/'.$session_id.'/') ?>" class="waves-effect waves-teal">Home</a>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('home/jadwal') ?>" class="waves-effect waves-teal">Jadwal Gedung</a>
                </li>
                <li class="bold">
                <?php if($flag > 0): ?>
                    <a href="<?php echo site_url('home/pemesanan') ?>" class="waves-effect waves-teal">Pemesanan<span class="new badge"><?php echo $flag ?></span></a>
                <?php endif;?>
                <?php if($flag <= 0): ?>
                <li class="bold">
                    <a href="<?php echo site_url('home/pemesanan') ?>" class="waves-effect waves-teal">Pemesanan</a>
                </li>
                <?php endif; ?>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('home/view-catering') ?>" class="waves-effect waves-teal" target="_blank">Menu Catering</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold">
                            <a class="collapsible-header waves-effect waves-teal">Cari Gedung</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <nav> 
                                            <div class="nav-wrapper">
                                                <form method="get" action="<?php echo site_url('home/search') ?>">
                                                    <div class="input-field"> 
                                                        <input id="search" type="search" name="search_gedung" required placeholder="Cari Gedung"> 
                                                        <label for="search">
                                                            <i class="material-icons">search</i>
                                                        </label>                                                         
                                                    </div>                                                     
                                                </form>                                                 
                                            </div>                                             
                                        </nav>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold active">
                            <a class="collapsible-header waves-effect waves-teal active"><?php echo $session_id ?></a>
                            <div class="collapsible-body" style="display: block;">
                                <ul>
                                    <li>
                                        <a class="waves-effect waves-teal" href="<?php echo site_url('edit_data/'.$user.'/'); ?>">Edit Data Diri</a>
                                    </li>
                                    <li>
                                        <a class="waves-effect waves-teal" href="<?php echo site_url('home/pembayaran') ?>">Transaksi</a>
                                    </li>
                                    <li>
                                        <a class="waves-effect waves-teal" href="<?php echo site_url('home/home/logout'); ?>">Sign Out</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <main class="">
            </main>
            <div class="container">
                <div class="row">
                <?php 
                    $akhir_bulan = strtotime('last day of this month', time());
                    $second_date = date('d M Y', $akhir_bulan);
                    $first_date = date('d M Y', time());
                ?>
                    <center><b>Jadwal Penggunaan Gedung Periode</b></center>
                    <center><b><?php echo $first_date; ?>-<?php echo $second_date; ?></b></center>
                    <div class="col s12 l12">
                        <input type="button" value="Filter Tanggal" name="btnFilter" id="btnFilter" onclick="unhideElement();">
                        <form method="get" action="<?php echo site_url('home/jadwal-periode') ?>">
                        <input type="date" name="start_date" id="start_date" hidden>
                        <label id="labelSampai" hidden><b>Sampai</b></label>
                        <input type="date" name="end_date" id="end_date" hidden>
                        <input type="submit" value="Proses" name="btnProses" id="btnProses" hidden onclick=" return btnProsesAlert();">
                        </form>
                            <table class="bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Acara</th>
                                    <th>Nama Gedung</th>
                                    <th>Deskripsi Acara</th>
                                </tr>
                            <?php $no = 1; foreach($jadwal as $row): 
                            $tanggal = date_create($row['TANGGAL_FINAL_PEMESANAN']);?>
                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo date_format($tanggal, 'd M Y'); ?>
                                    </td>
                                    <td>
                                        <?php echo $row['NAMA_GEDUNG']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['DESKRIPSI_ACARA']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
</header>
        <!-- Materialize core JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>assets/home/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/home/materialize/js/materialize.js"></script>
        <script src="<?php echo base_url(); ?>assets/home/index.js"></script>
        <script type="text/javascript">
            var startDate = document.getElementById("start_date");
            var label = document.getElementById("labelSampai");
            var endDate = document.getElementById("end_date");
            var btnProses = document.getElementById("btnProses");
            var btnFilter = document.getElementById("btnFilter");
            function unhideElement() {
                if(startDate.hidden = true) {
                    startDate.hidden = false;
                    label.hidden = false;
                    endDate.hidden = false;
                    btnProses.hidden = false
                    btnFilter.disabled = true;

                } else {
                    hideElement();
                }
            }
            function hideElement() {
                startDate.hidden = true;
                label.hidden = true;
                endDate.hidden = true;
                btnProses.hidden = true;
            } 
            function btnProsesAlert() {
                if(startDate.value == "") {
                    alert("Harap Isi Form Tanggal!");
                    return false;
                } else if(endDate.value == "") {
                    alert("Harap Isi Form Tanggal!");
                    return false;
                }
            }
        </script>
    </body>
</html>