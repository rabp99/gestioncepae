<!-- File: /app/View/Maatriculas/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Matricular Alumno");
    $this->assign("accion", "Administrar Matriculas");
    
    $this->Html->addCrumb('Matriculas', '/Matriculas');
    $this->Html->addCrumb('Crear', '/Matriculas/add');
    
?>
<?php 
    echo $this->Form->create("Matricula", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Form->input("Nivel.idnivel", array(
        "label" => "Nivel",
        "options" => $niveles,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input('Grado.idgrado', array(
        "label" => "Grado",
        "type" => "select",
        "disabled" => true
    ));
    echo $this->Form->input('idseccion', array(
        "label" => "Sección",
        "type" => "select",
        "disabled" => true
    ));
    echo $this->element("getAlumnos", array("model" => "Matricula"));
    echo $this->Form->label("observacion", "Observación");
    echo $this->Form->textarea("obsevacion", array(
        "rows" => 10,
        "cols" => 30,
        "class" => "span4"
    ));
    echo $this->Form->input("fecha", array(
        "label" => "Fecha"
    ));
    echo $this->Form->button("Matricular", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>
<?php
    $this->Js->get('#NivelIdnivel')->event('change', 
        $this->Js->request(array(
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
            )),
            "success" => 
                "$('#GradoIdgrado').attr({disabled: false});" .
                "$('#MatriculaIdseccion').html('<option value>Selecciona uno</option>');" .
                "$('#MatriculaIdseccion').attr({disabled: true});"
        ))
    );
?>

<?php
    $this->Js->get('#GradoIdgrado')->event('change', 
        $this->Js->request(array(
            "controller" => "Secciones",
            "action" => "getByIdgrado"
        ), array(
            "update" => "#MatriculaIdseccion",
            "async" => true,
            "method" => 'post',
            "dataExpression" => true,
            "data" => $this->Js->serializeForm(array(
                "isForm" => true,
                "inline" => true
            )),
            "success" => "$('#MatriculaIdseccion').attr({disabled: false});"
        ))
    );
?>
