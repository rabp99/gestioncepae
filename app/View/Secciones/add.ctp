<!-- File: /app/View/Secciones/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Sección");
    $this->assign("accion", "Administrar Secciones");
    
    $this->Html->addCrumb('Secciones', '/Secciones');
    $this->Html->addCrumb('Crear', '/Secciones/add');
    
?>
<dl class="dl-horizontal">
    <dt>Año Lectivo</dt>
    <dd><?php echo $aniolectivo["Aniolectivo"]["descripcion"]; ?></dd>
</dl>
<?php 
    echo $this->Form->create("Seccion", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input("Nivel.idnivel", array(
        "label" => "Nivel",
        "options" => $niveles,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input('idgrado', array(
        "label" => "Grado",
        "type" => "select",
        "disabled" => true
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
