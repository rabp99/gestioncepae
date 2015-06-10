<?php

/**
 * CakePHP Group
 * @author admin
 */

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Group extends AppModel {
    public $primaryKey = "idgroup";
    
    public $actsAs = array('Acl' => array('type' => 'requester'));
        
    public $hasMany = array(
        "User" => array(
            "foreignKey" => "idgroup"
        )
    );
    
    public function parentNode() {
        return null;
    }
}