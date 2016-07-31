<?php

/**
 * CakePHP NotasController
 * @author admin
 */
class NotasController extends AppController {
    public $uses = array('Aniolectivo', "Bimestre", "Docente", "Curso", "Asignacion", "Nota", "Detallenota", "Alumno", "Matricula", "Seccion", "Padre");
          
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
    
    public function administrar($idasignacion) {
        $this->layout = "docente";
        
        $asignacion = $this->Asignacion->findByIdasignacion($idasignacion);
        
        $this->set(compact("asignacion"));
        
        $this->set("bimestres", $this->Bimestre->find("list", array(
            "fields" => array("Bimestre.idbimestre", "Bimestre.descripcion"),
            "conditions" => array("Bimestre.estado" => 1)
        )));
        
        if($this->request->is(array("post", "put"))) {
            $this->Nota->create();
            if($this->Nota->save($this->request->data)) {
                $this->Session->setFlash(__("La Nota ha sido registrada correctamente."), "flash_bootstrap");
                return;
            }   
            $this->Session->setFlash(__("La Nota no ha sido registrada correctamente."), "flash_bootstrap");
        }
    }
    
    public function registrar($idasignacion) {
        $this->layout = "docente";
        
        $asignacion = $this->Asignacion->findByIdasignacion($idasignacion);
        
        $this->set(compact("asignacion"));
        
        $this->set("bimestres", $this->Bimestre->find("list", array(
            "fields" => array("Bimestre.idbimestre", "Bimestre.descripcion"),
            "conditions" => array("Bimestre.estado" => 1)
        )));
        
        if($this->request->is(array("post", "put"))) {
            $ds = $this->Detallenota->getDataSource();
            $ds->begin();
            foreach($this->request->data["Detallenota"] as $detallenota) {
                $this->Detallenota->deleteAll(array(
                    "Detallenota.idnota" => $detallenota["idnota"]
                ));
            }
            $this->Detallenota->create();
            if($this->Detallenota->saveMany($this->request->data["Detallenota"])) {
                $this->Session->setFlash(__("Las Notas han sido registradas correctamente."), "flash_bootstrap");
                $ds->commit();
                return $this->redirect(array("action" => "registrar", $idasignacion));
            }   
            $this->Session->setFlash(__("Las Notas no han sido registradas correctamente."), "flash_bootstrap");
        }
    }
        
    public function getFormNotas() {
        $this->layout = "ajax";
        
        $notas = $this->Nota->find("all", array(
            "conditions" => array(
                "Nota.estado" => 1,
                "Nota.idasignacion" => $this->request->data["Nota"]["idasignacion"],
                "Nota.idbimestre" => $this->request->data["Nota"]["idbimestre"]
            )
        ));
        if(empty($this->request->data["Nota"]["idbimestre"])) die();
        $this->set(compact("notas"));
    }
    
    public function getFormRegistro() {
        $this->layout = "ajax";
        
        $notas = $this->Nota->find("all", array(
            "conditions" => array(
                "Nota.estado" => 1,
                "Nota.idasignacion" => $this->request->data["Nota"]["idasignacion"],
                "Nota.idbimestre" => $this->request->data["Nota"]["idbimestre"]
            )
        ));
        $asignacion = $this->Asignacion->findByIdasignacion($this->request->data["Nota"]["idasignacion"]);
        $this->Asignacion->Seccion->recursive = 2;
        $seccion = $this->Asignacion->Seccion->findByIdseccion($asignacion["Asignacion"]["idseccion"]);
        
        if(empty($this->request->data["Nota"]["idbimestre"])) die();
        $this->set("matriculas", $seccion["Matricula"]);
        $this->set(compact("notas"));
    }
    
    public function index_alumno() {
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
    
    public function view_alumno($idcurso = null, $idaniolectivo = null) {
        $this->layout = "alumno";
        
        $user = $this->Auth->user();
        $alumno = $this->Alumno->findByIduser($user["iduser"]);
        
        $this->Matricula->recursive = 3;
        $matriculas = $this->Matricula->find("all", array(
           "conditions" => array("Matricula.idalumno" => $alumno["Alumno"]["idalumno"]) 
        ));
        
        $detallenotas = array();
        
        foreach($matriculas as $matricula) {
            if($matricula["Seccion"]["idaniolectivo"] == $idaniolectivo) {
                $seccion = $this->Seccion->findByIdseccion($matricula["Seccion"]["idseccion"]);
                $asignacion = $this->Asignacion->find("first", array(
                   "conditions" => array("Asignacion.idseccion" => $seccion["Seccion"]["idseccion"], "Asignacion.idcurso" => $idcurso)
                ));
                if(!empty($asignacion)) {
                    $this->Detallenota->recursive = 2;
                    $detallenotas = $this->Detallenota->find("all", array(
                       "conditions" => array("Nota.idasignacion" => $asignacion["Asignacion"]["idasignacion"]) 
                    ));
                }
            }
        }
        $this->Curso->recursive = 2;
        $this->set("curso", $this->Curso->findByIdcurso($idcurso));
        $this->set("bimestres", $this->Bimestre->find("all", array("Bimestre.estado" => 1)));
        $this->set(compact("detallenotas"));
    }
        
    public function index_apoderado() {
        $this->layout = "apoderado";

        $user = $this->Auth->user();
        $this->Padre->recursive = 4;
        $padre = $this->Padre->findByIduser($user["iduser"]);
                
        $this->set("aniolectivos", $this->Asignacion->Seccion->Aniolectivo->find("list", array(
            "fields" => array("Aniolectivo.idaniolectivo", "Aniolectivo.descripcion"),
            "conditions" => array("Aniolectivo.estado" => 1)
        )));
        //$this->set("alumnos", Set::combine($padre["AlumnosPadre"], "{n}.idalumno", "{n}.Alumno.nombreCompleto"));
        
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
        } else {
            $idaniolectivo = $this->Asignacion->Seccion->Aniolectivo->getAniolectivoActual();
            
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

        }
        $this->set(compact("idaniolectivo"));
        $this->set(compact("matricula_seleccionada"));
        $this->set(compact("cursos"));
    }
       
    public function view_apoderado($idcurso = null, $idaniolectivo = null, $idalumno) {
        $this->layout = "apoderado";

        $this->Matricula->recursive = 3;
        $matriculas = $this->Matricula->find("all", array(
           "conditions" => array("Matricula.idalumno" => $idalumno) 
        ));
        
        $detallenotas = array();
        
        foreach($matriculas as $matricula) {
            if($matricula["Seccion"]["idaniolectivo"] == $idaniolectivo) {
                $seccion = $this->Seccion->findByIdseccion($matricula["Seccion"]["idseccion"]);
                $asignacion = $this->Asignacion->find("first", array(
                   "conditions" => array("Asignacion.idseccion" => $seccion["Seccion"]["idseccion"], "Asignacion.idcurso" => $idcurso)
                ));
                if(!empty($asignacion)) {
                    $this->Detallenota->recursive = 2;
                    $detallenotas = $this->Detallenota->find("all", array(
                       "conditions" => array("Nota.idasignacion" => $asignacion["Asignacion"]["idasignacion"]) 
                    ));
                }
            }
        }
        $this->Curso->recursive = 2;
        $this->set("curso", $this->Curso->findByIdcurso($idcurso));
        $this->set("bimestres", $this->Bimestre->find("all", array("Bimestre.estado" => 1)));
        $this->set(compact("detallenotas"));
    }
    
    public function index_admin() {
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
    
    public function view_admin($idmatricula) {
        $this->layout = "admin";
        
        $this->Matricula->recursive = 3;
        $matricula = $this->Matricula->findByIdmatricula($idmatricula);
        
        $idgrado = $matricula["Seccion"]["idgrado"];
        $idaniolectivo = $matricula["Seccion"]["idaniolectivo"];
        $cursos = $this->Curso->find("all", array(
            "conditions" => array(
                "Curso.idgrado" => $idgrado,
                "Curso.idaniolectivo" => $idaniolectivo
            )
        ));
        
        $bimestres = $this->Bimestre->find("all", array(
            "conditions" => array("Bimestre.estado" => 1)
        ));
        
        $detallenotas = array();
        foreach ($cursos as $curso) {
            foreach ($bimestres as $bimestre) {
                $asignaciones = $this->Asignacion->find("all", array(
                    "conditions" => array(
                        "Asignacion.idcurso" => $curso["Curso"]["idcurso"]
                    )
                ));
                $detallenota_aux = array();
                foreach ($asignaciones as $asignacion) {
                    $notas = $this->Nota->find("all", array(
                        "conditions" => array(
                            "Nota.idasignacion" => $asignacion["Asignacion"]["idasignacion"],
                            "Nota.idbimestre" => $bimestre["Bimestre"]["idbimestre"]
                        )
                    ));
                    foreach ($notas as $nota) {
                        $detallenota = $this->Detallenota->find("first", array(
                           "conditions" => array(
                               "DetalleNota.idnota" => $nota["Nota"]["idnota"],
                               "DetalleNota.idmatricula" => $idmatricula
                           ) 
                        ));
                        $detallenota_aux[] = $detallenota;
                    }
                }
                $detallenotas[$curso["Curso"]["idcurso"]][$bimestre["Bimestre"]["idbimestre"]] = $detallenota_aux;
            }
        }
        
        $this->set(compact("matricula", "cursos", "bimestres", "detallenotas"));
    }
    
    public function registrar_admin($idmatricula) {
        $this->layout = "admin";
        
        $this->Matricula->recursive = 3;
        $matricula = $this->Matricula->findByIdmatricula($idmatricula);
        
        $idgrado = $matricula["Seccion"]["idgrado"];
        $idaniolectivo = $matricula["Seccion"]["idaniolectivo"];
        $cursos = $this->Curso->find("all", array(
            "conditions" => array(
                "Curso.idgrado" => $idgrado,
                "Curso.idaniolectivo" => $idaniolectivo
            )
        ));
        
        $bimestres = $this->Bimestre->find("all", array(
            "conditions" => array("Bimestre.estado" => 1)
        ));
        
        $detallenotas = array();
        foreach ($cursos as $curso) {
            foreach ($bimestres as $bimestre) {
                $asignaciones = $this->Asignacion->find("all", array(
                    "conditions" => array(
                        "Asignacion.idcurso" => $curso["Curso"]["idcurso"]
                    )
                ));
                $detallenota_aux = array();
                foreach ($asignaciones as $asignacion) {
                    $notas = $this->Nota->find("all", array(
                        "conditions" => array(
                            "Nota.idasignacion" => $asignacion["Asignacion"]["idasignacion"],
                            "Nota.idbimestre" => $bimestre["Bimestre"]["idbimestre"]
                        )
                    ));
                    foreach ($notas as $nota) {
                        $detallenota = $this->Detallenota->find("first", array(
                           "conditions" => array(
                               "DetalleNota.idnota" => $nota["Nota"]["idnota"],
                               "DetalleNota.idmatricula" => $idmatricula
                           ) 
                        ));
                        $detallenota_aux[] = $detallenota;
                    }
                }
                $detallenotas[$curso["Curso"]["idcurso"]][$bimestre["Bimestre"]["idbimestre"]] = $detallenota_aux;
            }
        }
        
        if ($this->request->is(array("post", "put"))) {
            $ds = $this->Detallenota->getDataSource();
            
            if ($this->Detallenota->saveMany($this->request->data["Detallenota"])) {
                $this->Session->setFlash(__("Las Notas han sido registradas correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "registrar_admin", $idmatricula));
            }
            $this->Session->setFlash(__("Las Notas no han sido registradas."), "flash_bootstrap");
        }
        $this->set(compact("matricula", "cursos", "bimestres", "detallenotas"));
    }
}
