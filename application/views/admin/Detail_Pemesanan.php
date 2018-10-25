<?php
$session_id = $this->session->userdata('username');
$this->load->helper('text');
$this->load->helper('form');
$id_pemesanan = substr($hasil->ID_PEMESANAN, 7);
$tax = 0.1 * $hasil->HARGA_SEWA;
$total_stl_pajak = $hasil->TOTAL_KESELURUHAN + $tax;
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
        <title>Detail Transaksi</title>
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
                        <a class="page-title">Detail Transaksi</a>
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
                    <a href="<?php echo site_url('admin/pembayaran') ?>" class="waves-effect waves-teal">Transaksi</a>
                </li>
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
            <div class="container">
                <div class="row">
                    <table style="display: inline-block;" class="bordered">
                        <tr>
                            <td><b>ID PEMESANAN</b></td>
                            <td>:</td>
                            <td><b><?php echo $hasil->ID_PEMESANAN; ?></b></td>
                        </tr>
                        <tr>
                            <td><b>USERNAME</b></td>
                            <td>:</td>
                            <td><?php echo $hasil->USERNAME; ?></td>
                        </tr>
                        <tr>
                            <td><b>TANGGAL PEMESANAN</b></td>
                            <td>:</td>
                            <td><?php $date = date_create($hasil->TANGGAL_PEMESANAN); echo date_format($date, 'd F Y') ?></td>
                        </tr>
                        <tr>
                            <td><b>EMAIL</b></td>
                            <td>:</td>
                            <td><?php echo $hasil->EMAIL; ?></td>
                        </tr>
                        <tr>
                            <td><b>GEDUNG</b></td>
                            <td>:</td>
                            <td><?php echo $hasil->NAMA_GEDUNG; ?></td>
                        </tr>
                        <tr>
                            <td><b>CATERING</b></td>
                            <td>:</td>
                            <td><?php echo $hasil->NAMA_PAKET; ?></td>
                        </tr>
                        <tr>
                            <td><b>JUMLAH PORSI CATERING</b></td>
                            <td>:</td>
                            <td><?php echo $hasil->JUMLAH_CATERING; ?> Porsi</td>
                        </tr>
                        <tr>
                            <td><b>TOTAL HARGA CATERING</b></td>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($hasil->TOTAL_HARGA); ?></td>
                        </tr>
                        <tr>
                            <td><b>HARGA GEDUNG</b></td>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($hasil->HARGA_SEWA); ?></td>
                        </tr>
                        <tr>
                            <td><b>PAJAK 10%</b></td>
                            <td><b>:</b></td>
                            <td>Rp. <?php echo number_format($tax) ?></td>
                        </tr>
                        <tr>
                            <td><b>TOTAL HARGA GEDUNG +CATERING</b></td>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($hasil->TOTAL_KESELURUHAN); ?></td>
                        </tr>
                        <tr>
                            <td><b>TOTAL KESELURUHAN (CATERING + GEDUNG + PAJAK)</b></td>
                            <td><b>:</b></td>
                            <td>Rp. <?php echo number_format($total_stl_pajak) ?></td>
                        </tr>
                        <tr>
                            <td><b>DESKRIPSI PEMESANAN</b></td>
                            <td>:</td>
                            <td><?php echo $hasil->DESKRIPSI_ACARA; ?></td>
                        </tr>
                        <tr>
                            <td><b>Aksi</b></td>
                            <td>:</td>
                            <td><a href="<?php echo site_url('admin/admin_controls/delete_jadwal/'.$id_pemesanan.'')?>" onclick="return dialog();">Hapus Acara</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            </header>
            <main class="">
</main>
        <!-- Materialize core JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>assets/home/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/home/materialize/js/materialize.js"></script>
        <script src="<?php echo base_url(); ?>assets/home/index.js"></script>
        <script type="text/javascript">
            function dialog() {
                if(confirm("Yakin Hapus Jadwal?")) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </body>
</html>