<?php

/**
 * CakePHP Aseguradora
 * @author admin
 */
class Aseguradora extends AppModel {
    public $primaryKey = "idaseguradora";
    
    public $validate = array(
        "idaseguradora" => array(
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
