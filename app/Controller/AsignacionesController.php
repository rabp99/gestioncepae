<?php

/**
 * CakePHP AsignacionesController
 * @author admin
 */
class AsignacionesController extends AppController {   
    public $uses = array("Asignacion", "Aniolectivo", "Nivel");
    
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
}
