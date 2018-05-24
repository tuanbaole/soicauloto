<div class="bosos form">
<?php echo $this->Form->create('Boso'); ?>
	<fieldset>
		<legend><?php echo __('Edit Boso'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('boso');
		echo $this->Form->input('giatri');
		echo $this->Form->input('cot');
		echo $this->Form->input('hang');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Boso.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Boso.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bosos'), array('action' => 'index')); ?></li>
	</ul>
</div>
