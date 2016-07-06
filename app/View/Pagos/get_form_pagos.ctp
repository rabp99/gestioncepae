<!-- File: /app/View/Pagos/get_form_pagos.ctp -->
<dl class="dl-horizontal">
    <dt>Monto</dt>
    <dd><?php echo $pago["Pago"]["monto"]; ?></dd>
    <dt>Deuda</dt>
    <dd><?php echo $pago["Pago"]["deuda"]; ?></dd>
</dl>
<h4>Historial de Pagos</h4>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0">Monto</th>
            <th id="user-grid_c1">Fecha</th>
            <th id="user-grid_c1">Acción</th>
        </tr>
    </thead>    
    <tbody>
    <?php
    foreach ($pago["Detallepago"] as $detallepago) {
        echo $this->Html->tableCells(
            array(
                $detallepago["estado"] == 2 ? "-" . $detallepago["monto"] : $detallepago["monto"],
                $detallepago["created"], 
                $detallepago["estado"] == 1 ? $this->Html->link("<i class='icon-remove'></i>", array("action" => "cancelar", $detallepago["iddetallepago"]), array("escape" => false, "title" => "Cancelar", "rel" => "tooltip")) : ""
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
    echo $this->Form->input("Detallepago.monto", array(
        "label" => "Monto a pagar",
        "value" => $pago["Pago"]["deuda"],
        "min" => 0,
        "max" => $pago["Pago"]["deuda"]
    ));
    echo $this->Form->button("Registrar Pago", array("class" => "btn btn-primary btn-large"));
?>