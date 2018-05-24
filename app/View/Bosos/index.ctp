<div class="bosos index">
	<h2><?php echo __('Bosos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('boso'); ?></th>
			<th><?php echo $this->Paginator->sort('giatri'); ?></th>
			<th><?php echo $this->Paginator->sort('cot'); ?></th>
			<th><?php echo $this->Paginator->sort('hang'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($bosos as $boso): ?>
	<tr>
		<td><?php echo h($boso['Boso']['id']); ?>&nbsp;</td>
		<td><?php echo h($boso['Boso']['boso']); ?>&nbsp;</td>
		<td><?php echo h($boso['Boso']['giatri']); ?>&nbsp;</td>
		<td><?php echo h($boso['Boso']['cot']); ?>&nbsp;</td>
		<td><?php echo h($boso['Boso']['hang']); ?>&nbsp;</td>
		<td><?php echo h($boso['Boso']['created']); ?>&nbsp;</td>
		<td><?php echo h($boso['Boso']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $boso['Boso']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $boso['Boso']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $boso['Boso']['id']), array(), __('Are you sure you want to delete # %s?', $boso['Boso']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Boso'), array('action' => 'add')); ?></li>
	</ul>
</div>
