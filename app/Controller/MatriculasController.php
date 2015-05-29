<?php

/**
 * CakePHP MatriculasController
 * @author admin
 */
class MatriculasController extends AppController {   
    public $uses = array("Matricula");
    
    public $components = array("Paginator");

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Matricula.fecha" => "asc"
        ),
        "conditions" => array(
            "Matricula.estado" => 1
        )
    );

    public function index($idgrado = null, $idseccion = null) {
        $this->layout = "main";
        
        $this->set("niveles", $this->Matricula->Seccion->Grado->Nivel->find("list", array(
            "fields" => array("Nivel.idnivel", "Nivel.descripcion"),
            "conditions" => array("Nivel.estado" => 1)
        )));
        
        if($idgrado != null) {
            $this->paginate["conditions"]["Seccion.idgrado"] = $idgrado;
        }
        if($idseccion != null) {
            $this->paginate["conditions"]["Matricula.idseccion"] = $idseccion;
        }
        $this->Paginator->settings = $this->paginate;
        $matriculas = $this->Paginator->paginate();
        $this->set(compact("matriculas"));
    }
}