<div class="dacbiets index">
	<h2><?php echo __('Dacbiets'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('dacbiet'); ?></th>
			<th><?php echo $this->Paginator->sort('loto'); ?></th>
			<th><?php echo $this->Paginator->sort('quantrong'); ?></th>
			<th><?php echo $this->Paginator->sort('ngay'); ?></th>
			<th><?php echo $this->Paginator->sort('thang'); ?></th>
			<th><?php echo $this->Paginator->sort('nam'); ?></th>
			<th><?php echo $this->Paginator->sort('ngay_tao'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($dacbiets as $dacbiet): ?>
	<tr>
		<td><?php echo h($dacbiet['Dacbiet']['id']); ?>&nbsp;</td>
		<td><?php echo h($dacbiet['Dacbiet']['dacbiet']); ?>&nbsp;</td>
		<td><?php echo h($dacbiet['Dacbiet']['loto']); ?>&nbsp;</td>
		<td><?php echo h($dacbiet['Dacbiet']['quantrong']); ?>&nbsp;</td>
		<td><?php echo h($dacbiet['Dacbiet']['ngay']); ?>&nbsp;</td>
		<td><?php echo h($dacbiet['Dacbiet']['thang']); ?>&nbsp;</td>
		<td><?php echo h($dacbiet['Dacbiet']['nam']); ?>&nbsp;</td>
		<td><?php echo h($dacbiet['Dacbiet']['ngay_tao']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dacbiet['Dacbiet']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dacbiet['Dacbiet']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dacbiet['Dacbiet']['id']), array(), __('Are you sure you want to delete # %s?', $dacbiet['Dacbiet']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Dacbiet'), array('action' => 'add')); ?></li>
	</ul>
</div>
