<!-- File: /app/View/Elements/getDocentes.ctp -->
<?php
    $this->Form->inputDefaults(array(
       "class" => "span4" 
    ));
    echo $this->Form->input("iddocente", array(
        "label" => "Código Docente",
        "data-toggle" => "modal",
        "data-target" => "#mdlBuscarDocente",
        "type" => "text",
        "readonly" => true,
        "value" => (isset($docente_iddocente) ? $docente_iddocente : "")
    ));
    echo $this->Form->input("Docente.nombreCompleto", array(
        "label" => "Nombre Completo",
        "readonly" => true,
        "value" => (isset($docente_nombreCompleto) ? $docente_nombreCompleto : "")
    ));
?>

<!-- Modal -->
<div class="modal fade" id="mdlBuscarDocente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                <h4 class="modal-title">Seleccionar Docente</h4>
            </div>
            <div class="modal-body">
                <?php
                    echo $this->Form->input("Docente.busqueda", array(
                        "label" => "Buscar",
                        "class" => "span2",
                        "type" => "search"
                    )); 
                    echo $this->requestAction(array(
                        'controller'=> 'Docentes',
                        'action'=> 'getDocentes'
                    ));
                    echo $this->Html->link("Crear Docente", array("controller" => "Docentes", "action" => "add"));
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php
    $this->Js->get("#DocenteBusqueda")->event("keyup", 
        $this->Js->request(array(
            "controller" => "Docentes",
            "action" => "getDocentes"
        ), array(
            "update" => "#dvBuscarDocentes",
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
    $("body").on("click", ".seleccionarDocente", function() {
        var codigo = $(this).parent().parent().find(".tdIddocente").text();
        var nombreCompleto = $(this).parent().parent().find(".tdNombreCompleto").text();
        $("#<?php echo $model ?>Iddocente").val(codigo);      
        $("#DocenteNombreCompleto").val(nombreCompleto);
        $("#mdlBuscarDocente").modal('toggle');
        $("#DocenteBusqueda").val("");
        <?php
          echo  $this->Js->request(array(
                'controller'=> 'Docentes',
                'action'=> 'getDocentes'
            ), array(
                'update'=>'#dvBuscarDocentes',
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