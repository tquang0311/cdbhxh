<?php
	error_reporting(0);
	require('../controller/chung_tu_omts.php');
	$c_chungtu_omts = new c_chungtu_omts();
	$HsOmts_all = $c_chungtu_omts->searchHsOMTS();
	$HsOmts = $HsOmts_all['hsomts'];
	$pagination = $HsOmts_all['pagination_bar'];
	//print_r($HsOmts);

if (!$search_error) {
$i = 1;
foreach ($HsOmts as $hs) {
	if ($hs->so_tbctg > 0) {
		$title_toggle = 'Số VT';
		$tbctg_text = 'Số '.$hs->so_tbctg;
	} else {
		$tbctg = $c_chungtu_omts->search_TBCTG($hs->so_hs, $hs->ma_dv);
		if ($tbctg && $tbctg['tbctg']['so_tb'] > 0) {
			$title_toggle = 'Số phòng';
			$tbctg_text = 'Số '.$tbctg['tbctg']['so_tb'].' ngày '.$tbctg['tbctg']['ngay_ph'];
		} else {
			$title_toggle = $tbctg_text = null;
		}
	}

	if ($hs->tinh_trang==1) {
		$hs_tinhtrang = 'Chờ xử lý';
		$status_color = 'primary';
	} elseif ($hs->tinh_trang==2) {
		$hs_tinhtrang = 'Chờ bàn giao';
		$status_color = 'info';
	} elseif ($hs->tinh_trang==3) {
		$hs_tinhtrang = 'Đã tạo BBBG';
		$status_color = 'success';
	} elseif ($hs->tinh_trang==4) {
		$hs_tinhtrang = 'Chờ xử lý (Từ chối)';
		$status_color = 'danger';
	}
	$cbName = explode(' ', $hs->fullname);
	$cb_name = '';
	for ($j=0; $j < count($cbName)-1; $j++) { 
		$cb_name .= substr($cbName[$j], 0, 1).'.';
	}
	$cb_name .= $cbName[count($cbName)-1];
	$ngay_nhaphs = DATE_FORMAT(new DateTime($hs->ngay_nhaphs), 'd/m/Y');
	$gio_nhaphs = DATE_FORMAT(new DateTime($hs->gio_nhaphs), 'H:i');
	$ngay_xlhs = DATE_FORMAT(new DateTime($hs->ngay_xlhs), 'd/m/Y');
	$gio_xlhs = DATE_FORMAT(new DateTime($hs->gio_xlhs), 'H:i');
	?>
	<tr class="onRow_checkbox">
		<td>
			<?=$i++;?>
		</td>
		<td>
		<?php
		if ($user->uid!=30 && $hs->canboxuly == $user->uid && ($hs->tinh_trang==1 || $hs->tinh_trang==4)) { ?>
			<input type="checkbox" name='hs[]' value="<?=$hs->id;?>" data-tt="<?=$hs->tinh_trang;?>"/>
		<?php } elseif ($user->uid==30) {
			if ($hs->canboxuly == $user->uid && ($hs->tinh_trang==1 || $hs->tinh_trang==4)) { ?>
			 	<input type="checkbox" name='hs[]' value="<?=$hs->id;?>" data-tt="<?=$hs->tinh_trang;?>"/>
			<?php } elseif ($hs->tinh_trang==2) { ?>
				<input type="checkbox" name='hs[]' value="<?=$hs->id;?>" data-tt="<?=$hs->tinh_trang;?>"/>
			<?php } ?>
		<?php } ?>
		</td>
		<td class="status font-weight-bold"><span class="text-<?=$status_color;?>"><?=$hs_tinhtrang;?></span></td>
		<td>
			<a href="javascript:void(0);" class="view_info" title="Xem quá trình" data-hsid="<?=$hs->id;?>" data-status="<?=$hs->tinh_trang;?>"><?=$hs->so_hs;?></a>
			<?php if ($hs->tinh_trang==1 && $hs->canboxuly == $user->uid || $hs->tinh_trang==4 && $hs->canboxuly == $user->uid) { ?>
				<a href="../public/chung-tu-tra-don-vi.php?view=edit&hs=<?=$hs->id;?>" title="Sửa"><i class="fas fa-edit"></i></a>
			<?php } ?>
		</td>
		<td><?=$hs->ten_dv.' - '.strtoupper($hs->ma_dv);?></td>
		<td><?=$hs->so_luong;?></td>
		<td data-toggle="tooltip" title="<?=$title_toggle;?>"><?=$tbctg_text;?></td>
		<td data-toggle="tooltip" title="<?=$hs->ghi_chu;?>">
			<?php $ghichu_length = strlen($hs->ghi_chu);
			if ($ghichu_length > 20) {
				echo substr($hs->ghi_chu, 0, 20).'...';
			} else {
				echo $hs->ghi_chu;
			}
			?>
		</td>
		<td><?=$cb_name;?></td>
		<td><?=$ngay_nhaphs.' - '.$gio_nhaphs;?></td>
		<td><?=$ngay_xlhs.' - '.$gio_xlhs;?></td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="12">
			<span class="float-left">Tìm thấy: <b><?=$count_all;?></b> bản ghi</span>
			<?=$pagination;?>
		</td>
	</tr>
<?php } else { ?>
	<tr>
		<td class="text-center" colspan="12"><?=$search_error;?></td>
	</tr>
<?php } ?>