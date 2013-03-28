<?php

ob_start();
    include(dirname(__FILE__).'/html/laporan_convert_pdf_cari.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/pdf html/html2pdf.class.php');
    try
    {
        @$html2pdf = new HTML2PDF('P', 'A4', 'fr');
        @$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        @$html2pdf->Output('laporan_training.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }



?>