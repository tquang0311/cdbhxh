<?php
$nguoitaobb = $get_user['get_user']->uid;
$newBBBG = $c_chungtu_omts->taoBBBGHS($listId, $nguoitaobb, $ngay_hientai, $gio_hientai);
$_SESSION['success'] = 'Tạo biên bản thành công';
$new_bbbgId = $newBBBG['bbbg'];
?>
	<script>
		window.location.replace('../../public/chung-tu-tra-don-vi.php');
		window.open('../../print/bbbghs.php?bbbg=<?=$new_bbbgId;?>', '_blank');
	</script>