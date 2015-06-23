<!-- File: /app/View/Pagos/index.ctp -->
<?php 
    $this->extend("/Common/index");
    $this->assign("titulo", "Administrar Pagos");
    
    $this->Html->addCrumb('Pagos', '/Pagos');
    $this->Html->addCrumb('Adiministrar', '/Pagos/index');
?>
<?php 
    $this->start("antes");
    echo $this->Form->create("Pago");
    echo $this->Form->input("idaniolectivo", array(
        "label" => "Año Lectivo",
        "options" => $aniolectivos,
        "empty" => "Selecciona uno"
    ));   
    echo $this->Form->input("nombreCompleto", array(
        "label" => "Nombre de Alumno",
        "type" => "search"
    ));
    echo $this->Form->button("Buscar", array("class" => "btn btn-primary btn-large"));
    $this->end();
?>
<table id="tblMatriculas" class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0"><?php echo $this->Paginator->sort("idmatricula", "ID Matricula <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c1"><?php echo $this->Paginator->sort("Alumno.nombreCompleto", "Alumno <span class='caret'></span>", array("escape" => false)); ?></th>
            <th id="user-grid_c2">Grado</th>
            <th id="user-grid_c3">Nivel</th>
            <th id="user-grid_c4">Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($matriculas as $matricula) {
        echo $this->Html->tableCells(
            array(
                $matricula["Matricula"]["idmatricula"],
                $matricula["Alumno"]["nombreCompleto"],
                $matricula["Seccion"]["descripcion"],
                $matricula["Seccion"]["Grado"]["descripcion"],
                $matricula["Seccion"]["Grado"]["Nivel"]["descripcion"],
                $this->Html->link("<i class='icon-eye-open'></i>", array("action" => "view", $matricula["Matricula"]["idmatricula"]), array("escape" => false, "title" => "Detalle", "rel" => "tooltip")) . " " .
                $this->Html->link("<i class='icon-pencil'></i>", array("action" => "registrar", $matricula["Matricula"]["idmatricula"]), array("escape" => false, "title" => "Registrar", "rel" => "tooltip"))
            ), array(
                "class" => "odd"
            ), array(
                "class" => "even"
            )
        );
    } ?>
    </tbody>
</table>