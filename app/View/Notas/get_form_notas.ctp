<!-- File: /app/View/Notas/get_form_notas.ctp -->
<h4>Notas Registradas</h4>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0">Descripción</th>
            <th id="user-grid_c1">Peso</th>
            <th id="user-grid_c2">Observaciones</th>
        </tr>
    </thead>    
    <tbody>
    <?php
    foreach ($notas as $nota) {
        echo $this->Html->tableCells(
            array(
                $nota["Nota"]["descripcion"],
                $nota["Nota"]["peso"],
                $nota["Nota"]["observaciones"],
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>
<?php
    echo $this->Form->input("Nota.descripcion", array(
        "label" => "Descripción",
         "class" => "span4"
    ));
    echo $this->Form->input("Nota.peso", array(
        "label" => "Peso",
        "class" => "span4",
        "options" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4")
    ));
    echo $this->Form->label("Nota.observaciones", "Observaciones");
    echo $this->Form->textarea("Nota.observaciones", array(
        "rows" => 10,
         "cols" => 30,
         "class" => "span4"
    ));
    echo "<br/>";
    echo $this->Form->button("Registrar Nota", array("class" => "btn btn-primary btn-large"));
?>