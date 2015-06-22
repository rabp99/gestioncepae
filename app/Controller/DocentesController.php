<?php

/**
 * CakePHP DocentesController
 * @author admin
 */
class DocentesController extends AppController {
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Docente.nombreCompleto" => "asc"
        ),
        "conditions" => array(
            "Docente.estado" => 1
        )
    );

    public function index() {
        $this->layout = "admin";
        
        $this->Paginator->settings = $this->paginate;
        $docentes = $this->Paginator->paginate();
        $this->set(compact("docentes"));
    }
    
    public function add() {
        $this->layout = "admin";
                
        if ($this->request->is(array("post", "put"))) {
            $this->Docente->create();
            if ($this->Docente->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__("El docente ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el docente."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "admin";
                
        if (!$id) {
            throw new NotFoundException(__("Docente inválido"));
        }
        $docente = $this->Docente->findByIddocente($id);
        if (!$docente) {
            throw new NotFoundException(__("Docente inválido"));
        } 
        $this->set(compact("docente"));
    }
    
    public function edit($id = null) {
        $this->layout = "admin";

        if (!$id) {
            throw new NotFoundException(__("Docente inválido"));
        }
        $docente = $this->Docente->findByIddocente($id);
        if (!$docente) {
            throw new NotFoundException(__("Docente inválido"));
        }
        if ($this->request->is(array("post", "put"))) {
            $ds = $this->Docente->getDataSource();
            $ds->begin();
            $this->Docente->id = $id;
            if ($this->Docente->save($this->request->data)) {
                $this->Docente->User->id = $docente["Docente"]["iduser"];
                if ($this->Docente->User->save($this->request->data)) {
                    $ds->commit();
                    $this->Session->setFlash(__("El Docente ha sido actualizado."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
            }
            $this->Session->setFlash(__("No es posible actualizar el Docente."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $docente;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $ds = $this->Docente->getDataSource();
        $ds->begin();
        $docente = $this->Docente->findByIddocente($id);
        $this->Docente->id = $id;
        if ($this->Docente->saveField("estado", 2)) {
            $this->Docente->User->id = $docente["Docente"]["iduser"];
            if($this->Docente->User->saveField("estado", 2)) {
                $ds->commit();
                $this->Session->setFlash(__("El Docente de código: %s ha sido Deshabilitado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
    }
        
    public function datos_docente() {
        if(empty($this->request->params["requested"])) {
            throw new ForbiddenException();
        }

        $user = $this->Auth->user();
        $docente = $this->Docente->findByIduser($user["iduser"]);
        
        return $docente;
    }
    
    public function getDocentes() {
        $this->layout = "ajax";     
        
        if(isset($this->request->data["Docente"]["busqueda"])) {
            $busqueda = $this->request->data["Docente"]["busqueda"];
            $docentes = $this->Docente->find("all", array(
                "conditions" => array(
                    "OR" => array(
                        "Docente.nombres LIKE" => "%" . $busqueda . "%",
                        "Docente.apellidoPaterno LIKE" => "%" . $busqueda . "%",
                        "Docente.apellidoMaterno LIKE" => "%" . $busqueda . "%"
                    ),
                    "AND" => array("Docente.estado" => 1)
                )
            ));
        }
        else $docentes = $this->Docente->find("all", array(
            "conditions" => array("Docente.estado" => 1)
            ));
        
        $this->set("docentes", $docentes);
        $this->render();
    }
}
