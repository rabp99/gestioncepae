<?php

/**
 * CakePHP AreasController
 * @author admin
 */
class AreasController extends AppController {   
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Area.descripcion" => "asc"
        ),
        "conditions" => array(
            "Area.estado" => 1
        )
    );

    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $areas = $this->Paginator->paginate();
        $this->set(compact("areas"));
    }
    
    public function add() {
        $this->layout = "main";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Area->create();
            if ($this->Area->save($this->request->data)) {
                $this->Session->setFlash(__("El area ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el área."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Área inválido"));
        }
        $area = $this->Area->findByIdarea($id);
        if (!$area) {
            throw new NotFoundException(__("Área inválido"));
        } 
        $this->set(compact("area"));
    }
    
    public function edit($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Área inválido"));
        }
        $area = $this->Area->findByIdarea($id);
        if (!$area) {
            throw new NotFoundException(__("Área inválido"));
        }
        if ($this->request->is(array("post", "put"))) {      
            $this->Area->id = $id;
            if ($this->Area->save($this->request->data)) {     
                $this->Session->setFlash(__("El Área ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el área."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $area;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Area->id = $id;
        if ($this->Area->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Área de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
