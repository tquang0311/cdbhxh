<?php
error_reporting(0);
require('../controller/qlvb.php');
	$c_qlvb = new c_qlvb();
	$get_vb = $c_qlvb->getVb();
	$vb = $get_vb['get_vb'];

	if ($vb->user_group == 5) {
		$title_page = 'V/v chứng từ không đúng quy định ('.strtoupper($vb->ma_dv).')';
		$file_require = 'tbctg.php';
	} else {
		if ($vb->loai_vb == 3) {
			$title_page = 'Phiếu trả hồ sơ';
			$file_require = 'pt.php';
		} elseif ($vb->loai_vb == 4) {
			$title_page = 'Phiếu đề nghị';
			$file_require = 'pdn.php';
		}
	}

	if ($vb->so_vb >= 1 && $vb->so_vb <= 9) {
		$so_vb = '0'.$vb->so_vb;
	} else {
		$so_vb = $vb->so_vb;
	}

	$month = date('m', strtotime($vb->ngay_phat_hanh));
	if ($month == 1 || $month == 2) {
		$ngay_phat_hanh = DATE_FORMAT(new DateTime($vb->ngay_phat_hanh), 'd/m/Y');
	} else {
		$ngay_phat_hanh = DATE_FORMAT(new DateTime($vb->ngay_phat_hanh), 'd/n/Y');
	}
	$day = explode("/", $ngay_phat_hanh)[0];
	$month = explode("/", $ngay_phat_hanh)[1];
	$year = explode("/", $ngay_phat_hanh)[2];

	if ($vb->gioi_tinh == 1) {
		$gioi_tinh = 'ông';
	} elseif ($vb->gioi_tinh == 2) {
		$gioi_tinh = 'bà';
	} elseif ($vb->gioi_tinh == 0) {
		$gioi_tinh = null;
	}

	if ($vb->ld_duyet==3) {
		$ld_duyet = 'Trần Thị Thu Hà';
	} elseif ($vb->ld_duyet==4) {
		$ld_duyet = 'Bùi Anh Tuấn';
	} elseif ($vb->ld_duyet==37) {
		$ld_duyet = 'Phạm Hắc Hải';
	} elseif ($vb->ld_duyet==38) {
		$ld_duyet = 'Nguyễn Quang Minh';
	} else {
		$ld_duyet = null;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../public/asset/images/logo_BHXH.png">
    <title><?=$title_page;?></title>
    <style>
    	*{margin:0;padding:0;}
    	body{font-size:12pt;}
    	@page{size:a4;margin:2.5cm 2cm 2cm 3cm;}
    	body>div{margin-bottom:30px;}
    	header, main #title{text-align:center;}
    	header div{display:inline-block;font-size:1em;white-space:nowrap;}
    	header div p{font-size:1.1em;}
    	.mau-so{font-size:1.2em;font-weight:bold;border:1px solid #000;float:right;padding:7px;margin:0;}
    	#title>p{font-size:1.1em;}
    	#title h2 p{font-weight:normal;font-size:18px;}
    	#content p{text-align:justify;text-indent:2em;font-size:1.1em;line-height:1.5;}
    	table{border-collapse:collapse;width:100% !important;}
    	table tr td[colspan="7"] {text-align:left;}
    	th, td{padding:5px;white-space:nowrap;text-align:center;}
    	td p{text-indent:0 !important;}
    	ul{margin-left:3em;font-size:1.1em;line-height:1.5;text-align:justify;}
    	ol{margin-left:5em;font-size:1.2em;line-height:1.5;}
    	#footer{margin:0 !important;}
    	hr{margin:0 25%;background:#000;height:1px;border:none;}
    	#btn-action{position:fixed;right:2%;top:1%;}
    	#btn-action button{display:block;margin-bottom:3px;}
    	@media print{
    		#btn-action{display:none;}
    	}
    	#setting{
    		position:absolute;
    		top:0;
    		right:60px;
    		color:#fff;
    		font-weight:bold;
    		white-space:nowrap;
    		background:#a1a1a1;
    		padding:10px;
    		display:none;
    	}
    	#popup-banner{
    		display:none;
    		position:fixed;
    		top:0;
    		left:5%;
    		z-index:20;
    		width:90%;
    		height:90%;
    	}
    	#background{
    		display:none;
			width:100%;
			height:100%;
			position:fixed;
			top:0;
			left:0;
			z-index:10;
			background:#000;
			opacity:0.5;
		}
		.btn-close{
			position:absolute;
			cursor:pointer;
			top:10px;
			right:10px;
		}
		table tr td:last-child {
			white-space: normal;
		}
		.totalMoney{
			font-weight:bold;
		}
		.totalMoney td:nth-child(1){
			text-align:center;
		}
		.noi-nhan p {
			font-size: 0.8em !important;
			text-indent: 0 !important;
			line-height: 1.3 !important;
		}
    </style>
</head>
<body>
<?php require $file_require; ?>
<div id="btn-action">
	<?php if ($vb->user_group != 5) { ?>
	<button id="btn-setting" title="Tùy chỉnh"><img src="../public/asset/images/setting.png" width="50" height="50"></button>
	<div id="setting">
		Ẩn ghi chú: <input type="checkbox" id="note" value="1"><br/>
		Giãn dòng: <input type="text" id="line-height" size="1">
	</div>
	<?php } ?>
	<button onclick="window.print();" title="In"><img src="../public/asset/images/btn-print.png" width="50" height="50"></button>
</div>
<div id="popup-banner">
	<h2 style="color:#fff;background:#000;">Khi in thì mọi người làm theo hướng dẫn như hình dưới để văn bản hiển thị chuẩn nhất,<br/> chỉ cần làm 1 lần duy nhất là được.</h2>
	<img src="../public/asset/images/print.png" width="100%">
	<span class="btn-close"><img src="../public/asset/images/hdsd/btn-close.png"></span>
</div>
<div id="background"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		function formatNumber(num) {
	    	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
	    }

	    var sum = (a, b) => a + b;

	    if ($('table').length > 0) {
	    	var arr = [];
	    	$('table tr td:nth-child(5)').each(function(){
		    	var value = Number($(this).text());
		    	$(this).text(formatNumber(value));
		    	arr.push(value);
		    });
		    $('table tbody').append('<tr class="totalMoney"><td colspan="4">TỔNG TIỀN:</td><td>'+formatNumber(arr.reduce(sum))+'</td><td></td></tr>');
	    }

		$('#btn-setting').click(function(){
			$('#setting').fadeToggle();
			$('#note').click(function(){
				let note = $(this).val();
				if (note==1) {
					$('footer').hide();
					$(this).val(2);
				} else if (note==2) {
					$('footer').show();
					$(this).val(1);
				}
			});
			$('#line-height').change(function(){
				let line_height = $(this).val();
				$('body, body *').css('line-height',line_height);
			})
		});
	});

	function closePopup() {
	$('#popup-banner .btn-close').click(function(){
		if (confirm('Bạn chắc chắn đã xem hết thông báo này?') == true) {
			$('#background').fadeOut();
			$('#popup-banner').remove();
			setCookie("p", 1,1);
		}
	})
}
function setCookie(e, n, o) {
    var t = "";
    if (o) {
        var i = new Date;
        i.setTime(i.getTime() + 4 * 60 * 60 * 1000), t = "; expires=" + i.toUTCString()
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
1 != getCookie("p") && (document.addEventListener("DOMContentLoaded", function(event) {
	$('#popup-banner, #background').fadeIn();
	closePopup();
}));
</script>
</body>
</html>