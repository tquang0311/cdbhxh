<?php
	//error_reporting(0);
	require('../controller/chung_tu_omts.php');
	$c_chungtu_omts = new c_chungtu_omts();
	$ListBB_all = $c_chungtu_omts->searchListBB();
	$ListBB = $ListBB_all['listbb'];
	$pagination = $ListBB_all['pagination_bar'];
	//print_r($ListBB);
if (!$search_error) {
$i = 1;
foreach ($ListBB as $bb) {
	$listHs = $c_chungtu_omts->searchHsomtsByListId(trim($bb->list_hs,','));
	$ListHS = '';
	$arr_sohs = array();
	foreach ($listHs['hsomts'] as $hs) {
		$arr_sohs[] = $hs->so_hs;
	}
	$ngay_taobb = DATE_FORMAT(new DateTime($bb->ngay_taobb), 'd/m/Y');
	$gio_taobb = DATE_FORMAT(new DateTime($bb->gio_taobb), 'H:i');
	?>
	<tr class="onRow_checkbox">
		<td>
			<?=$i++;?>
		</td>
		<td class="no_whitespace"><?=implode(', ', $arr_sohs);?></td>
		<td><?=$ngay_taobb.' - '.$gio_taobb;?></td>
		<td><a class="btn btn-success px-2 py-1" href="../print/bbbghs.php?bbbg=<?=$bb->bbbg_id;?>" target="_blank"><i class="far fa-eye"></i> Xem</a></td>
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