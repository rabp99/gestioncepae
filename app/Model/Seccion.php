<?php

/**
 * CakePHP Seccion
 * @author admin
 */
class Seccion extends AppModel {
    public $useTable = "secciones";
    public $primaryKey = "idseccion";
    
    public $belongsTo = array(
        "Grado" => array(
            'foreignKey' => 'idgrado'
        ),
        "Aniolectivo" => array(
            'foreignKey' => 'idaniolectivo'
        ),
        "Turno" => array(
            'foreignKey' => 'idturno'
        )
    );    
    
    public $hasMany = array(
        "Matricula" => array(
            "foreignKey" => "idseccion"
        ),
        "Asignacion" => array(
            "foreignKey" => "idseccion"
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
        "idaniolectivo" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "idturno" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "idseccion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
    
    public function nextSeccion($idaniolectivo, $idgrado) {
        $cantidad = $this->query("SELECT count(*) 'cantidad' FROM secciones WHERE idaniolectivo = '" . $idaniolectivo . "' AND idgrado = '" . $idgrado . "'");
        $cantidad = $cantidad[0][0]["cantidad"];
        $ascii_A = 65;
        return chr($ascii_A + $cantidad);
    }
}
