<?php 
$c_tgl_pesan = date_create($tgl_pemesanan);
$c_tgl_deadline = date_create($tgl_deadline);
$tax = 0.1 * $harga_gedung;
$min_dp = ($tax + $jumlah_pembayaran) * 0.1;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <p> <font face="verdana">
	Halo <strong><?php echo $username ?></strong>, <br><br>
	kami ingin menginformasikan pesanan anda telah di setujui dan di verifikasi oleh pihak kami dengan detail sebagai berikut: </p></font>
	<br>
	<table>
		<tr>
			<td><font face="verdana"><b>No Pemesanan</b></font></td>
			<td><font face="verdana">:</font></td>
			<td><font face="verdana"><?php echo $id_pesanan ?></font></td>
		</tr>
		<tr>
			<td><font face="verdana"><b>Tanggal Pemesanan</b></font></td>
			<td><font face="verdana">:</font></td>
			<td><font face="verdana"><?php echo date_format($c_tgl_pesan, 'd F Y') ?></font></td>
		</tr>
		<tr>
			<td><font face="verdana"><b>Nama Gedung</b></font></td>
			<td><font face="verdana">:</font></td>
			<td><font face="verdana"><?php echo $nama_gedung ?></font></td>
		</tr>
		<tr>
			<td><font face="verdana"><b>Tanggal Deadline Pembayaran</b></font></td>
			<td><font face="verdana">:</font></td>
			<td><font face="verdana"><?php echo date_format($c_tgl_deadline, 'd F Y') ?></font></td>
		</tr>
		<tr>
			<td><font face="verdana"><b>Jumlah Minimum Down Payment(DP)</b></font></td>
			<td><font face="verdana">:</font></td>
			<td><font face="verdana"><?php echo "Rp.".number_format($min_dp) ?></font></td>
		</tr>
		<!--
		<tr>
			<td><font face="verdana"><b>Pajak 10%</b></font></td>
			<td><font face="verdana">:</font></td>
			<td><font face="verdana"><?php //echo "Rp.".number_format($tax) ?></font></td>
		</tr>
		-->
		<tr>
			<td><font face="verdana"><b>Deskripsi Acara</b></font></td>
			<td><font face="verdana">:</font></td>
			<td><font face="verdana"><?php echo $acara ?></font></td>
		</tr>
	</table>
	<p><font face="verdana">
		Klik <a href="<?php echo site_url('pembayaran/frm_pembayaran') ?>">link</a> ini untuk mengisi form pembayaran, jangan lupa untuk menyertakan bukti pembayaran
		<br><br>
		Apabila anda tidak melakukan pembayaran sampai tanggal deadline pembayaran, maka pihak kami akan otomatis membatalkan pemesanan tanpa pemberitahuan terlebih dahulu<br><br><br>
		Terima Kasih,<br>
		Tim Reservasi
	</p></font>
</body>
</html>