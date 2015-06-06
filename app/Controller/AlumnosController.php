<?php

/**
 * CakePHP AlumnosController
 * @author admin
 */
class AlumnosController extends AppController {   
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
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $alumnos = $this->Paginator->paginate();
        $this->set(compact("alumnos"));
    }
    
    public function add() {
        $this->layout = "main";
                
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
            
            $this->Alumno->create();
            if($this->Alumno->saveAssociated($this->request->data, array("validate" => "only"))) {
                $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el alumno."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "main";
                
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
        $this->layout = "main";

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
                    )
                )
            ));
        }
        else $alumnos = $this->Alumno->find("all");
        
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
}
