<!-- File: /app/View/Grados/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Grado");
    $this->assign("accion1", "Crear Grado");
    $this->assign("accion2", "Detalle de Grado");
    $this->assign("accion3", "Administar Grados");
    $this->assign("id", $this->request->data["Grado"]["idgrado"]);
        
    $this->Html->addCrumb('Grados', '/Grados');
    $this->Html->addCrumb('Editar', '/Grados/edit');
    
?>
<dl class="dl-horizontal">
    <dt>Año Lectivo</dt>
    <dd><?php echo $this->request->data["Aniolectivo"]["descripcion"]; ?></dd>
</dl>
<?php 
    echo $this->Form->create("Grado", array("class" => "form-vertical"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "autofocus" => "autofocus"
    ));   
    echo $this->Form->input("capacidad", array(
        "label" => "Capacidad"
    ));
    echo $this->Form->input("idnivel", array(
        "label" => "Nivel",
        "options" => $niveles,
        "empty" => "Selecciona Uno"
    ));
    echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>