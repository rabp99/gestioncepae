<!-- File: /app/View/Coberturas/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Cobertura");
    $this->assign("accion1", "Crear Cobertura");
    $this->assign("accion2", "Detalle de Cobertura");
    $this->assign("accion3", "Administar Cobertura");
    $this->assign("id", $this->request->data["Cobertura"]["idcobertura"]);
        
    $this->Html->addCrumb('Coberturas', '/Coberturas');
    $this->Html->addCrumb('Editar', '/Coberturas/edit');
    
?>
<?php 
    echo $this->Form->create("Cobertura", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>