<!-- File: /app/View/Aseguradoras/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Aseguradoras");
    $this->assign("accion", "Administrar Aseguradoras");
    
    $this->Html->addCrumb('Aseguradoras', '/Aseguradoras');
    $this->Html->addCrumb('Crear', '/Aseguradoras/add');
?>
<?php 
    echo $this->Form->create("Aseguradora", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>