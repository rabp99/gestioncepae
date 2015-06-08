<!-- File: /app/View/Bimestres/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Bimestre");
    $this->assign("accion1", "Crear Bimestre");
    $this->assign("accion2", "Detalle de Bimestre");
    $this->assign("accion3", "Administar Bimestres");
    $this->assign("id", $this->request->data["Bimestre"]["idbimestre"]);
        
    $this->Html->addCrumb('Bimestres', '/Bimestres');
    $this->Html->addCrumb('Editar', '/Bimestres/edit');
    
?>
<?php 
    echo $this->Form->create("Bimestre", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>