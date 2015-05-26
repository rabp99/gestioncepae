<?php

/**
 * CakePHP Grado
 * @author Roberto
 */
class Grado extends AppModel {
    public $primaryKey = "idgrado";
    
    public $belongsTo = array(
        "Aniolectivo" => array(
            'foreignKey' => 'idaniolectivo'
        ),
        "Nivel" => array(
            "foreignKey" => "idnivel"
        )
    );
    
    public $hasMany = array(
        "Seccion" => array(
            "foreignKey" => "idseccion"
        )
    );
}
