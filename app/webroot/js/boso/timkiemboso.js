$(document).ready(function(){
	$(".boso").attr("checked", false);
	$("#boso-kiemtra").val('').empty();
	$(".boso").click(function(){
		var boso = $(this).attr("title");
		$(this).attr("disabled", true);
		var boso = $(this).attr('title');
		giatriBoso(boso);
	});

	$("#ket-qua-dao-nguoc").click(function(){
		var valBoso = $("#boso-kiemtra").val();
		var bienso = 0;
		var string = "";
		for (var i = 0; i < 100; i++) {
			bienso = i;
			if (i < 10) {
				bienso = "0"+i;
			}
			if (valBoso.indexOf(bienso) == -1) {
				if (string != "") {
					string += ","+bienso;
				} else {
					string += bienso;
				}
				
			}
		}
		$("#boso-kiemtra").val(string);
		$(".boso").attr("checked", false).attr("disabled", false);;
	});

	$(".label-boso").click(function(){
		var data_id = $(this).attr("data-id");
		$("#boso-"+data_id).attr("disabled", true).prop('checked', true);
		var boso = $("#boso-"+data_id).attr('title');
		giatriBoso(boso);
	});

	function giatriBoso(boso) {
		if ($("#boso-kiemtra").length == 1) {
			var valArea = $("#boso-kiemtra").val();
			var valNew = boso.split(',');
		    for(var i=0; i<valNew.length; i++){
		    	if (valArea.indexOf(valNew[i]) == -1) {
		    		if (valArea != "") {
		    			valArea += ", " + valNew[i];
		    		} else {
		    			valArea += valNew[i];
		    		}
		    	}
		    }
			$("#boso-kiemtra").val(valArea);	
		}
	}

	function clearBoso() {
		clearBoso();
	}

	$("#clear-date-text").click(function(){
		$("#boso-kiemtra").val('').empty();
		$(".boso").attr("checked", false).attr("disabled", false);
	});

	$("#show-result").click(function(){
		var boso = $("#boso-kiemtra").val();
		if (boso != "") {
			boso = boso.replace(/\s/g, '').trim();
			$("#boso-kiemtra").val(boso);
			var socon = boso.split(',').length;
			$("#tong-so-con").text(socon);
			var ngay_chon_bat_dau = $("#ngay-chon-bat-dau").val();
			var ngay_chon_ket_thuc = $("#ngay-chon-ket-thuc").val();
			$.ajax({
				url: "dacbiets/dulieu_trave",
				type: 'POST',
				data : {
					boso : boso,
					ngay_chon_bat_dau : ngay_chon_bat_dau,
					ngay_chon_ket_thuc : ngay_chon_ket_thuc
				},
				beforeSend:function() {
					$(".bg_load").show();
					$(".wrapper").show();
				},
				success: function(result){
					$(".bg_load").hide();
					$(".wrapper").hide();
					var data = $.parseJSON(result);
					$("#bo-so-can-tim").text(data.bosocantim);
					$("#diem-gan").text(data.diem_gan);
					$("#nguong-cuc-dai").text(data.nguong_cuc_dai);
					$("#ngay-bat-dau").text(data.date_start);
					$("#ngay-ket-thuc").text(data.date_end);
					$("#trung-lien-tiep").text(data.so_ngay_an_thong);
					$("#ngay-lien-tiep-bat-dau").text(data.ngay_bat_dau_an_thong);
					$("#ngay-lien-tiep-ket-thuc").text(data.ngay_ket_thuc_an_thong);
					var date_bat_dau = new Date(ngay_chon_bat_dau);
					var ngay_chon_bat_dau_text = date_bat_dau.getDate() + "/" + (date_bat_dau.getMonth() + 1) + "/" + date_bat_dau.getFullYear();
					$("#ngay-chon-bat-dau-hien-thi").text(ngay_chon_bat_dau_text);
					var date_ket_thuc = new Date(ngay_chon_ket_thuc);
					var ngay_chon_ket_thuc_text = date_ket_thuc.getDate() + "/" + (date_ket_thuc.getMonth() + 1) + "/" + date_ket_thuc.getFullYear();
					$("#ngay-chon-ket-thuc-hien-thi").text(ngay_chon_ket_thuc_text);
		    	}
			});

		} else {
			alert("Chưa có số liệu để tìm kiếm");
		}
	
	});

});