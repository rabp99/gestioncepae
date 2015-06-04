<!-- File: /app/View/Alumnos/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Alumno");
    $this->assign("accion", "Crear Alumno");
    
    $this->Html->addCrumb('Alumnos', '/Alumnos');
    $this->Html->addCrumb('Adiministrar', '/Alumnos/index');
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idalumno", "ID Alumno <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("nombreCompleto", "Nombre Completo <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("fechaNac", "Fecha de Nacimiento <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($alumnos as $alumno) {
        echo $this->Html->tableCells(
            array(
                $alumno["Alumno"]["idalumno"],
                $alumno["Alumno"]["nombreCompleto"],
                $alumno["Alumno"]["fechaNac"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $alumno["Alumno"]["idalumno"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $alumno["Alumno"]["idalumno"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $alumno["Alumno"]["idalumno"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>