<!-- File: /app/View/Alumnos/add.ctp -->
<?php 
    $this->extend("/Common/add");
    $this->assign("titulo", "Crear Alumno");
    $this->assign("accion", "Administrar Alumnos");
    
    $this->Html->addCrumb('Alumnos', '/Alumnos');
    $this->Html->addCrumb('Crear', '/Alumnos/add');
    
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
?>
<div class="inpanel tabs-above" id="yw0">
    <ul id="yw1" class="nav nav-tabs">
        <li>
            <a id="lnkPadresFamilia" data-toggle="tab" href="#yw0_tab_1"><span class="modernpics">g</span> Padres de Familia</a>
        </li>
        <li>
            <a id="lnkOtros"  data-toggle="tab" href="#yw0_tab_2"><span class="modernpics">~</span> Otros</a>
        </li>
        <li>
            <a id="lnkSalud"  data-toggle="tab" href="#yw0_tab_3"><span class="modernpics">j</span> Salud</a>
        </li>
        <li>
            <a id="lnkDireccionContacto"  data-toggle="tab" href="#yw0_tab_4"><span class="modernpics">c</span> Dirección y Contacto</a>
        </li>
        <li class="active">
            <a id="lnkInformacionGeneral"  data-toggle="tab" href="#yw0_tab_5"><span class="modernpics">Z</span> Información General</a>
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
                        "label" => "Fecha de Nacimiento <span style='color: #999'>(AAAA-MM-DD)</span>",
                        "type" => "text"
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
                    echo $this->Form->input("idaseguradora", array(
                        "label" => "Aseguradora",
                        "disabled" => true,
                        "options" => $aseguradoras,
                        "empty" => "Selecciona una Aseguradora"
                    ));
                    echo $this->Form->input("lugarAten", array(
                        "label" => "Lugar de Atención"
                    ));
                    echo $this->Form->label("alergias", "Alergias");
                    echo $this->Form->textarea("alergias", array(
                        "rows" => 10,
                        "cols" => 30,
                        "class" => "span4"
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
                    echo $this->Form->input("recomendado", array(
                        "label" => "Recomendado"
                    ));
                    echo $this->Form->label("observaciones", "Observaciones");
                    echo $this->Form->textarea("observaciones", array(
                        "rows" => 10,
                        "cols" => 30,
                        "class" => "span4"
                    ));
                    echo $this->Form->input("User.username", array(
                        "label" => "Nombre de Usuario",
                        "type" => "hidden"
                    ));
                    echo $this->Form->input("User.password", array(
                        "label" => "Password",
                        "type" => "hidden"
                    ));
                    echo $this->Form->input("User.idgroup", array(
                        "label" => "Password",
                        "div" => "formField",
                        "type" => "hidden",
                        "value" => "2"
                    ));
                ?>
                </div>
            </div> 
            <div id="yw0_tab_1" class="tab-pane fade">
                <div class="info-panel">
                    <fieldset id="Padre0">
                        <legend>Padre</legend>
                        <?php 
                            echo $this->Form->input("Padre.0.parentesco", array(
                                "type" => "hidden",
                                "value" => "Padre"
                            ));  
                            echo $this->Form->input("Padre.0.apoderado", array(
                                "type" => "hidden",
                                "value" => "0"
                            ));  
                            echo $this->Form->input("Padre.0.dni", array(
                                "label" => "DNI"
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
                            echo $this->Form->input("Padre.0.telefono1", array(
                                "label" => "Teléfono 1"
                            ));
                            echo $this->Form->input("Padre.0.telefono2", array(
                                "label" => "Teléfono 2"
                            ));
                            echo $this->Form->input("Padre.0.fechaNac", array(
                                "label" => "Fecha de Nacimiento <span style='color: #999'>(AAAA-MM-DD)</span>",
                                "type" => "text"
                            ));
                            echo $this->Form->input("Padre.0.email", array(
                                "label" => "Email"
                            ));
                            echo $this->Form->input("Padre.0.profesion", array(
                                "label" => "Profesión"
                            ));
                            echo $this->Form->input("Padre.0.nivelestudio", array(
                                "label" => "Nivel de Estudio",
                                "options" => array("Sin estudios" => "Sin estudios", "Primaria" => "Pimaria", "Secundaria" => "Secundaria", "Profesional" => "Profesional"),
                                "empty" => "Selecciona uno"
                            ));
                            echo $this->Form->input("Padre.0.ocupacion", array(
                                "label" => "Ocupación"
                            ));
                        ?>
                    </fieldset>
                    <fieldset id="Padre1">
                        <legend>Madre</legend>
                        <?php 
                            echo $this->Form->input("Padre.1.parentesco", array(
                                "type" => "hidden",
                                "value" => "Madre"
                            ));  
                            echo $this->Form->input("Padre.1.apoderado", array(
                                "type" => "hidden",
                                "value" => "0"
                            ));  
                            echo $this->Form->input("Padre.1.dni", array(
                                "label" => "DNI"
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
                            echo $this->Form->input("Padre.1.telefono1", array(
                                "label" => "Teléfono 1"
                            ));
                            echo $this->Form->input("Padre.1.telefono2", array(
                                "label" => "Teléfono 2"
                            ));
                            echo $this->Form->input("Padre.1.fechaNac", array(
                                "label" => "Fecha de Nacimiento <span style='color: #999'>(AAAA-MM-DD)</span>",
                                "type" => "text"
                            ));
                            echo $this->Form->input("Padre.1.email", array(
                                "label" => "Email"
                            ));
                            echo $this->Form->input("Padre.1.profesion", array(
                                "label" => "Profesión"
                            ));
                            echo $this->Form->input("Padre.1.nivelestudio", array(
                                "label" => "Nivel de Estudio",
                                "options" => array("Sin estudios" => "Sin estudios", "Primaria" => "Pimaria", "Secundaria" => "Secundaria", "Profesional" => "Profesional"),
                                "empty" => "Selecciona uno"
                            ));
                            echo $this->Form->input("Padre.1.ocupacion", array(
                                "label" => "Ocupación"
                            ));
                        ?>
                    </fieldset>
                    <?php
                        echo $this->Form->label("Auxiliar.aux", "Apoderado");
                        echo $this->Form->select("Auxiliar.aux", array(
                            "0" => "Padre", "1" => "Madre", "2" => "Otro"
                        ), array(
                            "empty" => "Selecciona Uno",
                            "required" => true
                        ));
                    ?>
                    <fieldset class="otro" id="Padre2">
                    </fieldset>
                </div>
            </div> 
        <?php    
            echo $this->Form->button("Siguiente", array(
                "id" => "btnNext", 
                "type" => "button", 
                "class" => "btn btn-primary btn-large"
            ));
            echo $this->Form->button("Crear", array(
                "id" => "btnCrear", 
                "type" => "submit", 
                "class" => "btn btn-primary btn-large"
            ));
            echo $this->Form->end();
        ?>
    </div>
</div>

<?php 
    $otro = "<legend>Otro</legend>" .
        $this->Form->input("Padre.2.parentesco", array(
            "type" => "hidden",
            "value" => "Otro"
        )) .
        $this->Form->input("Padre.2.apoderado", array(
            "type" => "hidden",
            "value" => "0"
        )) .
        $this->Form->input("Padre.2.dni", array(
            "label" => "DNI"
        )) .
        $this->Form->input("Padre.2.nombres", array(
            "label" => "Nombres"
        )) .
        $this->Form->input("Padre.2.apellidoPaterno", array(
            "label" => "Apellido Paterno"
        )).
        $this->Form->input("Padre.2.apellidoMaterno", array(
            "label" => "Apellido Materno"
        )) .
        $this->Form->input("Padre.2.telefono1", array(
            "label" => "Teléfono 1"
        )) .
        $this->Form->input("Padre.2.telefono2", array(
            "label" => "Teléfono 2"
        )) .
        $this->Form->input("Padre.2.fechaNac", array(
            "label" => "Fecha de Nacimiento <span style='color: #999'>(AAAA-MM-DD)</span>",
            "type" => "text"
        )) .
        $this->Form->input("Padre.2.email", array(
            "label" => "Email"
        )) .
        $this->Form->input("Padre.2.profesion", array(
            "label" => "Profesión"
        )) .
        $this->Form->input("Padre.2.nivelestudio", array(
            "label" => "Nivel de Estudio"
        )) .
        $this->Form->input("Padre.2.ocupacion", array(
            "label" => "Ocupación"
        ));
        
    $this->Js->get("#AuxiliarAux")->event("change", 
        "var apoderado = $(this).val();" .
        "if(apoderado == 2) {" .
        "   $('fieldset.otro').html('" . $otro . "');" .
        "   $('#Padre2Nivelestudio').remove();" .
        "   $('label[for=Padre2Nivelestudio]').parent().append(" .
        "       \"<select name='data[Padre][2][nivelestudio]' class='span4' id='Padre2Nivelestudio'>" .
        "           <option value=''>Selecciona uno</option>" .
        "           <option value='Sin estudios'>Sin estudios</option>" .
        "           <option value='Primaria'>Pimaria</option>" .
        "           <option value='Secundaria'>Secundaria</option>" .
        "           <option value='Profesional'>Profesional</option>" .
        "       </select>\"" .
        "   );" .
        "$(\"#Padre2FechaNac\").datepicker({" .
        "   changeMonth: true," .
        "   changeYear: true," .
        "   dateFormat: \"yy-mm-dd\"".
        "});".
        "}" .
        "else {" .
        "   $('fieldset.otro').html('');" .
        "}"
    );
?>

<?php
    $alumnoSeguroChange = "if($('#AlumnoSeguro_').prop('checked')) $('#AlumnoAseguradora').attr({disabled: false});" .
        "else {" .
        "   $('#AlumnoAseguradora').val('');" .
        "   $('#AlumnoAseguradora').attr({disabled: true});" .
    "}";
    $this->Js->buffer($alumnoSeguroChange);
    $this->Js->get("#AlumnoSeguro")->event("change", $alumnoSeguroChange);
?>

<?php
    $this->Js->get("#Padre0Dni")->event("keyup",
        $this->Js->request(array(
            "controller" => "Alumnos",
            "action" => "getPadre0ByDni"
        ), array(
            "async" => true,
            "method" => 'post',
            "dataExpression" => true,
            "data" => $this->Js->serializeForm(array(
                "isForm" => true,
                "inline" => true
            )),
            "success" =>
            "$('#Padre0Nombres').val('');" .
            "$('#Padre0ApellidoPaterno').val('');" .
            "$('#Padre0ApellidoMaterno').val('');" .
            "$('#Padre0Telefono1').val('');" .
            "$('#Padre0Telefono2').val('');" .
            "$('#Padre0FechaNac').val('');" .
            "$('#Padre0Email').val('');" .
            "$('#Padre0Profesion').val('');" .
            "$('#Padre0Nivelestudio').val('');" .
            "$('#Padre0Ocupacion').val('');" .
            "$('#Padre0Nombres').prop('readonly', false);" .
            "$('#Padre0ApellidoPaterno').prop('readonly', false);" .
            "$('#Padre0ApellidoMaterno').prop('readonly', false);" .
            "$('#Padre0Telefono1').prop('readonly', false);" .
            "$('#Padre0Telefono2').prop('readonly', false);" .
            "$('#Padre0FechaNac').prop('readonly', false);" .
            "$('#Padre0Email').prop('readonly', false);" .
            "$('#Padre0Profesion').prop('readonly', false);" .
            "$('#Padre0Nivelestudio').prop('disabled', false);" .
            "$('#Padre0Ocupacion').prop('readonly', false);" .
            "$('#Padre0idpadre').remove();" . 
            "if(data.length > 2) {" .
            "   var padre = JSON.parse(data);" .
            "   $('#Padre0').append(\"<input type='hidden' id=\'Padre0idpadre\' name=\'data[Padre][0][idpadre]\' value=\'\" + padre.Padre.idpadre + \"\' />\");" .
            "   $('#Padre0Nombres').val(padre.Padre.nombres);" .
            "   $('#Padre0ApellidoPaterno').val(padre.Padre.apellidoPaterno);" .
            "   $('#Padre0ApellidoMaterno').val(padre.Padre.apellidoMaterno);" .
            "   $('#Padre0Telefono1').val(padre.Padre.telefono1);" .
            "   $('#Padre0Telefono2').val(padre.Padre.telefono2);" .
            "   $('#Padre0FechaNac').val(padre.Padre.fechaNac);" .
            "   $('#Padre0Email').val(padre.Padre.email);" .
            "   $('#Padre0Profesion').val(padre.Padre.profesion);" .
            "   $('#Padre0Nivelestudio').val(padre.Padre.nivelestudio);" .
            "   $('#Padre0Ocupacion').val(padre.Padre.ocupacion);" .
            "   $('#Padre0Nombres').prop('readonly', true);" .
            "   $('#Padre0ApellidoPaterno').prop('readonly', true);" .
            "   $('#Padre0ApellidoMaterno').prop('readonly', true);" .
            "   $('#Padre0Telefono1').prop('readonly', true);" .
            "   $('#Padre0Telefono2').prop('readonly', true);" .
            "   $('#Padre0FechaNac').prop('readonly', true);" .
            "   $('#Padre0Email').prop('readonly', true);" .
            "   $('#Padre0Profesion').prop('readonly', true);" .
            "   $('#Padre0Nivelestudio').prop('disabled', true);" .
            "   $('#Padre0Ocupacion').prop('readonly', true);" .
            "}"
        ))  
    );
?>
<?php
    $this->Js->get("#Padre1Dni")->event("keyup",
        $this->Js->request(array(
            "controller" => "Alumnos",
            "action" => "getPadre1ByDni"
        ), array(
            "async" => true,
            "method" => 'post',
            "dataExpression" => true,
            "data" => $this->Js->serializeForm(array(
                "isForm" => true,
                "inline" => true
            )),
            "success" =>
            "$('#Padre1Nombres').val('');" .
            "$('#Padre1ApellidoPaterno').val('');" .
            "$('#Padre1ApellidoMaterno').val('');" .
            "$('#Padre1Telefono1').val('');" .
            "$('#Padre1Telefono2').val('');" .
            "$('#Padre1FechaNac').val('');" .
            "$('#Padre1Email').val('');" .
            "$('#Padre1Profesion').val('');" .
            "$('#Padre1Nivelestudio').val('');" .
            "$('#Padre1Ocupacion').val('');" .
            "$('#Padre1Nombres').prop('readonly', false);" .
            "$('#Padre1ApellidoPaterno').prop('readonly', false);" .
            "$('#Padre1ApellidoMaterno').prop('readonly', false);" .
            "$('#Padre1Telefono1').prop('readonly', false);" .
            "$('#Padre1Telefono2').prop('readonly', false);" .
            "$('#Padre1FechaNac').prop('readonly', false);" .
            "$('#Padre1Email').prop('readonly', false);" .
            "$('#Padre1Profesion').prop('readonly', false);" .
            "$('#Padre1Nivelestudio').prop('disabled', false);" .
            "$('#Padre1Ocupacion').prop('readonly', false);" .
            "$('#Padre1idpadre').remove();" . 
            "if(data.length > 2) {" .
            "   var padre = JSON.parse(data);" .
            "   $('#Padre1').append(\"<input type='hidden' id=\'Padre1idpadre\' name=\'data[Padre][1][idpadre]\' value=\'\" + padre.Padre.idpadre + \"\' />\");" .
            "   $('#Padre1Nombres').val(padre.Padre.nombres);" .
            "   $('#Padre1ApellidoPaterno').val(padre.Padre.apellidoPaterno);" .
            "   $('#Padre1ApellidoMaterno').val(padre.Padre.apellidoMaterno);" .
            "   $('#Padre1Telefono1').val(padre.Padre.telefono1);" .
            "   $('#Padre1Telefono2').val(padre.Padre.telefono2);" .
            "   $('#Padre1FechaNac').val(padre.Padre.fechaNac);" .
            "   $('#Padre1Email').val(padre.Padre.email);" .
            "   $('#Padre1Profesion').val(padre.Padre.profesion);" .
            "   $('#Padre1Nivelestudio').val(padre.Padre.nivelestudio);" .
            "   $('#Padre1Ocupacion').val(padre.Padre.ocupacion);" .
            "   $('#Padre1Nombres').prop('readonly', true);" .
            "   $('#Padre1ApellidoPaterno').prop('readonly', true);" .
            "   $('#Padre1ApellidoMaterno').prop('readonly', true);" .
            "   $('#Padre1Telefono1').prop('readonly', true);" .
            "   $('#Padre1Telefono2').prop('readonly', true);" .
            "   $('#Padre1FechaNac').prop('readonly', true);" .
            "   $('#Padre1Email').prop('readonly', true);" .
            "   $('#Padre1Profesion').prop('readonly', true);" .
            "   $('#Padre1Nivelestudio').prop('disabled', true);" .
            "   $('#Padre1Ocupacion').prop('readonly', true);" .
            "}"
        ))  
    );
?>
<?php
    $this->Js->buffer(
        "$('body').on('keyup', '#Padre2Dni', function() {" .
            $this->Js->request(array(
                "controller" => "Alumnos",
                "action" => "getPadre2ByDni"
            ), array(
                "async" => true,
                "method" => 'post',
                "dataExpression" => true,
                "data" => $this->Js->get("#Padre2Dni")->serializeForm(array(
                    "isForm" => true,
                    "inline" => true
                )),
                "success" =>
                "$('#Padre2Nombres').val('');" .
                "$('#Padre2ApellidoPaterno').val('');" .
                "$('#Padre2ApellidoMaterno').val('');" .
                "$('#Padre2Telefono1').val('');" .
                "$('#Padre2Telefono2').val('');" .
                "$('#Padre2FechaNac').val('');" .
                "$('#Padre2Email').val('');" .
                "$('#Padre2Profesion').val('');" .
                "$('#Padre2Nivelestudio').val('');" .
                "$('#Padre2Ocupacion').val('');" .
                "$('#Padre2Nombres').prop('readonly', false);" .
                "$('#Padre2ApellidoPaterno').prop('readonly', false);" .
                "$('#Padre2ApellidoMaterno').prop('readonly', false);" .
                "$('#Padre2Telefono1').prop('readonly', false);" .
                "$('#Padre2Telefono2').prop('readonly', false);" .
                "$('#Padre2FechaNac').prop('readonly', false);" .
                "$('#Padre2Email').prop('readonly', false);" .
                "$('#Padre2Profesion').prop('readonly', false);" .
                "$('#Padre2Nivelestudio').prop('disabled', false);" .
                "$('#Padre2Ocupacion').prop('readonly', false);" .
                "$('#Padre2idpadre').remove();" . 
                "if(data.length > 2) {" .
                "   var padre = JSON.parse(data);" .
                "   $('#Padre2').append(\"<input type='hidden' id=\'Padre2idpadre\' name=\'data[Padre][2][idpadre]\' value=\'\" + padre.Padre.idpadre + \"\' />\");" .
                "   $('#Padre2Nombres').val(padre.Padre.nombres);" .
                "   $('#Padre2ApellidoPaterno').val(padre.Padre.apellidoPaterno);" .
                "   $('#Padre2ApellidoMaterno').val(padre.Padre.apellidoMaterno);" .
                "   $('#Padre2Telefono1').val(padre.Padre.telefono1);" .
                "   $('#Padre2Telefono2').val(padre.Padre.telefono2);" .
                "   $('#Padre2FechaNac').val(padre.Padre.fechaNac);" .
                "   $('#Padre2Email').val(padre.Padre.email);" .
                "   $('#Padre2Profesion').val(padre.Padre.profesion);" .
                "   $('#Padre2Nivelestudio').val(padre.Padre.nivelestudio);" .
                "   $('#Padre2Ocupacion').val(padre.Padre.ocupacion);" .
                "   $('#Padre2Nombres').prop('readonly', true);" .
                "   $('#Padre2ApellidoPaterno').prop('readonly', true);" .
                "   $('#Padre2ApellidoMaterno').prop('readonly', true);" .
                "   $('#Padre2Telefono1').prop('readonly', true);" .
                "   $('#Padre2Telefono2').prop('readonly', true);" .
                "   $('#Padre2FechaNac').prop('readonly', true);" .
                "   $('#Padre2Email').prop('readonly', true);" .
                "   $('#Padre2Profesion').prop('readonly', true);" .
                "   $('#Padre2Nivelestudio').prop('disabled', true);" .
                "   $('#Padre2Ocupacion').prop('readonly', true);" .
                "}"
            )) .  
        "});"
    );
?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {
        $("#AlumnoFechaNac").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
        $("#Padre0FechaNac").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
        $("#Padre1FechaNac").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>
<script>
    function eventFire(el, etype){
        if (el.fireEvent) {
            el.fireEvent('on' + etype);
        } else {
            var evObj = document.createEvent('Events');
            evObj.initEvent(etype, true, false);
            el.dispatchEvent(evObj);
        }
    }
    $(document).ready(function() {
        $('#AlumnoSeguro').change(function() {
            if ($('#AlumnoSeguro').prop('checked')) {
                $('#AlumnoIdaseguradora').prop('disabled', false);
            } else {
                $('#AlumnoIdaseguradora').prop('disabled', true);
            }
        });
        
        $("#btnCrear").hide();
        
        $("#btnNext").click(function() {
            var tab_active = $("#yw1 li.active a").attr("id");
            var tab_next = "";
            switch (tab_active) {
                case "lnkInformacionGeneral":
                    tab_next = "lnkDireccionContacto";
                    break;
                case "lnkDireccionContacto":
                    tab_next = "lnkSalud";
                    break;
                case "lnkSalud":
                    tab_next = "lnkOtros";
                    break;
                case "lnkOtros":
                    tab_next = "lnkPadresFamilia";
                    $(this).hide();
                    $("#btnCrear").show();
                    break;
            }
            if (tab_next) {
                eventFire(document.getElementById(tab_next), 'click');
            }
        });
        
        $("#yw1 li a").click(function() {
            var tab_active = $(this).attr("id");
            switch (tab_active) {
                case "lnkInformacionGeneral":
                case "lnkDireccionContacto":
                case "lnkSalud":
                case "lnkOtros":
                    $("#btnNext").show();
                    $("#btnCrear").hide();
                    break;
                case "lnkPadresFamilia":
                    $("#btnNext").hide();
                    $("#btnCrear").show();
                    break;
            }
        })
    });
</script>