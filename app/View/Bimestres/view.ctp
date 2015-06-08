<!-- File: /app/View/Bimestres/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Bimestre");
    $this->assign("accion1", "Crear Bimestre");
    $this->assign("accion2", "Editar Bimestre");
    $this->assign("accion3", "Administar Bimestres");
    $this->assign("accion4", "Deshabilitar Bimestre");
    $this->assign("id", $bimestre["Bimestre"]["idbimestre"]);    
    
    $this->Html->addCrumb('Bimestres', '/Bimestres');
    $this->Html->addCrumb('Detalle', '/Bimestres/view');
?>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $bimestre["Bimestre"]["idbimestre"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $bimestre["Bimestre"]["descripcion"]; ?></dd>
</dl>