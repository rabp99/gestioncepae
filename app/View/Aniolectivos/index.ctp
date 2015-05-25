<!-- File: /app/View/Aniolectivos/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Años Lectivos");
    $this->assign("accion", "Crear Año Lectivo");
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idaniolectivo", "ID Año Lectivo <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("fechainicio", "Fecha de Inicio <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3"><?php echo $this->Paginator->sort("fechafin", "Fecha final <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c4"><?php echo $this->Paginator->sort("estado", "Estado <span class='caret'></span>", array("escape" => false)); ?></th>
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
                $aniolectivo["Aniolectivo"]["estado"],
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>