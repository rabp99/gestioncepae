<!-- File: /app/View/Users/datos.ctp -->
<?php 
    $this->extend("/Common/view");
    $this->assign("titulo", "Datos de Usuario");
    
    $this->Html->addCrumb('Usuarios', '/Usuarios');
?>
<?php if(isset($admin)) { ?>
<dl class="dl-horizontal">
    <dt>Código de Usuario</dt>
    <dd><?php echo $admin["iduser"]; ?></dd>
    <dt>Grupo</dt>
    <dd><?php echo $admin["Group"]["descripcion"]; ?></dd>
    <dt>Nombre de Usuario</dt>
    <dd><?php echo $admin["username"]; ?></dd>
</dl>
<?php } ?>
<?php if(isset($alumno)) { ?>
<dl class="dl-horizontal">
    <dt>Código de Usuario</dt>
    <dd><?php echo $alumno["Alumno"]["iduser"]; ?></dd>
    <dt>Nombre Completo</dt>
    <dd><?php echo $alumno["Alumno"]["nombreCompleto"]; ?></dd>
    <dt>Sexo</dt>
    <dd><?php echo $alumno["Alumno"]["sexo"] = "M" ? "Masculino" : "Femenino"; ?></dd>
    <dt>Fecha de Nacimiento</dt>
    <dd><?php echo $alumno["Alumno"]["fechaNac"]; ?></dd>
    <dt>Nombre de Usuario</dt>
    <dd><?php echo $alumno["User"]["username"]; ?></dd>
</dl>
<?php } ?>
<?php if(isset($apoderado)) { ?>
<dl class="dl-horizontal">
    <dt>Código de Usuario</dt>
    <dd><?php echo $apoderado["Padre"]["iduser"]; ?></dd>
    <dt>Nombre Completo</dt>
    <dd><?php echo $apoderado["Padre"]["nombreCompleto"]; ?></dd>
    <dt>DNI</dt>
    <dd><?php echo $apoderado["Padre"]["dni"]; ?></dd>
    <dt>Fecha de Nacimiento</dt>
    <dd><?php echo $apoderado["Padre"]["fechaNac"]; ?></dd>
    <dt>Nombre de Usuario</dt>
    <dd><?php echo $apoderado["User"]["username"]; ?></dd>
</dl>
<?php } ?>
<?php if(isset($docente)) { ?>
<dl class="dl-horizontal">
    <dt>Código de Usuario</dt>
    <dd><?php echo $docente["Docente"]["iduser"]; ?></dd>
    <dt>Nombre Completo</dt>
    <dd><?php echo $docente["Docente"]["nombreCompleto"]; ?></dd>
    <dt>DNI</dt>
    <dd><?php echo $docente["Docente"]["dni"]; ?></dd>
    <dt>Nombre de Usuario</dt>
    <dd><?php echo $docente["User"]["username"]; ?></dd>
</dl>
<?php } ?>