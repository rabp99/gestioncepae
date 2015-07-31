<!-- File: /app/View/Pagos/index_alumno.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Pagos");  
    
    $this->Html->addCrumb("Pagos", '/Pagos');
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
<?php 
if(!empty($matricula)) {
foreach($matricula["Pago"] as $pago) { ?>
<h3><?php echo $pago["descripcion"] . " (" . $pago["monto"] . ")"; ?></h3>
<dl class="dl-horizontal">
    <?php foreach($pago["Detallepago"] as $detallepago) { ?>
    <dt><?php echo $detallepago["created"]; ?></dt>
    <dd><?php echo $detallepago["monto"]; ?></dd>
    <?php } ?>
</dl>
<?php } ?>
<?php
}
    $submit = "$('#AniolectivoIndexApoderadoForm').submit();";
    $this->Js->get('#AniolectivoIdaniolectivo')->event('change', $submit);
    $this->Js->get('#AlumnoIdalumno')->event('change', $submit);
?>
