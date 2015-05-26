<!-- File: /app/View/Aniolectivos/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Año Lectivo");
    $this->assign("accion", "Administrar Años Lectivos");
    
    $this->Html->addCrumb('Años Lectivos', '/Aniolectivos');
    $this->Html->addCrumb('Crear', '/Aniolectivos/add');
    
?>
<?php 
    echo $this->Form->create("Aniolectivo", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input("fechainicio", array(
        "label" => "Fecha de Inicio"
    ));
    echo $this->Form->input("fechafin", array(
        "label" => "Fecha Final"
    ));  
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>