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
    $fpdf->Cell(30, 6, utf8_decode("REPORTE DE MOROSOS"), 0, 0, 'C');
    
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("Fecha: " . date("Y-m-d")), 0, 0, "L");
  
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("Lista de Morosos del Año: " . $anio["Aniolectivo"]["descripcion"]), 0, 0, "L");
    
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("Deuda Total: " . $deudatotal), 0, 0, "L");
    
    $fpdf->ln();
    $fpdf->ln();
    
    $fpdf->SetLineWidth(0.4);
    
    $fpdf->SetFont("Arial", "B", 11);
    $fpdf->Cell(50, 6, utf8_decode("Alumno"), "LRBT", 0, "C");
    $fpdf->Cell(50, 6, utf8_decode("Concepto"), "LRBT", 0, "C");
    $fpdf->Cell(50, 6, utf8_decode("Valor"), "LRBT", 0, "C");
    $fpdf->SetFont("Arial", "", 11);
    $fpdf->ln();
    
    $fpdf->SetLineWidth(0.2);
    
    foreach ($matriculas as $matricula) {
        if ($matricula["deuda"] > 0) {
            foreach ($matricula["Pago"] as $k_pago => $v_pago) {
                if ($k_pago == 0) {
                    $fpdf->SetFont("Arial", "B", 11);
                    $fpdf->Cell(50, 6, utf8_decode($matricula["Alumno"]["nombreCompleto"]), "LRBT", 0, "L");
                    $fpdf->Cell(50, 6, utf8_decode("Deuda Total"), "LRBT", 0, "L");
                    $fpdf->Cell(50, 6, utf8_decode($matricula["deuda"]), "LRBT", 0, "C");
                    $fpdf->ln();
                    
                    $fpdf->SetFont("Arial", "", 11);
                    
                    $fpdf->Cell(50, 6, utf8_decode(""), "LR", 0, "L");
                    $fpdf->Cell(50, 6, utf8_decode($v_pago["Concepto"]["descripcion"]), "LR", 0, "L");
                    $fpdf->Cell(50, 6, utf8_decode($v_pago["deuda"]), "LR", 0, "C");
                } elseif ($k_pago == (sizeof($matricula["Pago"]) - 1)) {
                    $fpdf->Cell(50, 6, utf8_decode(""), "LRB", 0, "L");
                    $fpdf->Cell(50, 6, utf8_decode($v_pago["Concepto"]["descripcion"]), "LRB", 0, "L");
                    $fpdf->Cell(50, 6, utf8_decode($v_pago["deuda"]), "LRB", 0, "C");
                } else {
                    $fpdf->Cell(50, 6, utf8_decode(""), "LR", 0, "L");
                    $fpdf->Cell(50, 6, utf8_decode($v_pago["Concepto"]["descripcion"]), "LR", 0, "L");
                    $fpdf->Cell(50, 6, utf8_decode($v_pago["deuda"]), "LR", 0, "C");
                }
                $fpdf->ln();
            }
        }
    }
    $fpdf->Output("Reporte_de_Morosos.pdf", "D");
?>