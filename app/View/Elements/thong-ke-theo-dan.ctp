<div style=" padding-left: 15px;" align="left">
	<div class="cat_content">
		<div><b>Sau <?php echo $ngay_sau; ?> ngày :</b></div>
		<table class="table table-bordered table-kq-bold-border">
			<thead>
				<tr class="info">
					<th colspan="2" align="center"><?php echo __("Thống Kê Chạm") ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($dan_ngays as $key_ngay => $dan_ngay): ?>
					<tr>
						<td>
							<font color="red" style="font-weight: bold;">
							<?php 
								switch ($key_ngay) {
									case 'dau':
										echo "Đầu";
										break;
									case 'dit':
										echo "Đít";
										break;
									case 'tong':
										echo "Tổng";
										break;
								}
							?>
							<font color="red">
						</td>
						<td>
							<?php foreach ($dan_ngay as $key_value => $hien_thi): ?>
								<font color="red"><?php echo $key_value; ?></font>
								<font>(<?php echo $hien_thi."&nbsp;".__("lần"); ?>)</font>
							<?php endforeach ?>
						</td>
					</tr>	
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>