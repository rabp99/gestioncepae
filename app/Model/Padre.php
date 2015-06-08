<?php

/**
 * CakePHP Padre
 * @author admin
 */
class Padre extends AppModel {
    public $primaryKey = "idpadre";
    
    public $virtualFields = array(
        "nombreCompleto" => "CONCAT(Padre.apellidoPaterno, ' ', Padre.apellidoMaterno, ', ', Padre.nombres )"
    );
    
    public $belongsTo = array(
        "User" => array(
            'foreignKey' => 'iduser'
        )
    );
        
    public $hasAndBelongsToMany = array(
        "Alumno" => array(
            "foreignKey" => "idpadre",
            "associationForeignKey" => "idalumno",
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
        "dni" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            ),
            "numeric" => array(
                "rule" => "numeric",
                "message" => "Sólo permitido números"
            )
        ),
        "fechaNac" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
}
