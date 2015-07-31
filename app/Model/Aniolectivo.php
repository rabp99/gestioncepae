<?php

/**
 * CakePHP Aniolectivo
 * @author Roberto
 */
App::uses('CakeTime', 'Utility');
class Aniolectivo extends AppModel {
    public $primaryKey = "idaniolectivo";
    
    public $hasMany = array(
        "Seccion" => array(
            "foreignKey" => "idaniolectivo"
        ),
        "Concepto" => array(
            "foreignKey" => "idaniolectivo"
        )
    );
    
    public $validate = array(
        "descripcion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );   
    
    public function getAniolectivoActual() {
        $aniolectivos = $this->query("SELECT * FROM aniolectivos WHERE estado = 1");
        foreach($aniolectivos as $aniolectivo) {
            $fechainicio = CakeTime::toUnix($aniolectivo["aniolectivos"]["fechainicio"] . " -1 months");
            $fechafin = CakeTime::toUnix($aniolectivo["aniolectivos"]["fechafin"]);
            $hoy = CakeTime::toUnix(date("Y-m-d") . " -1 months");
            if($hoy >= $fechainicio && $hoy <= $fechafin) {
                return $aniolectivo["aniolectivos"]["idaniolectivo"];
            }
        }
        return 0;
    }
}
