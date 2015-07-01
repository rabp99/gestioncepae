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
    
    foreach($areas as $area) {
        if($area["Area"]["idarea"] != 1) {
            $fpdf->Cell(112, 6, utf8_decode($area["Area"]["descripcion"]), "LRB", 0, "L");
            $fpdf->Cell(25, 6, "", "LRB", 0, "C");
            $fpdf->Cell(25, 6, "", "LRB", 0, "C");
            $fpdf->Cell(26, 6, utf8_decode($area["Area"]["promediofinal"]), "LRB", 0, "C");

            $fpdf->ln();

            $i = 0;
            foreach($area["Curso"] as $curso) {
                $fpdf->Cell(22, 6, "", ($i == 0 ? ($i + 1 == sizeof($area["Curso"]) ? "LRBT" : "LRT") : ($i + 1 == sizeof($area["Curso"]) ? "LRB" : "LR")), 0, "C");
                $fpdf->Cell(90, 6, utf8_decode($curso["descripcion"]), "LRB", 0, "L");
                $fpdf->Cell(25, 6, utf8_decode($curso["promedio"]), "LRB", 0, "C");
                $fpdf->Cell(25, 6, "", "LR", 0, "C");
                $fpdf->Cell(26, 6, "", "LR", 0, "C");

                $fpdf->ln();
                $i++;
            }
            $fpdf->Cell(137, 6, "", "LRB", 0, "L");
            $fpdf->Cell(25, 6, "", "LRB", 0, "L");
            $fpdf->Cell(26, 6, "", "LRB", 0, "L");
            $fpdf->ln();
        }
    } 
    
    foreach($areas as $area) {
        if($area["Area"]["idarea"] == 1) {
            foreach($area["Curso"] as $curso) {
                $fpdf->Cell(112, 6, utf8_decode($curso["descripcion"]), "LRB", 0, "L");
                $fpdf->Cell(25, 6, "", "LRB", 0, "C");
                $fpdf->Cell(25, 6, "", "LRB", 0, "C");
                $fpdf->Cell(26, 6, utf8_decode($curso["promedio"]), "LRB", 0, "C");

                $fpdf->ln();
            }
        }
    }
    
   
    $fpdf->Output("Reporte_de_Notas.pdf", "D");
?>