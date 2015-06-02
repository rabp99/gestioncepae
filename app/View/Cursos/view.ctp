<!-- File: /app/View/Cursos/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Curso");
    $this->assign("accion1", "Crear Curso");
    $this->assign("accion2", "Editar Curso");
    $this->assign("accion3", "Administar Cursos");
    $this->assign("accion4", "Eliminar Curso");
    $this->assign("id", $curso["Curso"]["idcurso"]);    
    
    $this->Html->addCrumb('Cursos', '/Cursos');
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
    <dt>Año Lectivo</dt>
    <dd><?php echo $curso["Grado"]["Aniolectivo"]["descripcion"]; ?></dd>
</dl>