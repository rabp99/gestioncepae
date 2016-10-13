<?php

/**
 * CakePHP CursosController
 * @author Roberto
 */
class CursosController extends AppController { 
    public $uses = array("Curso", "Asignacion", "Docente", "Alumno", "Matricula", "Padre", 'Aniolectivo');

    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Curso.descripcion" => "asc"
        ),
        "conditions" => array(
            "Curso.estado" => 1
        ),
        "recursive" => 2
    );

    public function index() {
        $this->layout = "admin";
        
        $this->Paginator->settings = $this->paginate;
        $cursos = $this->Paginator->paginate();
        $this->set(compact("cursos"));
    }
    
    public function add() {
        $this->layout = "admin";
        
        $this->set("niveles", $this->Curso->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        $this->set("areas", $this->Curso->Area->find("list", array(
            "fields" => array("Area.idarea", "Area.descripcion"),
            "conditions" => array("Area.estado" => 1)
        )));
        
        $this->set("aniolectivos", $this->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        if ($this->request->is(array("post", "put"))) {
            $this->Curso->create();
            if ($this->Curso->save($this->request->data)) {
                $this->Session->setFlash(__("El curso ha sido registrada correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el curso."), "flash_bootstrap");
        }
    }

    public function view($id = null) {
        $this->layout = "admin";
                
        if (!$id) {
            throw new NotFoundException(__("Curso inválido"));
        }
        $this->Curso->recursive = 2;
        $curso = $this->Curso->findByIdcurso($id);
        if (!$curso) {
            throw new NotFoundException(__("Curso inválido"));
        } 
        $this->set(compact("curso"));
    }
    
    public function edit($id = null) {
        $this->layout = "admin";

        if (!$id) {
            throw new NotFoundException(__("Curso inválida"));
        }
        $this->set("niveles", $this->Curso->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        $this->set("areas", $this->Curso->Area->find("list", array(
            "fields" => array("Area.idarea", "Area.descripcion"),
            "conditions" => array("Area.estado" => 1)
        )));
        
        $this->set("aniolectivos", $this->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $this->Curso->recursive = 2;
        $curso = $this->Curso->findByIdcurso($id);
        $grado = $this->Curso->Grado->findByIdgrado($curso["Curso"]["idgrado"]);
        
        $this->set("grados", $this->Curso->Grado->find("list", array(
            "fields" => array("Grado.idgrado", "Grado.descripcion"),
            "conditions" => array("Grado.idnivel" => $grado["Nivel"]["idnivel"])
        )));
        
        if (!$curso) {
            throw new NotFoundException(__("Curso inválida"));
        }
        
        if ($this->request->is(array("post", "put"))) {      
            $this->Curso->id = $id;
            if ($this->Curso->save($this->request->data)) {     
                $this->Session->setFlash(__("El Curso ha sido actualizada."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el curso."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $curso;
            $this->request->data["Nivel"]["idnivel"] = $grado["Grado"]["idnivel"];
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Curso->id = $id;
        if ($this->Curso->saveField("estado", 2)) {
            $this->Session->setFlash(__("El curso de código: %s ha sido eliminada.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
    
    public function cursosByDocente() {
        $this->layout = "docente";

        $user = $this->Auth->user();
        $docente = $this->Docente->findByIduser($user["iduser"]);
                
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        
        $asignaciones = array();
        
        $idaniolectivo = 0;
        if($this->request->is(array("post", "put"))) {
            if(!empty($this->request->data["Aniolectivo"]["idaniolectivo"]))
                $idaniolectivo = $this->request->data["Aniolectivo"]["idaniolectivo"];
        } else {
            $idaniolectivo = $this->Asignacion->Seccion->Aniolectivo->getAniolectivoActual();
        }
        
        $conditions["Seccion.idaniolectivo"] = $idaniolectivo;
        $conditions["Asignacion.estado"] = 1;
        $conditions["Asignacion.iddocente"] = $docente["Docente"]["iddocente"];    
        $this->Asignacion->recursive = 3;
        $asignaciones = $this->Asignacion->find("all", array(
            "conditions" => $conditions
        ));   
        
        $this->set(compact("idaniolectivo"));
        $this->set(compact("asignaciones"));
    }  
    
    public function view_docente($id = null) {
        $this->layout = "docente";
                
        if (!$id) {
            throw new NotFoundException(__("Curso inválido"));
        }
        $this->Curso->recursive = 2;
        $curso = $this->Curso->findByIdcurso($id);
        if (!$curso) {
            throw new NotFoundException(__("Curso inválido"));
        } 
        $this->set(compact("curso"));
    }
    
    public function cursosByAlumno() {
        $this->layout = "alumno";

        $user = $this->Auth->user();
        $alumno = $this->Alumno->findByIduser($user["iduser"]);
                
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
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
            $idaniolectivo = $this->Asignacion->Seccion->Aniolectivo->getAniolectivoActual();
        }
        
        $this->Matricula->recursive = 3;
        $matriculas = $this->Matricula->find("all", array(
           "conditions" => array("Matricula.idalumno" => $alumno["Alumno"]["idalumno"]) 
        ));
        foreach($matriculas as $matricula) {
            if($matricula["Seccion"]["idaniolectivo"] == $idaniolectivo) {
                $matricula_seleccionada = $matricula;
                $grado = $matricula["Seccion"]["Grado"];
                $this->Curso->recursive = 2;
                $cursos = $this->Curso->find("all", array(
                    "conditions" => array("Curso.idgrado" => $grado["idgrado"])
                ));
            }
        }
        $this->set(compact("idaniolectivo"));
        $this->set(compact("matricula_seleccionada"));
        $this->set(compact("cursos"));
    }
    
    public function view_alumno($id = null) {
        $this->layout = "alumno";
                
        if (!$id) {
            throw new NotFoundException(__("Curso inválido"));
        }
        $this->Curso->recursive = 2;
        $curso = $this->Curso->findByIdcurso($id);
        if (!$curso) {
            throw new NotFoundException(__("Curso inválido"));
        } 
        $this->set(compact("curso"));
    }
    
    public function cursosByApoderado() {
        $this->layout = "apoderado";

        $user = $this->Auth->user();
        $this->Padre->recursive = 4;
        $padre = $this->Padre->findByIduser($user["iduser"]);
        
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
         // $this->set("alumnos", Set::combine($padre["AlumnosPadre"], "{n}.idalumno", "{n}.Alumno.nombreCompleto"));
        
        $detallepagos = array();
        $pagos = array();
        $idaniolectivo = $this->Aniolectivo->getAniolectivoActual();
        
        $alumnos_aux = $padre["AlumnosPadre"];
        $alumnos = array();
        foreach ($alumnos_aux as $alumno_aux) {
            foreach ($alumno_aux["Alumno"]["Matricula"] as $matricula) {
                if ($matricula["Seccion"]["idaniolectivo"] == $idaniolectivo) {
                    $alumnos[$alumno_aux["Alumno"]["idalumno"]] = $alumno_aux["Alumno"]["nombreCompleto"];
                    break;
                }
            }
        }
        $this->set("alumnos", $alumnos);
        
        $cursos = array();
        $matricula_seleccionada = null;
        
        if($this->request->is(array("post", "put"))) {              
            $idaniolectivo = $this->request->data["Aniolectivo"]["idaniolectivo"];
            
            $alumnos_aux = $padre["AlumnosPadre"];
            $alumnos = array();
            foreach ($alumnos_aux as $alumno_aux) {
                foreach ($alumno_aux["Alumno"]["Matricula"] as $matricula) {
                    if ($matricula["Seccion"]["idaniolectivo"] == $idaniolectivo) {
                        $alumnos[$alumno_aux["Alumno"]["idalumno"]] = $alumno_aux["Alumno"]["nombreCompleto"];
                        break;
                    }
                }
            }
            $this->set("alumnos", $alumnos);

            if(!empty($this->request->data["Aniolectivo"]["idaniolectivo"]) && !empty($this->request->data["Alumno"]["idalumno"])) {
                $this->Matricula->recursive = 3;
                $matriculas = $this->Matricula->find("all", array(
                   "conditions" => array("Matricula.idalumno" => $this->request->data["Alumno"]["idalumno"]) 
                ));
                foreach($matriculas as $matricula) {
                    if($matricula["Seccion"]["idaniolectivo"] == $this->request->data["Aniolectivo"]["idaniolectivo"]) {
                        $matricula_seleccionada = $matricula;
                        $grado = $matricula["Seccion"]["Grado"];
                        $this->Curso->recursive = 2;
                        $cursos = $this->Curso->find("all", array(
                            "conditions" => array("Curso.idgrado" => $grado["idgrado"])
                        ));
                    }
                }
            }
        } else
            $idaniolectivo = $this->Asignacion->Seccion->Aniolectivo->getAniolectivoActual();
        $this->set(compact("idaniolectivo"));
        $this->set(compact("matricula_seleccionada"));
        $this->set(compact("cursos"));
    }
    
    public function view_apoderado($id = null) {
        $this->layout = "apoderado";
                
        if (!$id) {
            throw new NotFoundException(__("Curso inválido"));
        }
        $this->Curso->recursive = 2;
        $curso = $this->Curso->findByIdcurso($id);
        if (!$curso) {
            throw new NotFoundException(__("Curso inválido"));
        } 
        $this->set(compact("curso"));
    }
}