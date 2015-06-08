<!-- File: /app/View/Asignaciones/index.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Administrar Asignaciones");
    
    $this->Html->addCrumb('Asignaciones', '/Asignaciones');
    $this->Html->addCrumb('Adiministrar', '/Asignaciones/index');
?>
<?php
    echo $this->Form->create("Asignacion");
    
    echo $this->Form->input("Aniolectivo.idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input("Nivel.idnivel", array(
        "label" => "Nivel",
        "options" => $niveles,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input("Grado.idgrado", array(
        "label" => "Grado"
    ));
    echo $this->Form->input("idseccion", array(
        "label" => "Sección",
        "empty" => "Selecciona uno"
    ));
    
    echo $this->Form->end();
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"></th>
            <th id="user-grid_c1"></th>
            <th id="user-grid_c2">Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>