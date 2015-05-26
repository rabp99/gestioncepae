<!-- File: /app/View/Secciones/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Sección");
    $this->assign("accion1", "Crear Sección");
    $this->assign("accion2", "Editar Sección");
    $this->assign("accion3", "Administar Secciones");
    $this->assign("accion4", "Eliminar Sección");
    $this->assign("id", $seccion["Seccion"]["idseccion"]);    
    
    $this->Html->addCrumb('Secciones', '/Seccoiones');
    $this->Html->addCrumb('Detalle', '/Secciones/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $seccion["Seccion"]["idseccion"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $seccion["Seccion"]["descripcion"]; ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $seccion["Grado"]["descripcion"]; ?></dd>
    <dt>Año Lectivo</dt>
    <dd><?php echo $seccion["Grado"]["Aniolectivo"]["descripcion"]; ?></dd>
</dl>