<?php

/**
 * CakePHP Docente
 * @author admin
 */
class Docente extends AppModel {
    public $primaryKey = "iddocente";
    
    public $virtualFields = array(
        "nombreCompleto" => "CONCAT(Docente.apellidoPaterno, ' ', Docente.apellidoMaterno, ', ', Docente.nombres )"
    );
       
    public $belongsTo = array(
        "User" => array(
            "foreignKey" => "iduser"
        )
    );
    
    public $hasMany = array(
        "Asignacion" => array(
            "foreignKey" => "iddocente",
            "conditions" => array("Asignacion.estado" => 1)
        )
    );
    
    public $validate = array(
        "nombres" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "apellidoPaterno" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "apellidoMaterno" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "dni" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            ),
            "numeric" => array(
                "rule" => "numeric",
                "message" => "Sólo permitido números"
            ),
            "minLength" => array(
                "rule" => array("minLength", 8),
                "message" => "El DNI debe tener 8 dígitos"
            ),
            "isUnique" => array(
                "rule" => "isUnique",
                "message" => "Ya existe un Docente con este DNI"
            )
        )
    );
    
    public function beforeSave($options = array()) {
        $next_id = $this->find('count') + 1;
        $this->data['Docente']['iddocente'] = 'D' . str_pad($next_id, 4, "0", STR_PAD_LEFT);
        return true;
    }
}