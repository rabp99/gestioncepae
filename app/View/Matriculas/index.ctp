<!-- File: /app/View/Matriculas/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Matriculas");
    $this->assign("accion", "Crear Matricula");
    
    $this->Html->addCrumb('Matriculas', '/Matriculas');
    $this->Html->addCrumb('Adiministrar', '/Matriculas/index');
?>
