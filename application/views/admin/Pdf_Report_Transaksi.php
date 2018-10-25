<?php 
$no = 1; 
$date = date_create(strtotime(time()));
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<body>
	<center><b><h3>Laporan Rekapitulasi Transaksi</h3></b></center>
	<!--
	<div class="container">
		<div class="row">
		<div class="col s12 m12"> -->
			<font face="courier" size="14px">
			<table border="1">
			<tr>
			    <th>No</th>
			    <th>Kode Pembayaran</th>
			    <th>Kode Pemesanan</th>
			    <th>Atas Nama</th>
			    <th>Bank</th>
			    <th>Tanggal Transfer</th>
			    <th>Jumlah Transfer</th>
			</tr>
			<?php foreach($report as $row):?>
				<tr>
				    <td><?php echo $no++ ?></td>
				    <td><?php echo $row['KODE_PEMBAYARAN'].$row['ID_PEMBAYARAN'] ?></td>
				    <td><?php echo $row['KODE_PEMESANAN'].$row['ID_PEMESANAN'] ?></td>
				    <td><?php echo $row['ATAS_NAMA'] ?></td>
				    <td><?php echo $row['BANK_PENGIRIM'] ?></td>
				    <td><?php echo date_format(date_create($row['TANGGAL_TRANSFER']), 'd M Y') ?></td>
				    <td><?php echo "Rp.".number_format($row['NOMINAL_TRANSFER']) ?></td>
				</tr>
			<?php $total = $row['NOMINAL_TRANSFER'] + $total ?>
			<?php endforeach;?>
			<tr>
			    <td colspan="6"><b>Total Transfer: </b></td>
			    <td><?php echo "Rp.".number_format($total) ?></td>
			</tr>
			</table>
			<b>Periode <?php echo date_format(date_create($start_date), 'd F Y') ?>-<?php echo date_format(date_create($end_date), 'd F Y') ?></b><br>
			<b>Dicetak pada: </b>
			<b><?php echo date_format($date, "d M y") ?></b></td><br>
			<b>Dicetak untuk: Administrator</b>
			</font>
		<!--
		</div>
		</div>
	</div> -->
</body>
</html>