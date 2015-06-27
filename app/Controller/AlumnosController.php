<?php

/**
 * CakePHP AlumnosController
 * @author admin
 */
class AlumnosController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("datos_apoderado");
    }
    
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
        $this->layout = "admin";
        
        $this->Paginator->settings = $this->paginate;
        $alumnos = $this->Paginator->paginate();
        $this->set(compact("alumnos"));
    }
    
    public function add() {
        $this->layout = "admin";
        
        if ($this->request->is(array("post", "put"))) {
            $ds = $this->Alumno->getDataSource();
            $ds->begin();
            $this->Alumno->User->create();
            if($this->Alumno->User->save($this->request->data["User"])) {
                $this->request->data["Alumno"]["iduser"] = $this->Alumno->User->id;
                $this->Alumno->create();  
                if($this->Alumno->save($this->request->data["Alumno"])) {
                    $this->request->data["Alumno"]["idalumno"] = $this->Alumno->id;
                    
                    if(!isset($this->request->data["Padre"][0]["idpadre"]) && !isset($this->request->data["Padre"][1]["idpadre"]) && !isset($this->request->data["Padre"][2]["idpadre"]) ) {
                        debug("primer caso");
                        // Indicar que Padre es Apoderado
                        $i_apoderado = $this->request->data["Auxiliar"]["aux"];
                        $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                        // Crear Usuario para Apoderado
                        $this->request->data["Padre"][$i_apoderado]["User"]["username"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                        $this->request->data["Padre"][$i_apoderado]["User"]["password"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                        $this->request->data["Padre"][$i_apoderado]["User"]["idgroup"] = 3; // Padre
                
                        $this->Alumno->User->create();
                        if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                            $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                            $r = true;
                            
                            $alumnos_padres = array();
                            foreach($this->request->data["Padre"] as $key => $padre) {
                                $this->Alumno->Padre->create();
                                if($this->Alumno->Padre->save($padre)) {
                                    $this->request->data["Padre"][$key]["idpadre"] = $this->Alumno->Padre->id;
                                    $alumnos_padres[] = array(
                                        "Alumno" => array("idalumno" => $this->request->data["Alumno"]["idalumno"]),
                                        "Padre" => array("idpadre" => $this->request->data["Padre"][$key]["idpadre"]),
                                    );
                                } else {
                                    $r = false;
                                }
                            }
                        
                            unset($this->request->data["Auxiliar"]);
                            unset($this->request->data["User"]);
                            unset($this->request->data["Padre"][$i_apoderado]["User"]);
                        
                            if($this->Alumno->Padre->saveAll($alumnos_padres)) {
                                if($r) {
                                    $ds->commit();
                                    $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                    return $this->redirect(array("action" => "index"));
                                }
                            }
                        }
                    } elseif((isset($this->request->data["Padre"][0]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 0 && !isset($this->request->data["Padre"][1]["ipadre"])) || (isset($this->request->data["Padre"][1]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 1  && !isset($this->request->data["Padre"][0]["ipadre"]))) {
                        debug("caso 2");
                        $i_apoderado = $this->request->data["Auxiliar"]["aux"];
                        $padre = $this->Alumno->Padre->findByIdpadre($this->request->data["Padre"][$i_apoderado]["idpadre"]);
                        
                        if($padre["Padre"]["iduser"] == null) {
                            // Crear Usuario para Apoderado
                            $this->request->data["Padre"][$i_apoderado]["User"]["username"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["password"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["idgroup"] = 3; // Padre
                            
                            $this->Alumno->User->create();
                            if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                                $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                                if($this->Alumno->Padre->save($this->request->data["Padre"][$i_apoderado])) {
                                    $ds->commit();
                                    $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                    return $this->redirect(array("action" => "index"));
                                }
                            }
                        }
                    } elseif((isset($this->request->data["Padre"][0]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 1 && !isset($this->request->data["Padre"][1]["ipadre"])) || (isset($this->request->data["Padre"][1]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 0  && !isset($this->request->data["Padre"][0]["ipadre"]))) {
                        debug("caso 3");
                    } elseif((isset($this->request->data["Padre"][0]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 0 && isset($this->request->data["Padre"][1]["ipadre"])) || (isset($this->request->data["Padre"][1]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 1  && isset($this->request->data["Padre"][0]["ipadre"]))) {
                        debug("caso 4");
                    } elseif(isset($this->request->data["Padre"][0]["idpadre"]) && isset($this->request->data["Padre"][1]["ipadre"]) && !isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2) {
                        debug("caso 5");
                    } elseif((isset($this->request->data["Padre"][0]["idpadre"]) && !isset($this->request->data["Padre"][1]["ipadre"]) && !isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2) || (!isset($this->request->data["Padre"][0]["idpadre"]) && isset($this->request->data["Padre"][1]["ipadre"]) && !isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2)) {
                        debug("caso 6");
                    } elseif(isset($this->request->data["Padre"][0]["idpadre"]) && isset($this->request->data["Padre"][1]["ipadre"]) && isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2) {
                        debug("caso 7");
                    }
                }
            }
        }
    }

    public function view($id = null) {
        $this->layout = "admin";
                
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
        $this->layout = "admin";

        if (!$id) {
            throw new NotFoundException(__("Alumno inválido"));
        }
        $alumno = $this->Alumno->findByIdalumno($id);
        if (!$alumno) {
            throw new NotFoundException(__("Alumno inválido"));
        }
        
        if ($this->request->is(array("post", "put"))) {      
            if($this->request->data["Padre"]["2"]["dni"] == "") {
                unset($this->request->data["Padre"][2]);
                if($this->request->data["Auxiliar"]["aux"] == 2) {
                    $this->Session->setFlash(__("Seleccione un Remitente válido."), "flash_bootstrap");
                    return;
                }
            } else {
                $this->request->data["Padre"]["2"]["condicion"] = 0;
            }
            
            // Condicion
            $this->request->data["Padre"]["0"]["condicion"] = 0;
            $this->request->data["Padre"]["1"]["condicion"] = 0;
            $this->request->data["Padre"][$this->request->data["Auxiliar"]["aux"]]["condicion"] = 1;
            unset($this->request->data["Auxiliar"]);
            
            $this->Alumno->id = $id;
            if ($this->Alumno->saveAssociated($this->request->data)) {     
                $this->Session->setFlash(__("El Alumno ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Alumno."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $alumno;
            // Remitente
            for($i = 0; $i < sizeof($alumno["Padre"]); $i++) {
                $padre = $alumno["Padre"][$i];
                if($padre["condicion"]) $this->request->data["Auxiliar"]["aux"] = $i;
            }
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
                $this->Session->setFlash(__("El Alumno de código: %s ha sido Deshabilitado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
    }
    
    // Funciones secundarias
    public function getAlumnos() {
        $this->layout = "ajax";     
        $this->Alumno->recursive = 3;
        if(isset($this->request->data["Alumno"]["busqueda"])) {
            $busqueda = $this->request->data["Alumno"]["busqueda"];
            $alumnos = $this->Alumno->find("all", array(
                "conditions" => array(
                    "OR" => array(
                        "Alumno.nombres LIKE" => "%" . $busqueda . "%",
                        "Alumno.apellidoPaterno LIKE" => "%" . $busqueda . "%",
                        "Alumno.apellidoMaterno LIKE" => "%" . $busqueda . "%"
                    ),
                    "AND" => array("Alumno.estado" => 1)
                )
            ));
        }
        else $alumnos = $this->Alumno->find("all", array(
            "conditions" => array("Alumno.estado" => 1)
        ));
        
        if(isset($this->request->data["Aniolectivo"]["idaniolectivo"])) {
            $idaniolectivo = $this->request->data["Aniolectivo"]["idaniolectivo"];
            foreach($alumnos as $key => $alumno) {
                foreach($alumno["Matricula"] as $matricula) {
                    if($matricula["Seccion"]["Aniolectivo"]["idaniolectivo"] == $idaniolectivo && $matricula["estado"] == 1) {
                        unset($alumnos[$key]);
                    }
                }
            }
        }
        
        $this->set("alumnos", $alumnos);
        $this->render();
    }   
    
    public function getPadre0ByDni() {
        $this->layout = "ajax";
        
        $padre = $this->Alumno->Padre->findByDni($this->request->data["Padre"][0]["dni"]);
        
        echo json_encode($padre);;
        
        die();
    }   
    
    public function getPadre1ByDni() {
        $this->layout = "ajax";
        
        $padre = $this->Alumno->Padre->findByDni($this->request->data["Padre"][1]["dni"]);
        
        echo json_encode($padre);;
        
        die();
    }
    
    public function datos_alumno() {
        if(empty($this->request->params["requested"])) {
            throw new ForbiddenException();
        }

        $user = $this->Auth->user();
        $alumno = $this->Alumno->findByIduser($user["iduser"]);
        
        return $alumno;
    } 
    
    public function datos_apoderado() {
        if(empty($this->request->params["requested"])) {
            throw new ForbiddenException();
        }

        $user = $this->Auth->user();
        $padre = $this->Alumno->Padre->findByIduser($user["iduser"]);
        
        return $padre;
    }
}
