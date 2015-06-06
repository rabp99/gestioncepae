<!-- File: /app/View/Alumnos/getAlumnos.ctp -->
<?php
    $this->Form->inputDefaults(array(
       "class" => "span4" 
    ));
    echo $this->Form->input("idalumno", array(
        "label" => "Código Alumno",
        "data-toggle" => "modal",
        "data-target" => "#mdlBuscarAlumno",
        "type" => "text"
    ));
    echo $this->Form->input("Alumno.nombreCompleto", array(
        "label" => "Nombre Completo",
        "readonly" => true
    ));
?>

<!-- Modal -->
<div class="modal fade" id="mdlBuscarAlumno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                <h4 class="modal-title">Seleccionar Alumno</h4>
            </div>
            <div class="modal-body">
                <?php
                    echo $this->Form->input("Alumno.busqueda", array(
                        "label" => "Buscar",
                        "class" => "span2",
                        "type" => "search"
                    )); 
                    echo $this->requestAction(array(
                        'controller'=> 'Alumnos',
                        'action'=> 'getAlumnos'
                    ));
                    echo $this->Html->link("Crear Alumno", array("controller" => "Alumnos", "action" => "add"));
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php
    $this->Js->get("#AlumnoBusqueda")->event("keyup", 
        $this->Js->request(array(
            "controller" => "Alumnos",
            "action" => "getAlumnos"
        ), array(
            "update" => "#dvBuscarAlumnos",
            "async" => true,
            "method" => 'post',
            "dataExpression" => true,
            "data" => $this->Js->serializeForm(array(
                "isForm" => false,
                "inline" => true
            ))
        ))
    );
?>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
    $("body").on("click", ".seleccionarAlumno", function() {
        var codigo = $(this).parent().parent().find(".tdIdalumno").text();
        var nombreCompleto = $(this).parent().parent().find(".tdNombreCompleto").text();
        $("#<?php echo $model ?>Idalumno").val(codigo);      
        $("#AlumnoNombreCompleto").val(nombreCompleto);
        $("#mdlBuscarAlumno").modal('toggle');
        $("#AlumnoBusqueda").val("");
        <?php
          echo  $this->Js->request(array(
                'controller'=> 'Alumnos',
                'action'=> 'getAlumnos'
            ), array(
                'update'=>'#dvBuscarAlumnos',
                'async' => true,
                'method' => 'post',
                'dataExpression'=>true,
                'data'=> $this->Js->serializeForm(array(
                    'isForm' => true,
                    'inline' => true
                ))
            ));
        ?>
    });
<?php $this->Html->scriptEnd(); ?>