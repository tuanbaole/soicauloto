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
			<div class="cat_title">
				1.Thống kê tần suất loto đặc biệt sau khi giải ĐB xuất hiện
			</div>
			<?php echo $this->element('thong-ke-theo-dan',array("dan_ngays" => $dan_ngay_thu_nhats,"ngay_sau" => "1")); ?>
			<?php echo $this->element('thong-ke-theo-dan',array("dan_ngays" => $dan_ngay_thu_hais,"ngay_sau" => "2")); ?>
			<?php echo $this->element('thong-ke-theo-dan',array("dan_ngays" => $dan_ngay_thu_bas,"ngay_sau" => "3")); ?>
			<div class="cat_title">2.Tổng hợp dãy số kết quả đặc biệt đã về sau khi đặc biệt ra 
				<span class="number"><?php echo $giaidb_hn; ?></span> ra ngày 
				<span class="date"><?php echo $ngay_tim_kiem; ?></span>
			</div>
			<?php echo $this->element('thong-ke-tung-so',array("kq" => $kq_thu_nhat,"ngay_sau" => "1")); ?>
			<?php echo $this->element('thong-ke-tung-so',array("kq" => $kq_thu_hai,"ngay_sau" => "2")); ?>
			<?php echo $this->element('thong-ke-tung-so',array("kq" => $kq_thu_ba,"ngay_sau" => "3")); ?>
			<div class="cat_title">3.Các kết quả đặc biệt đã về sau khi giải đặc biệt xuất hiện 2 số cuối là
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