<?php

/**
 * CakePHP DocentesController
 * @author admin
 */
class DocentesController extends AppController {   
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Docente.nombreCompleto" => "asc"
        ),
        "conditions" => array(
            "Docente.estado" => 1
        )
    );

    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $docentes = $this->Paginator->paginate();
        $this->set(compact("docentes"));
    }
    
    public function add() {
        $this->layout = "main";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Docente->create();
            if ($this->Docente->save($this->request->data)) {
                $this->Session->setFlash(__("El docente ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el docente."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Docente inválido"));
        }
        $docente = $this->Docente->findByIddocente($id);
        if (!$docente) {
            throw new NotFoundException(__("Docente inválido"));
        } 
        $this->set(compact("docente"));
    }
    
    public function edit($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Docente inválido"));
        }
        $docente = $this->Docente->findByIddocente($id);
        if (!$docente) {
            throw new NotFoundException(__("Docente inválido"));
        }
        if ($this->request->is(array("post", "put"))) {      
            $this->Docente->id = $id;
            if ($this->Docente->save($this->request->data)) {     
                $this->Session->setFlash(__("El Docente ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Docente."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $docente;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Docente->id = $id;
        if ($this->Docente->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Docente de código: %s ha sido Deshabilitado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
