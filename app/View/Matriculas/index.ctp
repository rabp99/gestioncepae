<!-- File: /app/View/Matriculas/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Matriculas");
    $this->assign("accion", "Matricular Alumno");
    
    $this->Html->addCrumb('Matriculas', '/Matriculas');
    $this->Html->addCrumb('Adiministrar', '/Matriculas/index');
?>
<?php 
    $this->start("antes");
    echo $this->Form->create("Matricula", array("class" => "form-horizontal"));
    echo $this->Form->input("Aniolectivo.idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno",
        "value" => $idaniolectivo
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
    echo $this->Form->end();
    $this->end();
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idmatricula", "Código <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("Alumno.nombreCompleto", "Alumno <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("Seccion.descripcion", "Sección <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("Seccion.idgrado", "Grado <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2">Nivel</th>
            <th id="user-grid_c3"><?php echo $this->Paginator->sort("created", "Fecha de Matrícula <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c4">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($matriculas as $matricula) {
        echo $this->Html->tableCells(
            array(
                $matricula["Matricula"]["idmatricula"],
                $matricula["Alumno"]["nombreCompleto"],
                $matricula["Seccion"]["descripcion"],
                $matricula["Seccion"]["Grado"]["descripcion"],
                $matricula["Seccion"]["Grado"]["Nivel"]["descripcion"],
                $matricula["Matricula"]["created"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $matricula["Matricula"]["idmatricula"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $matricula["Matricula"]["idmatricula"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>

<?php
    $this->Js->get('#NivelIdnivel')->event('change', 
        "$('#MatriculaIdseccion').html('<option value>Selecciona uno</option>');"
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
    
    $this->Js->get("#MatriculaIdseccion")->event("change", "$('#MatriculaIndexForm').submit();")
?>

