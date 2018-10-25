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
        <title>Pesan Gedung</title>
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
                    <nav>
                       <div class="nav-wrapper">
                          <div style="margin-top: 10px; margin-left: 5px">
                             <a class="breadcrumb">Isi Data Pesanan</a>
                           </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col l12">
                    <form action="<?php echo site_url('home/order-gedung/validate/'.$id_gedung.'')?>" method="post">
                        <table style="display: inline-block;">
                            <tr>
                                <td><b>Nama User</b></td>
                                <td>:</td>
                                <td><?php echo $session_id; ?></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Pemesanan</b></td>
                                <td>:</td>
                                <td><input type="date" name="tgl_pesan" id="tgl_pesan"></td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>:</td>
                                <td><input type="email" name="email" value="<?php echo $email->EMAIL;?>"></td>
                            </tr>
                            <tr>
                                <td><b>Catering</b></td>
                                <td>:</td>
                                <td>
                                    <input class="with-gap" name="radios" onclick="onclinik()" type="radio" id="ya" value="ya"/>
                                    <label for="ya">Ya</label>
                                    <input class="with-gap" name="radios" onclick="onclinik2()" type="radio" id="tidak" value="tidak"/>
                                    <label for="tidak">Tidak</label>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Paket Catering</b></td>
                                <td>:</td>
                                <td>
                                    <select disabled id="selected_catering" name="catering">
                                        <option value="" disabled selected>Pilih Paket</option>
                                        <?php foreach($res as $row): ?>
                                        <option value="<?php echo $row['ID_CATERING'] ?>"><?php echo $row['NAMA_PAKET']; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Jumlah Porsi Catering</b></td>
                                <td>:</td>
                                <td>
                                    <input disabled type="text" name="jumlah-porsi" id="jumlah-porsi" />
                                </td>
                            </tr>
                            <tr>
                                <td><b>Nama Gedung</b></td>
                                <td>:</td>
                                <td>
                                <?php foreach($hasil as $res): ?>
                                   <?php echo $res['NAMA_GEDUNG'] ?>
                                <?php endforeach;?>
                                </td>
                            </tr>
                            <tr>
                                <font color="red">*Pemesanan minimal 10 hari dari tanggal hari ini*</font><br>
                            </tr>
                            <tr>
                                <font color="red">*Pastikan semua field benar terisi, aksi ini tidak bisa dibatalkan*</font><br>
                            </tr>
                            <tr>
                                <font color="red">*Cek harga catering per porsi pada menu sebelah kiri*</font>
                            </tr>
                            <tr>
                               <td>
                                <input class="waves-effect waves-light btn" name="submit" id="submit" tabindex="10" value="Lanjutkan" type="submit">
                                </td>
                            </tr>
                        </table>
                    </form>
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
        <script>
            function onclinik() {
                if(document.getElementById('ya').checked) {
                    $(document).ready(function() {
                        $('select').material_select();
                        document.getElementById('selected_catering').disabled=false;
                        document.getElementById('jumlah-porsi').disabled=false;
                        $('select').material_select('destroy');
                        $('select').material_select();
                    }); 
                }
            }
            function onclinik2() {
                if(document.getElementById('tidak').checked) {
                    $(document).ready(function() {
                        $('select').material_select();
                        document.getElementById('selected_catering').disabled=true;
                        document.getElementById('jumlah-porsi').disabled=true;
                        $('select').material_select('destroy');
                        $('select').material_select();
                    });                    
                }
            }
        </script>
    </body>
</html>