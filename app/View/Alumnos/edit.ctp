<!-- File: /app/View/Alumnos/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Alumno");
    $this->assign("accion1", "Crear Alumno");
    $this->assign("accion2", "Detalle de Alumno");
    $this->assign("accion3", "Administar Alumno");
    $this->assign("id", $this->request->data["Alumno"]["idalumno"]);
        
    $this->Html->addCrumb('Alumnos', '/Alumnos');
    $this->Html->addCrumb('Editar', '/Alumnos/edit');
    
?>
<?php 
    echo $this->Form->create("Alumno", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("nombres", array(
        "label" => "Nombres",
        "autofocus" => "autofocus"
    ));  
    echo $this->Form->input("apellidoPaterno", array(
        "label" => "Apellido Paterno"
    ));  
    echo $this->Form->input("apellidoMaterno", array(
        "label" => "Apellido Materno"
    ));
    echo $this->Form->input("direccion", array(
        "label" => "Dirección"
    ));
    echo $this->Form->input("telefono", array(
        "label" => "Teléfono"
    ));
    echo $this->Form->input("fechaNac", array(
        "label" => "Fecha de Nacimiento"
    ));
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>