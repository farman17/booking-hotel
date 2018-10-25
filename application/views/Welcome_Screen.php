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
        <title>E-Booking Online</title>
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
                        <a class="page-title">Sistem E-Booking Gedung</a>
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
                    <a href="<?php echo site_url('/login'); ?>" class="waves-effect waves-teal">Sign In</a>
                </li>
                <li class="bold">
                    <a href="<?php echo site_url('/registration'); ?>" class="waves-effect waves-teal">Register</a>
                </li>
            </ul>
            <div class="container">
            <div class="row">
            <?php foreach($res as $row):
            $path = $row['PATH']; $img_name = $row['IMG_NAME']; ?>  
            <div class="col s12 m7">
                    <div class="card medium">
                        <div class="card-image">
                           <img src="<?php echo $path . $img_name; ?>">
                        </div>
                        <div class="card-content">
                           <p hidden="true">ID Gedung: <?php echo $row['ID_GEDUNG']; ?> </p>
                           <span class="card-title"><?php echo $row['NAMA_GEDUNG']; ?>  </span>
                           <p>Kapasitas Gedung: <?php echo $row['KAPASITAS']; ?>  Orang</p>
                        </div>
                        <div class="card-action">
                           <a href="<?php echo site_url('login') ?> ">Details</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
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
