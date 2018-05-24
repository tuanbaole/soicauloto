<div class="giahans view">
<h2><?php echo __('Giahan'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($giahan['Giahan']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imei'); ?></dt>
		<dd>
			<?php echo h($giahan['Giahan']['imei']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ngay Het Han'); ?></dt>
		<dd>
			<?php echo h($giahan['Giahan']['ngay_het_han']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($giahan['Giahan']['link']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Giahan'), array('action' => 'edit', $giahan['Giahan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Giahan'), array('action' => 'delete', $giahan['Giahan']['id']), array(), __('Are you sure you want to delete # %s?', $giahan['Giahan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Giahans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Giahan'), array('action' => 'add')); ?> </li>
	</ul>
</div>
