<!-- File: /app/View/Asignaciones/get_asignaciones.ctp -->

<table id="tbl-asignaciones" class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0">Curso</th>
            <th id="user-grid_c1">Área</th>
            <th id="user-grid_c2">Docente</th>
            <th id="user-grid_c3">Nivel</th>
            <th id="user-grid_c4">Grado</th>
            <th id="user-grid_c5">Seccion</th>
            <th id="user-grid_c6">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        if(isset($cursos)) {
            foreach ($cursos as $curso) {
                echo $this->Html->tableCells(
                    array(
                        $curso["Curso"]["descripcion"],
                        $curso["Area"]["descripcion"],
                        empty($curso["Asignacion"]) ? "Sin asignar" :$curso["Asignacion"][0]["Docente"]["nombreCompleto"],
                        $curso["Grado"]["Nivel"]["descripcion"],
                        $curso["Grado"]["descripcion"],
                        $curso["Seccion"]["descripcion"],
                        (!empty($curso["Asignacion"]) ? 
                            $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $curso["Curso"]["idcurso"], $curso["Seccion"]["idseccion"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " :
                            "") .
                        (empty($curso["Asignacion"]) ? 
                            $this->Html->link("<i class='icon-pencil'></i>", array("action" => "registrar", $curso["Curso"]["idcurso"], $curso["Seccion"]["idseccion"]), array("escape" => false, "title" => "Asignar Docente", "rel" => "tooltip")) : 
                            $this->Html->link("<i class='icon-pencil'></i>", array("action" => "modificar", $curso["Curso"]["idcurso"], $curso["Seccion"]["idseccion"]), array("escape" => false, "title" => "Modificar Asignación", "rel" => "tooltip"))) 
                    ), array(
                        "class" => "odd"
                    ), array(
                        "class" => "even"
                    )
                );
            }
        } 
    ?>
    </tbody>
</table>