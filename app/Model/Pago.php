<?php

/**
 * CakePHP Pago
 * @author admin
 */
class Pago extends AppModel {
    public $primaryKey = "idpago";
    
    public $belongsTo = array(
        "Concepto" => array(
            'foreignKey' => 'idconcepto'
        )
    );
    
    public $validate = array(
        "idmatricula" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "idconcepto" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
}
