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
            "Grado.descripcion" => "asc"
        ),
        "conditions" => array(
            "Grado.estado" => 1
        )
    );
    
    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $grados = $this->Paginator->paginate();
        $this->set(compact("grados"));
        
        // Calcular Año Lectivo actual
        $this->set("aniolectivo", $this->Grado->Aniolectivo->findByEstado("1"));
    }
    
    public function add() {
        $this->layout = "main";
                
        // Calcular Año Lectivo actual
        $this->set("aniolectivo", $this->Grado->Aniolectivo->findByEstado("1"));
        
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
        $this->layout = "main";
                
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
        $this->layout = "main";

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
            $this->Session->setFlash(__("El Grado de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
