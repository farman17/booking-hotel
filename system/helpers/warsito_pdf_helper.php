<?php if(!defined('BASEPATH')) exit('No Direct Script Allowed');

function generate_pdf($object, $filename, $direct_download = true) {
	require_once 'dompdf/dompdf_config.inc.php';
	$dompdf = new DOMPDF();
	$dompdf->load_html($object);
	$dompdf->render();
	if($direct_download == true) {
		$dompdf->stream($filename);
	} else {
		return $dompdf->output();
	}
}