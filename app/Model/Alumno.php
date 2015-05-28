<?php

/**
 * CakePHP Alumno
 * @author admin
 */
class Alumno extends AppModel {
    public $primaryKey = "idalumno";
    
    public $virtualFields = array(
        "nombreCompleto" => "CONCAT(Alumno.apellidoPaterno, ' ', Alumno.apellidoMaterno, ', ', Alumno.nombres )"
    );
    
    public $hasMany = array(
        "Padre" => array(
            "foreignKey" => "idalumno"
        )
    );
}
