<?php

/**
 * CakePHP Detallepago
 * @author admin
 */
class Detallepago extends AppModel {
    public $primaryKey = "iddetallepago";
    
    public $belongsTo = array(
        "Pago" => array(
            "foreignKey" => "idpago"
        ),
        "User" => array(
            "foreignKey" => "iduser"
        )
    );
    
    public $validate = array(
        "monto" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
}
