<div id="dvBuscarAlumnos">
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre Completo</th>
                <th>Seleccionar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno) { ?>
            <tr>
                <td class="tdIdalumno"><?php echo $alumno["Alumno"]["idalumno"]; ?></td>
                <td class="tdNombreCompleto"><?php echo $alumno["Alumno"]["nombreCompleto"]; ?></td>
                <td><?php echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . "", array("class" => "btn btn-default seleccionarAlumno", "type" => "button")); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>