<?php

/**
 * CakePHP GradosController
 * @author Roberto
 */
class GradosController extends AppController {
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Nivel.descripcion" => "asc"
        ),
        "conditions" => array(
            "Grado.estado" => 1
        )
    );
    
    public function index() {
        $this->layout = "admin";
        
        $this->Paginator->settings = $this->paginate;
        $grados = $this->Paginator->paginate();
        $this->set(compact("grados"));
    }
    
    public function add() {
        $this->layout = "admin";
                
        $this->set("niveles", $this->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        if ($this->request->is(array("post", "put"))) {
            $this->Grado->create();
            if ($this->Grado->save($this->request->data)) {
                $this->Session->setFlash(__("El grado ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el grado."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "admin";
                
        if (!$id) {
            throw new NotFoundException(__("Grado inválido"));
        }
        $grado = $this->Grado->findByIdgrado($id);
        if (!$grado) {
            throw new NotFoundException(__("Grado inválido"));
        } 
        $this->set(compact("grado"));
    }
    
    public function edit($id = null) {
        $this->layout = "admin";
        
        if (!$id) {
            throw new NotFoundException(__("Grado inválido"));
        }
        $grado = $this->Grado->findByIdgrado($id);
        if (!$grado) {
            throw new NotFoundException(__("Grado inválido"));
        }
        
        $this->set("niveles", $this->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        $this->set("grado", $grado);
        
        if ($this->request->is(array("post", "put"))) {
            $this->Grado->id = $id;
            if ($this->Grado->save($this->request->data)) {     
                $this->Session->setFlash(__("El Grado ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Grado."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $grado;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Grado->id = $id;
        if ($this->Grado->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Grado de código: %s ha sido Deshabilitado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
    
    public function getByIdnivel() {
        $this->layout = "ajax";
        $idnivel = $this->request->data["Nivel"]["idnivel"];
        $this->set("grados", $this->Grado->find("list", array(
            "fields" => array("Grado.idgrado", "Grado.descripcion"),
            "conditions" => array("Grado.idnivel" => $idnivel, "Grado.estado" => 1)
        )));
    }
}
