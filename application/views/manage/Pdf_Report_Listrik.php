<?php 
$no = 1; 
$total_pembayaran = 0;
$date = date_create(strtotime(time()));
?>
<!DOCTYPE html>
<html lang="en">
<body>
	<center><b><h3>Laporan Pembayaran Listrik</h3></b></center>
	<!--
	<div class="container">
		<div class="row">
		<div class="col s12 m12"> -->
			<font face="courier" size="13px">
			<table border="1">
			<tr>
			    <th>No</th>
			    <th>No Ref</th>
			    <th>Jenis Perawatan</th>
			    <th>Gedung</th>
			    <th>Tanggal Pembayaran</th>
			    <th>Jumlah Pembayaran</th>
			</tr>
			<?php foreach($row as $row):?>
				<tr>
				    <td><?php echo $no++?></td>
				    <td><?php echo $row['NO_ID']?></td>
				    <td><?php echo $row['NAMA_PERAWATAN']?></td>
				    <td><?php echo $row['NAMA_GEDUNG'] ?></td>
				    <td><?php echo $row['TANGGAL_PEMBAYARAN']?></td>
				    <td><?php echo "Rp. ".number_format($row['BIAYA'])?></td>
				</tr>
				<?php $total_pembayaran = $row['BIAYA'] + $total_pembayaran?>
			<?php endforeach;?>
			    <tr>
			        <td colspan="5"><b>Total Keseluruhan</b></td>
			        <td><b><?php echo "Rp. ".number_format($total_pembayaran)?></b></td>
			    </tr>
			</table>
			<b>Dicetak pada: </b>
			<b><?php echo date_format($date, "d M y") ?></b></td><br>
			<b>Dicetak untuk: Pengelola</b>
			</font>
		<!--
		</div>
		</div>
	</div> -->
</body>
</html>