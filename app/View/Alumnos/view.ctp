<!-- File: /app/View/Alumnos/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Alumno");
    $this->assign("accion1", "Crear Alumno");
    $this->assign("accion2", "Editar Alumno");
    $this->assign("accion3", "Administar Alumnos");
    $this->assign("accion4", "Deshabilitar Alumno");
    $this->assign("id", $alumno["Alumno"]["idalumno"]);    
    
    $this->Html->addCrumb('Alumnos', '/Alumnos');
    $this->Html->addCrumb('Detalle', '/Alumnos/view');
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
        <div id="yw0_tab_5" class="tab-pane fade active in">
            <div class="info-panel">
                <dl class="dl-horizontal">
                    <dt>Código</dt>
                    <dd><?php echo $alumno["Alumno"]["idalumno"]; ?></dd>
                    <dt>Nombre Completo</dt>
                    <dd><?php echo $alumno["Alumno"]["nombreCompleto"]; ?></dd>
                    <dt>Sexo</dt>
                    <dd><?php echo $alumno["Alumno"]["sexo"] = "M" ? "Masculino" : "Femenino"; ?></dd>
                    <dt>Fecha de Nacimiento</dt>
                    <dd><?php echo $alumno["Alumno"]["fechaNac"]; ?></dd>
                    <dt>Lugar de Nacimiento</dt>
                    <dd><?php echo $alumno["Alumno"]["lugarNac"]; ?></dd>
                </dl>
            </div>
        </div>
        <div id="yw0_tab_4" class="tab-pane fade">
            <div class="info-panel">      
                <dl class="dl-horizontal">
                    <dt>Dirección</dt>
                    <dd><?php echo $alumno["Alumno"]["direccion"]; ?></dd>
                    <dt>Teléfono</dt>
                    <dd><?php echo $alumno["Alumno"]["telefono"]; ?></dd>
                    <dt>Email</dt>
                    <dd><?php echo $alumno["Alumno"]["email"]; ?></dd>
                </dl>
            </div>
        </div>
        <div id="yw0_tab_3" class="tab-pane fade">
            <div class="info-panel">            
                <dl class="dl-horizontal">
                    <dt>Seguro</dt>
                    <dd><?php echo $alumno["Alumno"]["seguro"] ? "Sí" : "No"; ?></dd>
                    <dt>Aseguradora</dt>
                    <dd><?php echo $alumno["Alumno"]["aseguradora"]; ?></dd>
                    <dt>Lugar de Atención</dt>
                    <dd><?php echo $alumno["Alumno"]["lugarAten"]; ?></dd>
                    <dt>Alergias</dt>
                    <dd><p><?php echo $alumno["Alumno"]["alergias"]; ?></p></dd>
            </div>
        </div> 
        <div id="yw0_tab_2" class="tab-pane fade">
            <div class="info-panel">        
                <dl class="dl-horizontal">
                    <dt>Colegio de Procedencia</dt>
                    <dd><?php echo $alumno["Alumno"]["colegioProc"]; ?></dd>
                    <dt>Recomendado</dt>
                    <dd><?php echo $alumno["Alumno"]["recomendado"]; ?></dd>
                    <dt>Observaciones</dt>
                    <dd><p><?php echo $alumno["Alumno"]["observaciones"]; ?></p></dd>
                </dl>
            </div>
        </div> 
        <div id="yw0_tab_1" class="tab-pane fade">
            <div class="info-panel">
                <?php
                    $apoderado = null;
                    foreach($alumno["AlumnosPadre"] as $alumno_padre) {
                        if($alumno_padre["apoderado"] == 1) {
                            $apoderado = $alumno_padre["parentesco"];
                        }
                    }
                ?>
                <dl class="dl-horizontal">
                    <dt>Apoderado</dt>
                    <dd><?php echo $apoderado; ?></dd>
                </dl>
                <fieldset>
                    <?php
                        $padre = null;
                        foreach($alumno["AlumnosPadre"] as $alumno_padre) {
                            if($alumno_padre["parentesco"] == "Padre") {
                                $padre = $alumno_padre["Padre"];
                            }
                        }
                    ?>
                    <legend>Padre</legend>
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?php echo !empty($padre["idpadre"]) ? $padre["idpadre"] : "..."; ?></dd>
                        <dt>Nombre Completo</dt>
                        <dd><?php echo !empty($padre["nombreCompleto"]) ? $padre["nombreCompleto"] : "..."; ?></dd>
                        <dt>DNI</dt>
                        <dd><?php echo !empty($padre["dni"]) ? $padre["dni"] : ""; ?></dd>
                        <dt>Teléfono 1</dt>
                        <dd><?php echo !empty($padre["telefono1"]) ? $padre["telefono1"] : "..."; ?></dd>
                        <dt>Teléfono 2</dt>
                        <dd><?php echo !empty($padre["telefono2"]) ? $padre["telefono2"] : "..."; ?></dd>
                        <dt>Fecha de Nacimiento</dt>
                        <dd><?php echo !empty($padre["fechaNac"]) ? $padre["fechaNac"] : "..."; ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo !empty($padre["email"]) ? $padre["email"] : "..."; ?></dd>
                        <dt>Profesión</dt>
                        <dd><?php echo !empty($padre["profesion"]) ? $padre["profesion"] : "..."; ?></dd>
                        <dt>Nivel de Estudio</dt>
                        <dd><?php echo !empty($padre["nivelestudio"]) ? $padre["nivelestudio"] : "..."; ?></dd>
                        <dt>Ocupación</dt>
                        <dd><?php echo !empty($padre["ocupacion"]) ? $padre["ocupacion"] : "..."; ?></dd>
                    </dl>
                </fieldset>
                <fieldset>
                    <?php
                        $madre = null;
                        foreach($alumno["AlumnosPadre"] as $alumno_padre) {
                            if($alumno_padre["parentesco"] == "Madre") {
                                $madre = $alumno_padre["Padre"];
                            }
                        }
                    ?>
                    <legend>Madre</legend>
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?php echo !empty($madre["idpadre"]) ? $madre["idpadre"] : "..."; ?></dd>
                        <dt>Nombre Completo</dt>
                        <dd><?php echo !empty($madre["nombreCompleto"]) ? $madre["nombreCompleto"] : "..."; ?></dd>
                        <dt>DNI</dt>
                        <dd><?php echo !empty($madre["dni"]) ? $madre["dni"] : ""; ?></dd>
                        <dt>Teléfono 1</dt>
                        <dd><?php echo !empty($madre["telefono1"]) ? $madre["telefono1"] : "..."; ?></dd>
                        <dt>Teléfono 2</dt>
                        <dd><?php echo !empty($madre["telefono2"]) ? $madre["telefono2"] : "..."; ?></dd>
                        <dt>Fecha de Nacimiento</dt>
                        <dd><?php echo !empty($madre["fechaNac"]) ? $madre["fechaNac"] : "..."; ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo !empty($madre["email"]) ? $madre["email"] : "..."; ?></dd>
                        <dt>Profesión</dt>
                        <dd><?php echo !empty($madre["profesion"]) ? $madre["profesion"] : "..."; ?></dd>
                        <dt>Nivel de Estudio</dt>
                        <dd><?php echo !empty($madre["nivelestudio"]) ? $madre["nivelestudio"] : "..."; ?></dd>
                        <dt>Ocupación</dt>
                        <dd><?php echo !empty($madre["ocupacion"]) ? $madre["ocupacion"] : "..."; ?></dd>
                    </dl>
                </fieldset>
                <fieldset>
                    <?php
                        $otro = null;
                        foreach($alumno["AlumnosPadre"] as $alumno_padre) {
                            if($alumno_padre["parentesco"] == "Otro") {
                                $otro = $alumno_padre["Padre"];
                            }
                        }
                    ?>
                    <legend>Otro</legend>
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?php echo !empty($otro["idpadre"]) ? $otro["idpadre"] : "..."; ?></dd>
                        <dt>Nombre Completo</dt>
                        <dd><?php echo !empty($otro["nombreCompleto"]) ? $otro["nombreCompleto"] : "..."; ?></dd>
                        <dt>DNI</dt>
                        <dd><?php echo !empty($otro["dni"]) ? $otro["dni"] : ""; ?></dd>
                        <dt>Teléfono 1</dt>
                        <dd><?php echo !empty($otro["telefono1"]) ? $otro["telefono1"] : "..."; ?></dd>
                        <dt>Teléfono 2</dt>
                        <dd><?php echo !empty($otro["telefono2"]) ? $otro["telefono2"] : "..."; ?></dd>
                        <dt>Fecha de Nacimiento</dt>
                        <dd><?php echo !empty($otro["fechaNac"]) ? $otro["fechaNac"] : "..."; ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo !empty($otro["email"]) ? $otro["email"] : "..."; ?></dd>
                        <dt>Profesión</dt>
                        <dd><?php echo !empty($otro["profesion"]) ? $otro["profesion"] : "..."; ?></dd>
                        <dt>Nivel de Estudio</dt>
                        <dd><?php echo !empty($otro["nivelestudio"]) ? $otro["nivelestudio"] : "..."; ?></dd>
                        <dt>Ocupación</dt>
                        <dd><?php echo !empty($otro["ocupacion"]) ? $otro["ocupacion"] : "..."; ?></dd>
                    </dl>
                </fieldset>
            </div>
        </div> 
    </div>
</div>