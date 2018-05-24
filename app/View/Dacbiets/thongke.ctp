<div class="row boder">
	<div class="col-md-8 col-md-push-2">
		<label><?php echo __("Năm"); ?></label>
		<?php 
			$valueYear = "2018";
			if (isset($this->request->pass[0])) $valueYear = $this->request->pass[0];
			echo $this->Form->input(__('Nam'), array(
			'div' => false,
			'label' => false,
			'value' => h($valueYear),
			'options' => $selectYear
			)); 
		?>
	</div>
	<div class="col-md-8 col-md-push-2">
		<table class="table">
			<thead>
				<tr>
					<th class="td_thong_ke">
						<span class="td_content_thong_ke">
							<?php echo __("Ngày/Tháng"); ?>
						</span>
					</th>
					<?php for ($i=1; $i < 13; $i++) : ?> 
						<th class="td_thong_ke">
							<span class="td_content_thong_ke">
								<?php echo $i; ?>
							</span>
						</th>
					<?php endfor ?>
				</tr>
			</thead>
			<tbody>
				<?php for ($i=1; $i <= 31; $i++) : ?> 
				<tr>
					<td class="td_thong_ke">
						<div class="td_content_thong_ke"><b><?php echo  $i; ?></b></div>
					</td>
					<?php for ($y=0; $y < 12; $y++) : ?> 
					<td class="td_thong_ke">
						<?php 
							if (isset($hienthi_ngay[$i][$y])) {
								if ($hienthi_ngay[$i][$y]["Dacbiet"]["dacbiet"] != "00000") { ?>
								<span class="td_content_thong_ke">
									<?php echo $hienthi_ngay[$i][$y]["Dacbiet"]["dacbiet"];	?>
								</span>	
								<?php }
							}
						?>
					</td>	
					<?php endfor; ?>				
				</tr>
				<?php endfor; ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#Nam").change(function(){
			$(".bg_load").toggle();
			$(".wrapper").toggle();
			var year = $(this).val();
			var arrLink = window.location.href.split("/");
			var link = "";
			if (arrLink.length == 6 || arrLink.length == 7) {
				link += arrLink[0] + "/" + arrLink[1] + "/" + arrLink[2] + "/" + arrLink[3] + "/" + arrLink[4] + "/"+ arrLink[5] + "/" + year;
			} else {
				link += arrLink[0] + "/" + arrLink[1] + "/" + arrLink[2] + "/" + arrLink[3] + "/" + arrLink[4] + "/"+ arrLink[5];
			}
			window.location.href = link;
		});
	});
</script>