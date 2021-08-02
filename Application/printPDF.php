<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;

ob_start();
include "trucks/trucksdata.php";

$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
$dompdf->set_option('isRemoteEnabled', true);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("camion.pdf");

