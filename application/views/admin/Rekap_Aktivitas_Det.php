<?php
$session_id = $this->session->userdata('username');
$this->load->helper('text');
$no = 1;
$first_date_period = date_create($first_period);
$second_date_period = date_create($last_period);
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
        <title>Rekap</title>
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
                        <a class="page-title">Administrator</a>
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
                    <a href="<?php echo site_url('admin/dashboard') ?>" class="waves-effect waves-teal">Home</a>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('admin/list') ?>" class="waves-effect waves-teal">List User</a>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('admin/gedung') ?>" class="waves-effect waves-teal">List Gedung</a>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('admin/catering') ?>" class="waves-effect waves-teal">Catering</a>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('admin/pemesanan2') ?>" class="waves-effect waves-teal">List Pemesanan</a>
                </li>
                <li class="bold">
                <?php if($result > 0): ?>
                    <a href="<?php echo site_url('admin/transaksi') ?>" class="waves-effect waves-teal">Inbox Pemesanan<span class="new badge"><?php echo $result ?></span></a>
                <?php endif;?>
                <?php if($result <= 0): ?>
                <li class="bold">
                    <a href="<?php echo site_url('admin/transaksi') ?>" class="waves-effect waves-teal">Inbox Pemesanan</a>
                </li>
                <?php endif; ?>
                </li>
                <li class="bold">
                <?php if($get_transaction > 0): ?>
                    <a href="<?php echo site_url('admin/pembayaran') ?>" class="waves-effect waves-teal">Transaksi<span class="new badge"><?php echo $get_transaction ?></span></a>
                <?php endif;?>
                <?php if($get_transaction <= 0): ?>
                <li class="bold">
                    <a href="<?php echo site_url('admin/pembayaran') ?>" class="waves-effect waves-teal">Transaksi</a>
                </li>
                <?php endif; ?>
                </li>
                <!--
                <li class="bold">
                    <a href="<?php echo site_url('admin/pembayaran') ?>" class="waves-effect waves-teal">Transaksi</a>
                </li>-->
                <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold">
                            <a class="collapsible-header waves-effect waves-teal">Perawatan</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li> 
                                    <a class="waves-effect waves-teal" href="<?php echo site_url('admin/pembayaran-listrik') ?>">Pembayaran Listrik</a>
                                    </li>
                                    <li>
                                    <a class="waves-effect waves-teal" href="<?php echo site_url('admin/pembayaran-air') ?>">Pembayaran Air</a>
                                    </li>
                                    <li>
                                    <a class="waves-effect waves-teal" href="<?php echo site_url('admin/pembayaran-kebersihan') ?>">Pembayaran Kebersihan</a>
                                    </li>
                                    <li>
                                    <a class="waves-effect waves-teal" href="<?php echo site_url('admin/rekap_pembayaran') ?>">Rekap Pembayaran</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                </ul>
                </li>
                <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold">
                            <a class="collapsible-header waves-effect waves-teal">Rekapitulasi</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li> 
                                    <a class="waves-effect waves-teal" href="<?php echo site_url('admin/rekap_aktivitas') ?>">Rekap Aktivitas</a>
                                    </li>
                                    <li>
                                    <a class="waves-effect waves-teal" href="<?php echo site_url('admin/rekap_transaksi') ?>">Rekap Transaksi</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                </ul>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('admin/log_out') ?>" class="waves-effect waves-teal">Sign Out</a>
                </li>
            </ul>
            <center><h5>Rekapitulasi Aktivitas</h5>
            <div class="container">
                <div class="row">
                    <div class="col s12 m12">
                        <table class="bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Gedung</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Tanggal Approval</th>
                                <th>Acara</th>
                                <th>Nama Pemesan</th>
                            </tr>
                            <?php foreach($hasil as $row): ?>
                            <?php $date = date_create($row['TANGGAL_FINAL_PEMESANAN']) ?>
                            <?php $date_approval = date_create($row['TANGGAL_APPROVAL']) ?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $row['NAMA_GEDUNG']?></td>
                                <td><?php echo date_format($date, 'd M Y')?></td>
                                <td><?php echo date_format($date_approval, 'd M Y')?></td>
                                <td><?php echo $row['DESKRIPSI_ACARA']?></td>
                                <td><?php echo $row['NAMA_LENGKAP']?></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                        <table style="display: inline-block;">
                            <tr>
                                <td><b>Periode:</b></td>
                                <td><?php echo date_format($first_date_period, 'd F Y') ?></td>
                                <td><b>To</b></td>
                                <td><?php echo date_format($second_date_period, 'd F Y') ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo site_url('admin/kegiatan_download_pdf/'.$first_period.'/'.$last_period.'') ?>">Ekspor ke PDF</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <main class="">
</main>
        <!-- Materialize core JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>assets/home/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/home/materialize/js/materialize.js"></script>
        <script src="<?php echo base_url(); ?>assets/home/index.js"></script>
        <script type="text/javascript">
            var startDate = document.getElementById("start_date");
            var label = document.getElementById("labelDari");
            var labelsampai = document.getElementById("labelSampai");
            var endDate = document.getElementById("end_date");
            var btnProses = document.getElementById("btnProses");
            var btnFilter = document.getElementById("btnFilter");
            function unhideElement() {
                if(startDate.hidden = true) {
                    startDate.hidden = false;
                    label.hidden = false;
                    labelsampai.hidden = false;
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