<!-- File: /app/View/Alumnos/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Alumno");
    $this->assign("accion1", "Crear Alumno");
    $this->assign("accion2", "Editar Alumno");
    $this->assign("accion3", "Administar Alumnos");
    $this->assign("accion4", "Eliminar Alumno");
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
                    <dt>Motivos</dt>
                    <dd><p><?php echo $alumno["Alumno"]["motivos"]; ?></p></dd>
                </dl>
            </div>
        </div> 
        <div id="yw0_tab_1" class="tab-pane fade">
            <div class="info-panel">
                <fieldset>
                    <legend>Padre</legend>       
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?php echo $alumno["Padre"][0]["idpadre"]; ?></dd>
                        <dt>Nombre Completo</dt>
                        <dd><?php echo $alumno["Padre"][0]["nombreCompleto"]; ?></dd>
                        <dt>DNI</dt>
                        <dd><?php echo $alumno["Padre"][0]["dni"]; ?></dd>
                        <dt>Teléfono 1</dt>
                        <dd><?php echo $alumno["Padre"][0]["telefono1"]; ?></dd>
                        <dt>Teléfono 2</dt>
                        <dd><?php echo $alumno["Padre"][0]["telefono2"]; ?></dd>
                        <dt>Fecha de Nacimiento</dt>
                        <dd><?php echo $alumno["Padre"][0]["fechaNac"]; ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo $alumno["Padre"][0]["email"]; ?></dd>
                        <dt>Profesión</dt>
                        <dd><?php echo $alumno["Padre"][0]["profesion"]; ?></dd>
                        <dt>Nivel de Estudio</dt>
                        <dd><?php echo $alumno["Padre"][0]["nivelestudio"]; ?></dd>
                        <dt>Ocupación</dt>
                        <dd><?php echo $alumno["Padre"][0]["ocupacion"]; ?></dd>
                    </dl>
                </fieldset>
                <fieldset>
                    <legend>Madre</legend>
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?php echo $alumno["Padre"][1]["idpadre"]; ?></dd>
                        <dt>Nombre Completo</dt>
                        <dd><?php echo $alumno["Padre"][1]["nombreCompleto"]; ?></dd>
                        <dt>DNI</dt>
                        <dd><?php echo $alumno["Padre"][1]["dni"]; ?></dd>
                        <dt>Teléfono 1</dt>
                        <dd><?php echo $alumno["Padre"][1]["telefono1"]; ?></dd>
                        <dt>Teléfono 2</dt>
                        <dd><?php echo $alumno["Padre"][1]["telefono2"]; ?></dd>
                        <dt>Fecha de Nacimiento</dt>
                        <dd><?php echo $alumno["Padre"][1]["fechaNac"]; ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo $alumno["Padre"][1]["email"]; ?></dd>
                        <dt>Profesión</dt>
                        <dd><?php echo $alumno["Padre"][1]["profesion"]; ?></dd>
                        <dt>Nivel de Estudio</dt>
                        <dd><?php echo $alumno["Padre"][1]["nivelestudio"]; ?></dd>
                        <dt>Ocupación</dt>
                        <dd><?php echo $alumno["Padre"][1]["ocupacion"]; ?></dd>
                    </dl>
                </fieldset>
                <fieldset>
                    <legend>Apoderado</legend>
                    <dl class="dl-horizontal">
                        <dt>Código</dt>
                        <dd><?php echo $alumno["Padre"][2]["idpadre"]; ?></dd>
                        <dt>Nombre Completo</dt>
                        <dd><?php echo $alumno["Padre"][2]["nombreCompleto"]; ?></dd>
                        <dt>DNI</dt>
                        <dd><?php echo $alumno["Padre"][2]["dni"]; ?></dd>
                        <dt>Teléfono 1</dt>
                        <dd><?php echo $alumno["Padre"][2]["telefono1"]; ?></dd>
                        <dt>Teléfono 2</dt>
                        <dd><?php echo $alumno["Padre"][2]["telefono2"]; ?></dd>
                        <dt>Fecha de Nacimiento</dt>
                        <dd><?php echo $alumno["Padre"][2]["fechaNac"]; ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo $alumno["Padre"][2]["email"]; ?></dd>
                        <dt>Profesión</dt>
                        <dd><?php echo $alumno["Padre"][2]["profesion"]; ?></dd>
                        <dt>Nivel de Estudio</dt>
                        <dd><?php echo $alumno["Padre"][2]["nivelestudio"]; ?></dd>
                        <dt>Ocupación</dt>
                        <dd><?php echo $alumno["Padre"][2]["ocupacion"]; ?></dd>
                    </dl>
                </fieldset>
            </div>
        </div> 
    </div>
</div>