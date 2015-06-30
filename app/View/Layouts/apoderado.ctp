<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <?php
            // css
            echo $this->Html->css("style.css");
            echo $this->Html->css("guiders-1.2.8.css");
            echo $this->Html->css("themes/prettify.css");
            echo $this->Html->css("default.css");
        ?>
        <?php
            // js
            echo $this->Html->script("jquery.min.js");
            echo $this->Html->script("bootstrap.min.js");
            echo $this->Html->script("guiders-1.2.8.js");
            echo $this->Html->script("prettify.js");
        ?>
        <title>Sistema de Gestión Académica - <?php echo $this->fetch("titulo"); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    </head>
    <body>
         <header>
            <div id="aqua-header">
                <div class="aqua-container">
                    <div class=" pull-left">
                        <center>
                            <?php
                                echo $this->Html->image("images/insifon.png", array(
                                    "alt" => "user",
                                    "width" => 60,
                                    "height" => 60
                                ))
                            ?>
                        </center>
                    </div>
                    <a href="<?php echo $this->Html->url(array(
                        "controller" => "Pages",
                        "action" => "apoderado"
                    )); ?>" class="aqua-well-mini">
                        <h1 class="aqua-slogan">Sistema de Gestión Académica</h1>
                        <h2 class="aqua-slogan">Colegio CEPAE</h2>
                    </a>
                    <div class="aqua-well-mini pull-right">
                        <div class="aqua-user">

                            <span class="aqua-user-name"><?php echo $this->requestAction("/Alumnos/datos_apoderado")["Padre"]["nombreCompleto"]; ?></span>

                            <div class="btn-group">
                                <a href="<?php echo $this->Html->url(array("controller" => "Users", "action" => "datos")); ?>" class="btn btn-small"><span class="icon-cog"></span></a>
                                <a href="#" class="btn btn-small dropdown-toggle" data-toggle="dropdown"> 
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo $this->Html->url(array("controller" => "Users", "action" => "datos")); ?>" tabindex="-1">Datos Usuario</a></li>
                                    <li><a href="<?php echo $this->Html->url(array("controller" => "Users", "action" => "change_pass")); ?>" tabindex="-1">Cambiar Contraseña</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <?php echo $this->Html->link("Cerrar Sesión", array("controller" => "Users", "action" => "logout"), array("tabindex" => -1)); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span class="aqua-avatar">
                            <?php echo $this->Html->image("images/user.png", array(
                                "alt" => "apoderado",
                                "width" => 46,
                                "height" => 45
                            )); ?>
                        </span>

                    </div>
                    
                </div>
            </div>
            <div  id="aqua-menu" data-offset-top="80" data-spy="affix" class="subnav navbar affix">

                <div class="aqua-container">
                    <a data-target="#collapse_2" data-toggle="collapse" class="btn btn-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <ul class="nav">
                        <li class="active">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Pages",
                                "action" => "apoderado"
                            )); ?>">
                                <i class="icon-home icon-white"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array("controller" => "Cursos", "action" => "cursosByApoderado")) ?>">
                                <span class="modernpics icons16 icons-white">a</span>
                                Cursos
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array("controller" => "Notas", "action" => "index_apoderado")) ?>">
                                <span class="modernpics icons16 icons-white">V</span>
                                Notas
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array("controller" => "Reportes", "action" => "notas_apoderado")) ?>">
                                <span class="modernpics icons16 icons-white">4</span>
                                Boleta de Notas
                            </a>
                        </li>
                    </ul>
      

                </div>

            </div>

        </header>
        <!-- mensajes alert -->
        
        <div id="breadcrumbs">
            <?php echo $this->Html->getCrumbList(
                array(
                    "class" => "breadcrumbs breadcrumb",
                    "firstClass" => false,
                    "lastClass" => "active",
                    "separator" => "<span class='divider'>/</span>"
                ),
                array("text" => "Home", "url" => array("controller" => "Pages", "action" => "apoderado"))
            ); ?>
        </div>
        
        <div class="aqua-container">
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch("content"); ?>
        </div>
        <div class="clear"></div>
        
        <div class="footer">
            <div id="aqua-footer">
                <div class="aqua-container">
                    <div class="span1 offset1">
                        <ul id="yw7" class="nav">
                            <li class="first">Teléfonos</li>
                            <li>99</li>
                            <li>99</li>
                            <li class="last">99</li>
                        </ul>                  
                    </div>
                    <div class="span1 offset3">
                        <ul id="yw9" class="nav">
                            <li class="first">Dirección</li>
                            <address>dsasa</address>
                        </ul>                       
                    </div>
                    <div class="span5 offset1">
                        <p align="center">Trujillo, Perú. © Copyright 2015 C.E.P.A.E. ® Todos los Derechos Reservados</p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            $(".aqua-panel-tabs-icons .minimize").click(function(){
                $(this).parents(".aqua-panel").children(".aqua-panel-content").slideToggle("fast");
                return false;
            });

            $(".aqua-panel-tabs-icons .maximize").click(function(){
                var panel = $(this).parents(".aqua-panel");
                if($(panel).hasClass("fullscreen")){
                    $(panel).removeClass("fullscreen");
                    $(panel).children(".aqua-panel-content").css("height", "auto");
                    $(panel).children(".aqua-panel-content").css("width", "auto");
                    $(panel).children(".aqua-panel-content").css("overflow", "inherit");
                    $("body").css("overflow-y", "auto");
                } else{
                    var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName("body")[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
                    $(panel).addClass("fullscreen");
                    $(panel).children(".aqua-panel-content").slideDown("fast");
                    $(panel).children(".aqua-panel-content").css("height", y-60);
                    $(panel).children(".aqua-panel-content").css("overflow-y", "scroll");
                    $("body").css("overflow-y", "hidden");
                    $(panel).children(".aqua-panel-content").css("width", x-20); 
                }
                return false;
            });
        </script>
        <?php
            echo $this->Html->script("default");
            echo $this->Js->writeBuffer();
            echo $this->fetch('script'); 
        ?>
    </body>
</html>
