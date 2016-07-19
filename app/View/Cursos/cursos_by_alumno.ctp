<!-- File: /app/View/Cursos/cursos_by_alumno.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Cursos");  
    
    $this->Html->addCrumb('Cursos', '/Cursos');
?>
<?php
    echo $this->Form->create("Aniolectivo", array("class" => "form-horizontal"));
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno",
        "value" => $idaniolectivo
    ));
    echo $this->Form->end();
?>
<dl class="dl-horizontal">
    <dt>Nivel</dt>
    <dd><?php echo $matricula_seleccionada["Seccion"]["Grado"]["Nivel"]["descripcion"]; ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $matricula_seleccionada["Seccion"]["Grado"]["descripcion"]; ?></dd>
    <dt>Sección</dt>
    <dd><?php echo $matricula_seleccionada["Seccion"]["descripcion"]; ?></dd>
</dl>
<table id="tbl-asignaciones" class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0">Curso</th>
            <th id="user-grid_c1">Profesor</th>
            <th id="user-grid_c2">Celular</th>
            <th id="user-grid_c3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($cursos as $curso) {
        if (isset($curso["Asignacion"][0])) {
            echo $this->Html->tableCells(
                array(
                    $curso["Curso"]["descripcion"],
                    $curso["Asignacion"][0]["Docente"]["nombreCompleto"],
                    $curso["Asignacion"][0]["Docente"]["telefono1"] . " / " . $curso["Asignacion"][0]["Docente"]["telefono2"],
                    $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view_alumno", $curso["Curso"]["idcurso"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip"))
                ), array(
                    "class" => "odd"
                ), array(
                    "class" => "even"
                )
            );
        } else {
            echo $this->Html->tableCells(
                array(
                    $curso["Curso"]["descripcion"],
                    array('Sin asignar', 'colspan=2'),
                    $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view_alumno", $curso["Curso"]["idcurso"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip"))
                ), array(
                    "class" => "odd"
                ), array(
                    "class" => "even"
                )
            );
        }
    } ?>
    </tbody>
</table>
<?php
    $this->Js->get('#AniolectivoIdaniolectivo')->event('change', 
        "$('#AniolectivoCursosByAlumnoForm').submit();"
    );
?>
