<!-- File: /app/View/Notas/administrar.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Administrar Notas del Curso " . $asignacion["Curso"]["descripcion"]);  
    $this->assign("accion3", "Administar Notas");
    
    $this->Html->addCrumb('Notas', '/Notas');
    $this->Html->addCrumb('Administrar', '/Notas/administrar');
?>
<?php
    echo $this->Form->create("Nota"); 
    $this->Form->inputDefaults(array(
        "class" => "span4"
    ));
    echo $this->Form->input("idasignacion", array(
        "type" => "hidden",
        "value" => $asignacion["Asignacion"]["idasignacion"]
    ));
    echo $this->Form->input("idbimestre", array(
        "label" => "Bimestre",
        "options" => $bimestres,
        "empty" => "Selecciona uno"
    ));
    echo "<div id='form-notas'></div>";   
    echo $this->Form->end();
?>

<?php
    $getFormNotas = $this->Js->request(array(
        "controller" => "Notas",
        "action" => "getFormNotas"
    ), array(
        "update" => "#form-notas",
        "async" => true,
        "method" => 'post',
        "dataExpression" => true,
        "data" => $this->Js->get("#NotaIdbimestre")->serializeForm(array(
            "isForm" => false,
            "inline" => true
        ))
    ));
    
    $this->Js->get('#NotaIdbimestre')->event('change', $getFormNotas);
    $this->Js->buffer($getFormNotas);
?>