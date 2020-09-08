<?php
require('../controller/chung_tu_omts.php');
$c_chungtu_omts = new c_chungtu_omts();
$bbbghs = $c_chungtu_omts->getBBBGHS($_GET['bbbg']);
$HsOmts = $c_chungtu_omts->searchHsomtsByListId(trim($bbbghs['bbbg']->list_hs,','));
$ngay_taobb = DATE_FORMAT(new DateTime($bbbghs['bbbg']->ngay_taobb), 'd/m/Y');
$gio_taobb = DATE_FORMAT(new DateTime($bbbghs['bbbg']->gio_taobb), 'H:i');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Biên bản bàn giao hồ sơ</title>
	<style>
		body{font-size:12pt;}
		table{border-collapse:collapse;}
		th,td{padding:0.2rem;text-align:center;}
		th{white-space:nowrap;}
		.tongso{font-size:0.9rem;font-weight:bold;}
		@media print{
			@page{
				size:a4 landscape;
				margin:20px 60px;
			}
			#btn-action{display:none;}
		}
    	#btn-action{position:fixed;right:2%;}
	</style>
</head>
<body>
	<div id="btn-action">
		<button onclick="window.print();" title="In"><img src="../public/asset/images/btn-print.png" width="50" height="50"></button>
	</div>
	<h3 style="text-align:center;">BIÊN BẢN BÀN GIAO HỒ SƠ</h3>
	<div style="float:right;line-height:0.5;">
		<h4><b>Bên giao:</b> Phòng Chế độ Bảo hiểm xã hội</h4>
		<h4><b>Bên nhận:</b> Phòng Tiếp nhận và trả kết quả TTHC</h4>
	</div>
	<table border="1" width="100%">
		<thead>
			<th style="width:1%;">STT</th>
			<th style="width:3%;">Số hồ sơ</th>
			<th style="width:27%;">Đơn vị</th>
			<th style="width:4%;">Mã đơn vị</th>
			<th style="width:1%;">SL</th>
			<th style="width:15%;">Chi tiết hồ sơ</th>
			<th style="width:5%;">Cán bộ xử lý</th>
			<th style="width:30%;">Ghi chú</th>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($HsOmts['hsomts'] as $hs) {
				$tbctg = $c_chungtu_omts->search_TBCTG($hs->so_hs, $hs->ma_dv);
				if (!$tbctg['tbctg']) {
					$ctg = null;
				} else {
					$ctg = 'Kèm theo thông báo chứng từ giả số '.$tbctg['tbctg']['so_tb'].'/BHXH-CĐBHXH ngày '.$tbctg['tbctg']['ngay_ph'];
				}
				?>
				<tr>
					<td><?=$i++;?></td>
					<td><?=$hs->so_hs;?></td>
					<td><?=$hs->ten_dv;?></td>
					<td><?=strtoupper($hs->ma_dv);?></td>
					<td><?=$hs->so_luong;?></td>
					<td><?=$ctg;?></td>
					<td><?=$hs->username;?></td>
					<td><?=$hs->ghi_chu;?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<h3><b>Ngày giao: </b><?=$ngay_taobb.' - '.$gio_taobb;?></h3>
	<div style="float:left;text-align:center;margin:0 3rem;line-height:0.5">
		<h3>Bên giao</h3>
		<h3>Phòng Chế độ BHXH</h3>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<h3>Vũ Thị Thùy Linh</h3>
	</div>
	<div style="float:right;text-align:center;margin:0 3rem;line-height:0.5;">
		<h3>Bên nhận</h3>
		<h3>Phòng Tiếp nhận và trả kết quả TTHC</h3>
	</div>
	<script src="../public/asset/js/jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function() {
			var countTr = $('table tbody tr').length;
			$('table tbody').append('<tr class="tongso"><td>TỐNG SỐ</td><td colspan="7">'+countTr+'</td></tr>');
		});
	</script>
</body>
</html>