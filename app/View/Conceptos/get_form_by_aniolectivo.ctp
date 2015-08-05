<!-- File: /app/View/Conceptos/get_form_by_aniolectivo.ctp -->
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0">Concepto de Pago</th>
            <th id="user-grid_c1">Monto a Pagar</th>
            <th id="user-grid_c2">Fecha Limite</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($conceptos as $key => $concepto) { ?>
        <tr>
            <td><?php echo $concepto["Concepto"]["descripcion"]; ?></td>
            <td>
                <?php
                    echo $this->Form->input("Pago." . $key . ".idconcepto", array(
                        "type" => "hidden",
                        "value" => $concepto["Concepto"]["idconcepto"]
                    ));
                    echo $this->Form->input("Pago." . $key . ".descripcion", array(
                        "type" => "hidden",
                        "value" => $concepto["Concepto"]["descripcion"]
                    ));
                    echo $this->Form->input("Pago." . $key . ".monto", array(
                        "label" => false,
                        "value" => $concepto["Concepto"]["monto"]
                    ));
                ?>
            </td>
            <td>
                <?php 
                    echo $this->Form->input("Pago." . $key . ".fechalimite", array(
                        "label" => false,
                        "type" => "text",
                        "readonly" => true,
                        "value" => $concepto["Concepto"]["fechalimite"]
                    )); 
                ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>