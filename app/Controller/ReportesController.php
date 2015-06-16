<?php

/**
 * CakePHP ReportesController
 * @author admin
 */
class ReportesController extends AppController {
    public $uses = array("User", "Alumno", "Matricula", "Bimestre", "Nota", "Curso", "Area", "Asignacion");
        
    public function index() {
    }
    
    public function notas() {
        App::import("Vendor", "Fpdf", array("file" => "fpdf/fpdf.php"));
        $this->layout = 'pdf'; //this will use the pdf.ctp layout

        $this->set("fpdf", new FPDF("P","mm","A4"));
        
        // Inicialización de variables
        $idaniolectivo = 1;
        
        $idbimestre = 1;
        
        $user = $this->User->findByIduser(2);
        $alumno = $this->Alumno->findByIduser($user["User"]["iduser"]);
        
        // Recuperación de información
        $this->Matricula->recursive = 3;
        $matricula = $this->Matricula->find("first", array(
            "conditions" => array("Seccion.idaniolectivo" => $idaniolectivo, "Matricula.idalumno" => $alumno["Alumno"]["idalumno"])
        ));
        
        $bimestre = $this->Bimestre->findByIdbimestre($idbimestre);
        
        $this->Curso->recursive = -1;
        $cursos = $this->Curso->find("all", array(
            "conditions" => array("Curso.idgrado" => $matricula["Seccion"]["Grado"]["idgrado"])
        ));
        
        $idareas = Set::format($cursos, "{0}", array("{n}.Curso.idarea"));
        $iareas = array_unique($idareas);
        
        $areas = $this->Area->find("all", array(
           "conditions" => array("Area.idarea" => $idareas) 
        ));
              
        foreach($areas as $k_area => $area) {
            $areas[$k_area]["Curso"] = array();
            foreach($cursos as $k_curso => $curso) {
                if($area["Area"]["idarea"] == $curso["Curso"]["idarea"]) {
                    
                    $this->Asignacion->recursive = -1;
                    $asignacion = $this->Asignacion->find("first", array(
                        "conditions" => array(
                            "Asignacion.idseccion" => $matricula["Seccion"]["idseccion"],
                            "Asignacion.idcurso" => $curso["Curso"]["idcurso"]
                        )
                    ));
                    $notas = $this->Nota->Detallenota->find("all", array(
                        "conditions" => array(
                            "Nota.idasignacion" => $asignacion["Asignacion"]["idasignacion"],
                            "Nota.idbimestre" => $bimestre["Bimestre"]["idbimestre"]
                        )
                    ));
                    $curso["Curso"]["promedio"] = $this->promedio($notas);
                    array_push($areas[$k_area]["Curso"], $curso["Curso"]);
                }
            }
            $areas[$k_area]["Area"]["promediofinal"] = $this->promediofinal($areas[$k_area]);
        }
        
        // Salida de la Información
        $this->set(compact("matricula"));
        $this->set(compact("bimestre"));
        $this->set(compact("areas"));
        
        $this->response->type("application/pdf");
    }
    
    private function promedio($notas) {
        // Calcular peso total
        $peso = 0;
        foreach($notas as $nota) {
            $peso += $nota["Nota"]["peso"];
        }
        $subpromedio = 0;
        foreach($notas as $nota) {
            $subpromedio += $nota["Nota"]["peso"] * $nota["Detallenota"]["valor"];
        }
        $promedio = $subpromedio / $peso;
        return $promedio;
    }
    
    private function promediofinal($area) {
        // Calcular peso total
        $subpromedio = 0;
        foreach($area["Curso"] as $curso) {
            $subpromedio += $curso["promedio"];
        }
        $promediofinal = $subpromedio / sizeof($area["Curso"]);
        
        return $promediofinal;
    }
}
