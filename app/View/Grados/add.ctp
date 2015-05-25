<!-- File: /app/View/Grados/add.ctp -->
<div class="aqua-container">
    <div class="span1">
        <a href="<?php echo $this->Html->url(array("action" => "index")) ?>" class="aqua-shortcut text-align-center">
            <span class="modernpics newline">(</span>
            <span class="label label-info">Administrar Grados</span>
        </a>
    </div>
    <div class="clear"></div>
    <div class="span7">
        <div class="aqua-panel">
            <div class="aqua-panel-header">
            <i class="modernpics icons32">r</i><span class="panel-divider"></span>
            <h2>Crear Grado<span></span></h2>
            <div class="aqua-panel-tabs-icons pull-right">
                <a href="#" class="minimize">--</a>
                <a href="#" class="modernpics maximize">v</a>
            </div>
        </div>
        <div class="aqua-panel-content">
            <?php 
                echo $this->Form->create("Grado", array("class" => "form-vertical"));
                echo $this->Html->para("help-block", "Los campos con <span class='required'>*</span> son requeridos");
                echo $this->Form->input("descripcion", array(
                    "label" => "Descripción"
                ));             
                echo $this->Form->input("capacidad", array(
                    "label" => "Capacidad"
                ));
                echo $this->Form->end();
            ?>
            <form class="form-vertical" id="user-form" action="#" method="post">
                <p class="help-block">Fields with <span class="required">*</span> are required.</p>

                <div class="alert alert-block alert-error" id="user-form_es_" style="display:none">
                    <p>Please fix the following input errors:</p>
                    <ul><li>dummy</li></ul>
                </div>
                <label for="User_username" class="required">Username <span class="required">*</span></label><input class="span4" name="User[username]" id="User_username" type="text" /><span class="help-block error" id="User_username_em_" style="display: none"></span>
                <label for="User_password" class="required">Password <span class="required">*</span></label><input class="span4" name="User[password]" id="User_password" type="password" maxlength="40" /><span class="help-block error" id="User_password_em_" style="display: none"></span>
                <label for="User_email" class="required">Email <span class="required">*</span></label><input class="span4" name="User[email]" id="User_email" type="text" /><span class="help-block error" id="User_email_em_" style="display: none"></span>
                <label for="User_create_time">Create Time</label><input class="span4" name="User[create_time]" id="User_create_time" type="text" /><span class="help-block error" id="User_create_time_em_" style="display: none"></span>
                <label for="User_last_visit">Last Visit</label><input class="span4" name="User[last_visit]" id="User_last_visit" type="text" /><span class="help-block error" id="User_last_visit_em_" style="display: none"></span>
                <label for="User_status_id" class="required">Status <span class="required">*</span></label><input class="span4" name="User[status_id]" id="User_status_id" type="text" /><span class="help-block error" id="User_status_id_em_" style="display: none"></span>
	<div class="form-actions">
		<button class="btn btn-primary btn-large" type="submit" name="yt0">Create</button>	</div>

</form>       
        </div>
    </div>
</div>
</div>