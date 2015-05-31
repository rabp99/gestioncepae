<?php

/**
 * CakePHP AlumnosController
 * @author admin
 */
class AlumnosController extends AppController {   
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Alumno.nombreCompleto" => "asc"
        ),
        "conditions" => array(
            "Alumno.estado" => 1
        )
    );

    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $alumnos = $this->Paginator->paginate();
        $this->set(compact("alumnos"));
    }
    
    public function add() {
        $this->layout = "main";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Alumno->create();
            if($this->Alumno->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el alumno."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Alumno inválido"));
        }
        $alumno = $this->Alumno->findByIdalumno($id);
        if (!$alumno) {
            throw new NotFoundException(__("Alumno inválido"));
        } 
        $this->set(compact("alumno"));
    }
    
    public function edit($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Alumno inválido"));
        }
        $alumno = $this->Alumno->findByIdalumno($id);
        if (!$alumno) {
            throw new NotFoundException(__("Alumno inválido"));
        }
        if ($this->request->is(array("post", "put"))) {      
            $this->Alumno->id = $id;
            if ($this->Alumno->saveAssociated($this->request->data)) {     
                $this->Session->setFlash(__("El Alumno ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Alumno."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $alumno;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Alumno->id = $id;
        if ($this->Alumno->saveField("estado", 2)) {
            $fields = array("Padre.estado" => 2);
            $conditions = array("Padre.idalumno" => $id);
            if($this->Alumno->Padre->updateAll($fields, $conditions)) {
                $this->Session->setFlash(__("El Alumno de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
    }
    
    // Funciones secundarias
    public function getAlumnos() {
        $this->layout = "ajax";            
        if(isset($this->request->data["Alumno"]["busqueda"])) {
            $busqueda = $this->request->data["Alumno"]["busqueda"];
            $this->set("alumnos", $this->Alumno->find("all", array(
                "conditions" => array(
                    "OR" => array(
                        "Alumno.nombres LIKE" => "%" . $busqueda . "%",
                        "Alumno.apellidoPaterno LIKE" => "%" . $busqueda . "%",
                        "Alumno.apellidoMaterno LIKE" => "%" . $busqueda . "%"
                    )
                )
            )));
        }
        else $this->set("alumnos", $this->Alumno->find("all"));
        $this->render();
    }
}
