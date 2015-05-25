<!-- File: /app/View/Niveles/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Niveles");
    $this->assign("accion", "Crear Nivel");
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idnivel", "ID Nivel <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($niveles as $nivel) {
        echo $this->Html->tableCells(
            array(
                $nivel["Nivel"]["idnivel"],
                $nivel["Nivel"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view"), array("escape" => false, "title" => "Ver", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit"), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-trash'></i>", array("action" => "delete"), array("escape" => false, "title" => "Eliminar", "rel" => "tooltip")) 
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>