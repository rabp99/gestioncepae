<!-- File: /app/View/Areas/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Área");
    $this->assign("accion1", "Crear Área");
    $this->assign("accion2", "Detalle de Área");
    $this->assign("accion3", "Administar Áreas");
    $this->assign("id", $this->request->data["Area"]["idarea"]);
        
    $this->Html->addCrumb('Áreas', '/Areas');
    $this->Html->addCrumb('Editar', '/Areas/edit');
    
?>
<?php 
    echo $this->Form->create("Area", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>