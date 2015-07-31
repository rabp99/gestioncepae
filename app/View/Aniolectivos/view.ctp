<!-- File: /app/View/Aniolectivos/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Año Lectivo");
    $this->assign("accion1", "Crear Año Lectivo");
    $this->assign("accion2", "Editar Año Lectivo");
    $this->assign("accion3", "Administar Años Lectivos");
    $this->assign("accion4", "Deshabilitar Año Lectivo");
    $this->assign("id", $aniolectivo["Aniolectivo"]["idaniolectivo"]);    
    
    $this->Html->addCrumb('Años Lectivos', '/Aniolectivos');
    $this->Html->addCrumb('Detalle', '/Aniolectivos/view');
?>

<dl class="dl-horizontal">  
    <dt>Código</dt>
    <dd><?php echo $aniolectivo["Aniolectivo"]["idaniolectivo"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $aniolectivo["Aniolectivo"]["descripcion"]; ?></dd>
    <dt>Fecha de Inicio</dt>
    <dd><?php echo $aniolectivo["Aniolectivo"]["fechainicio"]; ?></dd>
    <dt>Fecha Final</dt>
    <dd><?php echo $aniolectivo["Aniolectivo"]["fechafin"]; ?></dd>
</dl>