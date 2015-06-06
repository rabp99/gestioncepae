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
    
    echo $this->Form->input("Aniolectivo.idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno"
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
    echo $this->element("getAlumnos", array("model" => "Matricula"));
    echo $this->Form->label("observacion", "Observación");
    echo $this->Form->textarea("obsevacion", array(
        "rows" => 10,
        "cols" => 30,
        "class" => "span4"
    ));
    echo "<br>";
    echo $this->Form->button("Matricular", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>
<?php
    $this->Js->get('#NivelIdnivel')->event('change', 
        "$('#MatriculaIdseccion').html('<option value>Selecciona uno</option>');"
    );
    
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
            ))
        ))
    );
?>

<?php
    $getByIdgrado = $this->Js->request(array(
        "controller" => "Secciones",
        "action" => "getByIdgrado"
    ), array(
        "update" => "#MatriculaIdseccion",
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

<?php 
    $this->Js->get('#AniolectivoIdaniolectivo')->event('change',
        $this->Js->request(array(
            "controller" => "Alumnos",
            "action" => "getAlumnos"
        ), array(
            "update" => "#dvBuscarAlumnos",
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