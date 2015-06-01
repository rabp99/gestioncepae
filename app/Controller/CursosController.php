<?php

/**
 * CakePHP CursosController
 * @author Roberto
 */
class CursosController extends AppController {

    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Curso.descripcion" => "asc"
        ),
        "conditions" => array(
            "Curso.estado" => 1
        )
    );

    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $cursos = $this->Paginator->paginate();
        $this->set(compact("cursos"));
    }
    
    public function add() {
        $this->layout = "main";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Curso->create();
            if ($this->Curso->save($this->request->data)) {
                $this->Session->setFlash(__("El curso ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el curso."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Curso inválido"));
        }
        $curso = $this->Curso->findByIdcurso($id);
        if (!$curso) {
            throw new NotFoundException(__("Curso inválido"));
        } 
        $this->set(compact("curso"));
    }
    
    public function edit($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Curso inválido"));
        }
        $curso = $this->Curso->findByIdcurso($id);
        if (!$curso) {
            throw new NotFoundException(__("Curso inválido"));
        }
        if ($this->request->is(array("post", "put"))) {      
            $this->Curso->id = $id;
            if ($this->Curso->save($this->request->data)) {     
                $this->Session->setFlash(__("El Curso ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Curso."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $nivel;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Curso->id = $id;
        if ($this->Curso->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Curso de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
