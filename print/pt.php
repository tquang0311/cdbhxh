<?php
if ($vb->ho_ten_nld!=null && $vb->so_so!=null) {
	$countpt = $c_qlvb->count_pt($vb->ho_ten_nld, $vb->so_so);
	$count = $countpt['countpt'];
	$sovb = explode(',', $count->sovb);
	$ngay_ph = explode(',', $count->ngay_ph);
	$key = array_search($vb->so_vb, $sovb)-1;
	$lantra = $key+2;
	if ($lantra>1) {
		$lan_tra = '(Lần '.$lantra.')';
		$svb = $sovb[$key];
		$ngayph = DATE_FORMAT(new DateTime($ngay_ph[$key]), 'd/m/Y');;
	} else {
		$lan_tra = null;
	}
} else {
	$lan_tra = null;
}

if ($vb->ngay_chet!='0000-00-00') {
	$ngay_chet = ', ngày chết '.DATE_FORMAT(new DateTime($vb->ngay_chet), 'd/m/Y');
} else {
	$ngay_chet = null;
}

if ($vb->chuc_danh != null) {
	$chucdanh_nct = explode(';', $vb->chuc_danh);
	if ($chucdanh_nct[0]!=null) {
		$chuc_danh = ', '.$chucdanh_nct[0];
	} else {
		$chuc_danh = null;
	}
	if ($chucdanh_nct[1]!=null) {
		$noicongtac = ', công tác tại '.$chucdanh_nct[1];
	} else {
		$noicongtac = null;
	}
} else {
	$chuc_danh = $noicongtac = null;
}

if ($vb->cd_huong==1) {
	$cd_huong = ', đang hưởng chế độ Hưu trí';
} elseif ($vb->cd_huong==2) {
	$cd_huong = ', đang hưởng chế độ Tử tuất';
} elseif ($vb->cd_huong==3) {
	$cd_huong = ', đang hưởng chế độ Tai nạn lao động';
} elseif ($vb->cd_huong==4) {
	$cd_huong = ', đang hưởng chế độ Bệnh nghề nghiệp';
} elseif ($vb->cd_huong==5) {
	$cd_huong = ', đang hưởng chế độ Mất sức';
} elseif ($vb->cd_huong==6) {
	$cd_huong = ', đang hưởng Trợ cấp hàng tháng theo Quyết định số 613/QĐ-TTG ngày 06/05/2010 của Thủ tướng Chính phủ';
} else {
	$cd_huong = null;
}

$str = $vb->cd_giai_quyet;
$sub1 = 'Hưu trí';
$sub2 = 'hưu trí';
if (strpos($str, $sub1) !== false || strpos($str, $sub2) !== false) {
	$cd_huong = null;
}

if ($vb->noi_nhan==1) {
	$noinhan = $c_qlvb->mb_ucwords($gioi_tinh).' '.$c_qlvb->mb_ucwords($vb->ho_ten_nld);
} elseif ($vb->noi_nhan==2) {
	$noi_nhan = 'BHXH '.$vb->dist_name;
	$noinhan = 'Bảo hiểm xã hội '.$vb->dist_name;
} elseif ($vb->noi_nhan==3) {
	$noi_nhan = 'BHXH '.$vb->dist_name;
	$noinhan = 'Bảo hiểm xã hội '.$vb->dist_name;
} elseif ($vb->noi_nhan==4) {
	$noi_nhan = 'Văn Phòng BHXH thành phố Hà Nội';
	$noinhan = 'Văn Phòng Bảo hiểm xã hội thành phố Hà Nội';
}

if ($vb->so_bb!=null) {
	$so_bb = ', theo phiếu tiếp nhận số '.$vb->so_bb.' của '.$noi_nhan;
} else {
	$so_bb = null;
}

if ($vb->quan_huyen != 0 && $vb->phuong_xa != 0) {
	require "../libs/config.php";
	$quan_huyen = $vb->quan_huyen;
	$phuong_xa = $vb->phuong_xa;
	$query = $conn->query("SELECT d.dist_name AS quan_huyen, w.ward_name AS phuong_xa FROM districts AS d, wards AS w WHERE d.dist_id = $quan_huyen AND w.ward_id = $phuong_xa");
	$query->execute();
	$row = $query->fetch();
	$noinhan_luonghuu = ', nơi nhận lương hưu '.$row['phuong_xa'].' - '.$row['quan_huyen'].' - TP Hà Nội';
	$conn = NULL;
} else {
	$noinhan_luonghuu = null;
}
if (strpos($vb->ho_ten_nld, ',')) {
	$hotenNLD = explode(',', $vb->ho_ten_nld);
	$hotenNLD0 = $hotenNLD[0];
	$hotenNLD1 = $hotenNLD[1].',';
} else {
	$hotenNLD0 = $vb->ho_ten_nld;
	$hotenNLD1 = NULL;
}
?>
<header>
	<div style="float:left;">
		BẢO HIỂM XÃ HỘI TP HÀ NỘI<br/>
		<b>PHÒNG CHẾ ĐỘ BHXH</b><br/><hr/><br/>
		<p>Số: <?php echo $so_vb;?>/PT</p>
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
		<h2>PHIẾU TRẢ HỒ SƠ</h2><br/>
		<p>Kính gửi:
			<?php echo $noinhan;?>.
		</p><br/>
	</div>
	<div id="content">
		<div style="margin-bottom:30px;">
				<?php if ($lantra==1) { ?>
				<?php if($vb->user_group==3) { ?>
					<p>Bảo hiểm xã hội (BHXH) thành phố Hà Nội đã tiếp nhận hồ sơ đề nghị giải quyết chế độ <?php echo $vb->cd_giai_quyet.' của '.$gioi_tinh.' '.$c_qlvb->mb_ucwords($hotenNLD0).', '.$hotenNLD1.' số sổ BHXH '.$vb->so_so.$chuc_danh.$noicongtac.$cd_huong.$noinhan_luonghuu.$ngay_chet.$so_bb;?>.</p>
				<?php } elseif ($vb->user_group==4) { ?>
					<p>Bảo hiểm xã hội (BHXH) thành phố Hà Nội đã tiếp nhận hồ sơ đề nghị giải quyết <?php echo $vb->cd_giai_quyet.' của '.$gioi_tinh.' '.$c_qlvb->mb_ucwords($vb->ho_ten_nld).', số sổ BHXH '.$vb->so_so.$chuc_danh.$noicongtac.$cd_huong.$noinhan_luonghuu.$so_bb;?>.</p>
				<?php } elseif ($vb->user_group==5) { ?>
					<p>Bảo hiểm xã hội thành phố Hà Nội tiếp nhận hồ sơ đề nghị giải quyết chế độ bảo hiểm xã hội của <?php echo $noinhan; ?> (mã đơn vị <?=$vb->ma_dv;?>), số giấy hẹn <?=$vb->so_bb;?>.</p>
				<?php } elseif ($vb->user_group==8) { ?>
					<p>Phòng Chế độ BHXH nhận được hồ sơ <?php echo $cd_huong.' của '.$gioi_tinh.$vb->ho_ten_nld.', sinh ngày '.$ngay_sinh.', số sổ BHXH '.$vb->so_so.' do BHXH '.$prov['prov_name'].' chuyển đến  nhận lương hưu tại '.$row['phuong_xa'].' - '.$row['quan_huyen']; ?> – Tp Hà Nội.</p>
				<?php } } else { ?>
					<p>Tiếp theo Phiếu trả hồ sơ số <?=$svb;?>/PT-CĐBHXH ngày <?=$ngayph;?> của BHXH TP Hà Nội. Sau khi kiểm tra lại hồ sơ, dữ liệu của <?php echo $gioi_tinh.' '.$c_qlvb->mb_ucwords($vb->ho_ten_nld).', số sổ BHXH '.$vb->so_so.$chuc_danh.$noicongtac.$noinhan_luonghuu.$so_bb; ?>, BHXH TP Hà Nội có ý kiến như sau:</p>
				<?php }
				if ($vb->ngay_nhan=='0000-00-00' && $lantra==1) { ?>
				<p>Sau khi kiểm tra hồ sơ, BHXH thành phố Hà Nội có ý kiến như sau:</p>
			<?php }
			echo $vb->noi_dung;?>
			<?php if ($vb->ngay_nhan=='0000-00-00') {
					if ($vb->noi_nhan==4) { ?>
					<!--<p>Phòng Chế độ BHXH đề nghị <?php echo $noinhan; ?> nhận lại hồ sơ và hướng dẫn đơn vị hoàn thiện hồ sơ theo quy định./.-->
				<?php } else {
					if ($vb->user_group!=3) {
						if (strpos($vb->cd_giai_quyet, 'điều chỉnh') != false) { ?>
							<p>BHXH thành phố Hà Nội đề nghị <?php if (!$vb->ma_dv) {
						echo $noinhan;
					} else {
						echo 'đơn vị sử dụng lao động';
					} ?> nhận lại hồ sơ./.<?php } ?></p>
				<?php } } } ?>
		</div>
		<div style="font-size:0.9em;float:left;margin:0;">
			<b>Nơi nhận:</b><br/>
			- Như trên;<br/>
			- Lưu.
		</div>
		<div style="text-align:center;font-weight:bold;float:right;margin-right:10%;">
			<?php if ($vb->ld_duyet==37) { ?>
				TRƯỞNG PHÒNG<br/>
				<br/><br/><br/><br/><br/>
			<?php } else { ?>
				KT. TRƯỞNG PHÒNG<br/>
				PHÓ TRƯỞNG PHÒNG<br/><br/><br/><br/><br/><br/>
			<?php } ?>
			<h3><?php echo $ld_duyet;?></h3>
		</div>
	</div>
</main>
<div style="clear:both;"></div>
<footer>
	<?php if ($vb->user_group == 3) { ?>
		<p><em><b>Ghi chú: </b>Khi nộp lại hồ sơ đã hoàn thiện theo hướng dẫn, đơn vị sử dụng lao động (người lao động) nộp kèm theo phiếu trả lại hồ sơ này.</em></p>
	<?php } ?>
</footer>