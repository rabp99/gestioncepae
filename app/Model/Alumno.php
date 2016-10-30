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
        ),
        "Aseguradora" => array(
            "foreignKey" => "idaseguradora"
        )
    );
    
    public $hasMany = array(
        "Matricula" => array(
            "foreignKey" => "idalumno",
            "conditions" => array("Matricula.estado" => 1)
        ),
        "AlumnosPadre" => array(
            "foreignKey" => "idalumno"
        ),
        'AlumnosCobertura' => array(
            'foreignKey' => 'idalumno'
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
    
    public function beforeSave($options = array()) {
        $next_id = $this->find('count') + 1;
        $this->data['Alumno']['idalumno'] = 'A' . str_pad($next_id, 5, "0", STR_PAD_LEFT);
        return true;
    }
}