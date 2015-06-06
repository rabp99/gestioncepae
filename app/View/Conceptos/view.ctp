<!-- File: /app/View/Conceptos/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Concepto de Pago");
    $this->assign("accion1", "Crear Concepto de Pago");
    $this->assign("accion2", "Editar Concepto de Pago");
    $this->assign("accion3", "Administar Conceptos de Pago");
    $this->assign("accion4", "Deshabilitar Concepto de Pago");
    $this->assign("id", $concepto["Concepto"]["idconcepto"]);    
    
    $this->Html->addCrumb('Conceptos de Pago', '/Conceptos');
    $this->Html->addCrumb('Detalle', '/Conceptos/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $concepto["Concepto"]["idconcepto"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $concepto["Concepto"]["descripcion"]; ?></dd>
    <dt>Valor</dt>
    <dd><?php echo $concepto["Concepto"]["monto"]; ?></dd>
    <dt>Año Lectivo</dt>
    <dd><?php echo $concepto["Aniolectivo"]["descripcion"]; ?></dd>
</dl>