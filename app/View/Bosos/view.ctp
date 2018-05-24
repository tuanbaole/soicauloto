<div class="bosos view">
<h2><?php echo __('Boso'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($boso['Boso']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Boso'); ?></dt>
		<dd>
			<?php echo h($boso['Boso']['boso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Giatri'); ?></dt>
		<dd>
			<?php echo h($boso['Boso']['giatri']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cot'); ?></dt>
		<dd>
			<?php echo h($boso['Boso']['cot']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hang'); ?></dt>
		<dd>
			<?php echo h($boso['Boso']['hang']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($boso['Boso']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($boso['Boso']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Boso'), array('action' => 'edit', $boso['Boso']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Boso'), array('action' => 'delete', $boso['Boso']['id']), array(), __('Are you sure you want to delete # %s?', $boso['Boso']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bosos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Boso'), array('action' => 'add')); ?> </li>
	</ul>
</div>
