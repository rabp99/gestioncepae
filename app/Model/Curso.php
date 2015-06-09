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
        ),
        "Area" => array(
            'foreignKey' => 'idarea'
        )
    );
    
    public $hasMany = array(
        "Asignacion" => array(
            "foreignKey" => "idcurso"
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
        "idarea" => array(
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
