<!-- File: /app/View/Notas/get_form_registro.ctp -->
<h4>Registro de Notas</h4>
<table class="items table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th id="user-grid_c0" rowspan="2" style="text-align: center; vertical-align: middle;">Alumno</th>
            <th id="user-grid_c1" colspan="<?php echo sizeof($notas); ?>" style="text-align: center; vertical-align: middle;">Notas</th>
            <th id="user-grid_c2" rowspan="2" style="text-align: center; vertical-align: middle;">Promedio</th>
        </tr>
        <tr>
            <?php 
                $peso_total = 0;
                foreach($notas as $nota) {
                    $peso_total += $nota["Nota"]["peso"];
            ?>
            <th style="text-align: center; vertical-align: middle;"><?php echo $nota["Nota"]["descripcion"] . " (" . $nota["Nota"]["peso"] . ")"; ?></th>
            <?php 
                } 
            ?>
        </tr>
    </thead>
    <tbody>
        <?php 
        $n_notas = sizeof($notas);
        foreach ($matriculas as $k_matricula => $matricula) {
            $tr = array($matricula["Alumno"]["nombreCompleto"]);
            $suma = 0;
            foreach($notas as $k_nota => $nota) {
                $n = $k_matricula * $n_notas + $k_nota;
                $detallenota = $this->Form->input("Detallenota." . $n . ".valor", array(
                    "div" => false, 
                    "label" => false, 
                    "class" => "txtNota",
                    "style" => "width: 54px", 
                    "min" => 0, 
                    "max" => 20,
                    "step" => 0.50,
                    "value" => isset($nota["Detallenota"][$k_matricula]["valor"]) ? $nota["Detallenota"][$k_matricula]["valor"] : "0")
                );
                $detallenota .= $this->Form->input("Detallenota." . $n . ".idnota", array("type" => "hidden", "value" => $nota["Nota"]["idnota"]));
                $detallenota .= $this->Form->input("Detallenota." . $n . ".idmatricula", array("type" => "hidden", "value" => $matricula["idmatricula"]));
                array_push($tr, $detallenota);
                $suma += @$nota["Detallenota"][$k_matricula]["valor"] * $nota["Nota"]["peso"];
            }
            if($peso_total != 0) {
                $promedio = number_format($suma / $peso_total, 2, '.', ',');
                if ($promedio < 11) {
                    array_push($tr, '<span style="color: red; font-weight: bold;">' . $promedio . '</span>');
                } else {
                    array_push($tr, '<span style="font-weight: bold;">' . $promedio . '</span>');
                }
            } 
            echo $this->Html->tableCells(
                $tr,
                array(
                    "class" => "odd"
                ), array(
                    "class" => "even"
                )
            );
        } ?>
    </tbody>
</table>
<?php
    echo $this->Form->button("Registrar Notas", array("class" => "btn btn-primary btn-large"));
?>
<script>
    $(document).ready(function() {
        $(".txtNota").each(function() {
            var nota = $(this).val();
            if (nota < 11) {
                $(this).addClass('has-error');
            }
        });
        
        $(".txtNota").change(function() {
            var nota = $(this).val();
            if (nota < 11) {
                $(this).addClass('has-error');
            } else {
                $(this).removeClass('has-error');
            }
        })
    })
</script>