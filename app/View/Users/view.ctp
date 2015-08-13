<!-- File: /app/View/Users/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Usuario");
    $this->assign("accion1", "Crear Usuario");
    $this->assign("accion2", "Editar Usuario");
    $this->assign("accion3", "Administar Usuario");
    $this->assign("accion4", "Deshabilitar Usuario");
    $this->assign("id", $user["User"]["iduser"]);    
    
    $this->Html->addCrumb("Users", "/Users");
    $this->Html->addCrumb("Detalle", "/Users/view");
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $user["User"]["iduser"]; ?></dd>
    <dt>Nombre de Usuario</dt>
    <dd><?php echo $user["User"]["username"]; ?></dd>
    <dt>Grupo</dt>
    <dd><?php echo $user["Group"]["descripcion"]; ?></dd>
</dl>