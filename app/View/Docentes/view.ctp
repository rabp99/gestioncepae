<!-- File: /app/View/Docentes/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Docente");
    $this->assign("accion1", "Crear Docente");
    $this->assign("accion2", "Editar Docente");
    $this->assign("accion3", "Administar Docentes");
    $this->assign("accion4", "Deshabilitar Docente");
    $this->assign("id", $docente["Docente"]["iddocente"]);    
    
    $this->Html->addCrumb('Dcoente', '/Docentes');
    $this->Html->addCrumb('Detalle', '/Docentes/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $docente["Docente"]["iddocente"]; ?></dd>
    <dt>Nombre Completo</dt>
    <dd><?php echo $docente["Docente"]["nombreCompleto"]; ?></dd>
    <dt>DNI</dt>
    <dd><?php echo $docente["Docente"]["dni"]; ?></dd>
    <dt>Dirección</dt>
    <dd><?php echo $docente["Docente"]["direccion"]; ?></dd>
    <dt>Teléfono 1</dt>
    <dd><?php echo $docente["Docente"]["telefono1"]; ?></dd>
    <dt>Teléfono 2</dt>
    <dd><?php echo $docente["Docente"]["telefono2"]; ?></dd>
    <dt>Fecha</dt>
    <dd><?php echo $docente["Docente"]["fecha"]; ?></dd>
</dl>