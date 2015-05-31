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
        "Alumno" => array(
            'foreignKey' => 'idalumno'
        )
    );
}
