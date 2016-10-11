<?php

/**
 * CakePHP Capacidad
 * @author admin
 */
class Capacidad extends AppModel {
    public $useTable = "capacidades";
    public $primaryKey = "idcapacidad";
    
    public $belongsTo = array(
        "Curso" => array(
            "foreignKey" => "idcurso"
        )
    );
}
