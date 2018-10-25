<?php 
$no = 1; 
$date = date_create(strtotime(time()));
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<body>
	<center><b><h3>Laporan Perawatan Gedung</h3></b></center>
	<!--
	<div class="container">
		<div class="row">
		<div class="col s12 m12"> -->
			<font face="courier" size="13px">
			<table border="1">
			<tr>
			    <th>No</th>
			    <th>No ID</th>
			    <th>Jenis Pembayaran</th>
			    <th>Gedung</th>
			    <th>Tanggal Pembayaran</th>
			    <th>Jumlah Pembayaran</th>
			</tr>
			<?php foreach($report as $row):?>
				<tr>
				    <td><?php echo $no++?></td>
				    <td><?php echo $row['NO_ID']?></td>
				    <td><?php echo $row['NAMA_PERAWATAN']?></td>
				    <td><?php echo $row['NAMA_GEDUNG']?></td>
				    <td><?php echo $row['TANGGAL_PEMBAYARAN'] ?></td>
				    <td><?php echo "Rp.".number_format($row['BIAYA']) ?></td>
				</tr>
			<?php $total = $row['BIAYA'] + $total ?>
			<?php endforeach;?>
			    <tr>
			        <td colspan="5"><b>Total Perawatan: </b></td>
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