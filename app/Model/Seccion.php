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
    
    public $hasMany = array(
        "Matricula" => array(
            "foreignKey" => "idseccion"
        )
    );
    
    public $validate = array(
        "descripcion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "idgrado" => array(
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
        )
    );
}
