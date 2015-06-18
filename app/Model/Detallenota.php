<?php

/**
 * CakePHP Detallenota
 * @author admin
 */
class Detallenota extends AppModel {
    public $primaryKey = "iddetallenota";
    
    public $belongsTo = array(
        "Nota" => array(
            'foreignKey' => 'idnota'
        )    
    );
    
    public $validate = array(
        "valor" => array(
            "mayor" => array(
                "rule" => array("comparison", ">", 0),
                "message" => "Debe ser un valor mayor a 0"
            ),       
            "menor" => array(
                "rule" => array("comparison", "<", 20),
                "message" => "Debe ser un valor menor a 20"
            ),
        )
    );
}
