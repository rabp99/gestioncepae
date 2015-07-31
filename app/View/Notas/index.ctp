<!-- File: /app/View/Notas/index.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Administrar Notas");  
    
    $this->Html->addCrumb('Notas', '/Notas');
    $this->Html->addCrumb('Administrar', '/Notas/index');
?>
<?php
    echo $this->Form->create("Aniolectivo", array("class" => "form-horizontal"));
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno",
        "value" => $idaniolectivo
    ));
    echo $this->Form->end();
?>
<table id="tbl-asignaciones" class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0">Curso</th>
            <th id="user-grid_c1">Área</th>
            <th id="user-grid_c2">Nivel</th>
            <th id="user-grid_c3">Grado</th>
            <th id="user-grid_c4">Sección</th>
            <th id="user-grid_c5">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($asignaciones as $asignacion) {
        echo $this->Html->tableCells(
            array(
                $asignacion["Curso"]["descripcion"],
                $asignacion["Curso"]["Area"]["descripcion"],
                $asignacion["Seccion"]["Grado"]["Nivel"]["descripcion"],
                $asignacion["Seccion"]["Grado"]["descripcion"],
                $asignacion["Seccion"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "administrar", $asignacion["Asignacion"]["idasignacion"]), array("escape" => false, "title" => "Administrar", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "registrar", $asignacion["Asignacion"]["idasignacion"]), array("escape" => false, "title" => "Registrar", "rel" => "tooltip"))
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
    $this->Js->get('#AniolectivoIdaniolectivo')->event('change', 
        "$('#AniolectivoIndexForm').submit();"
    );
?>
