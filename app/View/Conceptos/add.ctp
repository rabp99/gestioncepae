<!-- File: /app/View/Grados/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Grado");
    $this->assign("accion", "Administrar Grados");
    
    $this->Html->addCrumb('Grados', '/Grados');
    $this->Html->addCrumb('Crear', '/Grados/add');
    
?>
<dl class="dl-horizontal">
    <dt>Año Lectivo</dt>
    <dd><?php echo $aniolectivo["Aniolectivo"]["descripcion"]; ?></dd>
</dl>
<?php 
    echo $this->Form->create("Grado", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("idaniolectivo", array(
        "type" => "hidden",
        "value" => $aniolectivo["Aniolectivo"]["idaniolectivo"]
    ));
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));   
    echo $this->Form->input("capacidad", array(
        "label" => "Capacidad"
    ));
    echo $this->Form->input("idnivel", array(
        "label" => "Nivel",
        "options" => $niveles,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>