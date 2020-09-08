<?php
$day1 = explode("-", $vb->ngay_nhan)[2];
$month1 = explode("-", $vb->ngay_nhan)[1];
$year1 = explode("-", $vb->ngay_nhan)[0];

$day2 = explode("-", $vb->dot_nhan)[2];
$month2 = explode("-", $vb->dot_nhan)[1];
$year2 = explode("-", $vb->dot_nhan)[0];
?>
<header>
	<div style="float:left;max-width:45%;">
		BẢO HIỂM XÃ HỘI VIỆT NAM<br/>
		<b>BẢO HIỂM XÃ HỘI TP HÀ NỘI</b><br/><hr/><br/>
		<p>Số: &ensp;&ensp;&ensp;&ensp;/BHXH-CĐBHXH</p>
		<p style="font-size:1em;white-space:pre-wrap;">V/v giải quyết chế độ ốm đau, thai sản, dưỡng sức phục hồi sức khỏe</p>
	</div>
	<div style="float:right;max-width:55%;">
		<b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br/>
		Độc lập - Tự do - Hạnh phúc</b><br/><hr/><br/>
		<p><em>Hà Nội, ngày &ensp;&ensp; tháng <?=$month." năm ".$year;?></em></p>
	</div>
</header>
<div style="clear:both;"></div>
<main>
	<div id="title">
		<p>Kính gửi:
			<?php echo $vb->ten_dv;
			if ($vb->ma_dv!=NULL) { ?>
			 	- Mã đơn vị: <span style="text-transform:uppercase;"><?=$vb->ma_dv;?></span>
			<?php } ?>
		</p><br/>
	</div>
	<div id="content">
		<div style="margin-bottom:30px;">
			<p>Ngày <?php echo $day1." tháng ".$month1." năm ".$year1;?>, Bảo hiểm xã hội (BHXH) thành phố Hà Nội tiếp nhận hồ sơ đề nghị giải quyết chế độ ốm đau, thai sản, dưỡng sức phục hồi sức khỏe, theo phiếu tiếp nhận số: <?=$vb->so_bb;?>, đợt <?php echo $day2.' tháng '.$month2.' năm '.$year2; ?>.</p>
			<p>Gồm:  Danh sách đề nghị giải quyết hưởng chế độ ốm đau, thai sản, dưỡng sức phục hồi sức khỏe và các chứng từ kèm theo.</p>
			<p>Đơn vị đề nghị thanh toán chế độ cụ thể, như sau:</p>
			<?=$vb->noi_dung;?>
			<p>Sau khi kiểm tra, đối chiếu chứng từ, mẫu dấu của cơ sở khám chữa bệnh có đăng ký với cơ quan BHXH trên Cổng tiếp nhận dữ liệu Hệ thống thông tin giám định BHYT thì chứng từ của người lao động đề nghị cơ quan BHXH thanh toán chế độ BHXH nêu trên không đúng con dấu đã được cơ sở y tế đăng ký với cơ quan BHXH và không do cơ sở y tế cấp cho người lao động khi đi khám chữa bệnh.</p>
			<p>BHXH thành phố Hà Nội thu hồi và lưu giữ các chứng từ trên tại cơ quan BHXH, đồng thời thông báo và đề nghị đơn vị có biện pháp ngăn ngừa và xem xét xử lý đối với người lao động./.</p>
		</div>
		<div style="font-size:0.9em;float:left;margin:0;" class="noi-nhan">
			<b><em>Nơi nhận:</em></b>
			<p>- Như trên;</p>
			<p>- Giám đốc (để b/c);</p>
			<p>- PGĐ Đặng Đình Thuận (để b/c);</p>
			<p>- Lưu: VT, CĐBHXH.</p>
		</div>
		<div style="text-align:center;font-weight:bold;float:right;">
		TL. GIÁM ĐỐC<br/>
		<?php if ($vb->ld_duyet==37) { ?>
			TRƯỞNG PHÒNG CHẾ ĐỘ BHXH<br/>
			<br/><br/><br/><br/><br/>
		<?php } else { ?>
			KT. TRƯỞNG PHÒNG CHẾ ĐỘ BHXH<br/>
			PHÓ TRƯỞNG PHÒNG<br/><br/><br/><br/><br/><br/>
		<?php } ?>
		<h3><?=$ld_duyet;?></h3>
		</div>
	</div>
</main>
<footer>
	
</footer>