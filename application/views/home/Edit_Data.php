<?php
$this->load->helper('form');
$username = $this->uri->segment(4);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Diri</title>
</head>
<body>
<center>
	<h3>Username <?php echo $username; ?></h3>
	<?php echo form_open('/home/home/edit_data/'.$username.'/'); ?>
	Password
	<input type="password" name="password"> <br>
	Email
	<input type="text" name="email"> <br>
	<input type="submit" value="Ubah">
	<?php echo form_close(); ?>
</center>
</body>
</html>