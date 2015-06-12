<?php
    $fpdf->AddPage();
    $fpdf->SetFont("Times", "", 16);
    $fpdf->Cell(60);
    $fpdf->Cell(30, 10, utf8_decode("INSTITUCIÓN EDUCATIVA PARTICULAR"), 0, 0, 'C');
    
    $fpdf->ln();
    
    $fpdf->SetFont("Times", "B", 16);
    $fpdf->Cell(60);
    $fpdf->Cell(30, 10, utf8_decode("\"CEPAE\""), 0, 1, 'C');
    
    $fpdf->ln();
    
    $fpdf->SetFont("Times", "", 16);
    $fpdf->Cell(60);
    $fpdf->Cell(30, 10, utf8_decode("INICIAL - PRIMARIA - SECUNDARIA"), 0, 0, 'C');
    
    $fpdf->ln();
    
    $fpdf->Cell(60);
    $fpdf->Cell(30, 10, utf8_decode("RD. 008688-05"), 0, 0, 'C');
    
    $fpdf->ln();
    
    $fpdf->SetFont("Arial", "", 14);
    $fpdf->Cell(60);
    $fpdf->Cell(30, 10, utf8_decode("HOJA DE INFORMACIÓN - EDUCACIÓN" . $alumno["Matricula"]["Seccion"]["Grado"]["Nivel"]["descripcion"]), 0, 0, 'C');
    
    $fpdf->Output("Reporte_de_Notas.pdf", "D");
?>