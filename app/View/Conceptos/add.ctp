<!-- File: /app/View/Conceptos/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Concepto de Pago");
    $this->assign("accion", "Administrar Conceptos de Pago");
    
    $this->Html->addCrumb('Conceptos de Pago', '/Conceptos');
    $this->Html->addCrumb('Crear', '/Conceptos/add');
      
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
?>
<?php 
    echo $this->Form->create("Concepto", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno",
        "value" => $idaniolectivo
    ));
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));   
    echo $this->Form->input("monto", array(
        "label" => "Monto"
    ));
    echo $this->Form->input("fechalimite", array(
        "label" => "Fecha Limite",
        "type" => "text"
    ));
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    
    echo $this->Form->end();
?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {
        $("#ConceptoFechalimite").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>