<?php
$session_id = $this->session->userdata('username');
$this->load->helper('text');
$id_gedung = $this->uri->segment(3);
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
        <title>Detail Gedung</title>
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
                    <div class="col l12">
                        <div class="card large">
                            <div class="card-content">
                            <table style="display: inline-block;">
                            <?php foreach($result as $row): 
                            $harga_gedung = $row['HARGA_SEWA'];?>
                                <span class="card-title"><?php echo $row['NAMA_GEDUNG']; ?></span>
                                <tr>
                                    <td>
                                    <b>ALAMAT GEDUNG</b></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo $row['ALAMAT']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>HARGA SEWA</b></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo "Rp. " .number_format($harga_gedung); ?>
                                    </td>
                                </tr>
                                </table>
                            </div>
                            <div class="card-content">
                            <table style="display: inline-block;">
                                <tr>
                                    <td><b>KAPASITAS GEDUNG:</b></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo $row['KAPASITAS']. " Orang"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>DESKRIPSI GEDUNG:</b></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo $row['DESKRIPSI_GEDUNG']; ?>
                                    </td>
                                </tr>
                                </table>
                                </div>
                            <div class="card-action">
                                <a href="<?php echo site_url('home/order-gedung/'.$id_gedung.''); ?>">ajukan pesanan</a>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col l12">
                        <div class="card medium">
                            <div class="card-content">
                                <span class="card-title orange-text">Gallery Gedung</span>
                            </div>
                            <div class="card-content">
                               <div class="slider">
                                  <ul class="slides">
                                  <?php foreach($gallery as $images): 
                                  $path = $images['PATH']; $img = $images['IMG_NAME'];?>
                                    <li>
                                       <img src="<?php echo $path . $img; ?>"> 
                                    </li>
                                <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
    </body>
</html>
