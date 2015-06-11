<!-- File: /app/View/Docentes/get_docentes.ctp -->
<div id="dvBuscarDocentes">
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre Completo</th>
                <th>Seleccionar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($docentes as $docente) { ?>
            <tr>
                <td class="tdIddocente"><?php echo $docente["Docente"]["iddocente"]; ?></td>
                <td class="tdNombreCompleto"><?php echo $docente["Docente"]["nombreCompleto"]; ?></td>
                <td><?php echo $this->Form->button($this->Html->tag("i", "", array("class" => "icon-ok")) . "", array("class" => "btn btn-default seleccionarDocente", "type" => "button")); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>