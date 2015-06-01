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
        
        // Calcular Año Lectivo actual
        $this->set("aniolectivo", $this->Curso->Grado->Aniolectivo->findByEstado("1"));
    }
    
    public function add() {
        $this->layout = "main";
                
        // Calcular Año Lectivo actual
        $this->set("aniolectivo", $this->Curso->Grado->Aniolectivo->findByEstado("1"));
        
        $this->set("niveles", $this->Curso->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        if ($this->request->is(array("post", "put"))) {
            $this->Curso->create();
            if ($this->Curso->save($this->request->data)) {
                $this->Session->setFlash(__("El curso ha sido registrada correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el curso."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Curso inválida"));
        }
        $this->Curso->recursive = 2;
        $curso = $this->Curso->findByIdcurso($id);
        if (!$curso) {
            throw new NotFoundException(__("Curso inválida"));
        } 
        $this->set(compact("curso"));
    }
    
    public function edit($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Curso inválida"));
        }
        $this->set("niveles", $this->Curso->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        $this->Curso->recursive = 2;
        $curso = $this->Curso->findByIdcurso($id);
        $grado = $this->Curso->Grado->findByIdgrado($curso["Curso"]["idgrado"]);
        $this->set("grados", $this->Curso->Grado->find("list", array(
            "fields" => array("Grado.idgrado", "Grado.descripcion"),
            "conditions" => array("Grado.idnivel" => $grado["Nivel"]["idnivel"])
        )));
        
        if (!$curso) {
            throw new NotFoundException(__("Curso inválida"));
        }
        
        if ($this->request->is(array("post", "put"))) {      
            $this->Curso->id = $id;
            if ($this->Curso->save($this->request->data)) {     
                $this->Session->setFlash(__("El Curso ha sido actualizada."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el curso."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $curso;
            $this->request->data["Nivel"]["idnivel"] = $grado["Grado"]["idnivel"];
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Curso->id = $id;
        if ($this->Curso->saveField("estado", 2)) {
            $this->Session->setFlash(__("El curso de código: %s ha sido eliminada.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}