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
        
    public $hasMany = array(
        "Detallepago" => array(
            "foreignKey" => "idpago"
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
        ),
        "monto" => array(
            "numeric" => array(
                "rule" => "numeric",
                "message" => "Ingrese un número"
            )
        )
    );
}
