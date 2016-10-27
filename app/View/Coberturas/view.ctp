<!-- File: /app/View/Coberturas/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Cobertura");
    $this->assign("accion1", "Crear Cobertura");
    $this->assign("accion2", "Editar Cobertura");
    $this->assign("accion3", "Administar Coberturas");
    $this->assign("accion4", "Deshabilitar Cobertura");
    $this->assign("id", $cobertura["Cobertura"]["idcobertura"]);    
    
    $this->Html->addCrumb('Coberturas', '/Coberturas');
    $this->Html->addCrumb('Detalle', '/Coberturas/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $cobertura["Cobertura"]["idcobertura"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $cobertura["Cobertura"]["descripcion"]; ?></dd>
</dl>