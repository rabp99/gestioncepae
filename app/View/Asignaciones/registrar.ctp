<!-- File: /app/View/Asignaciones/registrar.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Asignar Docente");
    
    $this->Html->addCrumb('Asignaciones', '/Asignaciones');
    $this->Html->addCrumb('Registrar', '/Asignaciones/registrar');
?>

<dl class="dl-horizontal">
    <dt>Año Lectivo</dt>
    <dd><?php echo $seccion["Aniolectivo"]["descripcion"]; ?></dd>
    <dt>Nivel</dt>
    <dd><?php echo $seccion["Grado"]["Nivel"]["descripcion"]; ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $seccion["Grado"]["descripcion"]; ?></dd>
    <dt>Sección</dt>
    <dd><?php echo $seccion["Seccion"]["descripcion"]; ?></dd>
    <dt>Curso</dt>
    <dd><?php echo $curso["Curso"]["descripcion"]; ?></dd>
</dl>

<?php 
    echo $this->Form->create("Asignacion");
    
    echo $this->Form->input("idseccion", array(
        "type" => "hidden",
        "value" => $seccion["Seccion"]["idseccion"]
    ));
    echo $this->Form->input("idcurso", array(
        "type" => "hidden",
        "value" => $curso["Curso"]["idcurso"]
    ));
    
    echo $this->element("getDocentes", array("model" => "Asignacion"));
   
    echo $this->Form->button("Asignar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>