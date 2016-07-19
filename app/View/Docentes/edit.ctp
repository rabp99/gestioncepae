<!-- File: /app/View/Docentes/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Docente");
    $this->assign("accion1", "Crear Docente");
    $this->assign("accion2", "Detalle de Docente");
    $this->assign("accion3", "Administar Docentes");
    $this->assign("id", $this->request->data["Docente"]["iddocente"]);
        
    $this->Html->addCrumb('Docentes', '/Docentes');
    $this->Html->addCrumb('Editar', '/Docentes/edit');
          
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
?>
<?php 
    echo $this->Form->create("Docente", array("class" => "form-vertical"));
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
    echo $this->Form->input("especialidad", array(
        "label" => "Especialidad"
    ));
    echo $this->Form->input("dni", array(
        "label" => "DNI"
    ));
    echo $this->Form->input("direccion", array(
        "label" => "Dirección"
    ));
    echo $this->Form->input("telefono1", array(
        "label" => "Teléfono 1"
    ));
    echo $this->Form->input("telefono2", array(
        "label" => "Teléfono 2"
    ));
    echo $this->Form->input("fecha", array(
        "label" => "Fecha <span style='color: #999'>(AAAA-MM-DD)</span>",
        "type" => "text"
    ));
    echo $this->Form->input("User.idgroup", array(
        "type" => "hidden",
        "value" => 4
    ));
    echo $this->Form->input("User.username", array(
        "label" => "Nombre de Usuario"
    ));
    echo $this->Form->input("User.password", array(
        "label" => "Password"
    ));
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {
        $("#DocenteFecha").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>