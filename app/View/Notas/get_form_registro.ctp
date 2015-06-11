<!-- File: /app/View/Notas/get_form_registro.ctp -->
<h4>Registro de Notas</h4>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0" rowspan="2">Alumno</th>
            <th id="user-grid_c1">Notas</th>
        </tr>
        <tr>
            <?php foreach($notas as $nota) { ?>
            <th><?php echo $nota["Nota"]["descripcion"]; ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php 
        $n_notas = sizeof($notas);
        foreach ($matriculas as $k_matricula => $matricula) {
            $tr = array($matricula["Alumno"]["nombreCompleto"]);
            foreach($notas as $k_nota => $nota) {
                $n = $k_matricula * $n_notas + $k_nota;
                $detallenota = $this->Form->input("Detallenota." . $n . ".valor", array("div" => false, "label" => false));
                $detallenota .= $this->Form->input("Detallenota." . $n . ".idnota", array("type" => "hidden", "value" => $nota["Nota"]["idnota"]));
                $detallenota .= $this->Form->input("Detallenota." . $n . ".idmatricula", array("type" => "hidden", "value" => $matricula["idmatricula"]));
                array_push($tr, $detallenota);
            }
            echo $this->Html->tableCells(
                $tr,
                array(
                    "class" => "odd"
                ), array(
                    "class" => "even"
                )
            );
        } ?>
    </tbody>
</table>
<?php
    echo $this->Form->button("Registrar Notas", array("class" => "btn btn-primary btn-large"));
?>