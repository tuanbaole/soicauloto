<div class="bosos form">
<?php echo $this->Form->create('Boso'); ?>
	<fieldset>
		<legend><?php echo __('Add Boso'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Bosos'), array('action' => 'index')); ?></li>
	</ul>
</div>
