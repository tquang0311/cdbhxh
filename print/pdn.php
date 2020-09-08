<?php
if ($vb->dist_name!=null) {
	$dist_name = $vb->dist_name;
	if ($vb->ward_name!=null) {
		$dist_name = ' - '.$dist_name;
	}
} else {
	$dist_name = null;
}

if ($vb->ward_name!=null) {
	$ward_name = $vb->ward_name;
} else {
	$ward_name = null;
}
$diachi = $ward_name.$dist_name.' - TP Hà Nội';

if ($vb->noi_nhan==6) {
	$noinhan = 'Phòng Quản lý thu';
	$thoi_han_text = "Sửa nội bộ đề nghị thực hiện trong thời hạn 2 ngày sau khi tiếp nhận hồ sơ từ phòng Chế độ BHXH";
} elseif ($vb->noi_nhan==7) {
	$noinhan = 'Phòng Cấp sổ, thẻ';
	$thoi_han_text = "Sửa nội bộ đề nghị thực hiện trong thời hạn 2 ngày sau khi tiếp nhận hồ sơ từ phòng Chế độ BHXH";
} elseif ($vb->noi_nhan==8) {
	$noinhan = 'BHXH '.$vb->dist_name;
	$thoi_han_text = "Theo quy định tại Quyết định số 595/QĐ-BHXH";
}
?>
<div class="mau-so">
	Mẫu số: 21 - HSB
</div>
<div style="clear:both;"></div>
<header>
	<div style="float:left;">
		BẢO HIỂM XÃ HỘI TP HÀ NỘI<br/>
		<b>PHÒNG CHẾ ĐỘ BHXH</b><br/><hr/><br/>
		<p>Số: <?=$so_vb;?>/PĐN</p>
	</div>
	<div style="float:right;">
		<b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br/>
		Độc lập - Tự do - Hạnh phúc</b><br/><hr/><br/>
		<p><em>Hà Nội, <?php echo "ngày ".$day." tháng ".$month." năm ".$year;?></em></p>
	</div>
</header>
<div style="clear:both;"></div>
<main>
	<div id="title">
		<h2>PHIẾU ĐỀ NGHỊ</h2><br/>
		<p>Kính gửi: <?=$noinhan;?></p><br/>
	</div>
	<div id="content">
		<div style="margin-bottom:30px;">
			<p>Hồ sơ của: <?=$c_qlvb->mb_ucwords($gioi_tinh.' '.$vb->ho_ten_nld);?></p>
			<p>
				<span>Mã số BHXH: <?=$vb->so_so;?></span>
				<?php if ($vb->so_bb!=null) { ?>
					<span style="float:right;">Số BBTNHS: <?=$vb->so_bb;?></span>
				<?php } ?>
			</p>
			<p>Nội dung đề nghị giải quyết: <?=$vb->cd_giai_quyet;?></p>
			<p>Địa chỉ: <?=$diachi;?></p>
			<?php if ($vb->sdt!=0 || $vb->email!=null) { ?>
				<p>
				<?php if ($vb->sdt!=0) { ?>
				<span>Số điện thoại liên hệ: 0<?=$vb->sdt;?></span>
				<?php } ?>
				<?php if ($vb->email!=null) { ?>
					<span style="float:right;">Email: <?=$vb->email;?></span>
				<?php } ?>
				</p>
			<?php } ?>
			<p>Đề nghị kiểm tra, điều chỉnh những nội dung sau:</p>
			<?=$vb->noi_dung;?>
			<p>Thời hạn thực hiện: <?=$thoi_han_text;?>./.</p>
		</div>
		<div style="text-align:center;font-weight:bold;float:right;margin-right:10%;">
			<?php if ($vb->ld_duyet==37) { ?>
			<h3>TRƯỞNG PHÒNG</h3>
			<?php } else { ?>
			<h3>KT. TRƯỞNG PHÒNG</h3>
			<h3>PHÓ TRƯỞNG PHÒNG</h3>
			<?php } ?>
			<br/><br/><br/>
			<br/><br/><br/>
			<h3><?=$ld_duyet;?></h3>
		</div>
	</div>
</main>
<div style="clear:both;"></div>
<footer>

</footer>