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
}
