<?php 
$c_tgl_pesan = date_create($tgl_pemesanan);
$c_tgl_approval = date_create($tgl_approval);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <p> <font face="verdana">
	Halo <strong><?php echo $username ?></strong>, <br><br>
	kami ingin menginformasikan pesanan anda tidak dapat dilanjutkan oleh pihak kami dengan detail sebagai berikut: </p></font>
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
			<td><font face="verdana"><b>Tanggal Approval</b></font></td>
			<td><font face="verdana">:</font></td>
			<td><font face="verdana"><?php echo date_format($c_tgl_approval, 'd F Y') ?></font></td>
		</tr>
		<tr>
			<td><font face="verdana"><b>Deskripsi Acara</b></font></td>
			<td><font face="verdana">:</font></td>
			<td><font face="verdana"><?php echo $acara ?></font></td>
		</tr>
		<tr>
			<td><font face="verdana"><b>Alasan Penolakan</b></font></td>
			<td><font face="verdana">:</font></td>
			<td><font face="verdana"><?php echo $tolak ?></font></td>
		</tr>
	</table>
	<p><font face="verdana">
		Kami mohon maaf karena pemesanan anda berakhir sampai disini dan pihak kami tidak dapat menindaklanjuti pesanan anda<br><br><br>
		Terima Kasih,<br>
		Tim Reservasi
	</p></font>
</body>
</html>