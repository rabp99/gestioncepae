<?php

/**
 * CakePHP Bimestre
 * @author admin
 */
class Bimestre extends AppModel {
    public $primaryKey = "idbimestre";
    
    public $validate = array(
        "idbimestre" => array(
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
