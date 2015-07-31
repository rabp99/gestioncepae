<?php 
    $this->layout = "error";
?>
<div class="span7">
    <div class="aqua-panel">
        <div class="aqua-panel-header">
            <i class="modernpics icons32">x</i><span class="panel-divider"></span><h2>Error 404</h2>
        </div>
        <div class="aqua-panel-content">
            <div class="alert in alert-block fade alert-error error-page">
                <div class="span2">
                    <?php echo $this->Html->image("images/error.png", array("alt" => "error", "width" => 226, "height" => 250)); ?>
                </div>
                <div class="span4">
                    ¡Página no encontrada!        
                    <div class="clear"><br><br></div>
                    <span class="error-code">Error 404</span>
                </div>
               
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>