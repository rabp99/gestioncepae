<!-- File: /app/View/Aniolectivos/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Año Lectivo");
    $this->assign("accion1", "Crear Año Lectivo");
    $this->assign("accion2", "Detalle de Año Lectivo");
    $this->assign("accion3", "Administar Años Lectivos");
    $this->assign("id", $this->request->data["Aniolectivo"]["idaniolectivo"]);
        
    $this->Html->addCrumb('Años Lectivos', '/Aniolectivos');
    $this->Html->addCrumb('Editar', '/Aniolectivos/edit');
    
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
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>