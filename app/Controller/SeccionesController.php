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
        
        $this->set("aniolectivos", $this->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        if($this->request->is(array("post", "put"))) {
            if(!empty($this->request->data["Aniolectivo"]["idaniolectivo"]))
                $this->paginate["conditions"]["Seccion.idaniolectivo"] = $this->request->data["Aniolectivo"]["idaniolectivo"];
        }
        $this->Paginator->settings = $this->paginate;
        $secciones = $this->Paginator->paginate();
        $this->set(compact("secciones"));
    }
    
    public function add() {
        $this->layout = "main";
   
        $this->set("aniolectivos", $this->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $this->set("niveles", $this->Seccion->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        $this->set("turnos", $this->Seccion->Turno->find("list", array(
            "fields" => array("Turno.idturno", "Turno.descripcion"),
            "conditions" => array("Turno.estado" => 1)
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
        
        $this->set("aniolectivos", $this->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $this->set("niveles", $this->Seccion->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
          "conditions" => array("Nivel.estado" => 1)
        )));
      
        $this->set("turnos", $this->Seccion->Turno->find("list", array(
            "fields" => array("Turno.idturno", "Turno.descripcion"),
            "conditions" => array("Turno.estado" => 1)
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
        
        if(isset($this->request->data["Aniolectivo"]["idaniolectivo"]))
            $idaniolectivo = $this->request->data["Aniolectivo"]["idaniolectivo"];
        if(isset($this->request->data["Grado"]["idgrado"]))
            $idgrado = $this->request->data["Grado"]["idgrado"];
        
        if(!empty($idaniolectivo) && !empty($idgrado)) {
            $this->set("secciones", $this->Seccion->find("list", array(
                "fields" => array("Seccion.idseccion", "Seccion.descripcion"),
                "conditions" => array("Seccion.idgrado" => $idgrado, "Seccion.idaniolectivo" => $idaniolectivo, "Seccion.estado" => 1)
            )));
        } else $this->set("secciones", array());
    }
    
    public function getNextSeccion() {
        $this->layout = "ajax";
        
        if(isset($this->request->data["Seccion"]["idaniolectivo"]))
            $idaniolectivo = $this->request->data["Seccion"]["idaniolectivo"];
        if(isset($this->request->data["Seccion"]["idgrado"]))
            $idgrado = $this->request->data["Seccion"]["idgrado"];
        
        if(!empty($idaniolectivo) && !empty($idgrado))
            echo $this->Seccion->nextSeccion($idaniolectivo, $idgrado);
        else
            echo "";
        die();
    }
}
