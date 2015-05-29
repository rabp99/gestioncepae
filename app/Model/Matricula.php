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
}
