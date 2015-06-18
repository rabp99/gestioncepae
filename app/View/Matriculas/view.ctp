<!-- File: /app/View/Matriculas/view.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle de Matricula");
    $this->assign("accion1", "Matricular Alumno");
    $this->assign("accion2", "");
    $this->assign("accion3", "Administar Matriculas");
    $this->assign("accion4", "Deshabilitar Matricula");
    $this->assign("id", $matricula["Matricula"]["idmatricula"]);    
    
    $this->Html->addCrumb('Matriculas', '/Matriculas');
    $this->Html->addCrumb('Detalle', '/Matriculas/view');
?>

<div class="inpanel tabs-above" id="yw0">
    <ul id="yw1" class="nav nav-tabs">
        <li>
            <a data-toggle="tab" href="#yw0_tab_4"><span class="modernpics">c</span> Pagos</a>
        </li>
        <li class="active">
            <a data-toggle="tab" href="#yw0_tab_5"><span class="modernpics">Z</span> Datos de Matrícula</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="yw0_tab_5" class="tab-pane fade active in">
            <div class="info-panel">
                <dl class="dl-horizontal">
                    <dt>Código</dt>
                    <dd><?php echo $matricula["Matricula"]["idmatricula"]; ?></dd>
                    <dt>Alumno</dt>
                    <dd><?php echo $matricula["Alumno"]["nombreCompleto"]; ?></dd>
                    <dt>Año Lectivo</dt>
                    <dd><?php echo $matricula["Seccion"]["Aniolectivo"]["descripcion"]; ?></dd>
                    <dt>Nivel</dt>
                    <dd><?php echo $matricula["Seccion"]["Grado"]["Nivel"]["descripcion"]; ?></dd>
                    <dt>Grado</dt>
                    <dd><?php echo $matricula["Seccion"]["Grado"]["descripcion"]; ?></dd>
                    <dt>Sección</dt>
                    <dd><?php echo $matricula["Seccion"]["descripcion"]; ?></dd>
                    <dt>Fecha</dt>
                    <dd><?php echo $matricula["Matricula"]["created"]; ?></dd>
                    <dt>Observación</dt>
                    <dd><p><?php echo $matricula["Matricula"]["observacion"]; ?></p></dd>
                </dl>
            </div>
        </div>
        <div id="yw0_tab_4" class="tab-pane fade">
            <div class="info-panel">
                <dl class="dl-horizontal">
                <?php foreach($matricula["Pago"] as $pago) { ?>
                    <dt><?php echo $pago["Concepto"]["descripcion"]; ?>:</dt>
                    <dd><?php echo $pago["monto"]; ?></dd>
                <?php } ?>
                </dl>
            </div>
        </div>
    </div>
</div>