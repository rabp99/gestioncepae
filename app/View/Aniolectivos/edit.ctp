<div class="aniolectivos form">
<?php echo $this->Form->create('Aniolectivo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Aniolectivo'); ?></legend>
	<?php
		echo $this->Form->input('idaniolectivo');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('fechainicio');
		echo $this->Form->input('fechafin');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Aniolectivo.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Aniolectivo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Aniolectivos'), array('action' => 'index')); ?></li>
	</ul>
</div>
