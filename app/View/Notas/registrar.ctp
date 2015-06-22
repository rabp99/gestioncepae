<!-- File: /app/View/Notas/registrar.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Registrar Notas del Curso " . $asignacion["Curso"]["descripcion"]);  
    $this->assign("accion3", "Administar Notas");
    
    $this->Html->addCrumb('Notas', '/Notas');
    $this->Html->addCrumb('Registrar', '/Notas/registrar');
?>
<?php
    echo $this->Form->create("Detallenota"); 
    $this->Form->inputDefaults(array(
        "class" => "span4"
    ));
    echo $this->Form->input("Nota.idasignacion", array(
        "type" => "hidden",
        "value" => $asignacion["Asignacion"]["idasignacion"]
    ));
    echo $this->Form->input("Nota.idbimestre", array(
        "label" => "Bimestre",
        "options" => $bimestres,
        "empty" => "Selecciona uno"
    ));
    echo "<div id='form-detallenotas'></div>";
    echo $this->Form->end();
?>

<?php
    $this->Js->get('#NotaIdbimestre')->event('change', 
        $this->Js->request(array(
            "controller" => "Notas",
            "action" => "getFormRegistro"
        ), array(
            "update" => "#form-detallenotas",
            "async" => true,
            "method" => 'post',
            "dataExpression" => true,
            "data" => $this->Js->serializeForm(array(
                "isForm" => false,
                "inline" => true
            ))
        ))
    );
?>