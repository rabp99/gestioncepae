<?php

/**
 * CakePHP ConceptosController
 * @author admin
 */
class ConceptosController extends AppController {
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Concepto.descripcion" => "asc"
        ),
        "conditions" => array(
            "Concepto.estado" => 1
        )
    );

    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $conceptos = $this->Paginator->paginate();
        $this->set(compact("conceptos"));
    }
    
    public function add() {
        $this->layout = "main";
               
    }

    public function view($id = null) {
        $this->layout = "main";
                
    }
    
    public function edit($id = null) {
        $this->layout = "main";

    }
    
    public function delete($id) {
    }
}
