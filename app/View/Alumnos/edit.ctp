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
    
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->css("../bower_components/select2/dist/css/select2.min");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
    echo $this->Html->script("../bower_components/select2/dist/js/select2.min");
?>
<div class="inpanel tabs-above" id="yw0">
    <ul id="yw1" class="nav nav-tabs">
        <li>
            <a data-toggle="tab" href="#yw0_tab_2"><span class="modernpics">~</span> Otros</a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw0_tab_3"><span class="modernpics">j</span> Salud</a>
        </li>
        <li>
            <a data-toggle="tab" href="#yw0_tab_4"><span class="modernpics">c</span> Dirección y Contacto</a>
        </li>
        <li class="active">
            <a data-toggle="tab" href="#yw0_tab_5"><span class="modernpics">Z</span> Información General</a>
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
                    echo $this->Form->input("AlumnosCobertura.idcobertura", array(
                        "label" => "Coberturas",
                        "options" => $coberturas,
                        "disabled" => true,
                        "multiple" => "multiple"
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
                    echo $this->Form->label("motivos", "Motivos");
                    echo $this->Form->input("recomendado", array(
                        "label" => "Recomendado"
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
                ?>
                </div>
            </div>
        <?php   
            echo $this->Form->button("Editar", array("class" => "btn btn-primary btn-large"));
            echo $this->Form->end();
        ?>
    </div>
</div>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {
        $("#AlumnoFechaNac").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>
<script>
$(document).ready(function() {
    $("#AlumnosCoberturaIdcobertura").select2({
        placeholder: 'Selecciona las coberturas',
        "language": {
            "noResults": function(){
                return "Sin resultados";
            }
        },
    });

    $('#AlumnoSeguro').change(function() {
        if ($('#AlumnoSeguro').prop('checked')) {
            $('#AlumnoIdaseguradora').prop('disabled', false);
            $('#AlumnosCoberturaIdcobertura').prop('disabled', false);
        } else {
            var vacio = [];
            vacio[0] = [];
            $('#AlumnoIdaseguradora').val(null);
            $('#AlumnosCoberturaIdcobertura').select2('val', vacio);
            $('#AlumnoIdaseguradora').prop('disabled', true);
            $('#AlumnosCoberturaIdcobertura').prop('disabled', true);
        }
    }); 
    
    if ($('#AlumnoSeguro').prop('checked')) {
        $('#AlumnoIdaseguradora').prop('disabled', false);
        $('#AlumnosCoberturaIdcobertura').prop('disabled', false);
    } else {
        $('#AlumnoIdaseguradora').prop('disabled', true);
        $('#AlumnosCoberturaIdcobertura').prop('disabled', true);
    }
    
    var coberturas = [];
    coberturas[0] = [];
    <?php foreach ($this->request->data["AlumnosCobertura"] as $cobertura) { ?>
        coberturas[0].push(<?php echo $cobertura["idcobertura"]; ?>);
    <?php } ?>
    
    $("#AlumnosCoberturaIdcobertura").select2('val', coberturas);
});
</script>