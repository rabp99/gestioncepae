<!-- File: /app/View/Common/index.ctp -->
<div class="aqua-container">
    <?php $accion = $this->fetch("accion"); if(!empty($accion)) {?>
    <div class="span1">
        <a href="<?php echo $this->Html->url(array("action" => "add")) ?>" class="aqua-shortcut text-align-center">
            <span class="modernpics newline">V</span>
            <span class="label label-info"><?php echo $this->fetch("accion"); ?></span>
        </a>
    </div>
    <?php } ?>
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
                <?php echo $this->fetch("antes"); ?>
                <div id="user-grid" class="grid-view">

                    <div class="summary">        
                    <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, iniciando en el registro {:start}, terminando en el {:end}.')
                        ));
                    ?>
                    </div>

                    <div class="pagination">
                        <ul id="yw2" class="yiiPager">
                        <?php
                            echo $this->Paginator->prev(
                                "←", 
                                array(
                                    "tag" => "li",
                                    "escape" => false,
                                    "class" => "previous"
                                ), 
                                null, 
                                array('class' => 'previous disabled')
                            );
                            echo $this->Paginator->numbers(array(
                                "tag" => "li",
                                "currentClass" => "active",
                                "separator" => ""
                            ));
                            echo $this->Paginator->next(
                                "→", 
                                array(
                                    "tag" => "li",
                                    "escape" => false,
                                    "class" => "next"
                                ), 
                                null, 
                                array('class' => 'next disabled')
                            );
                        ?>
                        </ul>
                    </div>
                    <?php echo $this->fetch("content"); ?>
                    <div class="summary">
                    <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, iniciando en el registro {:start}, terminando en el {:end}.')
                        ));
                    ?>
                    </div>

                    <div class="pagination">
                        <ul id="yw2" class="yiiPager">
                        <?php
                            echo $this->Paginator->prev(
                                "←", 
                                array(
                                    "tag" => "li",
                                    "escape" => false,
                                    "class" => "previous"
                                ), 
                                null, 
                                array('class' => 'previous disabled')
                            );
                            echo $this->Paginator->numbers(array(
                                "tag" => "li",
                                "currentClass" => "active",
                                "separator" => ""
                            ));
                            echo $this->Paginator->next(
                                "→", 
                                array(
                                    "tag" => "li",
                                    "escape" => false,
                                    "class" => "next"
                                ), 
                                null, 
                                array('class' => 'next disabled')
                            );
                        ?>
                        </ul>
                    </div>
                </div>
                <?php echo $this->fetch("despues"); ?>
            </div>
        </div>
    </div>
</div>
<?php 
    $this->Js->buffer("$('th a').addClass('sort-link');");
    $this->Js->buffer("$('.yiiPager li.active').wrapInner('<a></a>');");
    $this->Js->buffer("$('li.disabled').wrapInner('<a></a>');");
?>