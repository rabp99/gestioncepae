<?php

/**
 * CakePHP Asignacion
 * @author admin
 */
class Asignacion extends AppModel {
    public $useTable = "asignaciones";
    public $primaryKey = "idasignacion";
    
    public $belongsTo = array(
        "Seccion" => array(
            "foreignKey" => "idseccion"
        ),
        "Docente" => array(
            "foreignKey" => "iddocente"
        )
    );
}
