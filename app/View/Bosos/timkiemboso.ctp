<div class="row boder">
	<div class="col-md-8 col-md-push-2">
		<div class="content_form">
			<?php echo __("Ngày bắt đầu"); ?>&#8758; <input type="date" value="2000-01-01" name="data[date]" id="ngay-chon-bat-dau">
			<?php echo __("Ngày kết thúc"); ?>&#8758; <input type="date" value="<?php echo date("Y-m-d"); ?>" name="data[date]" id="ngay-chon-ket-thuc">
		<br/>
		</div>
	</div>
	<div class="col-md-8 col-md-push-2">
		<table class="table">
			<tr>
		<?php foreach ($shows as $keyShow => $showArrs): ?>
			<td class="boso-table" style=" padding: 0;">
				<?php foreach ($showArrs as $showArr): ?>
					<input title="<?php echo $showArr['giatri']; ?>" type="checkbox" class="boso" value="false" id="boso-<?php echo $showArr["id"]; ?>" data-id="<?php echo $showArr["id"]; ?>">
					<span class="fontsize label-boso" data-id="<?php echo $showArr["id"]; ?>"><?php echo $showArr['boso']; ?></span><br/>
				<?php endforeach ?>
			</td>
		<?php endforeach ?>
			</tr>
		</table>
	</div>
	<div class="col-md-8 col-md-push-2">
		<div class="change-font-size">Dãy số đặc biệt cần thống kê: (các cặp số cách nhau bởi dấu phẩy. VD: 00,11,22,33,44,55,66,77,88,99) </div>
		<textarea class="full-width change-font-size" id="boso-kiemtra"></textarea>
		<div class="text-center">
			<button id="show-result"><?php echo __("Xem kết quả"); ?></button>
			<button id="clear-date-text"><?php echo __("Xóa box"); ?></button>
			<button id="ket-qua-dao-nguoc"><?php echo __("Đảo ngược"); ?></button>
		</div>
		<div>
			<table style="font-size: 11px; line-height: 15px;" width="100%" cellspacing="0" cellpadding="5">
				<tbody>
					<tr>
						<td style="font-weight: bold; line-height: 15px;" valign="top">
							<?php echo __("Dãy số");?>&nbsp;&#8758;
							<font color="red" id="bo-so-can-tim">00</font><br>
							<?php echo __("Ngưỡng cực đại xuất hiện dàn số là"); ?>&nbsp;&#8758;
							<font color="red" id="nguong-cuc-dai">0</font>
							<font color="red"><?php echo __(" ngày tính cả ngày về "); ?></font>
							(<font id="ngay-bat-dau">01/01/2000</font> đến ngày 
							<font id="ngay-ket-thuc"><?php echo date("d/m/Y"); ?></font>)<br>
							<?php echo __("Ngày Trúng liên tiếp"); ?>&nbsp;&#8758;
							<font color="red" id="trung-lien-tiep">0</font>
							<font color="red"><?php echo __(" ngày tính cả ngày về "); ?></font>
							(<font id="ngay-lien-tiep-bat-dau">01/01/2000</font> đến ngày 
							<font id="ngay-lien-tiep-ket-thuc"><?php echo date("d/m/Y"); ?></font>)<br>
							<?php echo __("Điểm gan đến nay là"); ?>&nbsp;&#8758;
							<font color="red" id="diem-gan">0</font>
							<font color="red">&nbsp;<?php echo __("ngày"); ?></font>
							<br>
							<?php echo __("Tổng số con"); ?>&nbsp;&#8758;
							<font color="red" id="tong-so-con">0</font>
							<font color="red">&nbsp;<?php echo __("số"); ?></font>
							<br>
							<?php echo __("Thống kê trong khoảng"); ?>&nbsp;&#8758;
							<font color="red" id="ngay-chon-bat-dau-hien-thi"><?php echo "01/01/2000" ?></font> 
							đến ngày 
							<font color="red" id="ngay-chon-ket-thuc-hien-thi"><?php echo date("d/m/Y"); ?></font>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
echo $this->Html->script(array(
    'boso/timkiemboso.js'
));
?>