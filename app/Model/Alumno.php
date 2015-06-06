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
        ),
        "Matricula" => array(
            "foreignKey" => "idAlumno",
            "conditions" => array("Matricula.estado" => 1)
        )
    );
        
    public $validate = array(
        "nombres" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "apellidoPaterno" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "apellidoMaterno" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "sexo" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "fechaNac" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
    );
}