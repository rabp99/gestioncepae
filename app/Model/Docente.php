<?php

/**
 * CakePHP Docente
 * @author admin
 */
class Docente extends AppModel {
    public $primaryKey = "iddocente";
    
    public $virtualFields = array(
        "nombreCompleto" => "CONCAT(Docente.apellidoPaterno, ' ', Docente.apellidoMaterno, ', ', Docente.nombres )"
    );
       
    public $belongsTo = array(
        "User" => array(
            "foreignKey" => "iduser"
        )
    );
    
    public $hasMany = array(
        "Asignacion" => array(
            "foreignKey" => "iddocente",
            "conditions" => array("Asignacion.estado" => 1)
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
        )
    );
}