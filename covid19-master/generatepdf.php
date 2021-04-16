<?php
include('pdflayer.class.php');
$filename = date("d-m-Y");
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//Instantiate the class
$html2pdf = new pdflayer();
//set the URL to convert
$html2pdf->set_param('document_url', $actual_link);

//start the conversion
$html2pdf->convert();
$html2pdf->download_pdf( 'covid19_'. $filename . '.pdf');
