<!-- File: /app/View/Matriculas/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Matriculas");
    $this->assign("accion", "Matricular Alumno");
    
    $this->Html->addCrumb('Matriculas', '/Matriculas');
    $this->Html->addCrumb('Adiministrar', '/Matriculas/index');
?>
<?php 
    $this->start("antes");
    echo $this->Form->create("Matricula");
    echo $this->Form->input("idnivel", array(
        "label" => "Nivel",
        "options" => $niveles,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input('idgrado', array(
        "label" => "Grado",
        "type" => "select",
        "disabled" => true
    ));
    echo $this->Form->end();
    $this->end(); 
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idmatricula", "ID Matrícula <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("Alumno.nombreCompleto", "Alumno <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("Seccion.descripcion", "Sección <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3"><?php echo $this->Paginator->sort("fecha", "Fecha de Matrícula <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c4">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($matriculas as $matricula) {
        echo $this->Html->tableCells(
            array(
                $matricula["Matricula"]["idmatricula"],
                $matricula["Alumno"]["nombreCompleto"],
                $matricula["Seccion"]["descripcion"],
                $matricula["Matricula"]["fecha"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $matricula["Matricula"]["idmatricula"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $matricula["Matricula"]["idmatricula"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Eliminar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>
<?php $this->start("despues"); ?>
<?php echo $this->element('sql_dump'); ?>
<?php $this->end(); ?>