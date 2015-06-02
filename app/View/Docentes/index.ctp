<!-- File: /app/View/Docentes/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Docentes");
    $this->assign("accion", "Crear Docente");
    
    $this->Html->addCrumb('Docentes', '/Docentes');
    $this->Html->addCrumb('Adiministrar', '/Docentes/index');
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("iddocente", "ID Docente <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("nombreCompleto", "Nombre Completo <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("especialidad", "Especialidad <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3"><?php echo $this->Paginator->sort("dni", "DNI <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c4">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($docentes as $docente) {
        echo $this->Html->tableCells(
            array(
                $docente["Docente"]["iddocente"],
                $docente["Docente"]["nombreCompleto"],
                $docente["Docente"]["especialidad"],
                $docente["Docente"]["dni"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $docente["Docente"]["iddocente"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $docente["Docente"]["iddocente"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $docente["Docente"]["iddocente"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Eliminar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>