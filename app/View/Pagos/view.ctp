<!-- File: /app/View/Pagos/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Pagos");  
    $this->assign("accion3", "Administrar Pagos");  
    
    $this->Html->addCrumb('Pagos', '/Pagos');
    $this->Html->addCrumb('Detalle de Pagos', '/Pagos/view');
?>
<h3>Historial</h3>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Concepto</th>
                <th>Fecha</th>
                <th>Monto Pagado</th>
                <th>Total a Pagar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (sizeof($detallepagos) == 0) { ?>
            <tr><td colspan="4"><p style="text-align: center">No hay ningún pago registrado</p></td></tr>
            <?php } else {
                foreach ($detallepagos as $detallepago) { ?>
            <tr>
                <td><?php echo $detallepago["Pago"]["descripcion"]; ?></td>
                <td><?php echo $detallepago["Detallepago"]["created"]; ?></td>
                <td><?php echo $detallepago["Detallepago"]["monto"]; ?></td>
                <td><?php echo $detallepago["Pago"]["monto"]; ?></td>
            </tr>
            <?php
                } 
            }
            ?>
        </tbody>
    </table>    
</div>
<h3>Por Concepto</h3>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Concepto</th>
                <th>Monto Pagadao</th>
                <th>Deuda Pendiente</th>
                <th>Fecha Limite</th>
            </tr>
        </thead>
        <tbody>
            <?php if (sizeof($pagos) == 0) { ?>
            <tr><td colspan="4"><p style="text-align: center">No hay ningún pago registrado</p></td></tr>
            <?php } else {
                foreach ($pagos as $pago) { ?>
            <tr>
                <td><?php echo $pago["Pago"]["descripcion"]; ?></td>
                <td><?php echo $pago["Pago"]["monto"]; ?></td>
                <td><?php echo $pago["Pago"]["deuda"]; ?></td>
                <td><?php echo $pago["Pago"]["fechalimite"]; ?></td>
            </tr>
            <?php
                } 
            }
            ?>
        </tbody>
    </table>    
</div>