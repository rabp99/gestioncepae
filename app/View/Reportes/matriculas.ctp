<!-- File: /app/View/Reportes/matriculas.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Reporte de Matriculas");  
    
    $this->Html->addCrumb("Reporte de Matriculas", "/Reportes/matriculas");
    
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
?>
<?php
    echo $this->Form->create("Reporte", array("class" => "form-horizontal", "action" => "matriculas_post"));
    echo $this->Form->input("Aniolectivo.idaniolectivo", array(
        "label" => "Selecciona un año lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona año"
    ));
    echo $this->Form->input("Nivel.idnivel", array(
        "label" => "Nivel",
        "options" => $niveles,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input('Grado.idgrado', array(
        "label" => "Grado",
        "type" => "select",
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input('idseccion', array(
        "label" => "Sección",
        "type" => "select",
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->button("Reporte", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>

<?php
    $this->Js->get('#NivelIdnivel')->event('change', 
        "$('#ReporteIdseccion').html('<option value>Selecciona uno</option>');"
    );
    
    $gradosByIdnivel = $this->Js->request(array(
        "controller" => "Grados",
        "action" => "getByIdnivel"
    ), array(
        "update" => "#GradoIdgrado",
        "async" => true,
        "method" => 'post',
        "dataExpression" => true,
        "data" => $this->Js->serializeForm(array(
            "isForm" => true,
            "inline" => true
        ))
    ));
    
    $this->Js->get('#NivelIdnivel')->event('change', $gradosByIdnivel);
    
    $this->Js->buffer($gradosByIdnivel);
?>

<?php
    $getByIdgrado = $this->Js->request(array(
        "controller" => "Secciones",
        "action" => "getByIdgrado"
    ), array(
        "update" => "#ReporteIdseccion",
        "async" => true,
        "method" => 'post',
        "dataExpression" => true,
        "data" => $this->Js->serializeForm(array(
            "isForm" => false,
            "inline" => true
        ))
    ));
    
    $this->Js->get('#GradoIdgrado')->event('change', 
        $getByIdgrado
    );
    $this->Js->get('#AniolectivoIdaniolectivo')->event('change', 
        $getByIdgrado
    );
?>

