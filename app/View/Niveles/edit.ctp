<!-- File: /app/View/Niveles/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Nivel");
    $this->assign("accion1", "Crear Nivel");
    $this->assign("accion2", "Detalle de Nivel");
    $this->assign("accion3", "Administar Niveles");
    $this->assign("id", $this->request->data["Nivel"]["idnivel"]);
        
    $this->Html->addCrumb('Niveles', '/Niveles');
    $this->Html->addCrumb('Editar', '/Niveles/edit');
    
?>
<?php 
    echo $this->Form->create("Nivel", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>