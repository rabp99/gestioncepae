<!-- File: /app/View/Cursos/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Curso");
    $this->assign("accion", "Administrar Cursos");
    
    $this->Html->addCrumb('Cursos', '/Cursos');
    $this->Html->addCrumb('Crear', '/Cursos/add');
    
?>
<?php 
    echo $this->Form->create("Curso", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input("idarea", array(
        "label" => "Área",
        "options" => $areas,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input("Nivel.idnivel", array(
        "label" => "Nivel",
        "options" => $niveles,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input('idgrado', array(
        "label" => "Grado",
        "type" => "select",
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>

<?php
    $this->Js->get('#NivelIdnivel')->event('change', 
        $this->Js->request(array(
            "controller" => "Grados",
            "action" => "getByIdnivel"
        ), array(
            "update" => "#CursoIdgrado",
            "async" => true,
            "method" => 'post',
            "dataExpression" => true,
            "data" => $this->Js->serializeForm(array(
                "isForm" => true,
                "inline" => true
            )),
            "success" => "$('#CursoIdgrado').attr({disabled: false});"
        ))
    );
?>
