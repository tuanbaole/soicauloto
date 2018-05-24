<div class="dacbiets view">
<h2><?php echo __('Dacbiet'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dacbiet['Dacbiet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dacbiet'); ?></dt>
		<dd>
			<?php echo h($dacbiet['Dacbiet']['dacbiet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Loto'); ?></dt>
		<dd>
			<?php echo h($dacbiet['Dacbiet']['loto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantrong'); ?></dt>
		<dd>
			<?php echo h($dacbiet['Dacbiet']['quantrong']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ngay'); ?></dt>
		<dd>
			<?php echo h($dacbiet['Dacbiet']['ngay']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thang'); ?></dt>
		<dd>
			<?php echo h($dacbiet['Dacbiet']['thang']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nam'); ?></dt>
		<dd>
			<?php echo h($dacbiet['Dacbiet']['nam']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ngay Tao'); ?></dt>
		<dd>
			<?php echo h($dacbiet['Dacbiet']['ngay_tao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dacbiet'), array('action' => 'edit', $dacbiet['Dacbiet']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dacbiet'), array('action' => 'delete', $dacbiet['Dacbiet']['id']), array(), __('Are you sure you want to delete # %s?', $dacbiet['Dacbiet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dacbiets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dacbiet'), array('action' => 'add')); ?> </li>
	</ul>
</div>
