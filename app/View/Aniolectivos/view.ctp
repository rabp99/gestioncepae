<div class="aniolectivos view">
<h2><?php echo __('Aniolectivo'); ?></h2>
	<dl>
		<dt><?php echo __('Idaniolectivo'); ?></dt>
		<dd>
			<?php echo h($aniolectivo['Aniolectivo']['idaniolectivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($aniolectivo['Aniolectivo']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechainicio'); ?></dt>
		<dd>
			<?php echo h($aniolectivo['Aniolectivo']['fechainicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fechafin'); ?></dt>
		<dd>
			<?php echo h($aniolectivo['Aniolectivo']['fechafin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($aniolectivo['Aniolectivo']['estado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aniolectivo'), array('action' => 'edit', $aniolectivo['Aniolectivo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aniolectivo'), array('action' => 'delete', $aniolectivo['Aniolectivo']['id']), array(), __('Are you sure you want to delete # %s?', $aniolectivo['Aniolectivo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aniolectivos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aniolectivo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
