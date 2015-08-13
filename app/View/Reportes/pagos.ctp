<!-- File: /app/View/Reportes/pagos.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Reporte de Pagos");  
    
    $this->Html->addCrumb("Reporte de Pagos", "/Reportes/pagos");
    
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
?>
<?php
    echo $this->Form->create("Reporte", array("class" => "form-horizontal", "action" => "pagos_post"));
?>
<table>
    <tr>
        <td><input type="radio" name="data[Reporte][tipo]" value="1" /> Reporte por día</td>
        <td><?php
            echo $this->Form->input("fechadia", array(
                "label" => false,
                "type" => "text"
            ));
        ?></td>
    </tr>
</table>
<hr>
<table>
    <tr>
        <td><input type="radio" name="data[Reporte][tipo]" value="2" /> Reporte por mes</td>
        <td>
            <?php
                echo $this->Form->input("anio1", array(
                    "label" => false,
                    "options" => $aniolectivos,
                    "empty" => "Selecciona año"
                ));
                echo $this->Form->input("mes", array(
                    "label" => false,
                    "options" => $meses,
                    "empty" => "Selecciona mes"
                ));
            ?>
        </td>
    </tr>
</table>
<hr>
<table>
    <tr>
        <td><input type="radio" name="data[Reporte][tipo]" value="3" /> Reporte por año</td>
        <td>
            <?php
                echo $this->Form->input("anio2", array(
                    "label" => false,
                    "options" => $aniolectivos,
                    "empty" => "Selecciona año"
                ));
            ?>
        </td>
    </tr>
</table>
<?php
    echo $this->Form->button("Reporte", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {
        $("#ReporteFechadia").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>