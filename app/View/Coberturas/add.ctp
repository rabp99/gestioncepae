<!-- File: /app/View/Coberturas/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Coberturas");
    $this->assign("accion", "Administrar Coberturas");
    
    $this->Html->addCrumb('Coberturas', '/Coberturas');
    $this->Html->addCrumb('Crear', '/Coberturas/add');
?>
<?php 
    echo $this->Form->create("Cobertura", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>