<?php

/**
 * CakePHP Aniolectivo
 * @author Roberto
 */
class Aniolectivo extends AppModel {
    public $primaryKey = "idaniolectivo";
    
    public $hasMany = array(
        "Grado" => array(
            "foreignKey" => "idaniolectivo"
        )
    );
}
