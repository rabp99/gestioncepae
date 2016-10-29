<?php

/**
 * CakePHP AlumnosCobertura
 * @author admin
 */
class AlumnosCobertura extends AppModel {
    public $primaryKey = "id";
    
    public $belongsTo = array(
        "Alumno" => array(
            "foreignKey" => "idalumno"
        ),
        "Cobertura" => array(
            "foreignKey" => "idcobertura"
        )
    );
}