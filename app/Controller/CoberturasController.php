<?php

/**
 * CakePHP CoberturasController
 * @author admin
 */
class CoberturasController extends AppController {
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Cobertura.descripcion" => "asc"
        ),
        "conditions" => array(
            "Cobertura.estado" => 1
        )
    );

    public function index() {
        $this->layout = "admin";
        
        $this->Paginator->settings = $this->paginate;
        $coberturas = $this->Paginator->paginate();
        $this->set(compact("coberturas"));
    }
    
    public function add() {
        $this->layout = "admin";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Cobertura->create();
            if ($this->Cobertura->save($this->request->data)) {
                $this->Session->setFlash(__("La Cobertura ha sido registrada correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar la Cobertura."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "admin";
                
        if (!$id) {
            throw new NotFoundException(__("Cobertura inválida"));
        }
        $cobertura = $this->Cobertura->findByIdcobertura($id);
        if (!$cobertura) {
            throw new NotFoundException(__("Cobertura inválida"));
        } 
        $this->set(compact("cobertura"));
    }
    
    public function edit($id = null) {
        $this->layout = "admin";

        if (!$id) {
            throw new NotFoundException(__("Cobertura inválida"));
        }
        $cobertura = $this->Cobertura->findByIdcobertura($id);
        if (!$cobertura) {
            throw new NotFoundException(__("Cobertura inválida"));
        }
        if ($this->request->is(array("post", "put"))) {      
            $this->Cobertura->id = $id;
            if ($this->Cobertura->save($this->request->data)) {     
                $this->Session->setFlash(__("La Cobertura ha sido actualizada."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar la Cobertura."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $cobertura;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Cobertura->id = $id;
        if ($this->Cobertura->saveField("estado", 2)) {
            $this->Session->setFlash(__("La Cobertura de código: %s ha sido deshabilitado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
