<!-- File: /app/View/Secciones/get_by_idgrado.ctp -->
<?php
    echo $this->Form->input("idseccion", array(
        "label" => "Sección",
        "options" => $secciones,
        "empty" => "Selecciona uno"
    ));
?>