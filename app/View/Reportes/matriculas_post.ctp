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
    $fpdf->Cell(30, 6, utf8_decode("REPORTE DE MATRICULAS"), 0, 0, 'C');
    
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("Fecha: " . date("Y-m-d")), 0, 0, "L");

    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("Año Lectivo: " . $seccion["Aniolectivo"]["descripcion"]), 0, 0, "L");
    
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("Nivel: " . $seccion["Grado"]["Nivel"]["descripcion"]), 0, 0, "L");
    
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("Grado y Sección: " . $seccion["Grado"]["descripcion"] . " \"" . $seccion["Seccion"]["descripcion"] . "\""), 0, 0, "L");
    
    $fpdf->ln();
    $fpdf->ln();
    
    $fpdf->SetLineWidth(0.2);
    
    $fpdf->Cell(10, 6, utf8_decode("N°"), "LRBT", 0, "C");
    $fpdf->Cell(80, 6, utf8_decode("Alumno"), "LRBT", 0, "C");
    $fpdf->Cell(50, 6, utf8_decode("Fecha de Registro"), "LRBT", 0, "C");
    
    $fpdf->ln();
    
    foreach($matriculas as $k_matricula => $matricula) {
        $fpdf->Cell(10, 6, utf8_decode($k_matricula + 1), "LRBT", 0, "C");
        $fpdf->Cell(80, 6, utf8_decode($matricula["Alumno"]["nombreCompleto"]), "LRBT", 0, "C");
        $fpdf->Cell(50, 6, utf8_decode($matricula["Matricula"]["created"]), "LRBT", 0, "C");
        $fpdf->ln();
    }
    
    $fpdf->Output("Reporte_de_Matriculas.pdf", "D");
?>