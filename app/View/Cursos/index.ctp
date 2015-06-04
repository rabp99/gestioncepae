<!-- File: /app/View/Cursos/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Cursos");
    $this->assign("accion", "Crear Curso");
    
    $this->Html->addCrumb('Cursos', '/Cursos');
    $this->Html->addCrumb('Adiministrar', '/Cursos/index');
?>
<dl class="dl-horizontal">
    <dt>Año Lectivo</dt>
    <dd><?php echo isset($aniolectivo["Aniolectivo"]["descripcion"]) ? $aniolectivo["Aniolectivo"]["descripcion"] : "Ningún Año Lectivo habilitado"; ?></dd>
</dl>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idcurso", "ID Curso <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3"><?php echo $this->Paginator->sort("Area.descripcion", "Área <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c4"><?php echo $this->Paginator->sort("Grado.descripcion", "Grado <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c5"><?php echo $this->Paginator->sort("Grado.idnivel", "Nivel <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c6">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($cursos as $curso) {
        echo $this->Html->tableCells(
            array(
                $curso["Curso"]["idcurso"],
                $curso["Curso"]["descripcion"],
                $curso["Area"]["descripcion"],
                $curso["Grado"]["descripcion"],
                $curso["Grado"]["Nivel"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $curso["Curso"]["idcurso"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $curso["Curso"]["idcurso"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $curso["Curso"]["idcurso"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>