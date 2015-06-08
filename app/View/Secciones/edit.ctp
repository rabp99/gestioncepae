<!-- File: /app/View/Secciones/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Sección");
    $this->assign("accion1", "Crear Sección");
    $this->assign("accion2", "Detalle de Sección");
    $this->assign("accion3", "Administar Secciones");
    $this->assign("id", $this->request->data["Seccion"]["idseccion"]);
        
    $this->Html->addCrumb('Secciones', '/Secciones');
    $this->Html->addCrumb('Editar', '/Secciones/edit');
    
?>
<?php 
    echo $this->Form->create("Seccion", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno",
        "disabled" => true
    ));
    echo $this->Form->input("Nivel.idnivel", array(
        "label" => "Nivel",
        "options" => $niveles,
        "empty" => "Selecciona uno",
        "disabled" => true
    ));
    echo $this->Form->input('idgrado', array(
        "label" => "Grado",
        "options" => $grados,
        "empty" => "Selecciona uno",
        "disabled" => true
    ));
    echo $this->Form->input("idturno", array(
        "label" => "Turno",
        "options" => $turnos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "readonly" => true
    ));
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    
    echo $this->Form->end();
?>

<?php
    $this->Js->get('#NivelIdnivel')->event('change', 
        $this->Js->request(array(
            "controller" => "Grados",
            "action" => "getByIdnivel"
        ), array(
            "update" => "#SeccionIdgrado",
            "async" => true,
            "method" => 'post',
            "dataExpression" => true,
            "data" => $this->Js->serializeForm(array(
                "isForm" => true,
                "inline" => true
            )),
            "success" => "$('#SeccionIdgrado').attr({disabled: false});"
        ))
    );
?>