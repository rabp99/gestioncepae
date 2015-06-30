<?php

/**
 * CakePHP AlumnosPadre
 * @author admin
 */
class AlumnosPadre extends AppModel {
    public $primaryKey = "idalumno_padre";
    
    public $belongsTo = array(
        "Alumno" => array(
            "foreignKey" => "idalumno"
        ),
        "Padre" => array(
            "foreignKey" => "idpadre"
        )
    );
    
}