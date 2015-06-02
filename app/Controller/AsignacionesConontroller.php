<?php

/**
 * CakePHP AsignacionesController
 * @author admin
 */
class AisgnacionesController extends AppController {   
    public $uses = array("Asignacion");
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Asignacion.descripcion" => "asc"
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

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Nivel inválido"));
        }
        $nivel = $this->Nivel->findByIdnivel($id);
        if (!$nivel) {
            throw new NotFoundException(__("Nivel inválido"));
        } 
        $this->set(compact("nivel"));
    }
    
    public function edit($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Nivel inválido"));
        }
        $nivel = $this->Nivel->findByIdnivel($id);
        if (!$nivel) {
            throw new NotFoundException(__("Nivel inválido"));
        }
        if ($this->request->is(array("post", "put"))) {      
            $this->Nivel->id = $id;
            if ($this->Nivel->save($this->request->data)) {     
                $this->Session->setFlash(__("El Nivel ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Nivel."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $nivel;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Nivel->id = $id;
        if ($this->Nivel->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Nivel de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
