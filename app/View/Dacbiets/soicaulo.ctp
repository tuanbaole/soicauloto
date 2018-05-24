<div class="row boder">
	<div class="col-md-12">
		<div class="content_form">
		<form action="<?php echo $this->request->here; ?>" id="soicauloSoicauloForm" method="post" accept-charset="utf-8">
			Biên ngày: <input type="date" value="<?php echo $ngay_tim_kiem; ?>" name="data[date]">
			<input value="Xem kết quả" type="submit" class="js_loading_page">
		</form>
		<br/>
		</div>
	</div>
	<div class="col-md-12">
		<?php if (!empty($solieu_cantims)): ?>
			<div class="cat_title">1.Tổng hợp dãy số kết quả đặc biệt đã về sau khi đặc biệt ra 
				<span class="number"><?php echo $giaidb_hn; ?></span> ra ngày 
				<span class="date"><?php echo $ngay_tim_kiem; ?></span>
			</div>
			<div style=" padding-left: 15px;" align="left">
				<div class="cat_content">
					<div><b>Sau 1 ngày :</b></div>
					<?php 
						$dayso_thunhats = array_count_values($kq_thu_nhat);
						arsort($dayso_thunhats);
					?>
					<?php foreach ($dayso_thunhats as $key_dayso => $dayso_thunhat): ?>
						<span class="number"><?php echo $key_dayso ?></span>
						<span style="font-size: 11px">: <?php echo $dayso_thunhat ?> lần,</span>
					<?php endforeach ?>
					<div style="clear: both;"></div>
					<br>
					<?php sort($kq_thu_nhat); ?>
					<div><b><?php echo implode(", ",array_unique($kq_thu_nhat)) ?></b></div>
					<div style="clear: both;"></div>
				</div>
			</div>
			<br/>
				<div style=" padding-left: 15px;" align="left">
				<div class="cat_content">
					<div><b>Sau 2 ngày :</b></div>
					<?php 
						$dayso_thuhais = array_count_values($kq_thu_hai);
						arsort($dayso_thuhais);
					?>
					<?php foreach ($dayso_thuhais as $key_dayso_hai => $dayso_thuhai): ?>
						<span class="number"><?php echo $key_dayso_hai ?></span>
						<span style="font-size: 11px">: <?php echo $dayso_thuhai ?> lần,</span>
					<?php endforeach ?>
					<div style="clear: both;"></div>
					<br>
					<?php sort($kq_thu_hai); ?>
					<div><b><?php echo implode(", ",array_unique($kq_thu_hai)) ?></b></div>
					<div style="clear: both;"></div>
				</div>
			</div>
			<br/>
				<div style=" padding-left: 15px;" align="left">
				<div class="cat_content">
					<div><b>Sau 3 ngày :</b></div>
					<?php 
						$dayso_thubas = array_count_values($kq_thu_ba);
						arsort($dayso_thubas);
					?>
					<?php foreach ($dayso_thubas as $key_dayso_ba => $dayso_thuba): ?>
						<span class="number"><?php echo $key_dayso_ba ?></span>
						<span style="font-size: 11px">: <?php echo $dayso_thuba ?> lần,</span>
					<?php endforeach ?>
					<div style="clear: both;"></div>
					<br>
					<?php sort($kq_thu_ba); ?>
					<div><b><?php echo implode(", ",array_unique($kq_thu_ba)) ?></b></div>
					<div style="clear: both;"></div>
				</div>
			</div>
			<br/>
			<div class="cat_title">2.Các kết quả đặc biệt đã về sau khi giải đặc biệt xuất hiện 2 số cuối là
			 	<span class="number"><?php echo $giaidb_hn; ?></span> ra ngày 
				<span class="date"><?php echo $ngay_tim_kiem; ?></span>
			</div>
			<?php foreach ($solieu_cantims as $solieu_cantim): ?>
					<div class="cat_item">
						<?php foreach ($solieu_cantim as $keygiatri => $giatri_hienthi): ?>
							&nbsp;Ngày&nbsp;<span class="date"><?php echo $giatri_hienthi["ngay"] ?></span>
							về&nbsp;<span class="number"><?php echo $giatri_hienthi["dacbiet"] ?></span>
							<?php if ($keygiatri == 0): ?><br/><?php endif ?>
						<?php endforeach ?>	
					</div>
			<?php endforeach ?>
		<?php else : ?>
			<div class="alert alert-danger" role="alert"><?php echo __("Chưa tìm thấy kết quả nào !!!") ?></div>
		<?php endif ?>
	</div>
</div>