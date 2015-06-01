<?php

/**
 * CakePHP Curso
 * @author admin
 */
class Curso extends AppModel {
    public $primaryKey = "idcurso";
    
    public $belongsTo = array(
        "Grado" => array(
            'foreignKey' => 'idgrado'
        )
    );
        
    public $validate = array(
        "descripcion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "idgrado" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "idcurso" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
}
