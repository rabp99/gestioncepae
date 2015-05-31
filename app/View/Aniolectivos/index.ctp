<!-- File: /app/View/Aniolectivos/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Años Lectivos");
    $this->assign("accion", "Crear Año Lectivo");
    
    $this->Html->addCrumb('Años Lectivos', '/Aniolectivos');
    $this->Html->addCrumb('Adiministrar', '/Aniolectivos/index');
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idaniolectivo", "ID Año Lectivo <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("fechainicio", "Fecha de Inicio <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3"><?php echo $this->Paginator->sort("fechafin", "Fecha Final <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c4">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($aniolectivos as $aniolectivo) {
        echo $this->Html->tableCells(
            array(
                $aniolectivo["Aniolectivo"]["idaniolectivo"],
                $aniolectivo["Aniolectivo"]["descripcion"],
                $aniolectivo["Aniolectivo"]["fechainicio"],
                $aniolectivo["Aniolectivo"]["fechafin"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $aniolectivo["Aniolectivo"]["idaniolectivo"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $aniolectivo["Aniolectivo"]["idaniolectivo"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $aniolectivo["Aniolectivo"]["idaniolectivo"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Eliminar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>