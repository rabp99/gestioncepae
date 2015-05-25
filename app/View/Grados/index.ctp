<!-- File: /app/View/Grados/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Grados");
    $this->assign("accion", "Crear Grado");
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idgrado", "ID Grado <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("capacidad", "Capacidad <span class='caret'></span>", array("escape" => false)); ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($grados as $grado) {
        echo $this->Html->tableCells(
            array(
                $grado["Grado"]["idgrado"],
                $grado["Grado"]["descripcion"],
                $grado["Grado"]["capacidad"]
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>