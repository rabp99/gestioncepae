<?php

/**
 * CakePHP AnioslectivosController
 * @author Roberto
 */
class AniolectivosController extends AppController {
    public $components = array('Paginator');
    
    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Aniolectivo.descripcion" => "asc"
        ),
        "conditions" => array(
            "Aniolectivo.estado" => 1
        )
    );
    
    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $aniolectivos = $this->Paginator->paginate();
        $this->set(compact("aniolectivos"));
    }
    
    public function add() {
        $this->layout = "main";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Aniolectivo->create();
            if ($this->Aniolectivo->save($this->request->data)) {
                $this->Session->setFlash(__("El Año Lectivo ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el Año Lectivo."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
        if (!$id) {
            throw new NotFoundException(__("Año Lectivo inválido"));
        }
        $aniolectivo = $this->Aniolectivo->findByIdaniolectivo($id);
        if (!$aniolectivo) {
            throw new NotFoundException(__("Año Lectivo inválido"));
        } 
        $this->set(compact("aniolectivo"));
    }
    
    public function edit($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Año Lectivo inválido"));
        }
        $aniolectivo = $this->Aniolectivo->findByIdaniolectivo($id);
        if (!$aniolectivo) {
            throw new NotFoundException(__("Año Lectivo inválido"));
        }
        if ($this->request->is(array("post", "put"))) {      
            $this->Aniolectivo->id = $id;
            if ($this->Aniolectivo->save($this->request->data)) {     
                $this->Session->setFlash(__("El Año Lectivo ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Año Lectivo."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $aniolectivo;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $ds = $this->Aniolectivo->getDataSource();
        $ds->begin();
        $this->Aniolectivo->id = $id;
        if ($this->Aniolectivo->saveField("estado", 2)) {
            $fields = array("Concepto.estado" => 2);
            $conditions = array("Concepto.idaniolectivo" => $id);
            if($this->Aniolectivo->Concepto->updateAll($fields, $conditions)) {
                $secciones = $this->Aniolectivo->Seccion->find("all", array(
                    "conditions" => array("Seccion.idaniolectivo" => $id, "Seccion.estado" => 1)
                ));
                $r = true;
                foreach($secciones as $seccion) {
                    $this->Aniolectivo->Seccion->id = $seccion["Seccion"]["idseccion"];
                    if($this->Aniolectivo->Seccion->saveField("estado", 2)) {
                        $fields = array("Matricula.estado" => 2);
                        $conditions = array("Matricula.idseccion" => $seccion["Seccion"]["idseccion"]);
                        if($this->Aniolectivo->Seccion->Matricula->updateAll($fields, $conditions)) {
                            $fields = array("Asignacion.estado" => 2);
                            $conditions = array("Asignacion.idseccion" => $seccion["Seccion"]["idseccion"]);
                            if($this->Aniolectivo->Seccion->Asignacion->updateAll($fields, $conditions)) {
                                
                            } else $r = false;
                        } else $r = false;
                    } else $r = false;
                }
                if($r) {
                    $ds->commit();
                    $this->Session->setFlash(__("El Año Lectivo de código: %s ha sido Deshabilitado.", h($id)), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
            }
        }
    }

}
