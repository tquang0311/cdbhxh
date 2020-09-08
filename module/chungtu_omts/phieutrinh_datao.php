<?php
	//error_reporting(0);
	require('../controller/chung_tu_omts.php');
	$c_chungtu_omts = new c_chungtu_omts();
	$ListPhieutrinh_all = $c_chungtu_omts->searchListPhieutrinh();
	$ListPhieutrinh = $ListPhieutrinh_all['listbb'];
	$pagination = $ListPhieutrinh_all['pagination_bar'];
	//print_r($ListPhieutrinh);
if (!$search_error) {
$i = 1;
foreach ($ListPhieutrinh as $phieutrinh) {
	$listTBCTG = $c_chungtu_omts->searchTBCTGByListId(trim($phieutrinh->list_tbctg,','));
	$ngay_tao = DATE_FORMAT(new DateTime($phieutrinh->ngay_tao), 'd/m/Y');
	?>
	<tr class="onRow_checkbox">
		<td>
			<?=$i++;?>
		</td>
		<td class="no_whitespace" style="text-align: left;">
			<ol>
			<?php
			foreach ($listTBCTG['tbctg_data'] as $tbctg) { ?>
				<li><?=$tbctg->ten_dv.' - '.$tbctg->ma_dv;?></li>
			<?php } ?>
			</ol>
		</td>
		<td><?=$phieutrinh->fullname;?></td>
		<td><?=$ngay_tao;?></td>
		<td><a class="btn btn-success px-2 py-1" href="../print/phieu-trinh.php?id=<?=$phieutrinh->id;?>" target="_blank"><i class="far fa-eye"></i> Xem</a></td>
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