<?php

/**
 * CakePHP AsignacionesController
 * @author admin
 */
class AsignacionesController extends AppController {   
    public $uses = array("Asignacion", "Aniolectivo", "Nivel", "Curso", "Seccion");
   
    public function index() {
        $this->layout = "admin";
        
        $this->set("aniolectivos", $this->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $idaniolectivo = $this->Aniolectivo->getAniolectivoActual();
        $this->set(compact("idaniolectivo"));
        
        $this->set("niveles", $this->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        $this->Asignacion->recursive = 3;
        $asignaciones = $this->Asignacion->find("all", array(
            "conditions" => array("Seccion.idaniolectivo" => $idaniolectivo)
        ));
        
        $this->set(compact("asignaciones"));
    }
    
    public function registrar($idcurso = null, $idseccion = null) {
        $this->layout = "admin";
        
        $this->Seccion->recursive = 2;
        $this->set("seccion", $this->Seccion->findByIdseccion($idseccion));
        $this->set("curso", $this->Curso->findByIdcurso($idcurso));
        
        if($this->request->is(array("post", "put"))) {
            $this->Asignacion->create();
            if($this->Asignacion->save($this->request->data)) {
                $this->Session->setFlash(__("El Docente ha sido asignado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible asignar al Docente."), "flash_bootstrap");
        }
    }
      
    public function modificar($idcurso = null, $idseccion = null) {
        $this->layout = "admin";
        
        $this->Asignacion->recursive = 3;
        $asignacion = $this->Asignacion->find("first", array(
            "conditions" => array("Asignacion.idcurso" => $idcurso, "Asignacion.idseccion" => $idseccion)
        ));
        
        $this->set("asignacion", $asignacion);
        
        if($this->request->is(array("post", "put"))) {
            $this->Asignacion->id = $this->request->data["Asignacion"]["idasignacion"];
            if($this->Asignacion->save($this->request->data)) {
                $this->Session->setFlash(__("El Docente ha sido asignado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible asignar al Docente."), "flash_bootstrap");
        }
    }
    
    public function view($idcurso = null, $idseccion = null) {
        $this->layout = "admin";
        
        $this->Asignacion->recursive = 3;
        $this->set("asignacion", $this->Asignacion->find("first", array(
            "conditions" => array("Asignacion.idcurso" => $idcurso, "Asignacion.idseccion" => $idseccion)
        )));
    }

    public function getAsignaciones() {
        $this->layout = "ajax";
        
        $this->Curso->recursive = 2;
        $cursos = $this->Curso->find("all", array(
           "conditions" => array("Curso.estado" => 1, "Curso.idgrado" => $this->request->data["Grado"]["idgrado"]) 
        ));
        $seccion = $this->Seccion->findByIdseccion($this->request->data["Asignacion"]["idseccion"]);
        if(!empty($seccion)) {
            foreach($cursos as $k_curso => $curso) {
                $cursos[$k_curso]["Seccion"] = $seccion["Seccion"];

                $asignaciones = $curso["Asignacion"];
                unset($cursos[$k_curso]["Asignacion"]);

                foreach($asignaciones as $k_asignacion => $asignacion) {
                    if($asignacion["idseccion"] == $this->request->data["Asignacion"]["idseccion"] && $asignacion["Seccion"]["idaniolectivo"] == $this->request->data["Aniolectivo"]["idaniolectivo"]) {
                        $cursos[$k_curso]["Asignacion"][0] = $asignacion;
                    }
                }
            }
            $this->set(compact("cursos"));
        }
    }
}
