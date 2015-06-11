<?php

/**
 * CakePHP NotasController
 * @author admin
 */
class NotasController extends AppController {  
    public $uses = array("Bimestre", "Docente", "Curso", "Asignacion", "Nota");
        
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("administrar", "registrar", "getFormNotas", "getFormRegistro");
    }
    
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
        
    }
}
