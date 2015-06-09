<!-- File: /app/View/Asignaciones/registrar.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Asignar Docente");
    
    $this->Html->addCrumb('Asignaciones', '/Asignaciones');
    $this->Html->addCrumb('Registrar', '/Asignaciones/registrar');
?>