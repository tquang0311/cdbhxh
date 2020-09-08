$(document).ready(function(){

	/*alertify.defaults.transition = "zoom";
	alertify.defaults.theme.ok = "btn btn-success";
	alertify.defaults.theme.cancel = "btn btn-warning";
	alertify.defaults.theme.input = "form-control";*/

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})

    setTimeout(function(){
        $(document).find('div.alert').fadeOut(3000);
    }, 2000);
    $(document).find('div.alert').click(function(){
    	$(this).fadeOut(1500);
    })
    $('#notification a').click(function(){
    	$(this).parents('#notification').find('.data').slideToggle();
    });

    $('.collapse').collapse();
});
	var currentUrl = location.href;
	var list_macqbhxh = ['001','00101','00102','00103','00104','00105','00106','00107','00108','00109','00110','00111','00112','00113','00114','00115','00116','00117','00118','00119','00120','00121','00122','00123','00124','00125','00126','00127','00128','00129','00131'];
	var list_tencqbhxh = ['Phòng TN & TKQ TTHC','BHXH Quận Ba Đình','BHXH Quận Hoàn Kiếm','BHXH Quận Tây Hồ','BHXH Quận Long Biên','BHXH Quận Cầu Giấy','BHXH Quận Đống Đa','BHXH Quận Hai Bà Trưng','BHXH Quận Hoàng Mai','BHXH Quận Thanh Xuân','BHXH Huyện Sóc Sơn','BHXH Huyện Đông Anh','BHXH Huyện Gia Lâm','BHXH Quận Nam Từ Liêm','BHXH Huyện Thanh Trì','BHXH Quận Hà Đông','BHXH Thị xã Sơn Tây','BHXH Huyện Ba Vì','BHXH Huyện Phúc Thọ','BHXH Huyện Đan Phượng','BHXH Huyện Hoài Đức','BHXH Huyện Quốc Oai','BHXH Huyện Thạch Thất','BHXH Huyện Chương Mỹ','BHXH Huyện Thanh Oai','BHXH Huyện Thường Tín','BHXH Huyện Phú Xuyên','BHXH Huyện Ứng Hòa','BHXH Huyện Mỹ Đức','BHXH Huyện Mê Linh','BHXH Quận Bắc Từ Liêm'];
	var list_Idcqbhxh = [3921,4823,4824,3936,3938,3940,3941,3942,3943,3944,3945,3946,3947,3948,3949,3950,3952,4741,4742,4743,4744,4745,4746,4747,4748,4749,4750,4751,4752,4753,4954];

	function checkall(name, obj) {
    	var items = document.getElementsByName('hs[]');
        if(obj.checked == true) {
            for( i=0; i < items.length; i++)
                items[i].checked = true;
        }
        else {
            for( i=0; i < items.length; i++)
                items[i].checked = false;
        }
    }

	function checkallByClass(ClassName, obj) {
    	var items = document.getElementsByClassName(ClassName);
        if(obj.checked == true) {
            for( i=0; i < items.length; i++)
                items[i].checked = true;
        }
        else {
            for( i=0; i < items.length; i++)
                items[i].checked = false;
        }
    }

function popup_close(){
	$('.btn-close').click(function(e) {
		$(this).parents('.popup').slideUp();
		$('#background').fadeOut();
	});
	$('html').keyup(function(e) {
		if (e.keyCode == 27) {
			$('.popup').slideUp();
			$('#background').fadeOut();
		}
	});
}
function closePopup() {
	$('#popup-banner .btn-close').click(function(){
		if (confirm('Thông báo này có 3 mục: Cập nhập mới, Phiếu trả & Lưu ý. Bạn chắc chắn đã xem hết thông báo này?') == true) {
			$('#background').fadeOut();
			$('#popup-banner').remove();
			setCookie("showPopup", 1,1);
		}
	})
}
function setCookie(e, n, o) {
    var t = "";
    if (o) {
        var i = new Date;
        i.setTime(i.getTime() + 4.5 * 60 * 60 * 1000), t = "; expires=" + i.toUTCString()
    }
    document.cookie = e + "=" + (n || "") + t + "; path=/"
}
function getCookie(e) {
    for (var n = e + "=", o = document.cookie.split(";"), t = 0; t < o.length; t++) {
        for (var i = o[t];
            " " == i.charAt(0);) i = i.substring(1, i.length);
        if (0 == i.indexOf(n)) return i.substring(n.length, i.length)
    }
    return null
}
1 != getCookie("showPopup") && (document.addEventListener("DOMContentLoaded", function(event) {
	$('#popup-banner, #background').fadeIn();
	closePopup();
}));
function checkHeight(){
	var y_screen = screen.availHeight;
	var y_top_header = $('.card').height();
	var y_form_search = $('.form_search').height();
	var y_btn_action = $('div.btn_action').height();
	var y_datatable = y_screen - y_top_header - y_form_search - y_btn_action;
	$('#data-vb .table-responsive, #ct_omts > div').css('max-height',y_datatable/1.3);
	$('#dataHosos .table-responsive').css('max-height',y_datatable/1.5);
	$('#popup-banner > div').css('max-height',y_screen);
}

/*==VĂN BẢN==*/
	var fn = $('#fn').text();

	$(function(){
		var countquahan = $('#popup-banner span.qua-han').data('quahanptpdn');
		if (countquahan>0) {
			var text = 'Bạn có '+countquahan+' văn bản đang dự thảo quá 20 ngày trở lên. Thông báo này sẽ hiển thị 20 giây/lần đến khi tất cả đã được xử lý hoặc hủy dự thảo.'
			/*alert(text);
			setInterval(function(){
			    alert(text);
			}, 60000);*/
        	$('#message').append("<div class='alert alert-warning text-center success m-3 p-4' role='alert'><i class='fas fa-exclamation-circle fa-2x float-left'></i><strong>"+text+"</strong></div>");
        	setInterval(function(){
			    $('#message').append("<div class='alert alert-warning text-center success m-3 p-4' role='alert'><i class='fas fa-exclamation-circle fa-2x float-left'></i><strong>"+text+"</strong></div>");
			    setTimeout(function(){
			        $(document).find('div.alert').fadeOut(4000);
			    }, 4000);
			}, 20000);
		}
	});

	$('.ma-dv').change(function(){
		let madv = $(this).val();
		$.ajax({
			url: '../phieu-tra/dv-sdld.php',
			type: 'POST',
			dataType: 'text',
			data: { madv: madv }
		}).done(function (get_dvsdld) {
			$('.ten-dv').text(get_dvsdld);
			if ($('.ten-dv').text()=='Sai mã đơn vị') {
				$('.ma-dv').addClass('border-danger');
				$('#add-new button').attr('disabled', true);
			} else {
				$('.ma-dv').removeClass('border-danger');
				$('#add-new button').removeAttr('disabled');
			}
		});
	});
	$('.ho-ten-nld, .so-so').change(function(){
		let ho_ten_nld = $('.ho-ten-nld').val();
		let so_so = $('.so-so').val();
		$.ajax({
			url: '../module/qlvb/trung-hs.php',
			type: 'POST',
			dataType: 'json',
			data: {
				ho_ten_nld: ho_ten_nld,
				so_so: so_so
			}
		}).done(function (trung_hs) {
			if (trung_hs.result=='error') {
				alert('Hồ sơ này đã được xử lý trước đó '+trung_hs.msg+' lần');
			}
		});
	});
	$('#tong-hop').click(function(){
		$('#tonghop, #background').fadeIn();
		popup_close();
	});

	$('.onRow').click(function () {
		$(this).parents('.table-responsive').find('.onRow td').each(function (index, element) {
			$(element).parents('tr').removeClass('table-info');
		});
		$(this).addClass('table-info');
		var count = $('.table-responsive').find('.table-info').length;
		let vbi = $('.table-info .vbi').text();
		let nguoi_du_thao = $('#data-vb .table-info .ndt').text();
		let status = $('#data-vb .table-info .status').text();
		$('#selected').attr('href', '/vb/?vb=' + vbi);
		if (count >= 1) {
			$('#view-vb').removeAttr('disabled');
		} else {
			$('#view-vb').attr('disabled', true);
		}
		if (count != 1 || fn != nguoi_du_thao || status == 'Đã xử lý' || status == 'Hủy dự thảo') {
			$('.btn-action').attr('disabled', true);
		} else {
			$('.btn-action').removeAttr('disabled');
		}
		if (count > 1 || status == 'Dự thảo') {
			$('#tu-choi').attr('disabled', true);
		} else {
			$('#tu-choi').removeAttr('disabled');
		}
		console.log(count);
	});

	$('#view-vb').click(function (e) {
		e.preventDefault();
			let vbi = $('.table-info .vbi').text();
			let vb_type = $('.table-info .vbi').data('vbtype');
			if (vb_type==3) {
				$('#xem-phieu-tra h4').text('XEM VĂN BẢN - PHIẾU TRẢ');
			} else if (vb_type==4) {
				$('#xem-phieu-tra h4').text('XEM VĂN BẢN - PHIẾU ĐỀ NGHỊ');
			}
			$.ajax({
				url: '../module/qlvb/xem-vb.php?vb_type='+vb_type,
				type: 'POST',
				dataType: 'text',
				data: { vb: vbi }
			}).done(function (view_vb) {
				$('#xem-phieu-tra, #background').fadeIn();
				$('#xem-phieu-tra .data').html(view_vb);
				popup_close();
			});
	});

	$('#edit-vb').click(function(e){
		let vbi = $('.table-info .vbi').text();
		let vb_type = $('.table-info .vbi').data('vbtype');
		if (vb_type==3) {
			$('#sua-phieu-tra h4').text('CHỈNH SỬA - PHIẾU TRẢ');
		} else if (vb_type==4) {
			$('#sua-phieu-tra h4').text('CHỈNH SỬA - PHIẾU ĐỀ NGHỊ');
		}
		$.ajax({
			url: '../module/qlvb/cap-nhap.php?action=view&vb_type='+vb_type,
			type: 'POST',
			dataType: 'text',
			data: { vb: vbi }
		}).done(function (view_vb) {
			$('#sua-phieu-tra, #background').fadeIn();
			$('#sua-phieu-tra .data').html(view_vb);
			$(".quan-huyen").change(function () {
				districtId = $(this).val();
				$.post('wards.php', {
							"distId": districtId
				}, function (ward) {
					$(".phuong-xa").html(ward);
				});
			});
			$('#sua-phieu-tra form').submit(function (e) {
				e.preventDefault();
				let parents = $('#sua-phieu-tra');
				let vbi = parents.find('.vbi').val();
				let ho_ten_nld = parents.find('.ho-ten-nld').val();
				let gioi_tinh = parents.find('.gender').val();
				let chuc_danh = parents.find('.chuc-danh').val();
				let ngay_sinh = parents.find('.ngay-sinh').val();
				let ngay_chet = parents.find('.ngay-chet').val();
				let ngay_nhan = parents.find('.ngay-nhan').val();
				let dot_nhan = parents.find('.dot-nhan').val();
				let sdt = parents.find('.sdt').val();
				let email = parents.find('.email').val();
				let so_so = parents.find('.so-so').val();
				let so_bb = parents.find('.so-bb').val();
				let ma_dv = parents.find('.ma-dv').val();
				let quan_huyen = parents.find('.quan-huyen').val();
				let phuong_xa = parents.find('.phuong-xa').val();
				let noi_nhan = parents.find('.noi-nhan').val();
				let noi_gui = parents.find('.noi-gui').val();
				let bhxhqh = parents.find('.bhxhqh').val();
				let cd_huong = parents.find('.cd-huong').val();
				let cd_giai_quyet = parents.find('.cd-giai-quyet').val();
				let noi_dung = CKEDITOR.instances['noi_dung'].getData();
				let ld_duyet = parents.find('.ld-duyet').val();
				var noidung = CKEDITOR.instances['noi_dung'].getData().replace(/<[^>]*>/gi, '');
		        if( !noidung ) {
		            alert('Bạn chưa nhập nội dung văn bản');
		            e.preventDefault();
		            return false;
		        }
		        function CKupdate() {
					for ( instance in CKEDITOR.instances )
					CKEDITOR.instances[instance].updateElement();
				}
				CKupdate();
				if (confirm("Xác nhận sửa văn bản") == false) {
					return false;
				}
				$.ajax({
					url: '../module/qlvb/cap-nhap.php?action=edit&vb_type='+vb_type,
					type: 'POST',
					dataType: 'text',
					data: {
						vb: vbi,
						ho_ten_nld: ho_ten_nld,
						gioi_tinh: gioi_tinh,
						chuc_danh: chuc_danh,
						ngay_sinh: ngay_sinh,
						ngay_chet: ngay_chet,
						ngay_nhan: ngay_nhan,
						dot_nhan: dot_nhan,
						sdt: sdt,
						email: email,
						so_so: so_so,
						so_bb: so_bb,
						ma_dv: ma_dv,
						quan_huyen: quan_huyen,
						phuong_xa: phuong_xa,
						noi_nhan: noi_nhan,
						noi_gui: noi_gui,
						bhxhqh: bhxhqh,
						cd_huong: cd_huong,
						cd_giai_quyet: cd_giai_quyet,
						noi_dung: noi_dung,
						ld_duyet: ld_duyet
					}
				}).done(function(edit_vb){
					$('#sua-phieu-tra .mess').html(edit_vb);
					let vbi = $('#sua-phieu-tra .vbi').text();
					$('.p').unbind('click').attr('href', '../vb/?vb='+ vbi);
				});
			});
		});
		popup_close();
	});

	$('#huy-dt').click(function(e){
		e.preventDefault();
		let lydo = prompt("Lý do hủy dự thảo (ko được để trống)");
		if (lydo) {
			let vbi = $('.table-info .vbi').text();
			let action_type = 'hủy dự thảo';
			$.ajax({
				url: '../phieu-tra/update-status.php',
				type: 'POST',
				dataType: 'text',
				data: {
					action_type: action_type,
					vbi: vbi,
					lydo: lydo
				}
			}).done(function(update_status) {
				$('#message').html(update_status);
				window.location.replace(location.href);
			});
		} else if (lydo == '') {
			alert('Lý do ko được để trống');
			return false;
		} else {
			return false;
		}
	});
	$('#da-duyet').click(function(e){
		e.preventDefault();
			let vbi = [], rowChecked = $('table tbody input:checked');
			if (rowChecked.length > 0) {
				for (var i = 0; i < rowChecked.length; i++) {
					vbi.push(rowChecked[i].value);
				}
				if (confirm("Xác nhận đã xử lý "+rowChecked.length+" văn bản đã chọn?") == false) {
					return false;
				}
				let action_type = 'đã xử lý';
				$.ajax({
					url: '../phieu-tra/update-status.php',
					type: 'POST',
					dataType: 'text',
					data: {
						action_type: action_type,
						vbi: vbi.join()
					}
				}).done(function(update_status) {
						$('#message').html(update_status);
						window.location.replace(location.href);
				});
			}
	});
	$('#tu-choi').click(function(e){
		e.preventDefault();
		let status = $('#data-vb .table-info .status').text();
		if (status == 'Dự thảo') {
			alert('văn bản đã chọn đang dự thảo');
		} else {
			if (confirm("Xác nhận từ chối văn bản đã chọn?") == false) {
				return false;
			}
			let vbi = $('.table-info .vbi').text();
			let action_type = 'từ chối';
			$.ajax({
				url: '../phieu-tra/update-status.php',
				type: 'POST',
				dataType: 'text',
				data: {
					action_type: action_type,
					vbi: vbi
				}
			}).done(function(update_status) {
				$('#message').html(update_status);
				window.location.replace(location.href);
			});
		}
	});
	$('#add-new select[name="noi-nhan"]').change(function(){
		var noinhan = $(this).val();
		if (noinhan==6) {
			$('.dvsdld').show();
			$('.bh-xhqh').hide();
		}
	});
	$('.p').click(function(){
		alert('Bạn chưa ghi dữ liệu');
	});
	$('#add-vb').click(function () {
		$('#add-new,#background').slideDown();
		$(".quan-huyen").change(function () {
			districtId = $(this).val();
			$.post('wards.php', {
				"distId": districtId
			}, function (ward) {
				$(".phuong-xa").html(ward);
			});
		});
		$('.loai-vb input').change(function() {
			let loaivb = $(this).val();
			if (loaivb==3) {
				$('.add-pt').show();
				$('.add-pt').find('input, select').removeAttr('disabled');
				$('.add-pdn').hide();
				$('.add-pdn').find('input, select').prop('disabled',true);
				$('#add-new h4').text('THÊM MỚI - PHIẾU TRẢ');
			} else if (loaivb==4) {
				$('.add-pt').hide();
				$('.add-pt').find('input, select').prop('disabled',true);
				$('.add-pdn').show();
				$('.add-pdn').find('input, select').removeAttr('disabled');
				$('#add-new h4').text('THÊM MỚI - PHIẾU ĐỀ NGHỊ');
			}
		});
		$('#add-new').submit(function(){
			if (confirm("Xác nhận thêm văn bản mới?") == false) {
				return false;
			}
		})
		popup_close();
	});

	$(function(){
		$('#chung_tu_omts').find('#so_hs,#loai_hs,#ma_dv').change(function() {
			let so_hs = $('#so_hs').val();
			let loai_hs = $('#loai_hs').val();
			let ma_dv = $('#ma_dv').val();
			if (so_hs != '' && ma_dv != '') {
				$.get('../module/chungtu_omts/tbctg.php',
					{so_hs: so_hs, loai_hs: loai_hs, ma_dv: ma_dv},
					function(result) {
						if (result.result=='success') {
							alert('Hồ sơ này có kèm theo thông báo chứng từ giả.')
							$('#chi_tiet_hs').removeAttr('disabled');
							//$('#chi_tiet_hs').val(result.msg);
						} else {
							$('#chi_tiet_hs').attr('disabled', true);
						}
					}, 'json'
				);
			}
		});
	})

	$(function(){
		$('#chung_tu_omts #ma_dv').change(function() {
			let ma_dv = $(this).val();
			$.get('../module/general/get_dvsdld.php',
				{ma_dv: ma_dv},
				function(result) {
					$('.ten_dv').val(result);
					if ($('.ten_dv').val()=='  Sai mã đơn vị') {
						alert('Vui lòng nhập chính xác mã đơn vị');
						$('#ma_dv').addClass('border-danger');
						$('#chung_tu_omts button').attr('disabled', true);
					} else {
						$('#ma_dv').removeClass('border-danger');
						$('#chung_tu_omts button').removeAttr('disabled');
					}
				}
			);
		});
	})

	$(function(){
		$('#chung_tu_omts').submit(function() {
			let confirmText = $(this).find('button.action').data('confirm');
			if (confirm(confirmText)==false) {
				return false;
			}
		});
	})

	$(function(){
		$('#data-vb, #ct_omts, #dataHosos').find('input[type="checkbox"]').click(function() {
			$(this).parents('.container-fluid').find('tbody').find('input[type="checkbox"]').not('.checkallChild').each(function() {
				if ($(this).is(':checked')) {
					$(this).parents('tr').addClass('table-success');
				} else {
					$(this).parents('tr').removeClass('table-success');
				}
			});
			let count_checked = $('table tbody').find('.table-success').length;
			if (count_checked>0) {
				$(document).find('.countchecked').text(count_checked);
				$(this).parents('.container-fluid').find('div.btn_action button.action').removeAttr('disabled');
				$(this).parents('.container-fluid').find('div.btn_action button:not(.action)').attr('disabled', true);
			} else {
				$(document).find('.countchecked').text('0');
				$(this).parents('.container-fluid').find('div.btn_action button.action').attr('disabled', true);
			}
		});

		/*$('#ct_omts').find('input[type="checkbox"]').click(function() {
			$(this).parents('.container-fluid').find('tbody').find('input[type="checkbox"]').not('.checkallChild').each(function() {
				if ($(this).is(':checked')) {
					$(this).parents('tr').addClass('table-info');
				} else {
					$(this).parents('tr').removeClass('table-info');
				}
			});
			let count_checked = $('table tbody').find('.table-info').length;
			let tt = $(this).data('tt');
			if (count_checked>0) {
				$(document).find('.countchecked').text(count_checked);
				$(this).parents('.container-fluid').find('div.btn_action button').attr('disabled', true);
				if (tt==2) {
					$(this).parents('.container-fluid').find('div.btn_action').find('#tao_bbbg, #tu_choi').removeAttr('disabled');
				} else if (tt==1 || tt==4) {
					alert('cho ban giao');
				}
			} else {
				$(document).find('.countchecked').text('0');
				$(this).parents('.container-fluid').find('div.btn_action button').attr('disabled', true);
			}
		});*/
	})

	$(function(){
		$('#ct_omts button').click(function() {
			var countchecked = $('#v-pills-profile .countchecked').text();
			var action = $(this).data('action');
			if (action=='processed') {
				var confirmText = 'Xác nhận đã xử lý ';
			} else if (action=='delete') {
				var confirmText = 'Xác nhận xóa ';
			} else if (action=='creatlist') {
				var confirmText = 'Xác nhận tạo biên bản bàn giao ';
			} else if (action=='deny') {
				var confirmText = 'Xác nhận từ chối ';
			}
			if (confirm(confirmText+countchecked+' hồ sơ đã chọn?')==false) {
				$(this).parents('form').submit(function() {
					return false;
				});
			} else {
				$(this).parents('form').unbind();
			}
		});
	})

	$(function(){
		$('#so_hs,#loai_hs').change(function() {
			let SoHS = $('#so_hs').val();
			let loai_hs = $('#loai_hs').val();
			if (loai_hs == 1) {
				var loai_hsText = '';
			} else if (loai_hs == 2) {
				var loai_hsText = '.G';
			} else if (loai_hs == 3) {
				var loai_hsText = '.BD';
			}
			$.get('../module/chungtu_omts/check_sohs.php', {so_hs: SoHS+loai_hsText}, function(result) {
				if (result.result=='true') {
					alert(result.msg);
					$('#chung_tu_omts button').attr('disabled', true);
				} else if (result.result=='false') {
					$('#chung_tu_omts button').removeAttr('disabled');
				}
			},'json');
		});
	})

	$(function(){
		$('#loai_hs').change(function() {
			let loai_hs = $(this).val();
			if (loai_hs == 1) {
				var loai_hsText = '';
			} else if (loai_hs == 2) {
				var loai_hsText = '.G';
			} else if (loai_hs == 3) {
				var loai_hsText = '.BD';
			}
			$(this).parents('.row').find('.loaihs').text(loai_hsText);
		});
	})

	$( function() {
	    function split( val ) {
	      return val.split( /;\s*/ );
	    }
	    function extractLast( term ) {
	      return split( term ).pop();
	    }
	 
	    $( "#SoHS" )
	      .on( "keydown", function( event ) {
	        if ( event.keyCode === $.ui.keyCode.TAB &&
	            $( this ).autocomplete( "instance" ).menu.active ) {
	          event.preventDefault();
	        }
	      })
	      .autocomplete({
	        minLength: 0,
	        source: function( request, response ) {
	        	$.getJSON('../module/chungtu_omts/sohs_autocomplete.php', {
	        		term: extractLast( request.term )
	        	}, response);
	        },
	        focus: function() {
	          return false;
	        },
	        select: function( event, ui ) {
	          var terms = split( this.value );
	          terms.pop();
	          terms.push( ui.item.value );
	          terms.push( "" );
	          this.value = terms.join( ";" );
	          return false;
	        }
	      });

	    $('#So_HS').keyup(function() {
	    	if ($(this).val().length > 3) {
		    $(this)
		      .on( "keydown", function( event ) {
		        if ( event.keyCode === $.ui.keyCode.TAB &&
		            $( this ).autocomplete( "instance" ).menu.active ) {
		          event.preventDefault();
		        }
		      })
		      .autocomplete({
		        minLength: 0,
		        source: function( request, response ) {
		        	$.getJSON('../module/pm_1_cua/get_data.php?cqbhxh='+$('#listIdCqbhxh').val(), {
		        		term: extractLast( request.term )
		        	}, response);
		        },
		        focus: function() {
		          return false;
		        },
		        select: function( event, ui ) {
		          var terms = split( this.value );
		          // remove the current input
		          terms.pop();
		          // add the selected item
		          terms.push( ui.item.value );
		          // add placeholder to get the comma-and-space at the end
		          terms.push( "" );
		          this.value = terms.join( ";" );
		          return false;
		        }
		      });
	    	}
	    });

	    $("#cqbhxh")
	      .on( "keydown", function( event ) {
	        if ( event.keyCode === $.ui.keyCode.TAB &&
	            $( this ).autocomplete( "instance" ).menu.active ) {
	          event.preventDefault();
	        }
	      })
	      .autocomplete({
	        minLength: 0,
	        source: function( request, response ) {
	        	response( $.ui.autocomplete.filter(
            		list_tencqbhxh, extractLast( request.term ) ) );
	        },
	        focus: function() {
	          return false;
	        },
	        select: function( event, ui ) {
	          var terms = split( this.value );
	          // remove the current input
	          terms.pop();
	          // add the selected item
	          terms.push( ui.item.value );
	          /*for (var i = 0; i < terms.length; i++) {
	          	var keyofList_tencqbhxh = list_tencqbhxh.indexOf(terms[i]);
	          	if (keyofList_tencqbhxh != -1) {
	          		list_tencqbhxh.splice(keyofList_tencqbhxh, 1);
	          	}
	          }*/
	          // add placeholder to get the comma-and-space at the end
	          terms.push( "" );
	          this.value = terms.join( ";" );
	          return false;
	        }
	      });
	  });



	$(function(){
		$('a.view_info').click(function() {
			let hsId = $(this).data('hsid');
			let tinh_trang = $(this).data('status');
			$.ajax({
				url: '../module/chungtu_omts/process_detail.php',
				type: 'GET',
				dataType: 'text',
				data: { hsId: hsId, tinh_trang: tinh_trang }
			}).done(function (detail) {
				$('#chungtu_omts_info, #background').fadeIn();
				$('#chungtu_omts_info .data').html(detail);
				popup_close();
			});
		});
	})

	$(function(){
		$("button[data-toggle='collapse']").click(function() {
			var target = $(this).data('target');
			if ($(target).hasClass('show')) {
				$(this).find('span').html("<i class='fas fa-caret-down'></i>");
			} else {
				$(this).find('span').html("<i class='fas fa-caret-up'></i>");
			}
		});
	})

	$(function(){
		$('#formsearchTNHS').submit(function() {
			if ($('#chothuly').is(":checked")==true || $('#dangthuly').is(":checked")==true) {
				if ($('#hosodunghan').is(":checked")==false && $('#hososapdenhan').is(":checked")==false && $('#hosoxulymuon').is(":checked")==false) {
					alert('Vui lòng chọn ít nhất 1 trạng thái xử lý hồ sơ: Đúng hạn, Cảnh báo hoặc Muộn.');
					return false;
				}
			} else if ($('#chotaobienban').is(":checked")==true) {
				if ($('#cqbhxh').val()=='') {
					alert('Vui lòng chọn ít nhất 1 tên cơ quan tổ chức BHXH.');
					return false;
				}
			}
		});
	})

	$(function(){
		$('#sortBy,#pageSize').change(function() {
			var sortBy = $('#sortBy').val();
			var pagesize = $('#pageSize').val();
			var newUrl;
			var vars = [];
	        if (currentUrl.indexOf('?')!=-1) {
	          	var query = currentUrl.substring(currentUrl.indexOf('?')+1, currentUrl.length);
	          if (query.indexOf('&')!=-1) {
	            var vars = query.split('&');
	            for (var i = 0; i < vars.length; i++) {
	              if (vars[i].indexOf('sortBy')!=-1) {
	                vars.splice(i,1);
	              }
	              if (vars[i].indexOf('pagesize')!=-1) {
	                vars.splice(i,1);
	              }
	            }
	          }
	        }
	        vars.push('sortBy='+sortBy,'pagesize='+pagesize);
        	if (currentUrl.indexOf('?')!=-1) {
        		newUrl = currentUrl.substring(0, currentUrl.indexOf('?'))+'?'+vars.join('&');
        	}
			window.location.replace(newUrl);
		});
	})

	$(function(){
		/*$('div.btn_action button').not('.process-multiple').click(function() {
			var action = $(this).data('action');
			var items = $('#dataHosos').find('.table-info');
			var count_checked = items.length;
			var listItems = [];
			var listBuoc = [];
			var listTtxl = [];
			var listItemsByMacq = [];
			var listItemsByMacq1 = [];
			var listItemsHTML = '';
			items.each(function() {
				var input = $(this).find('input[type="checkbox"]');
				var maCq = input.data('macq');
				var ttxl = input.data('ttxl');
				var buoc = input.data('buoc');
				var hsId = input.val();
				listItems.push(hsId);
				listBuoc.push(buoc);
				listTtxl.push(ttxl);
				var key = list_macqbhxh.indexOf(maCq);
				if (listItemsByMacq.includes(list_tencqbhxh[key])==false) {
					listItemsByMacq.push(list_tencqbhxh[key]);
				}
				listItemsByMacq1.push(list_tencqbhxh[key]);
				console.log(listItemsByMacq.includes(list_tencqbhxh[key]));
			});
			if (action=='phancong') {
				actionName = 'Phân công';
			} else if (action=='tiepnhan') {
				actionName = 'Tiếp nhận';
			} else if (action=='xuly') {
				actionName = 'Xử lý';
			} else if (action=='taobienban') {
				actionName = 'Tạo biên bản';
			}
			$('#processAction').find('.'+action).removeClass('d-none');
			$('#processAction').find('.input-group, .nextAction').not('.'+action).addClass('d-none');
			listItemsHTML += "<ol>";
			for (var i = 0; i < listItemsByMacq.length; i++) {
				countthisItem = listItemsByMacq1.filter(x => x == listItemsByMacq[i]).length;
				listItemsHTML += "<li> "+listItemsByMacq[i]+": "+countthisItem+" HS</li>";
			}
			listItemsHTML += "</ol>";
			$('#processAction .modal-body input.listItems').val(listItems.join()).data('dataItems', {'listBuoc': listBuoc.join(), 'listTtxl': listTtxl.join()});
			$('#processAction .modal-body span.currentAction').text(actionName);
			$('#processAction .modal-body p.processName').html('<span class="actionName" data-actname="'+actionName.replace(/\s/g, '')+'">'+actionName+'</span>'+' <b>'+count_checked+'</b> HS đã chọn:');
			$('#processAction .modal-body div.listItems').html(listItemsHTML);

			$('.nextAction input[type="checkbox"]').click(function() {
				let currentAction = $('#processAction .modal-body span.currentAction').text();
				let nextAction = '';
				if (action=='tiepnhan') {
					if ($('#xuly').is(':checked')) {
						nextAction += ', Xử lý';
						$('div.xuly').removeClass('d-none');
					} else {
						$('div.xuly').addClass('d-none');
						$('#taobienban').prop('checked', false);
					}
				}
				if ($('#taobienban').is(':checked')) {
					nextAction += ', Tạo biên bản';
				}
				$('#processAction .modal-body span.actionName').text(currentAction + nextAction).data('actname', (currentAction + nextAction).replace(/\s/g, ''));
			});

			console.log(list_tencqbhxh[list_macqbhxh.indexOf('001')]);
		});*/

		$('#agreeAction').click(function() {
			processTNHS();
			/*let currentAction = $('#processAction .currentAction').text();
			let listAction = $('#processAction .actionName').data('actname');
			let listItems = $('#processAction input.listItems').val();
			let dataItems = $('#processAction input.listItems').data('dataItems');
			var action = true;
			if (currentAction=='Phân công') {
				if ($('input[list="cbxl"]').val()=='') {
					alert('Vui lòng chọn người thụ lý HS.');
					action = false;
				} else {
			        var valueOfInput = $('input[list="cbxl"]').val();
			       	var cbxl = $('#cbxl [value="'+valueOfInput+'"]').data('value');
			       	action = true;
				}
			}
			if (action==true) {
				$.ajax({
					url: '../module/pm_1_cua/process.php',
					type: 'POST',
					dataType: 'text',
					data: {
						listAction: listAction,
						listItems: listItems,
						listBuoc: dataItems.listBuoc,
						listTtxl: dataItems.listTtxl,
						cbxl: cbxl
					}
				}).done(function (data) {
					$('#background').css({
						'z-index': '10000',
						'opacity': '0.8'
					}).fadeIn();
					$('body').append(
						$('<div/>', {
							class: 'loader',
						}).append(
							$('<img />', {
					          	src: './asset/images/drawing-gif-transparent-background-1.gif',
					        }),
							$('<h1/>', {
								class: 'text-center text-light',
							}).text('Chờ 1 tý...')
						)
					);
					window.location.replace(location.href);
				});
			}*/
		});
	});

	$('#personalInfo').submit(function(){
		if (confirm('Xác nhận '+$('select.ld_name option:selected').text()+' là người ký hồ sơ?')==false) {
			return false;
		}
	});

	/*$(function(){
		$('#formsearchTNHS input[name="trangthaixuly"]').change(function() {
			var trangthaixuly = $(this).val();
			if (trangthaixuly == 1 || trangthaixuly == 2) {
				$('.cho_dang_thu_ly').removeClass('d-none');
				$('.cho_dang_thu_ly').find('input').removeAttr('disabled');
			} else {
				$('.cho_dang_thu_ly').addClass('d-none');
				$('.cho_dang_thu_ly').find('input').attr('disabled', true);

			}
		});
	})*/

	$('#cqbhxh').change(function() {
		listIdcqbhxh = [];
		var listTencqbhxh = $(this).val();
		listTencqbhxh = listTencqbhxh.substring(0, listTencqbhxh.length - 1);
		listTencqbhxh = listTencqbhxh.split(';');
		for (var i = 0; i < listTencqbhxh.length; i++) {
			listIdcqbhxh.push(list_Idcqbhxh[list_tencqbhxh.indexOf(listTencqbhxh[i])]);
		}
		listIdcqbhxh = listIdcqbhxh.join();
		$('#listIdCqbhxh').val(listIdcqbhxh);
	});

	function processTNHS(){
		alert('process_data_TNHS');
	}

	$(function(){
		$('.number_record').change(function(){
	        let nItemOnPage = $(this).val();
	        let currentUrl = location.href;
	        let vars = [];
	        let getNumberRecord = currentUrl.indexOf('number_record')!=-1
	        ? currentUrl.substring(currentUrl.indexOf('number_record'), currentUrl.length) : undefined;
	        let urlNumberRecord = 'number_record='+nItemOnPage;

	        if (currentUrl.indexOf('?')!=-1) {
	          var query = currentUrl.substring(currentUrl.indexOf('?')+1, currentUrl.length);
	          //var getNumberRecord = currentUrl.indexOf('number_record');
	          vars = query.split('&');
	            for (var i = 0; i < vars.length; i++) {
	              if (vars[i].indexOf('number_record')!=-1) {
	                vars.splice(i,1);
	                //console.log(vars[i]);
	              }
	            }
	            vars.push('number_record='+nItemOnPage);
	            //var urlabc = '/cdbhxh/public/chung-tu-tra-don-vi.php?'+vars.join('&');
	        }
	        if (vars.length > 0) { window.location.href = '/cdbhxh/public/chung-tu-tra-don-vi.php?'+vars.join('&'); }
	        //console.log(urlabc);
		});
	});