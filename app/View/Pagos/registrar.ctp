<!-- File: /app/View/Pagos/registrar.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Registrar Pago");

    $this->Html->addCrumb('Pagos', '/Pagos');
    $this->Html->addCrumb('Registrar', '/Pagos/registrar');
    
?>
<?php 
    echo $this->Form->create("Pago");
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
?>
<dl class="dl-horizontal">
    <dt>Alumno</dt>
    <dd><?php echo $matricula["Alumno"]["nombreCompleto"]; ?></dd>
    <dt>Nivel</dt>
    <dd><?php echo $matricula["Seccion"]["Grado"]["Nivel"]["descripcion"]; ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $matricula["Seccion"]["Grado"]["descripcion"]; ?></dd>
    <dt>Sección</dt>
    <dd><?php echo $matricula["Seccion"]["descripcion"]; ?></dd>
</dl>

<?php
    echo $this->Form->input("idpago", array(
        "label" => "Concepto de Pago",
        "options" => $pagos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->button("Registrar Pago", array("class" => "btn btn-primary btn-large"));

    echo $this->Form->end();
?>