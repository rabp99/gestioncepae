<!-- File: /app/View/Conceptos/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Conceptos de Pagos");
    $this->assign("accion", "Crear Concepto de Pago");
    
    $this->Html->addCrumb('Conceptos de Pago', '/Conceptos');
    $this->Html->addCrumb('Adiministrar', '/Conceptos/index');
?>
<?php 
    $this->start("antes");
    echo $this->Form->create("Aniolectivo", array("class" => "form-horizontal"));
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->end();
    $this->end();
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idconcepto", "ID Concepto de Pago <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("monto", "Monto <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3"><?php echo $this->Paginator->sort("Aniolectivo.descripcion", "Año Lectivo <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c4">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($conceptos as $concepto) {
        echo $this->Html->tableCells(
            array(
                $concepto["Concepto"]["idconcepto"],
                $concepto["Concepto"]["descripcion"],
                $concepto["Concepto"]["monto"],
                $concepto["Aniolectivo"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $concepto["Concepto"]["idconcepto"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $concepto["Concepto"]["idconcepto"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $concepto["Concepto"]["idconcepto"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>

<?php
    $this->Js->get('#AniolectivoIdaniolectivo')->event('change', 
        "$('#AniolectivoIndexForm').submit();"
    );
?>
