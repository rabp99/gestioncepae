<?php

/**
 * CakePHP ReportesController
 * @author admin
 */
class ReportesController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("matriculas", "matriculas_post");
    }

    public $uses = array("User", "Alumno", "Matricula", "Bimestre", "Nota", "Curso", "Area", "Asignacion", "Padre", "Detallepago");
        
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
        $this->Padre->recursive = 4;
        $padre = $this->Padre->findByIduser($user["iduser"]);
                
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        // $this->set("alumnos", Set::combine($padre["AlumnosPadre"], "{n}.idalumno", "{n}.Alumno.nombreCompleto"));
        
        $idaniolectivo = $this->Matricula->Seccion->Aniolectivo->getAniolectivoActual();
         
        $alumnos_aux = $padre["AlumnosPadre"];
        $alumnos = array();
        foreach ($alumnos_aux as $alumno_aux) {
            foreach ($alumno_aux["Alumno"]["Matricula"] as $matricula) {
                if ($matricula["Seccion"]["idaniolectivo"] == $idaniolectivo) {
                    $alumnos[$alumno_aux["Alumno"]["idalumno"]] = $alumno_aux["Alumno"]["nombreCompleto"];
                    break;
                }
            }
        }
        $this->set("alumnos", $alumnos);
        
        $this->set(compact("idaniolectivo"));
        
        $this->set("bimestres", $this->Bimestre->find("list", array(
            "fields" => array("Bimestre.idbimestre", "Bimestre.descripcion"),
            "conditions" => array("Bimestre.estado" => 1)
        )));
        
        if ($this->request->is(array("post", "put"))) {
            $idaniolectivo = $this->request->data["Reporte"]["idaniolectivo"];
            
            $alumnos_aux = $padre["AlumnosPadre"];
            $alumnos = array();
            foreach ($alumnos_aux as $alumno_aux) {
                foreach ($alumno_aux["Alumno"]["Matricula"] as $matricula) {
                    if ($matricula["Seccion"]["idaniolectivo"] == $idaniolectivo) {
                        $alumnos[$alumno_aux["Alumno"]["idalumno"]] = $alumno_aux["Alumno"]["nombreCompleto"];
                        break;
                    }
                }
            }
            $this->set("alumnos", $alumnos);
            $this->set(compact("idaniolectivo"));
        }
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
        
       /* if(!isset($matricula["Seccion"])) {
            $this->Session->setFlash(__("Aún no es posible generar la Boleta de Notas."), "flash_bootstrap");
            return $this->redirect(array("action" => "notas_alumno"));
        }
        */
        $this->Curso->recursive = -1;
        $cursos = $this->Curso->find("all", array(
            "conditions" => array("Curso.idgrado" => $matricula["Seccion"]["Grado"]["idgrado"])
        ));
        
        $idareas = Set::format($cursos, "{0}", array("{n}.Curso.idarea"));
        $idareas = array_unique($idareas);
        
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
                    /*if(!isset($asignacion["Asignacion"])) {
                        $this->Session->setFlash(__("Aún no es posible generar la Boleta de Notas."), "flash_bootstrap");
                        return $this->redirect(array("action" => "notas_alumno"));
                    }*/
                    if(isset($asignacion["Asignacion"])) {
                        $notas = $this->Nota->Detallenota->find("all", array(
                            "conditions" => array(
                                "Nota.idasignacion" => $asignacion["Asignacion"]["idasignacion"],
                                "Nota.idbimestre" => $bimestre["Bimestre"]["idbimestre"]
                            )
                        ));
                        $curso["Curso"]["promedio"] = $this->promedio($notas);
                    } else {
                        $curso["Curso"]["promedio"] = 0;
                    }
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
        
        /*
        if(!isset($matricula["Seccion"])) {
            $this->Session->setFlash(__("Aún no es posible generar la Boleta de Notas."), "flash_bootstrap");
            return $this->redirect(array("action" => "notas_apoderado"));
        }
        */
        $this->Curso->recursive = -1;
        $cursos = $this->Curso->find("all", array(
            "conditions" => array("Curso.idgrado" => $matricula["Seccion"]["Grado"]["idgrado"])
        ));
        
        $idareas = Set::format($cursos, "{0}", array("{n}.Curso.idarea"));
        $idareas = array_unique($idareas);
        
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
                    /*
                    if(!isset($asignacion["Asignacion"])) {
                        $this->Session->setFlash(__("Aún no es posible generar la Boleta de Notas."), "flash_bootstrap");
                        return $this->redirect(array("action" => "notas_apoderado"));
                    }
                    */
                    if (isset($asignacion["Asignacion"])) {
                        $notas = $this->Nota->Detallenota->find("all", array(
                            "conditions" => array(
                                "Nota.idasignacion" => $asignacion["Asignacion"]["idasignacion"],
                                "Nota.idbimestre" => $bimestre["Bimestre"]["idbimestre"]
                            )
                        ));
                        $curso["Curso"]["promedio"] = $this->promedio($notas);
                    } else {
                        $curso["Curso"]["promedio"] = 0;
                    }
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
    
    public function pagos() {
        $this->layout = "pagos";    
        
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.descripcion", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $this->set("meses", array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio",
            "7" => "Julio", "8" => "Agosto", "9" => "Setiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre"
        ));
    }   
    
    public function pagos_admin() {
        $this->layout = "admin";    
        
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.descripcion", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $this->set("meses", array("1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio",
            "7" => "Julio", "8" => "Agosto", "9" => "Setiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre"
        ));
    }
    
    public function pagos_post() {
        App::import("Vendor", "Fpdf", array("file" => "fpdf/fpdf.php"));
        $this->layout = 'pdf'; //this will use the pdf.ctp layout

        $this->set("fpdf", new FPDF("P","mm","A4"));
        // Comprobar
        
        if(!isset($this->request->data["Reporte"]["tipo"])) {
            $this->Session->setFlash(__("Selecciona un tipo de Reporte."), "flash_bootstrap");
            return $this->redirect(array("action" => "pagos"));
        }
        // Inicialización de variables
        $tipo = $this->request->data["Reporte"]["tipo"];
        $usuario = $this->Auth->user();
        // Recuperación de información
        switch($tipo) {
            case 1:
                if($this->request->data["Reporte"]["fechadia"] == "") {
                    $this->Session->setFlash(__("Especifique la fecha."), "flash_bootstrap");
                    return $this->redirect(array("action" => "pagos"));
                }
                $fechadia = $this->request->data["Reporte"]["fechadia"];
                $detallepagos = $this->Detallepago->find("all", array(
                    "conditions" => array("Detallepago.iduser" => $usuario["iduser"], "Detallepago.created" => $fechadia)
                ));
                $filtro = "Pagos del día: " . $fechadia;
            break;
            case 2:
                if($this->request->data["Reporte"]["anio1"] == "" || $this->request->data["Reporte"]["mes"] == "") {
                    $this->Session->setFlash(__("Especifique la fecha."), "flash_bootstrap");
                    return $this->redirect(array("action" => "pagos"));
                }
                $anio = $this->request->data["Reporte"]["anio1"];
                $mes = $this->request->data["Reporte"]["mes"];
                $detallepagos = $this->Detallepago->find("all", array(
                    "conditions" => array("Detallepago.iduser" => $usuario["iduser"], "MONTH(Detallepago.created)" => $mes, "YEAR(Detallepago.created)" => $anio)
                ));
                $filtro = "Pagos del mes: " . $mes . "/" . $anio;
            break;
            case 3:
                if($this->request->data["Reporte"]["anio2"] == "") {
                    $this->Session->setFlash(__("Especifique la fecha."), "flash_bootstrap");
                    return $this->redirect(array("action" => "pagos"));
                }
                $anio = $this->request->data["Reporte"]["anio2"];
                $detallepagos = $this->Detallepago->find("all", array(
                    "conditions" => array("Detallepago.iduser" => $usuario["iduser"], "YEAR(Detallepago.created)" => $anio)
                ));
                $filtro = "Pagos del año: " . $anio;
            break;
        }
        
        // Salida de la Información
        $this->set(compact("detallepagos"));
        $this->set(compact("usuario"));
        $this->set(compact("filtro"));
        
        $this->response->type("application/pdf");
    }
    
    public function pagos_admin_post() {
        App::import("Vendor", "Fpdf", array("file" => "fpdf/fpdf.php"));
        $this->layout = 'pdf'; //this will use the pdf.ctp layout

        $this->set("fpdf", new FPDF("P","mm","A4"));
        // Comprobar
        
        if(!isset($this->request->data["Reporte"]["tipo"])) {
            $this->Session->setFlash(__("Selecciona un tipo de Reporte."), "flash_bootstrap");
            return $this->redirect(array("action" => "pagos_admin"));
        }
        // Inicialización de variables
        $tipo = $this->request->data["Reporte"]["tipo"];
        $usuario = $this->Auth->user();
        // Recuperación de información
        switch($tipo) {
            case 1:
                if($this->request->data["Reporte"]["fechadia"] == "") {
                    $this->Session->setFlash(__("Especifique la fecha."), "flash_bootstrap");
                    return $this->redirect(array("action" => "pagos_admin"));
                }
                $fechadia = $this->request->data["Reporte"]["fechadia"];
                $detallepagos = $this->Detallepago->find("all", array(
                    "conditions" => array("Detallepago.created" => $fechadia)
                ));
                $filtro = "Pagos del día: " . $fechadia;
            break;
            case 2:
                if($this->request->data["Reporte"]["anio1"] == "" || $this->request->data["Reporte"]["mes"] == "") {
                    $this->Session->setFlash(__("Especifique la fecha."), "flash_bootstrap");
                    return $this->redirect(array("action" => "pagos_admin"));
                }
                $anio = $this->request->data["Reporte"]["anio1"];
                $mes = $this->request->data["Reporte"]["mes"];
                $detallepagos = $this->Detallepago->find("all", array(
                    "conditions" => array("MONTH(Detallepago.created)" => $mes, "YEAR(Detallepago.created)" => $anio)
                ));
                $filtro = "Pagos del mes: " . $mes . "/" . $anio;
            break;
            case 3:
                if($this->request->data["Reporte"]["anio2"] == "") {
                    $this->Session->setFlash(__("Especifique la fecha."), "flash_bootstrap");
                    return $this->redirect(array("action" => "pagos_admin"));
                }
                $anio = $this->request->data["Reporte"]["anio2"];
                $detallepagos = $this->Detallepago->find("all", array(
                    "conditions" => array("YEAR(Detallepago.created)" => $anio)
                ));
                $filtro = "Pagos del año: " . $anio;
            break;
        }
        
        // Salida de la Información
        $this->set(compact("detallepagos"));
        $this->set(compact("usuario"));
        $this->set(compact("filtro"));
        
        $this->response->type("application/pdf");
    }
    
    public function morosos() {
        $this->layout = "admin";
        
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
    }
    
    public function morosos_post() {
        App::import("Vendor", "Fpdf", array("file" => "fpdf/fpdf.php"));
        $this->layout = "pdf"; //this will use the pdf.ctp layout

        $this->set("fpdf", new FPDF("P","mm","A4"));
        // Comprobar
        if($this->request->data["Reporte"]["anio"] == "") {
            $this->Session->setFlash(__("Selecciona un año lectivo."), "flash_bootstrap");
            return $this->redirect(array("action" => "morosos"));
        }
        // Inicialización de variables
        $idanio = $this->request->data["Reporte"]["anio"];
        $idaniolectivoactual = $this->Asignacion->Seccion->Aniolectivo->getAniolectivoActual();
        $dia = date("Y-m-d");
        $anio = $this->Asignacion->Seccion->Aniolectivo->findByIdaniolectivo($idanio);
        
        // Recuperación de información
        $deudatotal = 0;
        if($idanio == $idaniolectivoactual) {
            $this->Matricula->recursive = 2;
            $matriculas = $this->Matricula->find("all", array(
               "conditions" => array("Seccion.idaniolectivo" => $idanio) 
            ));
            foreach($matriculas as $k_matricula => $matricula) {
                $pagos = $matricula["Pago"];
                $matriculas[$k_matricula]["deuda"] = 0;
                foreach($pagos as $pago) {
                    if($pago["fechalimite"] < $dia) {
                        $deudatotal += $pago["deuda"];
                        $matriculas[$k_matricula]["deuda"] += $pago["deuda"];
                    }
                }
            }
        } else {
            $this->Matricula->recursive = 2;
            $matriculas = $this->Matricula->find("all", array(
               "conditions" => array("Seccion.idaniolectivo" => $idanio) 
            ));
            foreach($matriculas as $k_matricula => $matricula) {
                $pagos = $matricula["Pago"];
                $matriculas[$k_matricula]["deuda"] = 0;
                foreach($pagos as $pago) {
                    $deudatotal += $pago["deuda"];
                    $matriculas[$k_matricula]["deuda"] += $pago["deuda"];
                }
            }
        }
        // Salida de la Información
        $this->set(compact("deudatotal"));
        $this->set(compact("matriculas"));
        $this->set(compact("anio"));
        
        $this->response->type("application/pdf");
    }
    
    public function matriculas() {
        $this->layout = "admin";
        
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $this->set("niveles", $this->Matricula->Seccion->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
    }  
    
    public function matriculas_post() {
        App::import("Vendor", "Fpdf", array("file" => "fpdf/fpdf.php"));
        $this->layout = "pdf"; //this will use the pdf.ctp layout

        $this->set("fpdf", new FPDF("P","mm","A4"));
        // Comprobar
        if($this->request->data["Aniolectivo"]["idaniolectivo"] == "") {
            $this->Session->setFlash(__("Selecciona un Año Lectivo."), "flash_bootstrap");
            return $this->redirect(array("action" => "matriculas"));
        }
        
        // Inicialización de variables
        $idseccion = $this->request->data["Reporte"]["idseccion"];
        
        // Recuperación de información
        $matriculas = $this->Matricula->find("all", array(
           "conditions" => array("Matricula.idseccion" => $idseccion, "Matricula.estado" => 1) 
        ));
        
        $this->Matricula->Seccion->recursive = 2;
        $seccion = $this->Matricula->Seccion->findByIdseccion($idseccion);
        
        // Salida de la Información
        $this->set(compact("matriculas"));
        $this->set(compact("seccion"));
                
        $this->response->type("application/pdf");
    }
}
