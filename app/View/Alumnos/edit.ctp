<!-- File: /app/View/Alumnos/edit.ctp -->
<?php 
    $this->extend("/Common/edit");
    $this->assign("titulo", "Editar Alumno");
    $this->assign("accion1", "Crear Alumno");
    $this->assign("accion2", "Detalle de Alumno");
    $this->assign("accion3", "Administar Alumno");
    $this->assign("id", $this->request->data["Alumno"]["idalumno"]);
        
    $this->Html->addCrumb('Alumnos', '/Alumnos');
    $this->Html->addCrumb('Editar', '/Alumnos/edit');
    
?>
<div class="inpanel tabs-above" id="yw0">
    <ul id="yw1" class="nav nav-tabs">
        <li>
            <a data-toggle="tab" href="#yw0_tab_1"><span class="modernpics">8</span> Padres de Familia</a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw0_tab_2"><span class="modernpics">8</span> Otros</a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw0_tab_3"><span class="modernpics">6</span> Salud</a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw0_tab_4"><span class="modernpics">7</span> Dirección y Contacto</a>
        </li>
        <li class="active">
            <a data-toggle="tab" href="#yw0_tab_5"><span class="modernpics">7</span> Información General</a>
        </li>
    </ul>
    <div class="tab-content">
        <?php 
            echo $this->Form->create("Alumno", array("class" => "form-vertical"));  
            $this->Form->inputDefaults(array("class" => "span4"));
            echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");          
        ?>
            <div id="yw0_tab_5" class="tab-pane fade active in">
                <div class="info-panel">
                <?php 
                    echo $this->Form->input("idalumno", array(
                        "type" => "hidden"
                    ));  
                    echo $this->Form->input("nombres", array(
                        "label" => "Nombres",
                        "autofocus" => "autofocus"
                    ));  
                    echo $this->Form->input("apellidoPaterno", array(
                        "label" => "Apellido Paterno"
                    ));  
                    echo $this->Form->input("apellidoMaterno", array(
                        "label" => "Apellido Materno"
                    ));
                    echo $this->Form->input("sexo", array(
                        "label" => "Sexo",
                        "options" => array("M" => "Masculino", "F" => "Femenino"),
                        "empty" => "Seleccionar uno"
                    ));
                    echo $this->Form->input("fechaNac", array(
                        "label" => "Fecha de Nacimiento"
                    ));
                    echo $this->Form->input("lugarNac", array(
                        "label" => "Lugar de Nacimiento"
                    ));
                ?>
                </div>
            </div>
            <div id="yw0_tab_4" class="tab-pane fade">
                <div class="info-panel">
                <?php 
                    echo $this->Form->input("direccion", array(
                        "label" => "Dirección"
                    ));
                    echo $this->Form->input("telefono", array(
                        "label" => "Teléfono"
                    ));
                    echo $this->Form->input("email", array(
                        "label" => "Email"
                    ));
                ?>
                </div>
            </div>
            <div id="yw0_tab_3" class="tab-pane fade">
                <div class="info-panel">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <?php echo $this->Form->label("seguro", 
                                    $this->Form->input("seguro", array(
                                        "type" => "checkbox",
                                        "div" => false,
                                        "class" => false,
                                        "label" => false
                                    )) . "Seguro"); 
                                ?>
                            </div>
                        </div>
                    </div>
                <?php 
                    echo $this->Form->input("aseguradora", array(
                        "label" => "Aseguradora"
                    ));
                    echo $this->Form->input("lugarAten", array(
                        "label" => "Lugar de Atención"
                    ));
                    echo $this->Form->label("alergias", "Alergias");
                    echo $this->Form->textarea("alergias", array(
                        "rows" => 10,
                        "cols" => 30,
                    ));    
                ?>
                </div>
            </div> 
            <div id="yw0_tab_2" class="tab-pane fade">
                <div class="info-panel">
                <?php 
                    echo $this->Form->input("colegioProc", array(
                        "label" => "Colegio de Procedencia"
                    ));
                    echo $this->Form->label("motivos", "Motivos");
                    echo $this->Form->input("recomendado", array(
                        "label" => "Recomendado"
                    ));
                    echo $this->Form->input("recomendado", array(
                        "label" => "Recomendado"
                    ));
                    echo $this->Form->textarea("motivos", array(
                        "rows" => 10,
                        "cols" => 30,
                    ));    
                ?>
                </div>
            </div> 
            <div id="yw0_tab_1" class="tab-pane fade">
                <div class="info-panel">
                    <fieldset>
                        <legend>Padre</legend>
                        <?php 
                            echo $this->Form->input("Padre.0.parentesco", array(
                                "type" => "hidden",
                                "value" => "Padre"
                            ));  
                            echo $this->Form->input("Padre.0.idpadre", array(
                                "type" => "hidden"
                            ));  
                            echo $this->Form->input("Padre.0.nombres", array(
                                "label" => "Nombres"
                            ));  
                            echo $this->Form->input("Padre.0.apellidoPaterno", array(
                                "label" => "Apellido Paterno"
                            ));  
                            echo $this->Form->input("Padre.0.apellidoMaterno", array(
                                "label" => "Apellido Materno"
                            ));
                            echo $this->Form->input("Padre.0.dni", array(
                                "label" => "DNI"
                            ));
                            echo $this->Form->input("Padre.0.telefono1", array(
                                "label" => "Teléfono 1"
                            ));
                            echo $this->Form->input("Padre.0.telefono2", array(
                                "label" => "Teléfono 2"
                            ));
                            echo $this->Form->input("Padre.0.fechaNac", array(
                                "label" => "Fecha de Nacimiento"
                            ));
                            echo $this->Form->input("Padre.0.email", array(
                                "label" => "Email"
                            ));
                            echo $this->Form->input("Padre.0.profesion", array(
                                "label" => "Profesión"
                            ));
                            echo $this->Form->input("Padre.0.nivelestudio", array(
                                "label" => "Nivel de Estudio"
                            ));
                            echo $this->Form->input("Padre.0.ocupacion", array(
                                "label" => "Ocupación"
                            ));
                            echo $this->Form->input("Padre.0.condicion", array(
                                "label" => "Condición"
                            ));
                        ?>
                    </fieldset>
                    <fieldset>
                        <legend>Madre</legend>
                        <?php 
                            echo $this->Form->input("Padre.1.parentesco", array(
                                "type" => "hidden",
                                "value" => "Madre"
                            ));  
                            echo $this->Form->input("Padre.1.idpadre", array(
                                "type" => "hidden"
                            ));  
                            echo $this->Form->input("Padre.1.nombres", array(
                                "label" => "Nombres"
                            ));  
                            echo $this->Form->input("Padre.1.apellidoPaterno", array(
                                "label" => "Apellido Paterno"
                            ));  
                            echo $this->Form->input("Padre.1.apellidoMaterno", array(
                                "label" => "Apellido Materno"
                            ));
                            echo $this->Form->input("Padre.1.dni", array(
                                "label" => "DNI"
                            ));
                            echo $this->Form->input("Padre.1.telefono1", array(
                                "label" => "Teléfono 1"
                            ));
                            echo $this->Form->input("Padre.1.telefono2", array(
                                "label" => "Teléfono 2"
                            ));
                            echo $this->Form->input("Padre.1.fechaNac", array(
                                "label" => "Fecha de Nacimiento"
                            ));
                            echo $this->Form->input("Padre.1.email", array(
                                "label" => "Email"
                            ));
                            echo $this->Form->input("Padre.1.profesion", array(
                                "label" => "Profesión"
                            ));
                            echo $this->Form->input("Padre.1.nivelestudio", array(
                                "label" => "Nivel de Estudio"
                            ));
                            echo $this->Form->input("Padre.1.ocupacion", array(
                                "label" => "Ocupación"
                            ));
                            echo $this->Form->input("Padre.1.condicion", array(
                                "label" => "Condición"
                            ));
                        ?>
                    </fieldset>
                    <fieldset>
                        <legend>Apoderado</legend>
                        <?php 
                            echo $this->Form->input("Padre.2.parentesco", array(
                                "type" => "hidden",
                                "value" => "Apoderado"
                            ));  
                            echo $this->Form->input("Padre.2.idpadre", array(
                                "type" => "hidden"
                            ));  
                            echo $this->Form->input("Padre.2.nombres", array(
                                "label" => "Nombres"
                            ));  
                            echo $this->Form->input("Padre.2.apellidoPaterno", array(
                                "label" => "Apellido Paterno"
                            ));  
                            echo $this->Form->input("Padre.2.apellidoMaterno", array(
                                "label" => "Apellido Materno"
                            ));
                            echo $this->Form->input("Padre.2.dni", array(
                                "label" => "DNI"
                            ));
                            echo $this->Form->input("Padre.2.telefono1", array(
                                "label" => "Teléfono 1"
                            ));
                            echo $this->Form->input("Padre.2.telefono2", array(
                                "label" => "Teléfono 2"
                            ));
                            echo $this->Form->input("Padre.2.fechaNac", array(
                                "label" => "Fecha de Nacimiento"
                            ));
                            echo $this->Form->input("Padre.2.email", array(
                                "label" => "Email"
                            ));
                            echo $this->Form->input("Padre.2.profesion", array(
                                "label" => "Profesión"
                            ));
                            echo $this->Form->input("Padre.2.nivelestudio", array(
                                "label" => "Nivel de Estudio"
                            ));
                            echo $this->Form->input("Padre.2.ocupacion", array(
                                "label" => "Ocupación"
                            ));
                            echo $this->Form->input("Padre.2.condicion", array(
                                "label" => "Condición"
                            ));
                        ?>
                    </fieldset>
                </div>
            </div> 
        <?php   
            echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
            echo $this->Form->end();
        ?>
    </div>
</div>