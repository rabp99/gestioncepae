<?php

/**
 * CakePHP Area
 * @author admin
 */
class Area extends AppModel {
    public $primaryKey = "idarea";
    
    public $hasMany = array(
        "Curso" => array(
            "foreignKey" => "idarea"
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
