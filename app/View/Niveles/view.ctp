<!-- File: /app/View/Niveles/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Nivel");
    $this->assign("accion1", "Crear Nivel");
    $this->assign("accion2", "Editar Nivel");
    $this->assign("accion3", "Administar Niveles");
    $this->assign("accion4", "Eliminar Nivel");
    $this->assign("id", $nivel["Nivel"]["idnivel"]);    
    
    $this->Html->addCrumb('Niveles', '/Niveles');
    $this->Html->addCrumb('Detalle', '/Niveles/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $nivel["Nivel"]["idnivel"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $nivel["Nivel"]["descripcion"]; ?></dd>
</dl>