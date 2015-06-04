<!-- File: /app/View/Grados/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Grado");
    $this->assign("accion1", "Crear Grado");
    $this->assign("accion2", "Editar Grado");
    $this->assign("accion3", "Administar Grados");
    $this->assign("accion4", "Deshabilitar Grado");
    $this->assign("id", $grado["Grado"]["idgrado"]);    
    
    $this->Html->addCrumb('Grados', '/Grados');
    $this->Html->addCrumb('Detalle', '/Grados/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $grado["Grado"]["idgrado"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $grado["Grado"]["descripcion"]; ?></dd>
    <dt>Capacidad</dt>
    <dd><?php echo $grado["Grado"]["capacidad"]; ?></dd>
    <dt>Nivel</dt>
    <dd><?php echo $grado["Nivel"]["descripcion"]; ?></dd>
</dl>