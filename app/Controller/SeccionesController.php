<?php

/**
 * CakePHP SeccionesController
 * @author Roberto
 */
class SeccionesController extends AppController {
    public $uses = array("Seccion");
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Grado.idnivel" => "asc"
        ),
        "conditions" => array(
            "Seccion.estado" => 1
        ),
        "recursive" => 2
    );
    
    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $secciones = $this->Paginator->paginate();
        $this->set(compact("secciones"));
        
        // Calcular Año Lectivo actual
        $this->set("aniolectivo", $this->Seccion->Grado->Aniolectivo->findByEstado("1"));
    }
    
    public function add() {
        $this->layout = "main";
                
        // Calcular Año Lectivo actual
        $this->set("aniolectivo", $this->Seccion->Grado->Aniolectivo->findByEstado("1"));
        
        $this->set("niveles", $this->Seccion->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        if ($this->request->is(array("post", "put"))) {
            $this->Seccion->create();
            if ($this->Seccion->save($this->request->data)) {
                $this->Session->setFlash(__("La sección ha sido registrada correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar la sección."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Sección inválida"));
        }
        $this->Seccion->recursive = 2;
        $seccion = $this->Seccion->findByIdseccion($id);
        if (!$seccion) {
            throw new NotFoundException(__("Sección inválida"));
        } 
        $this->set(compact("seccion"));
    }
    
    public function edit($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Sección inválida"));
        }
        $this->set("niveles", $this->Seccion->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        $this->Seccion->recursive = 2;
        $seccion = $this->Seccion->findByIdseccion($id);
        $grado = $this->Seccion->Grado->findByIdgrado($seccion["Seccion"]["idgrado"]);
        $this->set("grados", $this->Seccion->Grado->find("list", array(
            "fields" => array("Grado.idgrado", "Grado.descripcion"),
            "conditions" => array("Grado.idnivel" => $grado["Nivel"]["idnivel"])
        )));
        
        if (!$seccion) {
            throw new NotFoundException(__("Sección inválida"));
        }
        
        if ($this->request->is(array("post", "put"))) {      
            $this->Seccion->id = $id;
            if ($this->Seccion->save($this->request->data)) {     
                $this->Session->setFlash(__("La Sección ha sido actualizada."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar la Sección."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $seccion;
            $this->request->data["Nivel"]["idnivel"] = $grado["Grado"]["idnivel"];
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Seccion->id = $id;
        if ($this->Seccion->saveField("estado", 2)) {
            $this->Session->setFlash(__("La sección de código: %s ha sido eliminada.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
    
    public function getByIdgrado() {
        $this->layout = "ajax";
        $idgrado = $this->request->data["Grado"]["idgrado"];
        $this->set("secciones", $this->Seccion->find("list", array(
            "fields" => array("Seccion.idseccion", "Seccion.descripcion"),
            "conditions" => array("Seccion.idgrado" => $idgrado, "Seccion.estado" => 1)
        )));
    }
}
