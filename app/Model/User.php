<?php

/**
 * CakePHP User
 * @author admin
 */
class User extends AppModel {
    public $primaryKey = "iduser";
    
    public $hasOne = array(
        "Alumno" => array(
            "foreignKey" => "iduser"
        ),
        "Padre" => array(
            "foreignKey" => "iduser"
        ),
        "Docente" => array(
            "foreignKey" => "iduser"
        )
    );
    
    public $belongsTo = array(
        "Group" => array(
            "foreignKey" => "idgroup"
        )
    );
}