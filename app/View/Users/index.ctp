<!-- File: /app/View/Users/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Usuarios");
    $this->assign("accion", "Crear Usuario");
    
    $this->Html->addCrumb("Usuarios", "/Usuarios");
    $this->Html->addCrumb('Adiministrar', '/Usuarios/index');
?>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("iduser", "Código <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("username", "Nombre de Usuario <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2"><?php echo $this->Paginator->sort("idgroup", "Grupo <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) { 
        echo $this->Html->tableCells(
            array(
                $user["User"]["iduser"],
                $user["User"]["username"],
                $user["Group"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $user["User"]["iduser"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "edit", $user["User"]["iduser"]), array("escape" => false, "title" => "Editar", "rel" => "tooltip")) . " " .
                $this->Form->postLink("<i class='icon-trash'></i>", array("action" => "delete", $user["User"]["iduser"]), array("confirm" => "¿Estás seguro?", "escape" => false, "title" => "Deshabilitar"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>