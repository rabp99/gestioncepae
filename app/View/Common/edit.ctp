<!-- File: /app/View/Common/edit.ctp -->
<div class="aqua-container">
    <div class="span1">
        <a href="<?php echo $this->Html->url(array("action" => "add")); ?>" class="aqua-shortcut text-align-center">
            <span class="modernpics newline">V</span>
            <span class="label label-info"><?php echo $this->fetch("accion1"); ?></span>
        </a>
    </div>
    <div class="span1">
        <a href="<?php echo $this->Html->url(array("action" => "view", $this->fetch("id"))); ?>" class="aqua-shortcut text-align-center">
            <span class="modernpics newline">s</span>
            <span class="label label-info"><?php echo $this->fetch("accion2"); ?></span>
        </a>
    </div>
    <div class="span1">
        <a href="<?php echo $this->Html->url(array("action" => "index")); ?>" class="aqua-shortcut text-align-center">
            <span class="modernpics newline">(</span>
            <span class="label label-info"><?php echo $this->fetch("accion3"); ?></span>
        </a>
    </div>
    <div class="clear"></div>
    <div class="span7">
        <div class="aqua-panel">
            <div class="aqua-panel-header">
                <i class="modernpics icons32">r</i><span class="panel-divider"></span>
                <h2><?php echo $this->fetch("titulo"); ?><span></span></h2>
                <div class="aqua-panel-tabs-icons pull-right">
                    <a href="#" class="minimize">--</a>
                    <a href="#" class="modernpics maximize">v</a>
                </div>
            </div>
            <div class="aqua-panel-content">
                <?php 
                    echo $this->fetch("content");
                ?>
            </div>
        </div>
    </div>
</div>