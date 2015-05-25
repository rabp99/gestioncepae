<?php

/**
 * CakePHP NivelesController
 * @author admin
 */
class NivelesController extends AppController {   
    public $uses = array("Nivel");
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Nivel.descripcion" => "asc"
        ),
        "conditions" => array(
            "Nivel.estado" => 1
        )
    );

    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $niveles = $this->Paginator->paginate();
        $this->set(compact("niveles"));
    }
    
    public function add() {
        $this->layout = "main";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Nivel->create();
            if ($this->Nivel->save($this->request->data)) {
                $this->Session->setFlash(__("El nivel ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el nivel."), "flash_bootstrap");
        }
    }

}
