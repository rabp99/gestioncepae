<?php

/**
 * CakePHP AsignacionesController
 * @author admin
 */
class AsignacionesController extends AppController {   
    public $uses = array("Asignacion", "Aniolectivo", "Nivel", "Curso", "Seccion");
    
    public function index() {
        $this->layout = "main";
        
        $this->set("aniolectivos", $this->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $this->set("niveles", $this->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
    }
    
    public function registrar($idcurso = null, $idseccion = null) {
        $this->layout = "main";
        
        
    }

    public function getAsignaciones() {
        $this->layout = "ajax";
        
        $this->Curso->recursive = 2;
        $cursos = $this->Curso->find("all", array(
           "conditions" => array("Curso.estado" => 1, "Curso.idgrado" => $this->request->data["Grado"]["idgrado"]) 
        ));
        $seccion = $this->Seccion->findByIdseccion($this->request->data["Asignacion"]["idseccion"]);
        
        foreach($cursos as $k_curso => $curso) {
            $cursos[$k_curso]["Seccion"] = $seccion["Seccion"];
            foreach($curso["Asignacion"] as $k_asignacion => $asignacion) {
                if($asignacion["idseccion"] != $this->request->data["Asignacion"]["idseccion"]) {
                    unset($cursos[$k_curso]["Asignacion"][$k_asignacion]);
                }
            }
        }
        $this->set(compact("cursos"));
    }
}
