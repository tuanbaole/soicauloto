<div style=" padding-left: 15px;" align="left">
	<div class="cat_content">
		<div><b>Sau <?php echo $ngay_sau; ?> ngày :</b></div>
		<?php 
			$daysos = array_count_values($kq);
			arsort($daysos);
		?>
		<?php foreach ($daysos as $key_dayso => $dayso): ?>
			<span class="number"><?php echo $key_dayso ?></span>
			<span style="font-size: 11px">: <?php echo $dayso ?> lần,</span>
		<?php endforeach ?>
		<div style="clear: both;"></div>
		<br>
		<?php sort($kq); ?>
		<div><b><?php echo implode(", ",array_unique($kq)) ?></b></div>
		<div style="clear: both;"></div>
	</div>
</div>
<br/>