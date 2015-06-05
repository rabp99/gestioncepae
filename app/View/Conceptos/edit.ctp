<!-- File: /app/View/Conceptos/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Conceptos de Pago");
    $this->assign("accion1", "Crear Concepto de Pago");
    $this->assign("accion2", "Detalle de Concepto de Pago");
    $this->assign("accion3", "Administar Conceptos de Pago");
    $this->assign("id", $this->request->data["Concepto"]["idconcepto"]);
        
    $this->Html->addCrumb('Conceptos de Pago', '/Conceptos');
    $this->Html->addCrumb('Editar', '/Conceptos/edit');
    
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
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    
    echo $this->Form->end();
?>