<!-- File: /app/View/Users/login.ctp -->
<!DOCTYPE html>
<html lang="es">
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
            echo $this->Html->script("jquery.yiiactiveform.js");
            echo $this->Html->script("bootstrap.min.js");
            echo $this->Html->script("guiders-1.2.8.js");
            echo $this->Html->script("prettify.js");
        ?>
        <title>Login - Sistema de Gestión Cepae</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    </head>
    <body>
        <div id="yw0"></div>
        <div class="aqua-container">
            <div class="span3 offset2">
                <div class="aqua-panel">
                    <div class="aqua-panel-header">
                        <i class="modernpics icons32">n</i>
                        <span class="panel-divider"></span>
                        <h2>Login</h2>
                        <div class="aqua-panel-tabs-icons pull-right">
                            <a href="#" class="minimize">--</a>
                            <a href="#" class="modernpics maximize">v</a>
                        </div>
                    </div>
                    <div class="aqua-panel-content">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->Form->create("User", array("action" => "login")); ?>
                            <div class="alert alert-block alert-error" id="varticalForm_es_" style="display:none">
                                <p>Please fix the following input errors:</p>
                                <ul><li>dummy</li></ul>
                            </div>            
                            <div class="input-prepend">
                                <span class="add-on">
                                    <div class="modernpics icons24">f</div>
                                </span>
                                <?php echo $this->Form->input("username", array(
                                    "label" => false,
                                    "div" => false,
                                    "placeholder" => "Nombre de Usuario",
                                    "style" => "width: 310px"
                                )); ?>
                                <span class="add-on">
                                    <a class="modernpics icons24" rel="tooltip" data-placement="left" title="<strong>Note:</strong> You can use Your name or email to login.">?</a>
                                </span>
                            </div>       
                            <div class="input-prepend">
                                <span class="add-on">
                                    <div class="modernpics icons24">n</div>
                                </span>
                                <?php echo $this->Form->input("password", array(
                                    "label" => false,
                                    "div" => false,
                                    "placeholder" => "Contraseña",
                                    "style" => "width: 340px"
                                )); ?>
                            </div>           
                            <label class="checkbox" for="LoginForm_rememberMe">
                                <input id="ytLoginForm_rememberMe" type="hidden" value="0" name="LoginForm[rememberMe]" />
                                <input name="LoginForm[rememberMe]" id="LoginForm_rememberMe" value="1" type="checkbox" />
                                Remember me next time<span class="help-block error" id="LoginForm_rememberMe_em_" style="display: none"></span>
                            </label>
                            <hr/>
                            <button class="pull-right btn btn-primary btn-large btn-block" type="submit" name="yt0">Login</button>
                            <div class="clear"></div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <script type="text/javascript">
        /*<![CDATA[*/
        jQuery(function($) {
            jQuery('a[rel="tooltip"]').tooltip();
            jQuery('a[rel="popover"]').popover();

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
                } else {
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
        });
        /*]]>*/
        </script>
    </body>
</html>
