<?php

/**
 * CakePHP NotasController
 * @author admin
 */
class NotasController extends AppController {  
    public $uses = array("Docente", "Curso", "Asignacion", "Nota");
    
    public function index() {
        $this->layout = "main";
        
        $user = $this->Auth->user();
        $docente = $this->Docente->findByIduser($user["iduser"]);
        
        $asignaciones = $this->Asignacion->find("all", array(
            "conditions" => array("Asignacion.estado" => 1, "Asignacion.iddocente" => $docente["Docente"]["iddocente"])
        ));
        
        $this->set(compact("asignaciones"));
    }
}
