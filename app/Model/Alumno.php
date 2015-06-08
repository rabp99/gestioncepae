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
    
    public $belongsTo = array(
        "User" => array(
            "foreignKey" => "iduser"
        )
    );
    
    public $hasMany = array(
        "Matricula" => array(
            "foreignKey" => "idAlumno",
            "conditions" => array("Matricula.estado" => 1)
        )
    );
    
    public $hasAndBelongsToMany = array(
        "Padre" => array(
            "foreignKey" => "idalumno",
            "associationForeignKey" => "idpadre",
            "joinTable" => "alumnos_padres"
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