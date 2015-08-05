<?php

/**
 * CakePHP ConceptosController
 * @author admin
 */
class ConceptosController extends AppController {
    public $uses = array("Concepto", "Matricula");
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
        $this->layout = "admin";
        
        $this->set("aniolectivos", $this->Concepto->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $idaniolectivo = 0;
        if($this->request->is(array("post", "put"))) {
            if(!empty($this->request->data["Aniolectivo"]["idaniolectivo"])) {
                $this->paginate["conditions"]["Concepto.idaniolectivo"] = $this->request->data["Aniolectivo"]["idaniolectivo"];
                $idaniolectivo = $this->request->data["Aniolectivo"]["idaniolectivo"];
            }
        } else {
            $idaniolectivo = $this->Concepto->Aniolectivo->getAniolectivoActual();
            if($idaniolectivo != 0)
                $this->paginate["conditions"]["Concepto.idaniolectivo"] = $idaniolectivo;
        }
        $this->set(compact("idaniolectivo"));
        
        $this->Paginator->settings = $this->paginate;
        $conceptos = $this->Paginator->paginate();
        $this->set(compact("conceptos"));
    }
    
    public function add() {
        $this->layout = "admin";
               
        $this->set("aniolectivos", $this->Concepto->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $idaniolectivo = $this->Concepto->Aniolectivo->getAniolectivoActual();
        $this->set(compact("idaniolectivo"));
        if ($this->request->is(array("post", "put"))) {
            $ds = $this->Concepto->getDataSource();
            $ds->begin();
            $this->Concepto->create();
            if ($this->Concepto->save($this->request->data)) {
                $matriculas = $this->Matricula->find("all", array(
                    "conditions" => array("Matricula.estado" => 1)
                ));
                $pagos = array();
                foreach($matriculas as $k_matricula => $matricula) {
                    if($matricula["Seccion"]["idaniolectivo"] == $idaniolectivo) {
                        $pagos[$k_matricula]["idmatricula"] = $matricula["Matricula"]["idmatricula"];
                        $pagos[$k_matricula]["idconcepto"] = $this->Concepto->id;
                        $pagos[$k_matricula]["descripcion"] = $this->request->data["Concepto"]["descripcion"];
                        $pagos[$k_matricula]["monto"] = $this->request->data["Concepto"]["monto"];
                        $pagos[$k_matricula]["deuda"] = $this->request->data["Concepto"]["monto"];
                        $pagos[$k_matricula]["fechalimite"] = $this->request->data["Concepto"]["fechalimite"];
                    }
                }
                if(empty($pagos)) {
                    $ds->commit();
                    $this->Session->setFlash(__("El Concepto de Pago ha sido registrado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                if ($this->Concepto->Pago->saveMany($pagos)) {
                    $ds->commit();
                    $this->Session->setFlash(__("El Concepto de Pago ha sido registrado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
            }
            $this->Session->setFlash(__("No fue posible registrar el Concepto de Pago."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "admin";
                
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
        $this->layout = "admin";
        
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
        $ds = $this->Concepto->getDataSource();
        $ds->begin();
        if ($this->Concepto->saveField("estado", 2)) {
            if($this->Concepto->Pago->updateAll(array("Pago.estado" => 2), array("Pago.idconcepto" => $id))) {
                $ds->commit();
                $this->Session->setFlash(__("El Concepto de Pago de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
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
