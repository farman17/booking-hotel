<?php
$session_id = $this->session->userdata('username');
$this->load->helper('text');
$no = 1;
$total_pembayaran = 0;
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
        <title>Laporan Perawatan Air</title>
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
                        <a class="page-title">Management</a>
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
                    <a href="<?php echo site_url('manage/dashboard') ?>" class="waves-effect waves-teal">Home</a>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('manage/report_perawatan') ?>" class="waves-effect waves-teal">Laporan Perawatan Gedung</a>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('manage/report_kegiatan') ?>" class="waves-effect waves-teal">Laporan Kegiatan Gedung</a>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('admin/log_out') ?>" class="waves-effect waves-teal">Sign Out</a>
                </li>
            </ul>
            <div class="container">
                <div class="row">
                    <div class="col s12 m12">
                        <center><h5><b>Laporan Pembayaran Air</b></h5></center>
                        <table class="bordered"> 
                            <tr>
                                <th>No</th>
                                <th>No Ref</th>
                                <th>Jenis Perawatan</th>
                                <th>Gedung</th>
                                <th>Tanggal Pembayaran Tagihan</th>
                                <th>Jumlah Pembayaran</th>
                            </tr>
                            <?php foreach($row as $row): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['NO_ID'] ?></td>
                                <td><?php echo $row['NAMA_PERAWATAN'] ?></td>
                                <td><?php echo $row['NAMA_GEDUNG'] ?></td>
                                <td><?php echo $row['TANGGAL_PEMBAYARAN'] ?></td>
                                <td><?php echo "Rp. ".number_format($row['BIAYA']) ?></td>
                            </tr>
                            <?php $total_pembayaran = $row['BIAYA'] + $total_pembayaran ?>
                            <?php endforeach; ?>
                        </table>
                        <table style="display: inline-block;">
                            <tr>
                                <td><b>Total Pembayaran Air: </b></td>
                                <td><b><?php echo "Rp. ".number_format($total_pembayaran) ?></b></td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo site_url('manage/air_download_pdf') ?>">Ekspor ke PDF</a>
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
    </body>
</html>