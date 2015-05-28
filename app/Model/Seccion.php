<?php

/**
 * CakePHP Seccion
 * @author admin
 */
class Seccion extends AppModel {
    public $useTable = "secciones";
    public $primaryKey = "idseccion";
    
    public $belongsTo = array(
        "Grado" => array(
            'foreignKey' => 'idgrado'
        )
    );
    
    public $validate = array(
        "descripcion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
}
