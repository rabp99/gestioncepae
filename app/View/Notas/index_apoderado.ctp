<!-- File: /app/View/Notas/index_apoderado.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Notas");  
    
    $this->Html->addCrumb("Notas", '/Notas');
?>
<?php
    echo $this->Form->create("Aniolectivo", array("class" => "form-horizontal"));
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno",
        "value" => $idaniolectivo
    ));
    echo $this->Form->input("Alumno.idalumno", array(
        "label" => "Alumno",
        "options" => $alumnos,
        "empty" => "Selecciona uno"
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
            <th id="user-grid_c1">Área</th>
            <th id="user-grid_c2">Nivel</th>
            <th id="user-grid_c3">Grado</th>
            <th id="user-grid_c5">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($cursos as $curso) {
        echo $this->Html->tableCells(
            array(
                $curso["Curso"]["descripcion"],
                $curso["Area"]["descripcion"],
                $curso["Grado"]["Nivel"]["descripcion"],
                $curso["Grado"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view_apoderado", $curso["Curso"]["idcurso"], $this->request->data["Aniolectivo"]["idaniolectivo"], $matricula_seleccionada["Matricula"]["idalumno"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip"))
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
    $submit = "$('#AniolectivoIndexApoderadoForm').submit();";
    $this->Js->get('#AniolectivoIdaniolectivo')->event('change', $submit);
    $this->Js->get('#AlumnoIdalumno')->event('change', $submit);
?>
