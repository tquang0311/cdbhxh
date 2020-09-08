<?php
	error_reporting(0);
	require('../controller/qlvb.php');
	$c_qlvb = new c_qlvb();
	$qlvb_all = $c_qlvb->search_vb($_GET['loai-vb'], 5);
	$qlvb = $qlvb_all['qlvb'];
	$pagination = $qlvb_all['pagination_bar'];
	//print_r($qlvb_all);
	//die;
if (!$search_error) {
$i = 1;
foreach ($qlvb as $pt) {
	$month = date('m', strtotime($pt->ngay_phat_hanh));
	if ($month == 1 || $month == 2) {
		$ngay_phat_hanh = DATE_FORMAT(new DateTime($pt->ngay_phat_hanh), 'd/m/Y');
	} else {
		$ngay_phat_hanh = DATE_FORMAT(new DateTime($pt->ngay_phat_hanh), 'd/n/Y');
	}

	if ($pt->ld_duyet==2) {
		$ld_duyet = 'Dương Thị Minh Châu';
	} elseif ($pt->ld_duyet==3) {
		$ld_duyet = 'Trần Thị Thu Hà';
	} elseif ($pt->ld_duyet==4) {
		$ld_duyet = 'Bùi Anh Tuấn';
	} elseif ($pt->ld_duyet==37) {
		$ld_duyet = 'Phạm Hắc Hải';
	} elseif ($pt->ld_duyet==38) {
		$ld_duyet = 'Nguyễn Quang Minh';
	} else {
		$ld_duyet = null;
	}

	if ($pt->tinh_trang==1) {
	 	$pt_tinhtrang = 'Dự thảo';
	 	$status_color = 'primary';
	} elseif ($pt->tinh_trang==2) {
		$pt_tinhtrang = 'Đã xử lý';
		$status_color = 'success';
	} elseif ($pt->tinh_trang==3) {
		$pt_tinhtrang = 'Hủy dự thảo';
		$status_color = 'secondary';
	}

	if ($pt->tao_phieu_trinh==1) {
	 	$phieutrinh_text = 'Đã tạo';
	 	$phieutrinh_color = 'success';
	} else {
		$phieutrinh_text = 'Chưa tạo';
		$phieutrinh_color = 'primary';
	}
	?>
	<tr class="onRow">
		<td>
			<?=$i++;?>
			<span data-vbtype="<?=$pt->loai_vb;?>" class="vbi d-none"><?=$pt->vb_id;?></span>
		</td>
		<?php if ($user->uid==30 || $user->uid==18) { ?>
		<td class="checkbox">
			<?php
			if ($pt->tinh_trang == 2 && $pt->tao_phieu_trinh==0) { ?>
				<input type="checkbox" name='hs[]' value="<?=$pt->vb_id;?>"/>
			<?php } ?>
		</td>
		<?php } ?>
		<td class="status"><span class="font-weight-bold text-<?=$status_color;?>"><?=$pt_tinhtrang;?></span></td>
		<td><span class="font-weight-bold text-<?=$phieutrinh_color;?>"><?=$phieutrinh_text;?></span></td>
		<td><?=$pt->so_bb;?></td>
		<td><?=$ngay_phat_hanh;?></td>
		<td><?=$pt->ten_dv.' - '.strtoupper($pt->ma_dv);?></td>
		<td class="ndt"><?=$pt->fullname;?></td>
		<td><?=$ld_duyet;?></td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="13">
			<span class="float-left">Tìm thấy: <b><?=$count_all;?></b> bản ghi</span>
			<?=$pagination;?>
		</td>
	</tr>
<?php } else { ?>
	<tr>
		<td class="text-center" colspan="13"><?=$search_error;?></td>
	</tr>
<?php } ?>