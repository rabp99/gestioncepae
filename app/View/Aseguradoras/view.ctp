<!-- File: /app/View/Aseguradoras/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Aseguradora");
    $this->assign("accion1", "Crear Aseguradora");
    $this->assign("accion2", "Editar Aseguradora");
    $this->assign("accion3", "Administar Aseguradoras");
    $this->assign("accion4", "Deshabilitar Aseguradora");
    $this->assign("id", $aseguradora["Aseguradora"]["idaseguradora"]);    
    
    $this->Html->addCrumb('Aseguradoras', '/Aseguradoras');
    $this->Html->addCrumb('Detalle', '/Aseguradoras/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $aseguradora["Aseguradora"]["idaseguradora"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $aseguradora["Aseguradora"]["descripcion"]; ?></dd>
</dl>