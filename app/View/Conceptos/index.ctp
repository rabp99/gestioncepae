<!-- File: /app/View/Grados/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Grados");
    $this->assign("accion", isset($aniolectivo["Aniolectivo"]["descripcion"]) ? "Crear Grado" : "");
    
    $this->Html->addCrumb('Grados', '/Grados');
    $this->Html->addCrumb('Adiministrar', '/Grados/index');
?>
<dl class="dl-horizontal">
    <dt>Año Lectivo</dt>
    <dd><?php echo isset($aniolectivo["Aniolectivo"]["descripcion"]) ? $aniolectivo["Aniolectivo"]["descripcion"] : "Ningún Año Lectivo habilitado"; ?></dd>
</dl>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idgrado", "ID Grado <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3"><?php echo $this->Paginator->sort("Nivel.descripcion", "Nivel <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("capacidad", "Capacidad <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c4">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($grados as $grado) {
        echo $this->Html->tableCells(
            array(
                $grado["Grado"]["idgrado"],
                $grado["Grado"]["descripcion"],
                $grado["Nivel"]["descripcion"],
                $grado["Grado"]["capacidad"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $grado["Grado"]["idgrado"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $grado["Grado"]["idgrado"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $grado["Grado"]["idgrado"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>