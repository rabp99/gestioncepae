<!-- File: /app/View/Asignaciones/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Asignación");
    $this->assign("accion3", "Administar Asignacinoes");
    $this->assign("id", $asignacion["Asignacion"]["idasignacion"]);    
    
    $this->Html->addCrumb('Asignaciones', '/Asignaciones');
    $this->Html->addCrumb('Detalle', '/Asignaciones/view');
?>

<dl class="dl-horizontal">
    <dt>Año Lectivo</dt>
    <dd><?php echo $asignacion["Seccion"]["Aniolectivo"]["descripcion"] ?></dd>
    <dt>Nivel</dt>
    <dd><?php echo $asignacion["Seccion"]["Grado"]["Nivel"]["descripcion"] ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $asignacion["Seccion"]["Grado"]["descripcion"] ?></dd>
    <dt>Sección</dt>
    <dd><?php echo $asignacion["Seccion"]["descripcion"] ?></dd>
    <dt>Curso</dt>
    <dd><?php echo $asignacion["Curso"]["descripcion"] ?></dd>
    <dt>Docente</dt>
    <dd><?php echo $asignacion["Docente"]["nombreCompleto"] ?></dd>
</dl>