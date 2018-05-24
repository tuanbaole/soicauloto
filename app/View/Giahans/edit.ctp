<div class="giahans form">
<?php echo $this->Form->create('Giahan'); ?>
	<fieldset>
		<legend><?php echo __('Edit Giahan'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('imei');
		echo $this->Form->input('ngay_het_han');
		echo $this->Form->input('link');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Giahan.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Giahan.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Giahans'), array('action' => 'index')); ?></li>
	</ul>
</div>
