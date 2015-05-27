<!-- File: /app/View/Alumnos/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Alumno");
    $this->assign("accion", "Administrar Alumnos");
    
    $this->Html->addCrumb('Alumnos', '/Alumnos');
    $this->Html->addCrumb('Crear', '/Alumnos/add');
    
?>                   
<div class="inpanel tabs-above" id="yw0">
    <ul id="yw1" class="nav nav-tabs">
        <li>
            <a data-toggle="tab" href="#yw0_tab_1"><span class="modernpics">8</span> Padres y Apoderado</a>
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
                <?php 
                    echo $this->Form->input("seguro", array(
                        "label" => "Seguro"
                    ));
                    echo $this->Form->input("aseguradora", array(
                        "label" => "Aseguradora"
                    ));
                    echo $this->Form->input("lugarAten", array(
                        "label" => "Lugar de Atención"
                    ));
                    echo $this->Form->input("alergias", array(
                        "label" => "Alergias"
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
                    echo $this->Form->textarea("notivos", array(
                        "rows" => 10,
                        "cols" => 30,
                    ));    
                    echo $this->Form->input("recomendado", array(
                        "label" => "Recomendado"
                    ));
                ?>
                </div>
            </div> 
            <div id="yw0_tab_1" class="tab-pane fade">
                <div class="info-panel">
                    <fieldset>
                        <legend>Padre</legend>
                        <?php 
                            echo $this->Form->input("Padre.nombres", array(
                                "label" => "Nombres",
                                "autofocus" => "autofocus"
                            ));  
                            echo $this->Form->input("Padre.apellidoPaterno", array(
                                "label" => "Apellido Paterno"
                            ));  
                            echo $this->Form->input("Padre.apellidoMaterno", array(
                                "label" => "Apellido Materno"
                            ));
                            echo $this->Form->input("Padre.sexo", array(
                                "label" => "Sexo"
                            ));
                            echo $this->Form->input("Padre.fechaNac", array(
                                "label" => "Fecha de Nacimiento"
                            ));
                        ?>
                    </fieldset>
                    <fieldset>
                        <legend>Madre</legend>
                        <?php 
                            echo $this->Form->input("Padre.nombres", array(
                                "label" => "Nombres",
                                "autofocus" => "autofocus"
                            ));  
                            echo $this->Form->input("Padre.apellidoPaterno", array(
                                "label" => "Apellido Paterno"
                            ));  
                            echo $this->Form->input("Padre.apellidoMaterno", array(
                                "label" => "Apellido Materno"
                            ));
                            echo $this->Form->input("Padre.sexo", array(
                                "label" => "Sexo"
                            ));
                            echo $this->Form->input("Padre.fechaNac", array(
                                "label" => "Fecha de Nacimiento"
                            ));
                        ?>
                    </fieldset>
                    <fieldset>
                        <legend>Apoderado</legend>
                        <?php 
                            echo $this->Form->input("Padre.nombres", array(
                                "label" => "Nombres",
                                "autofocus" => "autofocus"
                            ));  
                            echo $this->Form->input("Padre.apellidoPaterno", array(
                                "label" => "Apellido Paterno"
                            ));  
                            echo $this->Form->input("Padre.apellidoMaterno", array(
                                "label" => "Apellido Materno"
                            ));
                            echo $this->Form->input("Padre.sexo", array(
                                "label" => "Sexo"
                            ));
                            echo $this->Form->input("Padre.fechaNac", array(
                                "label" => "Fecha de Nacimiento"
                            ));
                        ?>
                    </fieldset>
                </div>
            </div> 
        <?php   
            echo $this->Form->button("Crear", array("class" => "btn btn-primary btn-large"));
            echo $this->Form->end();
        ?>
    </div>
</div> 
