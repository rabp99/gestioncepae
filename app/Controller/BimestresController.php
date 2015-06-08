<?php

/**
 * CakePHP BimestresController
 * @author admin
 */
class BimestresController extends AppController {
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Bimestre.descripcion" => "asc"
        ),
        "conditions" => array(
            "Bimestre.estado" => 1
        )
    );

    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $bimestres = $this->Paginator->paginate();
        $this->set(compact("bimestres"));
    }
    
    public function add() {
        $this->layout = "main";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Bimestre->create();
            if ($this->Bimestre->save($this->request->data)) {
                $this->Session->setFlash(__("El Bimestre ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el Bimestre."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Bimestre inválido"));
        }
        $bimestre = $this->Bimestre->findByIdbimestre($id);
        if (!$bimestre) {
            throw new NotFoundException(__("Bimestre inválido"));
        } 
        $this->set(compact("bimestre"));
    }
    
    public function edit($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Bimestre inválido"));
        }
        $bimestre = $this->Bimestre->findByIdbimestre($id);
        if (!$bimestre) {
            throw new NotFoundException(__("Bimestre inválido"));
        }
        if ($this->request->is(array("post", "put"))) {      
            $this->Bimestre->id = $id;
            if ($this->Bimestre->save($this->request->data)) {     
                $this->Session->setFlash(__("El Bimestre ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Bimestre."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $bimestre;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Bimestre->id = $id;
        if ($this->Bimestre->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Bimestre de código: %s ha sido Deshabilitado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
