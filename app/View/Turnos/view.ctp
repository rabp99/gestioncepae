<!-- File: /app/View/Turnos/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Turno");
    $this->assign("accion1", "Crear Turno");
    $this->assign("accion2", "Editar Turno");
    $this->assign("accion3", "Administar Turnos");
    $this->assign("accion4", "Deshabilitar Turno");
    $this->assign("id", $turno["Turno"]["idturno"]);    
    
    $this->Html->addCrumb('Turnos', '/Turnos');
    $this->Html->addCrumb('Detalle', '/Turnos/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $turno["Turno"]["idturno"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $turno["Turno"]["descripcion"]; ?></dd>
</dl>