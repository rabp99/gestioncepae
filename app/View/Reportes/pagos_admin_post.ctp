<?php
    $fpdf->AddPage();
    
    $fpdf->Image("../../app/webroot/img/images/insifon.jpg", 152, 7, 39, 50);
    
    $fpdf->SetFont("Times", "", 14);
    $fpdf->Cell(55);
    $fpdf->Cell(30, 6, utf8_decode("INSTITUCIÓN EDUCATIVA PARTICULAR"), 0, 0, 'C');
    
    $fpdf->ln();
    
    $fpdf->SetFont("Times", "B", 14);
    $fpdf->Cell(55);
    $fpdf->Cell(30, 6, utf8_decode("\"CEPAE\""), 0, 0, 'C');
    
    $fpdf->ln();
    
    $fpdf->SetFont("Times", "", 14);
    $fpdf->Cell(55);
    $fpdf->Cell(30, 6, utf8_decode("INICIAL - PRIMARIA - SECUNDARIA"), 0, 0, 'C');
    
    $fpdf->ln();
    
    $fpdf->Cell(55);
    $fpdf->Cell(30, 6, utf8_decode("RD. 008688-05"), 0, 0, 'C');
    
    $fpdf->ln(20);
    
    $fpdf->SetFont("Arial", "", 11);
    $fpdf->Cell(55);
    $fpdf->Cell(30, 6, utf8_decode("REPORTE DE PAGOS"), 0, 0, 'C');
    
    $fpdf->ln();
    
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("USUARIO: " . $usuario["username"]), 0, 0, "L");
  
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("FILTRO: " . $filtro), 0, 0, "L");
    
    $fpdf->ln();
    $fpdf->ln();
    
    $fpdf->SetLineWidth(0.4);
    
    $fpdf->Cell(50, 6, utf8_decode("Monto"), "LRBT", 0, "C");
    $fpdf->Cell(50, 6, utf8_decode("Fecha"), "LRBT", 0, "C");
    $fpdf->Cell(50, 6, utf8_decode("Usuario"), "LRBT", 0, "C");
    
    $fpdf->ln();
    
    $fpdf->SetLineWidth(0.2);
    
    $total_pago = 0;
    $total_devolucion = 0;
    foreach($detallepagos as $detallepago) {
        $fpdf->Cell(50, 6, utf8_decode($detallepago["Detallepago"]["estado"] == 2 ? "-" . $detallepago["Detallepago"]["monto"] : $detallepago["Detallepago"]["monto"]), "LRB", 0, "C");
        $fpdf->Cell(50, 6, utf8_decode($detallepago["Detallepago"]["created"]), "LRB", 0, "C");
        $fpdf->Cell(50, 6, utf8_decode($detallepago["User"]["username"]), "LRB", 0, "C");
          
        if($detallepago["Detallepago"]["estado"] == 1) {
            $total_pago += $detallepago["Detallepago"]["monto"];
        } else {
            $total_devolucion += $detallepago["Detallepago"]["monto"];
        }
        
        $fpdf->ln();
    }
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("Resumen"), 0, 0, "L");
    
    $fpdf->ln();
    
    $fpdf->Cell(50, 6, utf8_decode("TOTAL DE PAGO"), "LRBT", 0, "C");
    $fpdf->Cell(50, 6, utf8_decode($total_pago), "LRBT", 0, "C");
    $fpdf->ln();
    $fpdf->Cell(50, 6, utf8_decode("TOTAL DE DEVOLUCIÒN"), "LRBT", 0, "C");
    $fpdf->Cell(50, 6, utf8_decode($total_devolucion), "LRBT", 0, "C");
    $fpdf->ln();
    $fpdf->SetLineWidth(0.4);
    $fpdf->Cell(50, 6, utf8_decode("TOTAL"), "LRBT", 0, "C");
    $fpdf->Cell(50, 6, utf8_decode($total_pago - $total_devolucion), "LRBT", 0, "C");
    
    $fpdf->Output("Reporte_de_Pagos.pdf", "D");
?>