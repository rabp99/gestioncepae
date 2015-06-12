<?php

/**
 * CakePHP Grado
 * @author Roberto
 */
class Grado extends AppModel {
    public $primaryKey = "idgrado";
    
    public $belongsTo = array(
        "Nivel" => array(
            "foreignKey" => "idnivel"
        )
    );
    
    public $hasMany = array(
        "Seccion" => array(
            "foreignKey" => "idseccion"
        ),
        "Curso" => array(
            "foreignKey" => "idgrado",
            "conditions" => array("Curso.estado" => 1),
            "order" => "Curso.idarea ASC",
        )
    );
    
    public $validate = array(
        "descripcion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "capacidad" => array(
            "mayor" => array(
                "rule" => array("comparison", ">", 0),
                "message" => "Debe ser un número positivo"
            ),       
            "menor" => array(
                "rule" => array("comparison", "<", 40),
                "message" => "Debe ser un menor a 40"
            ),
        ),    
        "idgrado" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "idnivel" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
}
