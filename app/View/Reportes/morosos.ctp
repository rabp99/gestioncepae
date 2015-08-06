<!-- File: /app/View/Reportes/morosos.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Reporte de Morosos");  
    
    $this->Html->addCrumb("Reporte de Morosos", "/Reportes/morosos");
    
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
?>
<?php
    echo $this->Form->create("Reporte", array("class" => "form-horizontal", "action" => "morosos_post"));
    echo $this->Form->input("anio", array(
        "label" => "Selecciona un año lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona año"
    ));
    echo $this->Form->button("Reporte", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>
