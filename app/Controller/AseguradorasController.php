<?php

/**
 * CakePHP AseguradorasController
 * @author admin
 */
class AseguradorasController extends AppController {
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Aseguradora.descripcion" => "asc"
        ),
        "conditions" => array(
            "Aseguradora.estado" => 1
        )
    );

    public function index() {
        $this->layout = "admin";
        
        $this->Paginator->settings = $this->paginate;
        $aseguradoras = $this->Paginator->paginate();
        $this->set(compact("aseguradoras"));
    }
    
    public function add() {
        $this->layout = "admin";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Aseguradora->create();
            if ($this->Aseguradora->save($this->request->data)) {
                $this->Session->setFlash(__("La Aseguradora ha sido registrada correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar la Aseguradora."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "admin";
                
        if (!$id) {
            throw new NotFoundException(__("Aseguradora inválida"));
        }
        $aseguradora = $this->Aseguradora->findByIdaseguradora($id);
        if (!$aseguradora) {
            throw new NotFoundException(__("Aseguradora inválida"));
        } 
        $this->set(compact("aseguradora"));
    }
    
    public function edit($id = null) {
        $this->layout = "admin";

        if (!$id) {
            throw new NotFoundException(__("Aseguradora inválida"));
        }
        $aseguradora = $this->Aseguradora->findByIdaseguradora($id);
        if (!$aseguradora) {
            throw new NotFoundException(__("Aseguradora inválida"));
        }
        if ($this->request->is(array("post", "put"))) {      
            $this->Aseguradora->id = $id;
            if ($this->Aseguradora->save($this->request->data)) {     
                $this->Session->setFlash(__("La Aseguradora ha sido actualizada."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar la aseguradora."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $aseguradora;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Aseguradora->id = $id;
        if ($this->Aseguradora->saveField("estado", 2)) {
            $this->Session->setFlash(__("La Aseguradora de código: %s ha sido deshabilitado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
