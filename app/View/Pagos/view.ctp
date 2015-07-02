<!-- File: /app/View/Pagos/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Pagos");  
    $this->assign("accion3", "Administrar Pagos");  
    
    $this->Html->addCrumb('Pagos', '/Pagos');
    $this->Html->addCrumb('Detalle de Pagos', '/Pagos/view');
?>
<?php foreach($matricula["Pago"] as $pago) { ?>
<h3><?php echo $pago["descripcion"]; ?></h3>
<dl class="dl-horizontal">
    <?php foreach($pago["Detallepago"] as $detallepago) { ?>
    <dt><?php echo $detallepago["created"]; ?></dt>
    <dd><?php echo $detallepago["monto"]; ?></dd>
    <?php } ?>
</dl>
<?php } ?>
<?php echo $this->Html->link("Regresar", array("action" => "index")); ?>