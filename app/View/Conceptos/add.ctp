<!-- File: /app/View/Conceptos/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Concepto de Pago");
    $this->assign("accion", "Administrar Conceptos de Pago");
    
    $this->Html->addCrumb('Conceptos de Pago', '/Conceptos');
    $this->Html->addCrumb('Crear', '/Conceptos/add');
    
?>
<?php 
    echo $this->Form->create("Concepto", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));   
    echo $this->Form->input("valor", array(
        "label" => "Valor"
    ));
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    
    echo $this->Form->end();
?>