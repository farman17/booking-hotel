<?php
$session_id = $this->session->userdata('username');
$this->load->helper('text');
$id_gedung = $this->uri->segment(3);
$tax = 0.1 * $result->HARGA_SEWA;
$tanggal_pesan = $result->TANGGAL_PEMESANAN;
$c_tanggal_pesan = str_replace('-', '/', $tanggal_pesan);
$min_refund = date('Y-m-d', time());
$perbedaan = date_diff(new DateTime($tanggal_pesan), new DateTime($min_refund));
$temp_id = substr($result->ID_PEMESANAN, 7);
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
        <title>Detail Pemesanan</title>
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
                        <a class="page-title"><?php echo $session_id; ?></a>
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
                                                        <input id="search" name="search_gedung" type="search" required placeholder="Cari Gedung"> 
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
                            <a class="collapsible-header waves-effect waves-teal active"><?php echo $session_id; ?></a>
                            <div class="collapsible-body" style="display: block;">
                                <ul>
                                    <li>
                                        <a class="waves-effect waves-teal" href="<?php echo site_url('edit_data/'.$session_id.'/'); ?>">Edit Data Diri</a>
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
            <div class="container">
                <div class="row">
                    <table style="display: inline-block;" class="bordered">
                        <tr>
                            <td><b>ID PEMESANAN</b></td>
                            <td>:</td>
                            <td><b><?php echo $result->ID_PEMESANAN; ?><b></td>
                        </tr>
                        <tr>
                            <td><b>TANGGAL PEMESANAN</b></td>
                            <td>:</td>
                            <td><?php $date = date_create($result->TANGGAL_PEMESANAN); echo date_format($date, 'd F Y')?></td>
                        </tr>
                        <tr>
                            <td><b>NAMA CATERING</b></td>
                            <td>:</td>
                            <td><?php echo $result->NAMA_PAKET; ?></td>
                        </tr>
                        <tr>
                            <td><b>JUMLAH PESANAN</b></td>
                            <td>:</td>
                            <td><?php echo $result->JUMLAH_CATERING; ?></td>
                        </tr>
                        <tr>
                            <td><b>GEDUNG</b></td>
                            <td>:</td>
                            <td><?php echo $result->NAMA_GEDUNG; ?></td>
                        </tr>
                        <tr>
                            <td><b>PAJAK 10%</b></td>
                            <td><b>:</b></td>
                            <td>Rp. <?php echo number_format($tax) ?></td>
                        </tr>
                        <tr>
                            <td><b>HARGA CATERING/PORSI</b></td>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($result->HARGA_SATUAN); ?></td>
                        </tr>
                        <tr>
                            <td><b>TOTAL HARGA CATERING</b></td>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($result->TOTAL_HARGA); ?></td>
                        </tr>
                        <tr>
                            <td><b>TOTAL HARGA GEDUNG</b></td>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($result->HARGA_SEWA); ?></td>
                        </tr>
                        <tr>
                            <td><b>TOTAL HARGA CATERING + GEDUNG</b></td>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($result->TOTAL_KESELURUHAN); ?></td>
                        </tr>
                        <tr>
                            <td><b>TOTAL KESELURUHAN (CATERING + GEDUNG + PAJAK)</b></td>
                            <td><b>:</b></td>
                            <td>Rp. <?php echo number_format($result->TOTAL_KESELURUHAN + $tax) ?></td>
                        </tr>
                        <tr>
                            <td><b>DESKRIPSI ACARA</b></td>
                            <td>:</td>
                            <td><?php echo $result->DESKRIPSI_ACARA; ?></td>
                        </tr>
                        <tr>
                            <td><b>STATUS PEMESANAN</b></td>
                            <td>:</td>
                            <td><?php echo $result->STATUS; ?></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <a href="<?php echo site_url('home/cancel-order/'.$temp_id.'') ?>" onclick="return dialog();">Batalkan Pesanan</a>
                            </td>
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
            var perbedaan = <?php echo $perbedaan->format('%d') ?>;
            function dialog() {
                if(perbedaan <= 7) {
                    if(confirm("Pembatalan anda kurang dari 7 hari, dana tidak akan direfund Lanjutkan?")) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    if(confirm("Pembatalan anda lebih dari 7 hari, dana akan dikembalikan Lanjutkan?")) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        </script>
        </body>
</html>