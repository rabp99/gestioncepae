<!-- File: /app/View/Notas/view_alumno.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Detalle Notas - " . $curso["Curso"]["descripcion"]);  
    
    $this->Html->addCrumb("Notas", '/Notas/index_alumno');
    $this->Html->addCrumb("Detalle Notas", '/Notas/view_alumno');
?>
<h3>Curso</h3>
<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $curso["Curso"]["idcurso"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $curso["Curso"]["descripcion"]; ?></dd>
    <dt>Área</dt>
    <dd><?php echo $curso["Area"]["descripcion"]; ?></dd>
    <dt>Grado</dt>
    <dd><?php echo $curso["Grado"]["descripcion"]; ?></dd>
    <dt>Nivel</dt>
    <dd><?php echo $curso["Grado"]["Nivel"]["descripcion"]; ?></dd>
</dl>

<?php foreach ($bimestres as $bimestre) { ?>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <caption><?php echo $bimestre["Bimestre"]["descripcion"]; ?></caption>
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Peso</th>
                    <th>Nota</th>
                </tr>
            </thead>
        </thead>
        <tbody>
            <?php
            $suma = 0;
            $con = 0;
            foreach ($detallenotas as $detallenota) {
                if ($detallenota["Nota"]["idbimestre"] == $bimestre["Bimestre"]["idbimestre"]) {
                    $suma += ($detallenota['Detallenota']['valor'] * $detallenota["Nota"]["peso"]);
                    $con += $detallenota["Nota"]["peso"];
            ?>
            <tr>
                <td><?php echo $detallenota["Nota"]["descripcion"]; ?></td>
                <td><?php echo $detallenota["Nota"]["peso"]; ?></td>
                <td><?php echo $detallenota["Detallenota"]["valor"]; ?></td>
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