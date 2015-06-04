<?php

/**
 * CakePHP Aniolectivo
 * @author Roberto
 */
class Aniolectivo extends AppModel {
    public $primaryKey = "idaniolectivo";
    
    public $hasMany = array(
        "Seccion" => array(
            "foreignKey" => "idaniolectivo"
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
