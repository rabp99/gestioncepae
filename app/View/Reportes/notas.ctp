<?php
    $fpdf->AddPage();
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
    
    $fpdf->ln(15);
    
    $fpdf->SetFont("Arial", "", 11);
    $fpdf->Cell(55);
    $fpdf->Cell(30, 6, utf8_decode("HOJA DE INFORMACIÓN - EDUCACIÓN " . $matricula["Seccion"]["Grado"]["Nivel"]["descripcion"]), 0, 0, 'C');
    
    $fpdf->ln();
    
    $fpdf->Cell(55);
    $fpdf->Cell(30, 6, utf8_decode(strtoupper($bimestre["Bimestre"]["descripcion"])), 0, 0, 'C');
  
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("ALUMNO(A): " . $matricula["Alumno"]["nombreCompleto"]), 0, 0, "L");
  
    $fpdf->ln();
    
    $fpdf->Cell(30, 6, utf8_decode("GRADO: " . $matricula["Seccion"]["Grado"]["descripcion"]), 0, 0, "L");
    $fpdf->Cell(72);
    $fpdf->Cell(30, 6, utf8_decode("AÑO LECTIVO: " . $matricula["Seccion"]["Aniolectivo"]["descripcion"]), 0, 0, "L");
    
    $fpdf->ln();
    
    $fpdf->SetLineWidth(0.4);
    $fpdf->Cell(112, 6, utf8_decode("ÁREA"), "LTR", 0, "C");
    $fpdf->Cell(25, 6, utf8_decode("PROMEDIO"), "LTR", 0, "C");
    $fpdf->Cell(25, 6, "", "LTR", 0, "C");
    $fpdf->Cell(26, 6, "", "LTR", 0, "C");
    
    $fpdf->ln();
    
    $fpdf->Cell(112, 6, utf8_decode("ASIGNATURA"), "LRB", 0, "C");
    $fpdf->Cell(25, 6, "", "LRB", 0, "C");
    $fpdf->Cell(25, 6, utf8_decode("SIMULACRO"), "LRB", 0, "C");
    $fpdf->Cell(26, 6, utf8_decode("PROM. FINAL"), "LRB", 0, "C");
    
    $fpdf->ln();
    
   
    $fpdf->Output("Reporte_de_Notas.pdf", "D");
?>