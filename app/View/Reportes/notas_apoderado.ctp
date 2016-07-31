<!-- File: /app/View/Reportes/notas_apoderado.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Boleta de Notas");  
    
    $this->Html->addCrumb("Boleta de Notas", "/Reportes/notas");
?>
<?php
    echo $this->Form->create("Reporte", array("class" => "form-horizontal"));
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno",
        "value" => $idaniolectivo
    ));  
    echo $this->Form->input("idalumno", array(
        "label" => "Alumno",
        "options" => $alumnos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input("idbimestre", array(
        "label" => "Bimestre",
        "options" => $bimestres,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->button("Reporte", array("class" => "btn btn-primary btn-large", "id" => "btnReporte"));
    echo $this->Form->end();
?>
<?php
    $submit = "$('#ReporteNotasApoderadoForm').submit();";
    $this->Js->get('#ReporteIdaniolectivo')->event('change', $submit);
?>
<script>
    $(document).ready(function() {
        $("#btnReporte").click(function() {
            $('#ReporteNotasApoderadoForm').attr("action", "/gestioncepae/Reportes/notas_apoderado_post");
            <?php echo $submit; ?>
        });
    })
</script>