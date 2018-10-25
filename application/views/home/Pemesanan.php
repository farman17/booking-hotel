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
        <title>Pemesanan</title>
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
                    <table class="bordered">
                        <tr>
                            <th>ID Pemesanan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Paket Catering</th>
                            <th>Nama Gedung</th>
                            <th>Satus Pemesanan</th>
                            <th>Details</th>
                        </tr>   
                        <!--<?php //else: ?> -->
                        <tr>
                        <?php foreach($res as $row): 
                        $id_pemesanan = $row['ID_PEMESANAN'];?>
                            <td>
                                <?php echo $id_pemesanan; ?>
                            </td>
                            <td>
                                <?php $date = date_create($row['TANGGAL_PEMESANAN']); echo date_format($date, 'd F Y') ?>
                            </td>
                            <td>
                                <?php echo $row['NAMA_PAKET']; ?>
                            </td>
                            <td>
                                <?php echo $row['NAMA_GEDUNG']; ?>
                            </td>
                            <td>
                            <?php
                                $status = $row['STATUS'];
                                if($status == "DITOLAK") {
                                    echo '<font color="red">'.$status.'</font>';
                                } else if($status == "DISETUJUI") {
                                    echo '<font color="blue">'.$status.'</font>';
                                } else if($status == "PENDING") {
                                    echo '<font color="black">'.$status.'</font>';
                                } else {
                                    echo $status;
                                }
                            ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('home/pemesanan/details/'.$id_pemesanan.''); ?>"><i class="material-icons">open_in_new</i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php if($rows < 1): ?>
                        <h5><center>-------------
                            <?php echo $no_data; ?>-----------
                        </center></h5>
                    <?php endif; ?>
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