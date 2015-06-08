<!-- File: /app/View/Turnos/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Turno");
    $this->assign("accion1", "Crear Turno");
    $this->assign("accion2", "Detalle de Turno");
    $this->assign("accion3", "Administar Turnos");
    $this->assign("id", $this->request->data["Turno"]["idturno"]);
        
    $this->Html->addCrumb('Turnos', '/Turnos');
    $this->Html->addCrumb('Editar', '/Turnos/edit');
    
?>
<?php 
    echo $this->Form->create("Turno", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>