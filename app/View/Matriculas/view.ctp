<!-- File: /app/View/Matriculas/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Matricula");
    $this->assign("accion1", "Matricular Alumno");
    $this->assign("accion2", "");
    $this->assign("accion3", "Administar Matriculas");
    $this->assign("accion4", "Eliminar Matricula");
    $this->assign("id", $matricula["Matricula"]["idmatricula"]);    
    
    $this->Html->addCrumb('Matriculas', '/Matriculas');
    $this->Html->addCrumb('Detalle', '/Matriculas/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $matricula["Matricula"]["idmatricula"]; ?></dd>
    <dt>Alumno</dt>
    <dd><?php echo $matricula["Alumno"]["nombreCompleto"]; ?></dd>
    <dt>Nivel</dt>
    <dd><?php echo $matricula["Seccion"]["Grado"]["Nivel"]["descripcion"]; ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $matricula["Seccion"]["Grado"]["descripcion"]; ?></dd>
    <dt>Sección</dt>
    <dd><?php echo $matricula["Seccion"]["descripcion"]; ?></dd>
    <dt>Fecha</dt>
    <dd><?php echo $matricula["Matricula"]["fecha"]; ?></dd>
    <dt>Observación</dt>
    <dd><p><?php echo $matricula["Matricula"]["observacion"]; ?></p></dd>
</dl>