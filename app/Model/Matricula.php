<?php

/**
 * CakePHP Matricula
 * @author admin
 */
class Matricula extends AppModel {
    public $primaryKey = "idmatricula";
    
    public $belongsTo = array(
        "Seccion" => array(
            'foreignKey' => 'idseccion'
        ),
        "Alumno" => array(
            "foreignKey" => "idalumno"
        )
    );
     
    public $validate = array(
        "idmatricula" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "idseccion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "idalumno" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
}
