<!-- File: /app/View/Areas/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Área");
    $this->assign("accion", "Administrar Áreas");
    
    $this->Html->addCrumb('Áreas', '/Areas');
    $this->Html->addCrumb('Crear', '/Areas/add');
    
?>
<?php 
    echo $this->Form->create("Area", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>