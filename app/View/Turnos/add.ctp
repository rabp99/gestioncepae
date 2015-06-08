<!-- File: /app/View/Turnos/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Turno");
    $this->assign("accion", "Administrar Turno");
    
    $this->Html->addCrumb('Turnos', '/Turnos');
    $this->Html->addCrumb('Crear', '/Turnos/add');
?>
<?php 
    echo $this->Form->create("Turno", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>