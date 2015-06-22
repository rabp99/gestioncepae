<!-- File: /app/View/Cursos/view_alumno.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Curso");
    $this->assign("id", $curso["Curso"]["idcurso"]);    
    
    $this->Html->addCrumb('Cursos', '/Cursos/cursosByAlumno');
    $this->Html->addCrumb('Detalle', '/Cursos/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $curso["Curso"]["idcurso"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $curso["Curso"]["descripcion"]; ?></dd>
    <dt>Área</dt>
    <dd><?php echo $curso["Area"]["descripcion"]; ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $curso["Grado"]["descripcion"]; ?></dd>
    <dt>Nivel</dt>
    <dd><?php echo $curso["Grado"]["Nivel"]["descripcion"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar", array("action" => "cursosByAlumno")); ?>