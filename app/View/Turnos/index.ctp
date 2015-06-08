<!-- File: /app/View/Turnos/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Turnos");
    $this->assign("accion", "Crear Turno");
    
    $this->Html->addCrumb('Turnos', '/Turnos');
    $this->Html->addCrumb('Adiministrar', '/Turnos/index');
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idturno", "ID Turno <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($turnos as $turno) {
        echo $this->Html->tableCells(
            array(
                $turno["Turno"]["idturno"],
                $turno["Turno"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $turno["Turno"]["idturno"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $turno["Turno"]["idturno"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $turno["Turno"]["idturno"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>