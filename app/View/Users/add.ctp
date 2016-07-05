<!-- File: /app/View/Users/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Usuario");
    $this->assign("accion", "Administrar Usuarios");
    
    $this->Html->addCrumb("Usuarios", "/Users");
    $this->Html->addCrumb('Crear', '/Users/add');
?>
<?php 
    echo $this->Form->create("User", array("class" => "form-vertical", "autocomplete" => "off"));
    $this->Form->inputDefaults(array("class" => "span4"));
    echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
    echo $this->Form->input("username", array(
        "label" => "Username",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input("pswd", array(
        "label" => "Password",
    ));
    echo $this->Form->input("idgroup", array(
        "label" => "Grupos",
        "options" => $groups,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>