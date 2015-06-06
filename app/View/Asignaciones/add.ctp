<!-- File: /app/View/Niveles/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Nivel");
    $this->assign("accion", "Administrar Niveles");
    
    $this->Html->addCrumb('Niveles', '/Niveles');
    $this->Html->addCrumb('Crear', '/Niveles/add');
    
?>
<?php 
    echo $this->Form->create("Nivel", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>