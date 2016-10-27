<!-- File: /app/View/Coberturas/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Coberturas");
    $this->assign("accion", "Crear Cobertura");
    
    $this->Html->addCrumb('Coberturas', '/Coberturas');
    $this->Html->addCrumb('Adiministrar', '/Coberturas/index');
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idcobertura", "Código <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($coberturas as $cobertura) {
        echo $this->Html->tableCells(
            array(
                $cobertura["Cobertura"]["idcobertura"],
                $cobertura["Cobertura"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $cobertura["Cobertura"]["idcobertura"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $cobertura["Cobertura"]["idcobertura"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $cobertura["Cobertura"]["idcobertura"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>