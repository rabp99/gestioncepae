<!-- File: /app/View/Notas/view_apoderado.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle Notas - " . $curso["Curso"]["descripcion"]);  
    
    $this->Html->addCrumb("Notas", "/Notas/index_apoderado");
    $this->Html->addCrumb("Detalle Notas", '/Notas/view_apoderado');
?>
<h3>Curso</h3>
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
<?php foreach($bimestres as $bimestre) { ?>
<h4><?php echo $bimestre["Bimestre"]["descripcion"]; ?></h4>
<dl class="dl-horizontal">
<?php   foreach($detallenotas as $detallenota) { ?>
<?php       if($detallenota["Nota"]["idbimestre"] == $bimestre["Bimestre"]["idbimestre"]) { ?>
    <dt><?php echo $detallenota["Nota"]["descripcion"]; ?></dt>
    <dd><?php echo $detallenota["Detallenota"]["valor"]; ?></dd>
<?php       } ?>
<?php   } ?>
</dl>
<?php } ?>
<?php echo $this->Html->link("Regresar", array("action" => "index_apoderado")); ?>
