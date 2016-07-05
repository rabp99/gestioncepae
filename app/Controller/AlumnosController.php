<?php

/**
 * CakePHP AlumnosController
 * @author admin
 */
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class AlumnosController extends AppController {
    public $uses = array("Alumno", "Padre");
    
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
            $this->request->data["User"]["username"] = str_shuffle($this->request->data["Alumno"]["nombres"]);
            if($this->Alumno->User->save($this->request->data["User"])) {
                $iduser = $this->Alumno->User->getLastInsertID();
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
                
                        $r = true;
                        $this->Alumno->User->create();
                        if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                            $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                            foreach($this->request->data["Padre"] as $k_padre => $padre) {
                                $this->Padre->create();
                                if($this->Padre->save($padre)) {
                                    $this->request->data["Padre"][$k_padre]["idpadre"] = $this->Padre->id;
                                } else $r = false;    
                            }
                        }
                        if($r) {
                            $alumnos_padre = array();
                            foreach($this->request->data["Padre"] as $key => $padre) {
                                $alumnos_padre[] = array(
                                    "AlumnosPadre" => array(
                                        "idpadre" => $padre["idpadre"],
                                        "idalumno" => $this->request->data["Alumno"]["idalumno"],
                                        "parentesco" => $padre["parentesco"],
                                        "apoderado" => $padre["apoderado"]
                                    )
                                );
                            }
                            if($this->Alumno->AlumnosPadre->saveMany($alumnos_padre)) {
                                $ds->commit();
                                $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                return $this->redirect(array("action" => "index"));
                            }
                        }
                    } elseif((isset($this->request->data["Padre"][0]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 0 && !isset($this->request->data["Padre"][1]["idpadre"])) || (isset($this->request->data["Padre"][1]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 1  && !isset($this->request->data["Padre"][0]["idpadre"]))) {
                        debug("caso 2");
                        $i_apoderado = $this->request->data["Auxiliar"]["aux"];
                        $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                        $padre = $this->Padre->findByIdpadre($this->request->data["Padre"][$i_apoderado]["idpadre"]);
                        
                        $r = true;
                        if($padre["Padre"]["iduser"] == null) {
                            // Crear Usuario para Apoderado
                            $this->request->data["Padre"][$i_apoderado]["User"]["username"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["password"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["idgroup"] = 3; // Padre
                            
                            $this->Alumno->User->create();
                            if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                                $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                                $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                                $this->Padre->id = $padre["Padre"]["idpadre"];
                                if($this->Padre->save($this->request->data["Padre"][$i_apoderado]))
                                    $r = true;
                                else 
                                    $r = false;
                            }
                        }
                        if($r) {
                            $this->Padre->create();
                            $i_otro = $i_apoderado == 0 ? 1 : 0;
                            if($this->Padre->save($this->request->data["Padre"][$i_otro])) {
                                // Preparar para el many to many
                                $this->request->data["Padre"][$i_apoderado]["idpadre"] = $padre["Padre"]["idpadre"];
                                $this->request->data["Padre"][$i_otro]["idpadre"] = $this->Padre->id;
                                
                                $alumnos_padre = array();
                                foreach($this->request->data["Padre"] as $key => $padre) {
                                    $alumnos_padre[] = array(
                                        "AlumnosPadre" => array(
                                            "idpadre" => $padre["idpadre"],
                                            "idalumno" => $this->request->data["Alumno"]["idalumno"],
                                            "parentesco" => $padre["parentesco"],
                                            "apoderado" => $padre["apoderado"]
                                        )
                                    );
                                }
                                if($this->Alumno->AlumnosPadre->saveMany($alumnos_padre)) {
                                    $ds->commit();
                                    $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                    return $this->redirect(array("action" => "index"));
                                }
                            }
                        }
                    } elseif((isset($this->request->data["Padre"][0]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 1 && !isset($this->request->data["Padre"][1]["idpadre"])) || (isset($this->request->data["Padre"][1]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 0  && !isset($this->request->data["Padre"][0]["idpadre"]))) {
                        debug("caso 3");
                        $i_apoderado = $this->request->data["Auxiliar"]["aux"];
                        $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                        
                        // Crear Usuario para Apoderado
                        $this->request->data["Padre"][$i_apoderado]["User"]["username"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                        $this->request->data["Padre"][$i_apoderado]["User"]["password"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                        $this->request->data["Padre"][$i_apoderado]["User"]["idgroup"] = 3; // Padre

                        $this->Alumno->User->create();
                        if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                            $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                            $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                            $this->Padre->create();
                            if($this->Padre->save($this->request->data["Padre"][$i_apoderado])) {
                                $i_otro = $i_apoderado == 0 ? 1 : 0;
                                $padre = $this->Padre->findByDni($this->request->data["Padre"][$i_otro]["dni"]);
                                $this->request->data["Padre"][$i_apoderado]["idpadre"] = $this->Padre->id;
                                $this->request->data["Padre"][$i_otro]["idpadre"] = $padre["Padre"]["idpadre"];
                                
                                $alumnos_padre = array();
                                foreach($this->request->data["Padre"] as $key => $padre) {
                                    $alumnos_padre[] = array(
                                        "AlumnosPadre" => array(
                                            "idpadre" => $padre["idpadre"],
                                            "idalumno" => $this->request->data["Alumno"]["idalumno"],
                                            "parentesco" => $padre["parentesco"],
                                            "apoderado" => $padre["apoderado"]
                                        )
                                    );
                                }
                                if($this->Alumno->AlumnosPadre->saveMany($alumnos_padre)) {
                                    $ds->commit();
                                    $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                    return $this->redirect(array("action" => "index"));
                                }
                            }
                        }
                        
                    } elseif((isset($this->request->data["Padre"][0]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 0 && isset($this->request->data["Padre"][1]["idpadre"])) || (isset($this->request->data["Padre"][1]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 1  && isset($this->request->data["Padre"][0]["idpadre"]))) {
                        debug("caso 4");
                        $i_apoderado = $this->request->data["Auxiliar"]["aux"];
                        $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                        $padre = $this->Padre->findByIdpadre($this->request->data["Padre"][$i_apoderado]["idpadre"]);
                        
                        $r = true;
                        if($padre["Padre"]["iduser"] == null) {
                            // Crear Usuario para Apoderado
                            $this->request->data["Padre"][$i_apoderado]["User"]["username"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["password"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["idgroup"] = 3; // Padre
                            
                            $this->Alumno->User->create();
                            if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                                $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                                $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                                $this->Padre->id = $padre["Padre"]["idpadre"];
                                if($this->Padre->save($this->request->data["Padre"][$i_apoderado]))
                                    $r = true;
                                else 
                                    $r = false;
                            }
                        }
                        if($r) {
                            $i_otro = $i_apoderado == 0 ? 1 : 0;
                            // Preparar para el many to many
                            $this->request->data["Padre"][$i_apoderado]["idpadre"] = $padre["Padre"]["idpadre"];
                            $padre = $this->Padre->findByDni($this->request->data["Padre"][$i_otro]["dni"]);
                            $this->request->data["Padre"][$i_otro]["idpadre"] = $padre["Padre"]["idpadre"];
                                               
                            $alumnos_padre = array();
                            foreach($this->request->data["Padre"] as $key => $padre) {
                                $alumnos_padre[] = array(
                                    "AlumnosPadre" => array(
                                        "idpadre" => $padre["idpadre"],
                                        "idalumno" => $this->request->data["Alumno"]["idalumno"],
                                        "parentesco" => $padre["parentesco"],
                                        "apoderado" => $padre["apoderado"]
                                    )
                                );
                            }
                            if($this->Alumno->AlumnosPadre->saveMany($alumnos_padre)) {
                                $ds->commit();
                                $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                return $this->redirect(array("action" => "index"));
                            }
                        }
                    } elseif(isset($this->request->data["Padre"][0]["idpadre"]) && isset($this->request->data["Padre"][1]["idpadre"]) && !isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2) {
                        debug("caso 5");
                                               
                        $i_apoderado = $this->request->data["Auxiliar"]["aux"];
                        $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                        // Crear Usuario para Apoderado
                        $this->request->data["Padre"][$i_apoderado]["User"]["username"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                        $this->request->data["Padre"][$i_apoderado]["User"]["password"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                        $this->request->data["Padre"][$i_apoderado]["User"]["idgroup"] = 3; // Padre
                        
                        $r = true;
                        $this->Alumno->User->create();
                        if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                            $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                            $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                            $this->Padre->create();
                            if($this->Padre->save($this->request->data["Padre"][$i_apoderado])) {
                                $this->request->data["Padre"][$i_apoderado]["idpadre"] = $this->Padre->id;
                                $r = true;
                            } else 
                                $r = false;
                        }
                        if($r) {
                            // Preparar para el many to many
                            $padre = $this->Padre->findByDni($this->request->data["Padre"][0]["dni"]);
                            $this->request->data["Padre"][0]["idpadre"] = $padre["Padre"]["idpadre"];
                            $padre = $this->Padre->findByDni($this->request->data["Padre"][1]["dni"]);
                            $this->request->data["Padre"][1]["idpadre"] = $padre["Padre"]["idpadre"];
                                                                               
                            $alumnos_padre = array();
                            foreach($this->request->data["Padre"] as $key => $padre) {
                                $alumnos_padre[] = array(
                                    "AlumnosPadre" => array(
                                        "idpadre" => $padre["idpadre"],
                                        "idalumno" => $this->request->data["Alumno"]["idalumno"],
                                        "parentesco" => $padre["parentesco"],
                                        "apoderado" => $padre["apoderado"]
                                    )
                                );
                            }
                            if($this->Alumno->AlumnosPadre->saveMany($alumnos_padre)) {
                                $ds->commit();
                                $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                return $this->redirect(array("action" => "index"));
                            }
                        }
                    } elseif((isset($this->request->data["Padre"][0]["idpadre"]) && !isset($this->request->data["Padre"][1]["idpadre"]) && !isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2) || (!isset($this->request->data["Padre"][0]["idpadre"]) && isset($this->request->data["Padre"][1]["idpadre"]) && !isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2)) {
                        debug("caso 6");
                                                                       
                        $i_apoderado = $this->request->data["Auxiliar"]["aux"];
                        $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                        
                        // Crear Usuario para Apoderado
                        $this->request->data["Padre"][$i_apoderado]["User"]["username"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                        $this->request->data["Padre"][$i_apoderado]["User"]["password"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                        $this->request->data["Padre"][$i_apoderado]["User"]["idgroup"] = 3; // Padre
                        
                        $r = true;
                        $this->Alumno->User->create();
                        if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                            $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                            $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                            $this->Padre->create();
                            if($this->Padre->save($this->request->data["Padre"][$i_apoderado])) {
                                $this->request->data["Padre"][$i_apoderado]["idpadre"] = $this->Padre->id;
                                $r = true;
                            }
                            else 
                                $r = false;
                        }
                        if($r) {
                            if(isset($this->request->data["Padre"][0]["idpadre"])) {
                                $this->Padre->create();
                                if($this->Padre->save($this->request->data["Padre"][1])) {
                                    $this->request->data["Padre"][1]["idpadre"] = $this->Padre->id;
                                    $r = true;
                                }
                                else $r = false;
                            } elseif(isset($this->request->data["Padre"][1]["idpadre"])) {
                                $this->Padre->create();
                                if($this->Padre->save($this->request->data["Padre"][0])) {
                                    $this->request->data["Padre"][0]["idpadre"] = $this->Padre->id;
                                    $r = true;
                                }
                                else $r = false;
                            }
                                                                               
                            $alumnos_padre = array();
                            foreach($this->request->data["Padre"] as $key => $padre) {
                                $alumnos_padre[] = array(
                                    "AlumnosPadre" => array(
                                        "idpadre" => $padre["idpadre"],
                                        "idalumno" => $this->request->data["Alumno"]["idalumno"],
                                        "parentesco" => $padre["parentesco"],
                                        "apoderado" => $padre["apoderado"]
                                    )
                                );
                            }
                            if($this->Alumno->AlumnosPadre->saveMany($alumnos_padre)) {
                                $ds->commit();
                                $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                return $this->redirect(array("action" => "index"));
                            }
                        }
                    } elseif(isset($this->request->data["Padre"][0]["idpadre"]) && isset($this->request->data["Padre"][1]["idpadre"]) && isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2) {
                        debug("caso 7");
                        
                        $i_apoderado = $this->request->data["Auxiliar"]["aux"];
                        $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                        $padre = $this->Padre->findByIdpadre($this->request->data["Padre"][$i_apoderado]["idpadre"]);
                        
                        $r = true;
                        if($padre["Padre"]["iduser"] == null) {
                            // Crear Usuario para Apoderado
                            $this->request->data["Padre"][$i_apoderado]["User"]["username"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["password"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["idgroup"] = 3; // Padre
                            
                            $this->Alumno->User->create();
                            if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                                $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                                $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                                $this->Padre->id = $padre["Padre"]["idpadre"];
                                if($this->Padre->save($this->request->data["Padre"][$i_apoderado]))
                                    $r = true;
                                else 
                                    $r = false;
                            }
                        }
                        if($r) {
                            $alumnos_padre = array();
                            foreach($this->request->data["Padre"] as $key => $padre) {
                                $alumnos_padre[] = array(
                                    "AlumnosPadre" => array(
                                        "idpadre" => $padre["idpadre"],
                                        "idalumno" => $this->request->data["Alumno"]["idalumno"],
                                        "parentesco" => $padre["parentesco"],
                                        "apoderado" => $padre["apoderado"]
                                    )
                                );
                            }
                            if($this->Alumno->AlumnosPadre->saveMany($alumnos_padre)) {
                                $ds->commit();
                                $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                return $this->redirect(array("action" => "index"));
                            }
                        }
                    } elseif(!isset($this->request->data["Padre"][0]["idpadre"]) && !isset($this->request->data["Padre"][1]["idpadre"]) && isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2) {
                        debug("caso 8");
                                             
                        $i_apoderado = $this->request->data["Auxiliar"]["aux"];
                        $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                        $padre = $this->Padre->findByIdpadre($this->request->data["Padre"][$i_apoderado]["idpadre"]);
                        
                        $r = true;
                        if($padre["Padre"]["iduser"] == null) {
                            // Crear Usuario para Apoderado
                            $this->request->data["Padre"][$i_apoderado]["User"]["username"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["password"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["idgroup"] = 3; // Padre
                            
                            $this->Alumno->User->create();
                            if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                                $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                                $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                                $this->Padre->id = $padre["Padre"]["idpadre"];
                                if($this->Padre->save($this->request->data["Padre"][$i_apoderado]))
                                    $r = true;
                                else 
                                    $r = false;
                            }
                        }
                        if($r) {
                            foreach($this->request->data["Padre"] as $key => $padre) {
                                $this->Padre->create();
                                if($this->Padre->save($padre)) {
                                    $this->request->data["Padre"][$key]["idpadre"] = $this->Padre->id;
                                } else {
                                    $r = false;
                                }
                            }
                        }
                        if($r) {
                            $alumnos_padre = array();
                            foreach($this->request->data["Padre"] as $key => $padre) {
                                $alumnos_padre[] = array(
                                    "AlumnosPadre" => array(
                                        "idpadre" => $padre["idpadre"],
                                        "idalumno" => $this->request->data["Alumno"]["idalumno"],
                                        "parentesco" => $padre["parentesco"],
                                        "apoderado" => $padre["apoderado"]
                                    )
                                );
                            }
                            if($this->Alumno->AlumnosPadre->saveMany($alumnos_padre)) {
                                $ds->commit();
                                $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                return $this->redirect(array("action" => "index"));
                            }
                        }
                    } elseif((isset($this->request->data["Padre"][0]["idpadre"]) && !isset($this->request->data["Padre"][1]["idpadre"]) && isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2) || (isset($this->request->data["Padre"][1]["idpadre"]) && !isset($this->request->data["Padre"][0]["idpadre"]) && isset($this->request->data["Padre"][2]["idpadre"]) && $this->request->data["Auxiliar"]["aux"] == 2)) {
                        debug("caso 9"); 
                        
                        $i_apoderado = $this->request->data["Auxiliar"]["aux"];
                        $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                        $padre = $this->Padre->findByIdpadre($this->request->data["Padre"][$i_apoderado]["idpadre"]);
                       
                        $r = true;
                        if($padre["Padre"]["iduser"] == null) {
                            // Crear Usuario para Apoderado
                            $this->request->data["Padre"][$i_apoderado]["User"]["username"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["password"] = $this->request->data["Padre"][$i_apoderado]["dni"];
                            $this->request->data["Padre"][$i_apoderado]["User"]["idgroup"] = 3; // Padre
                            
                            $this->Alumno->User->create();
                            if($this->Alumno->User->save($this->request->data["Padre"]["$i_apoderado"]["User"])) {
                                $this->request->data["Padre"][$i_apoderado]["iduser"] = $this->Alumno->User->id;
                                $this->request->data["Padre"][$i_apoderado]["apoderado"] = 1;
                                $this->Padre->id = $padre["Padre"]["idpadre"];
                                if($this->Padre->save($this->request->data["Padre"][$i_apoderado]))
                                    $r = true;
                                else 
                                    $r = false;
                            }
                        }
                        if($r) {
                            if(isset($this->request->data["Padre"][0]["idpadre"])) {
                                $this->Padre->create();
                                if($this->Padre->save($this->request->data["Padre"][1])) {
                                    $this->request->data["Padre"][1]["idpadre"] = $this->Padre->id;
                                    $r = true;
                                }
                                else $r = false;
                            } elseif(isset($this->request->data["Padre"][1]["idpadre"])) {
                                $this->Padre->create();
                                if($this->Padre->save($this->request->data["Padre"][0])) {
                                    $this->request->data["Padre"][0]["idpadre"] = $this->Padre->id;
                                    $r = true;
                                }
                                else $r = false;
                            }
                        }
                        if($r) {
                            $alumnos_padre = array();
                            foreach($this->request->data["Padre"] as $key => $padre) {
                                $alumnos_padre[] = array(
                                    "AlumnosPadre" => array(
                                        "idpadre" => $padre["idpadre"],
                                        "idalumno" => $this->request->data["Alumno"]["idalumno"],
                                        "parentesco" => $padre["parentesco"],
                                        "apoderado" => $padre["apoderado"]
                                    )
                                );
                            }
                            if($this->Alumno->AlumnosPadre->saveMany($alumnos_padre)) {
                                $ds->commit();
                                $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                                return $this->redirect(array("action" => "index"));
                            }
                        }
                    }
                }
                
                
            }
            $passwordHasher = new BlowfishPasswordHasher();
            $passwordHasher = $passwordHasher->hash($this->request->data["Alumno"]["idalumno"]);

            $this->Alumno->User->updateAll(array(
                "username" => $this->request->data["Alumno"]["idalumno"],
                "password" => $passwordHasher
            ), array(
                "iduser" => $iduser
            ));
            $this->Session->setFlash(__("No fue posible registrar el alumno."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "admin";
                
        if (!$id) {
            throw new NotFoundException(__("Alumno inválido"));
        }
        $this->Alumno->recursive = 2;
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
            
            $this->Alumno->id = $id;
            if ($this->Alumno->save($this->request->data)) {     
                $this->Session->setFlash(__("El Alumno ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Alumno."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $alumno;
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
            if($this->Padre->updateAll($fields, $conditions)) {
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
        
        $padre = $this->Padre->findByDni($this->request->data["Padre"][0]["dni"]);
        
        echo json_encode($padre);;
        
        die();
    }   
    
    public function getPadre1ByDni() {
        $this->layout = "ajax";
        
        $padre = $this->Padre->findByDni($this->request->data["Padre"][1]["dni"]);
        
        echo json_encode($padre);;
        
        die();
    }
    
    public function getPadre2ByDni() {
        $this->layout = "ajax";
        
        $padre = $this->Padre->findByDni($this->request->data["Padre"][2]["dni"]);
        
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
        $padre = $this->Padre->findByIduser($user["iduser"]);
        
        return $padre;
    }
}
