<!-- File: /app/View/Asignaciones/index.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Administrar Asignaciones");
    
    $this->Html->addCrumb('Asignaciones', '/Asignaciones');
    $this->Html->addCrumb('Adiministrar', '/Asignaciones/index');
?>
<?php
    echo $this->Form->create("Asignacion");
    
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
    echo $this->Form->input("Grado.idgrado", array(
        "label" => "Grado",
        "type" => "select",
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input("idseccion", array(
        "label" => "Sección",
        "type" => "select",
        "empty" => "Selecciona uno"
    ));
    
    echo $this->Form->end();
?>
<table id="tbl-asignaciones" class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0">Curso</th>
            <th id="user-grid_c0">Área</th>
            <th id="user-grid_c1">Docente</th>
            <th id="user-grid_c3">Seccion</th>
            <th id="user-grid_c4">Grado</th>
            <th id="user-grid_c5">Nivel</th>
            <th id="user-grid_c6">Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<?php 
    // Nivel
    $this->Js->get('#NivelIdnivel')->event('change', 
        "$('#AsignacionIdseccion').html('<option value>Selecciona uno</option>');"
    );
    $this->Js->get('#NivelIdnivel')->event('change', 
        "$('#GradoIdgrado').val('');"
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
    // Secciones
    $getByIdgrado = $this->Js->request(array(
        "controller" => "Secciones",
        "action" => "getByIdgrado"
    ), array(
        "update" => "#AsignacionIdseccion",
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
    
    $this->Js->get('#AsignacionIdseccion')->event('change', 
        $this->Js->request(array(
            "controller" => "Asignaciones",
            "action" => "getAsignaciones"
        ), array(
            "update" => "#tbl-asignaciones",
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