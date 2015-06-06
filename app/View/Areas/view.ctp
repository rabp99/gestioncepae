<!-- File: /app/View/Areas/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Área");
    $this->assign("accion1", "Crear Área");
    $this->assign("accion2", "Editar Área");
    $this->assign("accion3", "Administar Áreas");
    $this->assign("accion4", "Deshabilitar Área");
    $this->assign("id", $area["Area"]["idarea"]);    
    
    $this->Html->addCrumb('Areas', '/Areas');
    $this->Html->addCrumb('Detalle', '/Areas/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $area["Area"]["idarea"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $area["Area"]["descripcion"]; ?></dd>
    <dt>Importancia</dt>
    <dd><?php echo $area["Area"]["importancia"]; ?></dd>
</dl>