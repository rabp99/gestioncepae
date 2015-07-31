<!-- File: /app/View/Bimestres/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Bimestres");
    $this->assign("accion", "Crear Bimestre");
    
    $this->Html->addCrumb('Bimestres', '/Bimestres');
    $this->Html->addCrumb('Adiministrar', '/Bimestres/index');
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idbimestre", "Código <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($bimestres as $bimestre) {
        echo $this->Html->tableCells(
            array(
                $bimestre["Bimestre"]["idbimestre"],
                $bimestre["Bimestre"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $bimestre["Bimestre"]["idbimestre"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $bimestre["Bimestre"]["idbimestre"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $bimestre["Bimestre"]["idbimestre"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>