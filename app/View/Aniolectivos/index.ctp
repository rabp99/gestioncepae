<!-- File: /app/View/Grados/index.ctp -->
<div class="aqua-container">
    <div class="span1">
        <a href="<?php echo $this->Html->url(array("action" => "add")) ?>" class="aqua-shortcut text-align-center">
            <span class="modernpics newline">V</span>
            <span class="label label-info">Crear Año Lectivo</span>
        </a>
    </div>
    <div class="clear"></div>
    <div class="span7">
        <div class="aqua-panel">
            <div class="aqua-panel-header">
                <i class="modernpics icons32">r</i><span class="panel-divider"></span>
                <h2>Administrar Años Lectivos<span></span></h2>
                <div class="aqua-panel-tabs-icons pull-right">
                    <a href="#" class="minimize">--</a>
                    <a href="#" class="modernpics maximize">v</a>
                </div>
            </div>
            <div class="aqua-panel-content">

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
                    <table class="items table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th id="user-grid_c0"><?php echo $this->Paginator->sort("idaniolectivo", "ID Año Lectivo <span class='caret'></span>", array("escape" => false)); ?></th>
                                <th id="user-grid_c1"><?php echo $this->Paginator->sort("descripcion", "Descripción <span class='caret'></span>", array("escape" => false)); ?></th>
                                <th id="user-grid_c2"><?php echo $this->Paginator->sort("fechainicio", "Fecha de Inicio <span class='caret'></span>", array("escape" => false)); ?></th>
                                <th id="user-grid_c3"><?php echo $this->Paginator->sort("fechafin", "Fecha final <span class='caret'></span>", array("escape" => false)); ?></th>
                                <th id="user-grid_c4"><?php echo $this->Paginator->sort("estado", "Estado <span class='caret'></span>", array("escape" => false)); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($aniolectivos as $aniolectivo) {
                            echo $this->Html->tableCells(
                                array(
                                    $aniolectivo["Aniolectivo"]["idaniolectivo"],
                                    $aniolectivo["Aniolectivo"]["descripcion"],
                                    $aniolectivo["Aniolectivo"]["fechainicio"],
                                    $aniolectivo["Aniolectivo"]["fechafin"],
                                    $aniolectivo["Aniolectivo"]["estado"],
                                ), array(
                                    "class" => "odd"
                                ), array(
                                    "class" => "even"
                                )
                            );
                        } ?>
                        </tbody>
                    </table>
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
            </div>
        </div>
    </div>
</div>
<?php 
    $this->Js->buffer("$('th a').addClass('sort-link');");
    $this->Js->buffer("$('.yiiPager li.active').wrapInner('<a></a>');");
    $this->Js->buffer("$('li.disabled').wrapInner('<a></a>');");
?>