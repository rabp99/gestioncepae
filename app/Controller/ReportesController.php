<?php

/**
 * CakePHP ReportesController
 * @author admin
 */
class ReportesController extends AppController {
    public $uses = array("User", "Alumno", "Matricula", "Bimestre", "Nota", "Curso", "Area", "Asignacion", "Padre");
        
    public function notas_alumno() {
        $this->layout = "alumno";
        
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $idaniolectivo = $this->Matricula->Seccion->Aniolectivo->getAniolectivoActual();
        
        $this->set(compact("idaniolectivo"));
        
        $this->set("bimestres", $this->Bimestre->find("list", array(
            "fields" => array("Bimestre.idbimestre", "Bimestre.descripcion"),
            "conditions" => array("Bimestre.estado" => 1)
        )));
    }
   
    public function notas_apoderado() {
        $this->layout = "apoderado";
        
        $user = $this->Auth->user();
        $this->Padre->recursive = 2;
        $padre = $this->Padre->findByIduser($user["iduser"]);
                
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        $this->set("alumnos", Set::combine($padre["AlumnosPadre"], "{n}.idalumno", "{n}.Alumno.nombreCompleto"));
        
        $idaniolectivo = $this->Matricula->Seccion->Aniolectivo->getAniolectivoActual();
        
        $this->set(compact("idaniolectivo"));
        
        $this->set("bimestres", $this->Bimestre->find("list", array(
            "fields" => array("Bimestre.idbimestre", "Bimestre.descripcion"),
            "conditions" => array("Bimestre.estado" => 1)
        )));
    }
    
    public function notas_alumno_post() {
        App::import("Vendor", "Fpdf", array("file" => "fpdf/fpdf.php"));
        $this->layout = 'pdf'; //this will use the pdf.ctp layout

        $this->set("fpdf", new FPDF("P","mm","A4"));
        
        // Inicialización de variables
        $idaniolectivo = $this->request->data["Reporte"]["idaniolectivo"];
        
        $idbimestre = $this->request->data["Reporte"]["idbimestre"];
        
        $user = $this->Auth->user();
        $alumno = $this->Alumno->findByIduser($user["iduser"]);
        
        // Recuperación de información
        $this->Matricula->recursive = 3;
        $matricula = $this->Matricula->find("first", array(
            "conditions" => array("Seccion.idaniolectivo" => $idaniolectivo, "Matricula.idalumno" => $alumno["Alumno"]["idalumno"])
        ));
        
        $bimestre = $this->Bimestre->findByIdbimestre($idbimestre);
        
        if(!isset($matricula["Seccion"])) {
            $this->Session->setFlash(__("Aún no es posible generar la Boleta de Notas."), "flash_bootstrap");
            return $this->redirect(array("action" => "notas_alumno"));
        }
        
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
                    if(!isset($asignacion["Asignacion"])) {
                        $this->Session->setFlash(__("Aún no es posible generar la Boleta de Notas."), "flash_bootstrap");
                        return $this->redirect(array("action" => "notas_alumno"));
                    }
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
     
    public function notas_apoderado_post() {
        App::import("Vendor", "Fpdf", array("file" => "fpdf/fpdf.php"));
        $this->layout = 'pdf'; //this will use the pdf.ctp layout

        $this->set("fpdf", new FPDF("P","mm","A4"));
        
        // Inicialización de variables
        $idaniolectivo = $this->request->data["Reporte"]["idaniolectivo"];
        
        $idbimestre = $this->request->data["Reporte"]["idbimestre"];
        
        // Recuperación de información
        $this->Matricula->recursive = 3;
        $matricula = $this->Matricula->find("first", array(
            "conditions" => array("Seccion.idaniolectivo" => $idaniolectivo, "Matricula.idalumno" => $this->request->data["Reporte"]["idalumno"])
        ));
        
        $bimestre = $this->Bimestre->findByIdbimestre($idbimestre);
        
        if(!isset($matricula["Seccion"])) {
            $this->Session->setFlash(__("Aún no es posible generar la Boleta de Notas."), "flash_bootstrap");
            return $this->redirect(array("action" => "notas_apoderado"));
        }
        
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
                    if(!isset($asignacion["Asignacion"])) {
                        $this->Session->setFlash(__("Aún no es posible generar la Boleta de Notas."), "flash_bootstrap");
                        return $this->redirect(array("action" => "notas_apoderado"));
                    }
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
        if($peso == 0) return 0;
        $promedio = $subpromedio / $peso;
        return CakeNumber::precision($promedio, 2);
    }
    
    private function promediofinal($area) {
        // Calcular peso total
        $subpromedio = 0;
        foreach($area["Curso"] as $curso) {
            $subpromedio += $curso["promedio"];
        }
        $promediofinal = $subpromedio / sizeof($area["Curso"]);
        
        return CakeNumber::precision($promediofinal, 2);
    }
}
