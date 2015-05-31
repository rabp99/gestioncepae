<?php

/**
 * CakePHP MatriculasController
 * @author admin
 */
class MatriculasController extends AppController {   
    public $uses = array("Matricula");
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Matricula.fecha" => "asc"
        ),
        "conditions" => array(
            "Matricula.estado" => 1
        )
    );

    public function index($idgrado = null, $idseccion = null) {
        $this->layout = "main";
        
        $this->set("niveles", $this->Matricula->Seccion->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        if($idgrado != null) {
            $this->paginate["conditions"]["Seccion.idgrado"] = $idgrado;
        }
        if($idseccion != null) {
            $this->paginate["conditions"]["Matricula.idseccion"] = $idseccion;
        }
        $this->Paginator->settings = $this->paginate;
        $matriculas = $this->Paginator->paginate();
        $this->set(compact("matriculas"));
    }
    
    public function add($idnivel = null, $idgrado = null, $idseccion = null) {
        $this->layout = "main";
        
        $this->set("niveles", $this->Matricula->Seccion->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        if ($this->request->is(array("post", "put"))) {
            $this->Matricula->create();
            if ($this->Matricula->save($this->request->data)) {
                $this->Session->setFlash(__("El Alumno ha ha sido Matriculado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible matricular al Alumno."), "flash_bootstrap");
        }
    }
    
    public function delete($id = null) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Matricula->id = $id;
        if ($this->Matricula->saveField("estado", 2)) {
            $this->Session->setFlash(__("La Matrícula de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}