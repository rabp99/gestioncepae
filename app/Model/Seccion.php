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
        )
    );    
    
    public $hasMany = array(
        "Matricula" => array(
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
        "idseccion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
    
    public function nextSeccion($idaniolectivo, $idgrado) {
        $cantidad = $this->query("SELECT count(*) 'cantidad' FROM Alumnos");
        $cantidad = $cantidad[0][0]["cantidad"];
        return parent::getCodigo(6, $cantidad + 1, "A");
    }
}
