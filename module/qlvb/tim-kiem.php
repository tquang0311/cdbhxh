<?php
	error_reporting(0);
	require('../controller/qlvb.php');
	$c_qlvb = new c_qlvb();
	$qlvb_all = $c_qlvb->search_vb($_GET['loai-vb']);
	$qlvb = $qlvb_all['qlvb'];
	$pagination = $qlvb_all['pagination_bar'];
	//print_r($qlvb_all);
	//die;
if (!$search_error) {
$i = 1;
foreach ($qlvb as $pt) {
	if ($pt->so_vb >= 1 && $pt->so_vb <= 9) {
			$so_vb = '0'.$pt->so_vb;
		} else {
			$so_vb = $pt->so_vb;
		}
	$month = date('m', strtotime($pt->ngay_phat_hanh));
		if ($month == 1 || $month == 2) {
			$ngay_phat_hanh = DATE_FORMAT(new DateTime($pt->ngay_phat_hanh), 'd/m/Y');
		} else {
			$ngay_phat_hanh = DATE_FORMAT(new DateTime($pt->ngay_phat_hanh), 'd/n/Y');
		}
	if ($pt->gioi_tinh == 1) {
			$gioi_tinh = 'Nam';
			$gioitinh = 'Ông ';
		} elseif ($pt->gioi_tinh == 2) {
			$gioi_tinh = 'Nữ';
			$gioitinh = 'Bà ';
		} else {
			$gioi_tinh = null;
			$gioitinh = null;
		}

		if ($pt->noi_nhan==1) {
		 	$noi_nhan = $gioitinh.$pt->ho_ten_nld;
		} elseif ($pt->noi_nhan==2) {
			$noi_nhan = 'BHXH '.$pt->dist_name;
		} elseif ($pt->noi_nhan==3) {
			$noi_nhan = 'BHXH '.$pt->dist_name;
		} elseif ($pt->noi_nhan==4) {
			$noi_nhan = 'Phòng TN & TKQ TTHC';
		} elseif ($pt->noi_nhan==5) {
			$noi_nhan = $pt->ten_dv;
		} elseif ($pt->noi_nhan==6) {
		 	$noi_nhan = 'Phòng Thu';
		} elseif ($pt->noi_nhan==7) {
			$noi_nhan = 'Phòng Cấp sổ, thẻ';
		} elseif ($pt->noi_nhan==8) {
			$noi_nhan = 'BHXH '.$pt->dist_name;
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
	if ($pt->loai_vb==3) {
		$loai_vb = 'Phiếu trả';
	} elseif ($pt->loai_vb==4) {
		$loai_vb = 'Phiếu đề nghị';
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
	?>
	<tr class="onRow">
		<td>
			<?=$i++;?>
			<span data-vbtype="<?=$pt->loai_vb;?>" class="vbi d-none"><?=$pt->vb_id;?></span>
		</td>
		<td class="checkbox">
			<?php
			if ($user->fullname == $pt->fullname && $pt->tinh_trang == 1) { ?>
				<input type="checkbox" name='hs[]' value="<?=$pt->vb_id;?>"/>
			<?php } ?>
		</td>
		<td><?=$so_vb;?></td>
		<td><?=$ngay_phat_hanh;?></td>
		<td><?=$c_qlvb->mb_ucwords($pt->ho_ten_nld);?></td>
		<td><?=$gioi_tinh;?></td>
		<td><?=$pt->so_so;?></td>
		<td><?=$pt->so_bb;?></td>
		<td><?=$noi_nhan;?></td>
		<td class="ndt"><?=$pt->fullname;?></td>
		<td><?=$ld_duyet;?></td>
		<td><?=$loai_vb;?></td>
		<td class="status" title="<?=$pt->lydohuydt;?>" data-toggle="tooltip"><span class="font-weight-bold text-<?=$status_color;?>"><?=$pt_tinhtrang;?></span></td>
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