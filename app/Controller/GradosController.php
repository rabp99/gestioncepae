<?php

/**
 * CakePHP GradosController
 * @author Roberto
 */
class GradosController extends AppController {
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Grado.descripcion" => "asc"
        ),
        "conditions" => array(
            "Grado.estado" => 1
        )
    );
    
    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $grados = $this->Paginator->paginate();
        $this->set(compact("grados"));
    }
    
    public function add() {
        $this->layout = "main";
    }

}
