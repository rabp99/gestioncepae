<?php

/**
 * CakePHP TurnosController
 * @author admin
 */
class TurnosController extends AppController {
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Turno.descripcion" => "asc"
        ),
        "conditions" => array(
            "Turno.estado" => 1
        )
    );

    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $turnos = $this->Paginator->paginate();
        $this->set(compact("turnos"));
    }
    
    public function add() {
        $this->layout = "main";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Turno->create();
            if ($this->Turno->save($this->request->data)) {
                $this->Session->setFlash(__("El Turno ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el Turno."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Turno inválido"));
        }
        $turno = $this->Turno->findByIdturno($id);
        if (!$turno) {
            throw new NotFoundException(__("Turno inválido"));
        } 
        $this->set(compact("turno"));
    }
    
    public function edit($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Turno inválido"));
        }
        $turno = $this->Turno->findByIdturno($id);
        if (!$turno) {
            throw new NotFoundException(__("Turno inválido"));
        }
        if ($this->request->is(array("post", "put"))) {      
            $this->Turno->id = $id;
            if ($this->Turno->save($this->request->data)) {     
                $this->Session->setFlash(__("El Turno ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Turno."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $turno;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Turno->id = $id;
        if ($this->Turno->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Turno de código: %s ha sido Deshabilitado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
