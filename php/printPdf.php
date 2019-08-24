<?php 
  require_once '../vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;

try {
    //Recoger el contenido de otro fichero
    ob_start();
    require_once 'documento.php';
    $html= ob_get_clean();

    $pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', 3);
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->writeHTML($html);
    $pdf->output('BitacoraRealDelBosque.pdf');
  } catch (Html2PdfException $e) {
    $pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
   ?>