<!-- File: /app/View/Aseguradoras/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Aseguradora");
    $this->assign("accion1", "Crear Aseguradora");
    $this->assign("accion2", "Detalle de Aseguradora");
    $this->assign("accion3", "Administar Aseguradoras");
    $this->assign("id", $this->request->data["Aseguradora"]["idaseguradora"]);
        
    $this->Html->addCrumb('Aseguradoras', '/Aseguradoras');
    $this->Html->addCrumb('Editar', '/Aseguradoras/edit');
    
?>
<?php 
    echo $this->Form->create("Aseguradora", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>