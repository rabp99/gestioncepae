<!-- File: /app/View/Notas/index.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Administrar Notas");  
    
    $this->Html->addCrumb('Notas', '/Notas');
    $this->Html->addCrumb('Administrar', '/Notas/index');
?>