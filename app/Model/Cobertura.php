<?php

/**
 * CakePHP Cobertura
 * @author admin
 */
class Cobertura extends AppModel {
    public $primaryKey = "idcobertura";
    
    public $validate = array(
        "idcobertura" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "descripcion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
}
