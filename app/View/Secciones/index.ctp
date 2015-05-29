<!-- File: /app/View/Secciones/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Secciones");
    $this->assign("accion", "Crear Seccion");
    
    $this->Html->addCrumb('Secciones', '/Secciones');
    $this->Html->addCrumb('Adiministrar', '/Secciones/index');
?>
<dl class="dl-horizontal">
    <dt>Año Lectivo</dt>
    <dd><?php echo $aniolectivo["Aniolectivo"]["descripcion"]; ?></dd>
</dl>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idseccion", "ID Sección <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("Grado.descripcion", "Grado <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3"><?php echo $this->Paginator->sort("Grado.idnivel", "Nivel <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c4">Acciones</th>
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
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $seccion["Seccion"]["idseccion"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $seccion["Seccion"]["idseccion"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $seccion["Seccion"]["idseccion"]), array("confirm" => "¿Estás seguro?", "escape" => false))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>