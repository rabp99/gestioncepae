<?php

/**
 * CakePHP PagosController
 * @author admin
 */
class PagosController extends AppController {
    public $uses = array("Pago", "Matricula", "Aniolectivo");

    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Matricula.idmatricula" => "asc"
        ),
        "conditions" => array(
            "Matricula.estado" => 1
        ),
        "recursive" => 3
    );

    public function index() {
        $this->layout = "admin";
             
        $this->set("aniolectivos", $this->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        if($this->request->is(array("post", "put"))) {
            $this->paginate["conditions"]["Seccion.idaniolectivo"] = $this->request->data["Pago"]["idaniolectivo"];
            $this->Paginator->settings = $this->paginate;
            $matriculas = $this->Paginator->paginate("Matricula");
            $this->set(compact("matriculas"));
        }
    }
    
    public function registrar($idmatricula = null) {
        $this->layout = "admin";
        
        if (!$idmatricula) {
            throw new NotFoundException(__("Matricula inválida"));
        }
        $this->Matricula->recursive = 3;
        $matricula = $this->Matricula->findByIdmatricula($idmatricula);
        $this->set("pagos", $this->Pago->find("list", array(
            "fields" => array("Pago.idpago", "Pago.descripcion"),
            "conditions" => array("Pago.estado" => 1, "Pago.idmatricula" => $idmatricula)
        )));
        $this->set(compact("matricula"));
        
        if($this->request->is(array("post", "put"))) {
            $ds = $this->Pago->getDataSource();
            $ds->begin();
            $this->Pago->Detallepago->create();
            $this->request->data["Detallepago"]["idpago"] = $this->request->data["Pago"]["idpago"];
            if($this->Pago->Detallepago->save($this->request->data)) {
                $pago = $this->Pago->findByIdpago($this->request->data["Pago"]["idpago"]);
                $this->Pago->id = $pago["Pago"]["idpago"];
                if($this->Pago->saveField("deuda", $pago["Pago"]["deuda"]- $this->request->data["Detallepago"]["monto"])) {
                    $ds->commit();
                    $this->Session->setFlash(__("El Pago ha sido registrado correctamente."), "flash_bootstrap");
                    return;
                }
            }
            $this->Session->setFlash(__("El Pago no ha sido registrado correctamente."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "admin";
                
        if (!$id) {
            throw new NotFoundException(__("Nivel inválido"));
        }
        $nivel = $this->Nivel->findByIdnivel($id);
        if (!$nivel) {
            throw new NotFoundException(__("Nivel inválido"));
        } 
        $this->set(compact("nivel"));
    }
    
    public function getFormPagos() {
        $this->layout = "ajax";
        
        $this->set("pago", $this->Pago->findByIdpago($this->request->data["Pago"]["idpago"]));
    }
}
