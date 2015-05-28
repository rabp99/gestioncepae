<!-- File: /app/View/Niveles/get_by_idnivel.ctp -->
<?php
    echo $this->Form->input("idgrado", array(
        "label" => "Grado",
        "options" => $grados,
        "empty" => "Selecciona uno"
    ));
?>