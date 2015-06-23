<!-- File: /app/View/Asignaciones/modificar.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Modificar Asginación");
    
    $this->Html->addCrumb('Asignaciones', '/Asignaciones');
    $this->Html->addCrumb('Modificar', '/Asignaciones/modificar');
?>

<dl class="dl-horizontal">
    <dt>Año Lectivo</dt>
    <dd><?php echo $asignacion["Seccion"]["Aniolectivo"]["descripcion"]; ?></dd>
    <dt>Nivel</dt>
    <dd><?php echo $asignacion["Seccion"]["Grado"]["Nivel"]["descripcion"]; ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $asignacion["Seccion"]["Grado"]["descripcion"]; ?></dd>
    <dt>Sección</dt>
    <dd><?php echo $asignacion["Seccion"]["descripcion"]; ?></dd>
    <dt>Curso</dt>
    <dd><?php echo $asignacion["Curso"]["descripcion"]; ?></dd>
</dl>

<?php 
    echo $this->Form->create("Asignacion");
    
    echo $this->Form->input("idasignacion", array(
        "type" => "hidden",
        "value" => $asignacion["Asignacion"]["idasignacion"]
    ));
    
    echo $this->element("getDocentes", array("model" => "Asignacion", "docente_iddocente" => $asignacion["Docente"]["iddocente"], "docente_nombreCompleto" => $asignacion["Docente"]["nombreCompleto"]));
   
    echo $this->Form->button("Asignar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>