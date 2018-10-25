<?php
    $this->load->helper('form');
?>
<!DOCTYPE html> 
<html> 
    <head> 
        <title>Form Pembayaran</title>         
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
                <h1>Form Pembayaran Gedung</h1> 
            </header>             
            <div class="form"> 
                <?php echo form_open_multipart('pembayaran/frm_pembayaran'); ?> 
                    <p class="contact"><label for="no_pemesanan">No Pemesanan</label></p> 
                    <input id="no_pemesanan" name="no_pemesanan" placeholder="Contoh: PMSN0021" required="" tabindex="1" type="text"> 
                    <p class="contact"><label for="atas_nama">Rekening Atas Nama</label></p> 
                    <input id="atas_nama" name="atas_nama" placeholder="Contoh: Warsito Nugroho" required="" 
                    type="text"> 
                    <p class="contact"><label for="jumlah_transfer">Nominal Transfer</label></p> 
                    <input type="text" id="jumlah_transfer" name="jumlah_transfer" placeholder="Contoh: 50000000" 
                    required="">
                    <p class="contact"><label for="bank_dari">Bank Anda</label></p> 
                    <input type="text" id="bank_dari" name="bank_dari" placeholder="Contoh: Mandiri, BCA" 
                    required="">                                           
                </fieldset>                 
                <br>
                <br> 
                <p class="contact"><label for="tgl_transfer">Tanggal Transfer</label></p> 
                <input id="tgl_transfer" name="tgl_transfer" required="" type="date"> 
                <br> 
                <p class="contact"><label for="bukti_transfer">Upload Bukti Transfer (JPG Only)</label></p> 
                <input id="bukti_transfer" name="bukti_transfer" required="" type="file"> 
                <br> 
                <input class="buttom" name="submit" id="submit" tabindex="10" value="Konfirmasi" type="submit"> 
            </form>             
        </div>         
    </div>     
</body>