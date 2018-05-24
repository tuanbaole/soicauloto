<div class="dacbiets form">
<?php echo $this->Form->create('Dacbiet'); ?>
	<fieldset>
		<legend><?php echo __('Edit Dacbiet'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dacbiet');
		echo $this->Form->input('loto');
		echo $this->Form->input('quantrong');
		echo $this->Form->input('ngay');
		echo $this->Form->input('thang');
		echo $this->Form->input('nam');
		echo $this->Form->input('ngay_tao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Dacbiet.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Dacbiet.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dacbiets'), array('action' => 'index')); ?></li>
	</ul>
</div>
