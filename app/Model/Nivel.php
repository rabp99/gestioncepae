<?php

/**
 * CakePHP Nivel
 * @author admin
 */
class Nivel extends AppModel {
    public $useTable = "niveles";
    public $primaryKey = "idnivel";
    
    public $validate = array(
        "idnivel" => array(
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
