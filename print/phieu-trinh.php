<?php
require('../controller/chung_tu_omts.php');
$c_chungtu_omts = new c_chungtu_omts();
$phieutrinh = $c_chungtu_omts->getPhieutrinh($_GET['id']);
$listTBCTG = $c_chungtu_omts->searchTBCTGByListId(trim($phieutrinh['data']->list_tbctg,','));
if ($phieutrinh['data']->nguoi_tao == 30) {
	$ld_phong_duyet['chucvu'] = 'Phó Trưởng phòng';
	$ld_phong_duyet['name'] = 'Trần Thị Thu Hà';
} elseif ($phieutrinh['data']->nguoi_tao == 18) {
	$ld_phong_duyet['chucvu'] = 'Trưởng phòng';
	$ld_phong_duyet['name'] = 'Phạm Hắc Hải';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="../public/asset/images/logo_BHXH.png">
	<title>Phiếu trình giải quyết công việc</title>
    <style>
    	*{margin:0;padding:0;}
    	body{font-size:12.5pt;}
    	@page{size:a4;margin:2.5cm 2cm 2cm 3cm;}
    	body>div{margin-bottom:30px;}
    	header, main #title{text-align:center;}
    	header div{display:inline-block;font-size:1em;white-space:nowrap;}
    	header div p{font-size:1.1em;}
    	.mau-so{font-size:1.2em;font-weight:bold;border:1px solid #000;float:right;padding:7px;margin:0;}
    	#title>p{font-size:1.1em;}
    	#title h1 {font-size: 1.2em;}
    	#title h2 p{font-weight:normal;font-size:18px;}
    	#content p{text-align:justify;text-indent:2em;line-height:1.1;}
    	table{border-collapse:collapse;width:100% !important;height: 100%;}
    	table tr td[colspan="7"] {text-align:left;}
    	table h2 { font-size: 1.1rem; }
    	table h3:not(.name) { font-size: 1.25rem;text-align: left; }
    	th, td{padding:5px;text-align:center;vertical-align: top;}
    	td > div {
    		display: table;
    		height: 100%;
    		width: 100%;
    	}
    	td > div > h3.name {
    		display: table-footer-group;
    		vertical-align: bottom;
    	}
    	td p:not(.paragraph){text-indent:0 !important;}
    	td p.paragraph {white-space: normal;}
    	ul{margin-left:3em;font-size:1.1em;line-height:1.5;text-align:justify;}
    	ol{margin-left:3em;text-align: left;}
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
    </style>
</head>
<body>
	<header>
		<div style="float:left;">
			BẢO HIỂM XÃ HỘI THÀNH PHỐ HÀ NỘI<br/>
			<b>PHÒNG CHẾ ĐỘ BHXH</b><hr/>
		</div>
		<br/><br/>
		<p style="float: right;"><em>Hà Nội, ngày &ensp;&ensp; tháng <?=Date('m');?> năm 2020</em></p>
		<br/><br/>
	</header>
	<main>
		<div id="title">
			<h1>PHIẾU TRÌNH GIẢI QUYẾT CÔNG VIỆC</h1>
			<p><em>Trình lần thứ: 01</em></p>
			<br/>
			<p>Kính gửi: Đồng chí Đặng Đình Thuận - Phó Giám đốc</p>
		</div>
		<div id="content">
			<p style="line-height: 1.3;">Vấn đề trình: Căn cứ quy chế làm việc của BHXH Thành phố Hà Nội tại Quyết định số 2789/QĐ-BHXH ngày 07/08/2020. Đề nghị lãnh đạo phê duyệt <?=$ld_phong_duyet['chucvu'].' '.$ld_phong_duyet['name'];?> ký thừa lệnh văn bản phục vụ việc giải quyết chế độ ngắn hạn.</p>
			<p>Hồ sơ kèm theo:</p>
			<table border="1">
				<thead>
					<tr>
						<th style="width: 55%;"><h2>NỘI DUNG</h2></th>
						<th style="width: 45%;"><h2 style="white-space: nowrap;">Ý KIẾN CỦA LÃNH ĐẠO PHÒNG</h2></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<h3>1. Tóm tắt nội dung:</h3>
							<p class="paragraph">
								Khi kiểm tra giải quyết chế độ ốm đau, thai sản, dưỡng sức phục hồi sức khỏe cho người lao động, phòng Chế độ BHXH phát hiện chức từ đề nghị thanh toán chế độ BHXH không đúng con dấu đã được cơ sở y tế đăng ký với cơ quan BHXH và không do cơ sở y tế cấp cho người lao động khi đi khám chữa bệnh của người lao động (có danh sách kèm theo) thuộc các công ty gồm:
								<ol>
								<?php foreach ($listTBCTG['tbctg_data'] as $dv) { ?>
									<li><?=$dv->ten_dv.' - '.strtoupper($dv->ma_dv);?></li>
								<?php } ?>
								</ol>
							</p>
						</td>
						<td>
								<p style="text-align: center;">Đề nghị Phó giám đốc duyệt.</p>
								<p style="height: 130px;"></p>
								<h3 class="name"><?=$ld_phong_duyet['name'];?></h3>
						</td>
					</tr>
					<tr>
						<td>
							<div>
								<h3>2. Đề xuất của chuyên viên:</h3>
								<p class="paragraph">
									Kính đề nghị lãnh đạo phòng trình Ban giám đốc cho thu hồi và lưu giữ các chứng từ trên tại cơ quan BHXH.
									Kính trình lãnh đạo phê duyệt./.
								</p>
								<p style="text-align: center;">Chuyên viên</p>
								<h3 class="name"><?=$phieutrinh['data']->fullname;?></h3>
							</div>
						</td>
						<td>
							<div>
								<h2>Ý KIẾN CỦA PHÓ GIÁM ĐỐC</h2>
								<div style="display: table-footer-group;">
									<p style="min-height: 160px;"></p>
									<h3 class="name">Đặng Đình Thuận</h3>
									<span><em>Hà Nội, ngày &ensp;&ensp; tháng <?=Date('m');?> năm 2020</em></span>
								</div>
							</div>							
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</main>
	<footer>
		
	</footer>
	<div id="btn-action">
		<button onclick="window.print();" title="In"><img src="../public/asset/images/btn-print.png" width="50" height="50"></button>
	</div>
</body>
</html>