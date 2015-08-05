<?php

/**
 * CakePHP PagosController
 * @author admin
 */
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class PagosController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("index_alumno", "index_apoderado", "index_pagos", "view_pagos", "registrar_pagos", "cancelar");
    }

    public $uses = array("Pago", "Matricula", "Aniolectivo", "Padre", "User");

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
        
        $this->Paginator->paginate();
        $matriculas = array();

        $idaniolectivo = 0;
        if($this->request->is(array("post", "put"))) {
            $this->paginate["conditions"]["Seccion.idaniolectivo"] = $this->request->data["Pago"]["idaniolectivo"];
            $idaniolectivo = $this->request->data["Pago"]["idaniolectivo"];
            $busqueda = $this->request->data["Pago"]["nombreCompleto"];
            $this->paginate["conditions"]["OR"] = array(
                "Alumno.nombres LIKE" => "%" . $busqueda . "%",
                "Alumno.apellidoPaterno LIKE" => "%" . $busqueda . "%",
                "Alumno.apellidoMaterno LIKE" => "%" . $busqueda . "%",
                "CONCAT(Alumno.apellidoPaterno, ' ', Alumno.apellidoMaterno, ', ', Alumno.nombres) LIKE" => "%" . $busqueda . "%",
                "CONCAT(Alumno.nombres, ' ', Alumno.apellidoPaterno, ' ', Alumno.apellidoMaterno) LIKE" => "%" . $busqueda . "%",
                "CONCAT(Alumno.nombres, ' ', Alumno.apellidoPaterno) LIKE" => "%" . $busqueda . "%",
                "CONCAT(Alumno.apellidoPaterno, ' ', Alumno.apellidoMaterno) LIKE" => "%" . $busqueda . "%",
            );
            
            $this->Paginator->settings = $this->paginate;
            $matriculas = $this->Paginator->paginate("Matricula");
        } else {
            $idaniolectivo = $this->Aniolectivo->getAniolectivoActual();
        }
        $this->set(compact("idaniolectivo"));
        $this->set(compact("matriculas"));
    }
    
    public function index_pagos() {
        $this->layout = "pagos";
             
        $this->set("aniolectivos", $this->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $this->Paginator->paginate();
        $matriculas = array();

        $idaniolectivo = 0;
        if($this->request->is(array("post", "put"))) {
            $this->paginate["conditions"]["Seccion.idaniolectivo"] = $this->request->data["Pago"]["idaniolectivo"];
            $idaniolectivo = $this->request->data["Pago"]["idaniolectivo"];
            $busqueda = $this->request->data["Pago"]["nombreCompleto"];
            $this->paginate["conditions"]["OR"] = array(
                "Alumno.nombres LIKE" => "%" . $busqueda . "%",
                "Alumno.apellidoPaterno LIKE" => "%" . $busqueda . "%",
                "Alumno.apellidoMaterno LIKE" => "%" . $busqueda . "%",
                "CONCAT(Alumno.apellidoPaterno, ' ', Alumno.apellidoMaterno, ', ', Alumno.nombres) LIKE" => "%" . $busqueda . "%",
                "CONCAT(Alumno.nombres, ' ', Alumno.apellidoPaterno, ' ', Alumno.apellidoMaterno) LIKE" => "%" . $busqueda . "%",
                "CONCAT(Alumno.nombres, ' ', Alumno.apellidoPaterno) LIKE" => "%" . $busqueda . "%",
                "CONCAT(Alumno.apellidoPaterno, ' ', Alumno.apellidoMaterno) LIKE" => "%" . $busqueda . "%",
            );
            
            $this->Paginator->settings = $this->paginate;
            $matriculas = $this->Paginator->paginate("Matricula");
        } else {
            $idaniolectivo = $this->Aniolectivo->getAniolectivoActual();
        }
        $this->set(compact("idaniolectivo"));
        $this->set(compact("matriculas"));
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
                 
            $admin = $this->Auth->user();
                
            $this->Pago->Detallepago->create();
            $this->request->data["Detallepago"]["idpago"] = $this->request->data["Pago"]["idpago"];
            $this->request->data["Detallepago"]["iduser"] = $admin["iduser"];
            $this->request->data["Detallepago"]["created"] = date("Y-m-d");
            if($this->Pago->Detallepago->save($this->request->data)) {
                $pago = $this->Pago->findByIdpago($this->request->data["Pago"]["idpago"]);
                $this->Pago->id = $pago["Pago"]["idpago"];
                if($this->Pago->saveField("deuda", $pago["Pago"]["deuda"] - $this->request->data["Detallepago"]["monto"])) {
                    $ds->commit();
                    $this->Session->setFlash(__("El Pago ha sido registrado correctamente."), "flash_bootstrap");
                    return;
                }
            }
            $this->Session->setFlash(__("El Pago no ha sido registrado correctamente."), "flash_bootstrap");
        }
    }
    
    public function registrar_pagos($idmatricula = null) {
        $this->layout = "pagos";
        
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
            
            $pago = $this->Auth->user();
            
            $this->Pago->Detallepago->create();
            $this->request->data["Detallepago"]["idpago"] = $this->request->data["Pago"]["idpago"];
            $this->request->data["Detallepago"]["iduser"] = $pago["iduser"];
            $this->request->data["Detallepago"]["created"] = date("Y-m-d");
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
            throw new NotFoundException(__("Matrícula inválida"));
        }
        $this->Matricula->recursive = 3; 
        $matricula = $this->Matricula->findByIdmatricula($id);
        if (!$matricula) {
            throw new NotFoundException(__("Matrícula inválido"));
        } 
        $this->set(compact("matricula"));
    }
    
    public function view_pagos($id = null) {
        $this->layout = "pagos";
                
        if (!$id) {
            throw new NotFoundException(__("Matrícula inválida"));
        }
        $this->Matricula->recursive = 3; 
        $matricula = $this->Matricula->findByIdmatricula($id);
        if (!$matricula) {
            throw new NotFoundException(__("Matrícula inválido"));
        } 
        $this->set(compact("matricula"));
    }
    
    public function index_alumno() {
        $this->layout = "alumno";
        
        $user = $this->Auth->user();
        $alumno = $this->Matricula->Alumno->findByIduser($user["iduser"]);
                
        $this->set("aniolectivos", $this->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $cursos = array();
        $matricula_seleccionada = null;
        
        $idaniolectivo = 0;
        if($this->request->is(array("post", "put"))) {
            if(!empty($this->request->data["Aniolectivo"]["idaniolectivo"])) 
                $idaniolectivo = $this->request->data["Aniolectivo"]["idaniolectivo"];    
        } else {
            $idaniolectivo = $this->Aniolectivo->getAniolectivoActual();
        }
        
        $this->Matricula->recursive = 3;
        $matriculas = $this->Matricula->find("all", array(
           "conditions" => array("Matricula.idalumno" => $alumno["Alumno"]["idalumno"]) 
        ));
        foreach($matriculas as $matricula) {
            if($matricula["Seccion"]["idaniolectivo"] == $idaniolectivo)
                $this->set("matricula", $matricula);
        }
        $this->set(compact("idaniolectivo"));
    }
    
    public function index_apoderado() {
        $this->layout = "apoderado";
        
        $user = $this->Auth->user();
        $this->Padre->recursive = 2;
        $padre = $this->Padre->findByIduser($user["iduser"]);
                
        $this->set("aniolectivos", $this->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        $this->set("alumnos", Set::combine($padre["AlumnosPadre"], "{n}.idalumno", "{n}.Alumno.nombreCompleto"));
        
        $cursos = array();
        $matricula_seleccionada = null;
        
        $idaniolectivo = 0;
        if($this->request->is(array("post", "put"))) {
            if(!empty($this->request->data["Aniolectivo"]["idaniolectivo"])) {
                $idaniolectivo = $this->request->data["Aniolectivo"]["idaniolectivo"];    
        
                $this->Matricula->recursive = 3;
                $matriculas = $this->Matricula->find("all", array(
                   "conditions" => array("Matricula.idalumno" => $this->request->data["Alumno"]["idalumno"]) 
                ));
                foreach($matriculas as $matricula) {
                    if($matricula["Seccion"]["idaniolectivo"] == $idaniolectivo)
                        $this->set("matricula", $matricula);
                }
            }
        } else {
            $idaniolectivo = $this->Aniolectivo->getAniolectivoActual();
        }
        
        $this->set(compact("idaniolectivo"));
    }
    
    public function getFormPagos() {
        $this->layout = "ajax";
        
        if(empty($this->request->data["Pago"]["idpago"])) die();
        $this->set("pago", $this->Pago->findByIdpago($this->request->data["Pago"]["idpago"]));
    }
    
    public function cancelar($iddetallepago) {
        $this->layout = false;
        
        if($this->request->is(array("post", "put"))) {
            $user = $this->User->find("first", array(
                "conditions" => array(
                    "User.username" => $this->request->data["User"]["username"]
                )
            ));
            if(!empty($user)) {
                $passwordHasher = new BlowfishPasswordHasher();
                if($passwordHasher->check($this->request->data["User"]["password"], $user["User"]["password"])) {
                    if($user["User"]["idgroup"] == 1) {
                        $ds = $this->Pago->getDataSource();
                        $ds->begin();
                        $this->Pago->Detallepago->id = $iddetallepago;
                        if($this->Pago->Detallepago->saveField("estado", 2)) {
                            $detallepago = $this->Pago->Detallepago->read();
                            $this->Pago->id = $detallepago["Pago"]["idpago"];
                            if($this->Pago->saveField("deuda", ($detallepago["Pago"]["deuda"] + $detallepago["Detallepago"]["monto"]))) {
                                $ds->commit();
                                $this->Session->setFlash("El Pago ha sido cancelado.", "flash_bootstrap");
                                $user = $this->Auth->user();
                                if($user["idgroup"] == 1)
                                    return $this->redirect(array("action" => "index"));
                                else
                                    return $this->redirect (array("action" => "index_pagos"));
                            }
                        }
                        $this->Session->setFlash("No fue posible cancelar el Pago.", "flash_bootstrap");
                    } else {
                        $this->Session->setFlash("El usuario no tiene permisos de Administrador.", "flash_bootstrap");
                    }
                } else {
                    $this->Session->setFlash("El password no coincide con el nombre de usuario.", "flash_bootstrap");
                }
            } else {
                $this->Session->setFlash("No hay un Usuario registrado con ese nombre de usuario.", "flash_bootstrap");
            }
        }
    }
}
