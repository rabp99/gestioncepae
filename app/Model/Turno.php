<?php

/**
 * CakePHP Turno
 * @author admin
 */
class Turno extends AppModel {
    public $primaryKey = "idturno";
    
    public $validate = array(
        "idturno" => array(
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
