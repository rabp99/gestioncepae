<?php

/**
 * CakePHP ConceptosController
 * @author admin
 */
class ConceptosController extends AppController {
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Concepto.descripcion" => "asc"
        ),
        "conditions" => array(
            "Concepto.estado" => 1
        )
    );

    public function index() {
        $this->layout = "main";
        
        $this->set("aniolectivos", $this->Concepto->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        if($this->request->is(array("post", "put"))) {
            if(!empty($this->request->data["Aniolectivo"]["idaniolectivo"]))
                $this->paginate["conditions"]["Concepto.idaniolectivo"] = $this->request->data["Aniolectivo"]["idaniolectivo"];
        }
        $this->Paginator->settings = $this->paginate;
        $conceptos = $this->Paginator->paginate();
        $this->set(compact("conceptos"));
    }
    
    public function add() {
        $this->layout = "main";
               
        $this->set("aniolectivos", $this->Concepto->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        if ($this->request->is(array("post", "put"))) {
            $this->Concepto->create();
            if ($this->Concepto->save($this->request->data)) {
                $this->Session->setFlash(__("El Concepto de Pago ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el Concepto de Pago."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Concepto de Pago inválido"));
        }
        $concepto = $this->Concepto->findByIdconcepto($id);
        if (!$concepto) {
            throw new NotFoundException(__("Concepto de Pago inválido"));
        } 
        $this->set(compact("concepto"));
                
    }
    
    public function edit($id = null) {
        $this->layout = "main";
        
        if (!$id) {
            throw new NotFoundException(__("Concepto de Pago inválido"));
        }
        
        $concepto = $this->Concepto->findByIdconcepto($id);
        $this->set("aniolectivos", $this->Concepto->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        if (!$concepto) {
            throw new NotFoundException(__("Concepto de Pago inválido"));
        }
        
        if ($this->request->is(array("post", "put"))) {      
            $this->Concepto->id = $id;
            if ($this->Concepto->save($this->request->data)) {     
                $this->Session->setFlash(__("El Concepto ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Concepto de Pago."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $concepto;
        }
    }
    
    public function delete($id) {  
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Concepto->id = $id;
        if ($this->Concepto->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Concepto de Pago de código: %s ha sido eliminada.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
    
    public function getFormByAniolectivo() {
        $this->layout = "ajax";
        
        $idaniolelctivo = $this->request->data["Aniolectivo"]["idaniolectivo"];
        $this->set("conceptos", $this->Concepto->find("all", array(
            "conditions" => array("Concepto.estado" => 1, "Concepto.idaniolectivo" => $idaniolelctivo)
        )));
    }
}
