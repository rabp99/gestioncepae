<!-- File: /app/View/Secciones/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Apertura de Grados");
    $this->assign("accion", "Crear Seccion");
    
    $this->Html->addCrumb('Secciones', '/Secciones');
    $this->Html->addCrumb('Adiministrar', '/Secciones/index');
?>
<?php 
    $this->start("antes");
    echo $this->Form->create("Aniolectivo", array("class" => "form-horizontal"));
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->end();
    $this->end();
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idseccion", "ID Sección <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("Grado.descripcion", "Grado <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3"><?php echo $this->Paginator->sort("Grado.idnivel", "Nivel <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c4"><?php echo $this->Paginator->sort("Turno.descripcion", "Turno <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c5"><?php echo $this->Paginator->sort("Aniolectivo.descripcion", "Año Lectivo <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c6">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($secciones as $seccion) {
        echo $this->Html->tableCells(
            array(
                $seccion["Seccion"]["idseccion"],
                $seccion["Seccion"]["descripcion"],
                $seccion["Grado"]["descripcion"],
                $seccion["Grado"]["Nivel"]["descripcion"],
                $seccion["Turno"]["descripcion"],
                $seccion["Aniolectivo"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $seccion["Seccion"]["idseccion"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $seccion["Seccion"]["idseccion"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $seccion["Seccion"]["idseccion"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
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
