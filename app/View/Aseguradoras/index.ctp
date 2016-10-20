<!-- File: /app/View/Aseguradoras/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Aseguradoras");
    $this->assign("accion", "Crear Aseguradora");
    
    $this->Html->addCrumb('Aseguradoras', '/Aseguradoras');
    $this->Html->addCrumb('Adiministrar', '/Aseguradoras/index');
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idaseguradora", "Código <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($aseguradoras as $aseguradora) {
        echo $this->Html->tableCells(
            array(
                $aseguradora["Aseguradora"]["idaseguradora"],
                $aseguradora["Aseguradora"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $aseguradora["Aseguradora"]["idaseguradora"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $aseguradora["Aseguradora"]["idaseguradora"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $aseguradora["Aseguradora"]["idaseguradora"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>