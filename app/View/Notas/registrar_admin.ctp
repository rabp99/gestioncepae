<!-- File: /app/View/Notas/view_admin.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Registrar Notas");  
    
    $this->Html->addCrumb("Notas", '/Notas/index_admin');
    $this->Html->addCrumb("Registrar Notas", '/Notas/registrar_admin');
?>
<h3>Alumno</h3>
<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo 'A' . str_pad($matricula["Alumno"]["idalumno"],  5, '0', STR_PAD_LEFT); ?></dd>
    <dt>Nombre Completo</dt>
    <dd><?php echo $matricula["Alumno"]["nombreCompleto"]; ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $matricula["Seccion"]["Grado"]["descripcion"]; ?></dd>
    <dt>Sección</dt>
    <dd><?php echo $matricula["Seccion"]["descripcion"]; ?></dd>
</dl>

<hr>
<?php echo $this->Form->create(); ?>
<?php 
    $i = 0;
    foreach ($cursos as $curso) { ?>
    <h4><?php echo $curso["Curso"]["descripcion"] ?></h4>
    <?php foreach ($bimestres as $bimestre) { ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <caption><?php echo $bimestre["Bimestre"]["descripcion"]; ?></caption>
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Peso</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $suma = 0;
                $con = 0;
                foreach ($detallenotas[$curso["Curso"]["idcurso"]][$bimestre["Bimestre"]["idbimestre"]] as $detallenota) {
                    if ($detallenota["Nota"]["idbimestre"] == $bimestre["Bimestre"]["idbimestre"]) {
                        $suma += ($detallenota['Detallenota']['valor'] * $detallenota["Nota"]["peso"]);
                        $con += $detallenota["Nota"]["peso"];
                ?>
                <tr>
                    <td><?php echo $detallenota["Nota"]["descripcion"]; ?></td>
                    <td><?php echo $detallenota["Nota"]["peso"]; ?></td>
                    <td>
                        <?php echo $this->Form->input("Detallenota." . $i . ".iddetallenota", array(
                            "type" => "hidden",
                            "value" => $detallenota["Detallenota"]["iddetallenota"]
                        ));?>
                        <?php echo $this->Form->input("Detallenota." . $i . ".valor", array(
                            "div" => false, 
                            "label" => false, 
                            "class" => "txtNota",
                            "style" => "width: 54px", 
                            "min" => 0, 
                            "max" => 20,
                            "step" => 0.50,
                            "value" => $detallenota["Detallenota"]["valor"]
                        )); 
                        $i++;
                        ?>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: right; font-weight: bold;">Promedio</td>
                    <td style="font-weight: bold;"><?php if ($con) echo number_format($suma / $con, 2, '.', ','); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php } ?>
    <hr>
<?php } ?>
<?php
    echo $this->Form->button("Registrar Notas", array("class" => "btn btn-primary btn-large"));
    echo $this->Form->end();
?><
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