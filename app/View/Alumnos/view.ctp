<!-- File: /app/View/Alumnos/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Alumno");
    $this->assign("accion1", "Crear Alumno");
    $this->assign("accion2", "Editar Alumno");
    $this->assign("accion3", "Administar Alumnos");
    $this->assign("accion4", "Eliminar Alumno");
    $this->assign("id", $alumno["Alumno"]["idalumno"]);    
    
    $this->Html->addCrumb('Alumnos', '/Alumnos');
    $this->Html->addCrumb('Detalle', '/Alumnos/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $alumno["Alumno"]["idalumno"]; ?></dd>
    <dt>Nombre Completo</dt>
    <dd><?php echo $alumno["Alumno"]["nombreCompleto"]; ?></dd>
    <dt>Dirección</dt>
    <dd><?php echo $alumno["Alumno"]["direccion"]; ?></dd>
    <dt>Teléfono</dt>
    <dd><?php echo $alumno["Alumno"]["telefono"]; ?></dd>
    <dt>Fecha de Nacimiento</dt>
    <dd><?php echo $alumno["Alumno"]["fechaNac"]; ?></dd>
</dl>