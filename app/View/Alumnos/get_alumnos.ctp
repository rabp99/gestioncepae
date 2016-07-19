<!-- File: /app/View/Alumnos/get_alumnos.ctp -->
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
                <td class="tdIdalumno"><?php echo 'A' . str_pad($alumno["Alumno"]["idalumno"],  5, '0', STR_PAD_LEFT); ?></td>
                <td class="tdNombreCompleto"><?php echo $alumno["Alumno"]["nombreCompleto"]; ?></td>
                <td><?php echo $this->Form->button($this->Html->tag("i", "", array("class" => "icon-ok")) . "", array("class" => "btn btn-default seleccionarAlumno", "type" => "button")); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>