<div class="giahans index">
	<h2><?php echo __('Giahans'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('imei'); ?></th>
			<th><?php echo $this->Paginator->sort('ngay_het_han'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($giahans as $giahan): ?>
	<tr>
		<td><?php echo h($giahan['Giahan']['id']); ?>&nbsp;</td>
		<td><?php echo h($giahan['Giahan']['imei']); ?>&nbsp;</td>
		<td><?php echo h($giahan['Giahan']['ngay_het_han']); ?>&nbsp;</td>
		<td><?php echo h($giahan['Giahan']['link']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $giahan['Giahan']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $giahan['Giahan']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $giahan['Giahan']['id']), array(), __('Are you sure you want to delete # %s?', $giahan['Giahan']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Giahan'), array('action' => 'add')); ?></li>
	</ul>
</div>
