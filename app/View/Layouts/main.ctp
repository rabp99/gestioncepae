<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <?php
            // css
            echo $this->Html->css("style.css");
            echo $this->Html->css("guiders-1.2.8.css");
            echo $this->Html->css("themes/prettify.css");
        ?>
        <?php
            // js
            echo $this->Html->script("jquery.min.js");
            echo $this->Html->script("bootstrap.min.js");
            echo $this->Html->script("guiders-1.2.8.js");
            echo $this->Html->script("prettify.js");
        ?>
        <title>Sistema de Gestión Académica - Colegio Cepae</title>
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
                        "action" => "display", "home"
                    )); ?>" class="aqua-well-mini">
                        <h1 class="aqua-slogan">Sistema de Gestión Académica</h1>
                        <h2 class="aqua-slogan">Colegio CEPAE</h2>
                    </a>
                    <div class="aqua-well-mini pull-right">
                        <div class="aqua-user">

                            <span class="aqua-user-name"><?php echo "Yii::app()->session['nombres'];" ?></span>

                            <div class="btn-group">
                                <a href="<?php echo "Yii::app()->baseUrl"; ?>/user/preferences/id/1" class="btn btn-small"><span class="icon-cog"></span></a>
                                <a href="#" class="btn btn-small dropdown-toggle" data-toggle="dropdown"> 
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#" tabindex="-1">Action</a></li>
                                    <li><a href="#" tabindex="-1">Another action</a></li>
                                    <li><a href="#" tabindex="-1">Something else</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo "Yii::app()->baseUrl"; ?>/site/logout" tabindex="-1">Cerrar Sesión</a></li>
                                </ul>
                            </div>
                        </div>
                        <span class="aqua-avatar">
                            <img src="<?php echo "Yii::app()->baseUrl"; ?>/images/user.png" alt="user" width="46" height="45" />
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
                        <li class="active"><a href="#"><i class="icon-home icon-white"></i></a></li>
                        <li>
                            <a href="#">
                                <i class="icon-list icon-white icon-margin"></i>
                                Configuración
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Alumnos
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Notas
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Pensiones
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Matrículas
                            </a>
                        </li>
                    </ul>
      

                </div>

            </div>

        </header>
        <!-- mensajes alert -->
        
        <div id="breadcrumbs">
            <!-- breadcrumbs -->
        </div>
        
        <div class="aqua-container">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch("content"); ?>
        </div>
        <div class="clear"></div>
        
        <div class="footer">
            jjj<br>
            sjjsjsjsj<br>
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
        <?php echo $this->Js->writeBuffer(); ?>
    </body>
</html>
