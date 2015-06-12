<?php

/**
 * CakePHP NotasController
 * @author admin
 */
class NotasController extends AppController {  
    public $uses = array("Bimestre", "Docente", "Curso", "Asignacion", "Nota", "Detallenota");
        
    public function index() {
        $this->layout = "main";
        
        $user = $this->Auth->user();
        $docente = $this->Docente->findByIduser($user["iduser"]);
        
        $this->Asignacion->recursive = 3;
        $asignaciones = $this->Asignacion->find("all", array(
            "conditions" => array("Asignacion.estado" => 1, "Asignacion.iddocente" => $docente["Docente"]["iddocente"])
        ));

        $this->set(compact("asignaciones"));
    }
    
    public function administrar($idasignacion) {
        $this->layout = "main";
        
        $asignacion = $this->Asignacion->findByIdasignacion($idasignacion);
        
        $this->set(compact("asignacion"));
        
        $this->set("bimestres", $this->Bimestre->find("list", array(
            "fields" => array("Bimestre.idbimestre", "Bimestre.descripcion"),
            "conditions" => array("Bimestre.estado" => 1)
        )));
        
        if($this->request->is(array("post", "put"))) {
            $this->Nota->create();
            if($this->Nota->save($this->request->data)) {
                $this->Session->setFlash(__("La Nota ha sido registrada correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }   
            $this->Session->setFlash(__("La Nota no ha sido registrada correctamente."), "flash_bootstrap");
        }
    }
    
    public function registrar($idasignacion) {
        $this->layout = "main";
        
        $asignacion = $this->Asignacion->findByIdasignacion($idasignacion);
        
        $this->set(compact("asignacion"));
        
        $this->set("bimestres", $this->Bimestre->find("list", array(
            "fields" => array("Bimestre.idbimestre", "Bimestre.descripcion"),
            "conditions" => array("Bimestre.estado" => 1)
        )));
        
        if($this->request->is(array("post", "put"))) {
            $this->Detallenota->create();
            if($this->Detallenota->saveMany($this->request->data["Detallenota"])) {
                $this->Session->setFlash(__("Las Notas han sido registradas correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }   
            $this->Session->setFlash(__("Las Notas no han sido registradas correctamente."), "flash_bootstrap");
        }
    }
        
    public function getFormNotas() {
        $this->layout = "ajax";
        
        $notas = $this->Nota->find("all", array(
            "conditions" => array(
                "Nota.estado" => 1,
                "Nota.idasignacion" => $this->request->data["Nota"]["idasignacion"],
                "Nota.idbimestre" => $this->request->data["Nota"]["idbimestre"]
            )
        ));
        
        $this->set(compact("notas"));
    }
    
    public function getFormRegistro() {
        $this->layout = "ajax";
        
        $notas = $this->Nota->find("all", array(
            "conditions" => array(
                "Nota.estado" => 1,
                "Nota.idasignacion" => $this->request->data["Nota"]["idasignacion"],
                "Nota.idbimestre" => $this->request->data["Nota"]["idbimestre"]
            )
        ));
        $asignacion = $this->Asignacion->findByIdasignacion($this->request->data["Nota"]["idasignacion"]);
        $this->Asignacion->Seccion->recursive = 2;
        $seccion = $this->Asignacion->Seccion->findByIdseccion($asignacion["Asignacion"]["idseccion"]);
        
        $this->set("matriculas", $seccion["Matricula"]);
        $this->set(compact("notas"));
    }
}
