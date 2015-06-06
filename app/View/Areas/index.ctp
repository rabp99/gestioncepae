<!-- File: /app/View/Areas/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Áreas");
    $this->assign("accion", "Crear Area");
    
    $this->Html->addCrumb('Áreas', '/Areas');
    $this->Html->addCrumb('Adiministrar', '/Areas/index');
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idarea", "ID Área <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("importancia", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($areas as $area) {
        echo $this->Html->tableCells(
            array(
                $area["Area"]["idarea"],
                $area["Area"]["descripcion"],
                $area["Area"]["importancia"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $area["Area"]["idarea"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $area["Area"]["idarea"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $area["Area"]["idarea"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>