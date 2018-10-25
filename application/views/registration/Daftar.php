<!DOCTYPE html> 
<html> 
    <head> 
        <title>Registrasi</title>         
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9"> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/regis/style.css" media="all" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/regis/demo.css" media="all" /> 
    </head>     
    <body> 
        <div class="container"> 
            <!-- freshdesignweb top bar -->             
            <!--/ freshdesignweb top bar -->             
            <header>
                <h1> REGISTRASI</h1> 
                <h1><a href="<?php echo base_url();?>">Sistem Reservasi E-Booking</a></h1>
            </header>             
            <div class="form"> 
                <?php echo form_open('registration/status'); ?> 
                    <p class="contact"><label for="name">Username</label></p> 
                    <input id="name" name="username" placeholder="Username" required="" tabindex="1" type="text"> 
                    <p class="contact"><label for="name">Nama Lengkap</label></p> 
                    <input id="name" name="nama_lengkap" placeholder="Nama Lengkap" required="" tabindex="1" type="text">
                    <p class="contact"><label for="email">Password</label></p> 
                    <input id="password" name="password" placeholder="" required="" type="password"> 
                    <p class="contact"><label for="username">Confirm Password</label></p> 
                    <input id="email" name="confirm_pass" placeholder="" required="" tabindex="2" type="password"> 
                    <p class="contact"><label for="password">Email</label></p> 
                    <input type="email" id="password" name="email" placeholder="example@domain.com" required="">
                    <p class="contact"><label for="password">Alamat</label></p>
                    <textarea cols="50" rows="6" name="alamat"></textarea>                     
                    <p class="contact"><label for="repassword">No Telepon</label></p> 
                    <input type="text" id="repassword" name="no_telepon" placeholder="Phone Number" required="">                                           
                </fieldset>                 
                <br>
                <br> 
                <p class="contact"><label for="phone">Date of Birth</label></p> 
                <input id="phone" name="dob" placeholder="phone number" required="" type="date"> 
                <br> 
                <input class="buttom" name="submit" id="submit" tabindex="10" value="Daftar" type="submit"> 
            </form>             
        </div>         
    </div>     
</body>