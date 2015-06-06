<?php

/**
 * CakePHP Group
 * @author admin
 */
class Group extends AppModel {
    public $primaryKey = "idgroup";
    
    public $hasMany = array(
        "User" => array(
            "foreignKey" => "idgroup"
        )
    );
}