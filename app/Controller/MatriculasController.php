<?php

/**
 * CakePHP MatriculasController
 * @author admin
 */
class MatriculasController extends AppController {   
    public $uses = array("Matricula");
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Matricula.fecha" => "asc"
        ),
        "conditions" => array(
            "Matricula.estado" => 1
        )
    );

    public function index($grado = null, $seccion = null) {
        $this->layout = "main";
        if($grado == null) {
            
        }
        /*$this->Paginator->settings = $this->paginate;
        $matriculas = $this->Paginator->paginate();
        $this->set(compact("matriculas"));
        */
    }
}