<?php

/**
 * CakePHP PagosController
 * @author admin
 */
class PagosController extends AppController {
    public $uses = array("Pago", "Matricula");

    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Matricula.idmatricula" => "asc"
        ),
        "conditions" => array(
            "Matricula.estado" => 1
        ),
        "recursive" => 3
    );

    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $matriculas = $this->Paginator->paginate("Matricula");
        $this->set(compact("matriculas"));
    }
    
    public function registrar($idmatricula = null) {
        $this->layout = "main";
        
        if (!$idmatricula) {
            throw new NotFoundException(__("Matricula inválida"));
        }
        $this->Matricula->recursive = 3;
        $matricula = $this->Matricula->findByIdmatricula($idmatricula);
        $this->set("pagos", $this->Pago->find("list", array(
            "fields" => array("Pago.idpago", "Pago.descripcion"),
            "conditions" => array("Pago.estado" => 1, "Pago.idmatricula" => $idmatricula)
        )));
        $this->set(compact("matricula"));
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
            $this->Session->setFlash(__("El Nivel de código: %s ha sido Deshabilitado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
