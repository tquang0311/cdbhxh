<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tổng hợp văn thư</title>
	<style>
		th, td{padding:5px;}
	</style>
</head>
<body>
<?php
	require "../libs/config.php";
	isset($_GET['s-date']) ? $tu_ngay = $_GET['s-date'] : null;
	isset($_GET['e-date']) ? $den_ngay = $_GET['e-date'] : null;
	/*isset($_GET['name']) ? $ho_ten_nld = $_GET['name'] : $ho_ten_nld = null;
	isset($_GET['svb']) ? $so_vb = $_GET['svb'] : $so_vb = null;
	isset($_GET['ss']) ? $so_so = $_GET['ss'] : $so_so = null;
	isset($_GET['mdv']) ? $ma_dv = $_GET['mdv'] : $ma_dv = null;
	isset($_GET['noinhan']) ? $noi_nhan = $_GET['noinhan'] : $noi_nhan = null;
	isset($_GET['bhxhqh']) ? $bhxhqh = $_GET['bhxhqh'] : $bhxhqh = null;
	isset($_GET['qh']) ? $qh = $_GET['qh'] : $qh = null;
	isset($_GET['lvb']) ? $loai_vb = $_GET['lvb'] : $loai_vb = null;
	isset($_GET['ldduyet']) ? $ld_duyet = $_GET['ldduyet'] : $ld_duyet = null;
	isset($_GET['status']) ? $trang_thai = $_GET['status'] : $trang_thai = null;
	isset($_GET['user']) ? $users = $_SESSION['uid'] : $users = null;*/
		/*$stmt = $conn->prepare("SELECT * FROM qlvb WHERE /*so_vb LIKE ? AND ho_ten_nld LIKE ? AND so_so LIKE ? AND ma_dv LIKE ? AND noi_nhan LIKE ? AND bhxhqh LIKE ? AND quan_huyen LIKE ? AND nguoi_du_thao LIKE ? AND loai_vb LIKE ? AND ld_duyet LIKE ? AND tinh_trang LIKE ? AND *//*ngay_phat_hanh BETWEEN ? AND ? AND noi_nhan IN (2,3) AND user_group IN(2,3,4) ORDER BY bhxhqh, quan_huyen");
		$stmt->execute([/*'%'.$so_vb.'%', '%'.$ho_ten_nld.'%', '%'.$so_so.'%', '%'.$ma_dv.'%', '%'.$noi_nhan.'%', '%'.$bhxhqh.'%', '%'.$qh.'%', '%'.$users.'%', '%'.$loai_vb.'%', '%'.$ld_duyet.'%', '%'.$trang_thai.'%',*/ /*$tu_ngay, $den_ngay]);*/
		$stmt1 = $conn->prepare("SELECT DISTINCT(bhxhqh) AS qh1 FROM qlvb WHERE ngay_phat_hanh BETWEEN ? AND ? AND noi_nhan IN (2,3) AND user_group IN(3,4) ORDER BY bhxhqh, quan_huyen");
		$stmt1->execute([$tu_ngay, $den_ngay]);

		$stmt2 = $conn->prepare("SELECT DISTINCT(quan_huyen) AS qh2 FROM qlvb WHERE ngay_phat_hanh BETWEEN ? AND ? AND noi_nhan IN (2,3) AND user_group IN(3,4) ORDER BY bhxhqh, quan_huyen");
		$stmt2->execute([$tu_ngay, $den_ngay]);

		while ($vb1 = $stmt1->fetch()) {
			$arr_qh1[] = $vb1['qh1'];
		}
		while ($vb2 = $stmt2->fetch()) {
			$arr_qh2[] = $vb2['qh2'];
		}
		$arr_qh = array_merge($arr_qh1, $arr_qh2);
		$arr_qh =  array_unique($arr_qh);
		$list_qh = implode(',', $arr_qh);
		$stmt3 = $conn->prepare("SELECT DISTINCT bhxhqh, quan_huyen FROM qlvb WHERE bhxhqh IN ($list_qh) OR quan_huyen IN ($list_qh) AND noi_nhan IN (2,3) AND user_group IN (3,4) AND ngay_phat_hanh BETWEEN ? AND ? ORDER BY bhxhqh, quan_huyen");
		$stmt3->execute([$tu_ngay, $den_ngay]); ?>
		<table border="1">
	        <thead>
	         	<tr>
		            <th>STT</th>
		            <th>BHXH QUẬN/HUYỆN</th>
		            <th>SỐ PHIẾU TRẢ</th>
	            </tr>
	        </thead>
	        <tbody>
		<?php
		$i = 1;
		while ($vb3 = $stmt3->fetch()) {
			if ($vb3['bhxhqh'] != 0) {
				$qh3 = $vb3['bhxhqh'];
				$query = $conn->query("SELECT dist_name FROM districts WHERE dist_id = $qh3");
				$query->execute();
				$row = $query->fetch();

				$query1 = $conn->query("SELECT COUNT(vb_id) AS tong_so FROM qlvb WHERE bhxhqh = $qh3 OR quan_huyen = $qh3 AND noi_nhan IN (2,3) AND user_group IN (3,4) AND ngay_phat_hanh BETWEEN '".$tu_ngay."' AND '".$den_ngay."'");
				$query1->execute();
				$row1 = $query1->fetch(); ?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row['dist_name']; ?></td>
					<td><?php echo $row1['tong_so']; ?></td>
				</tr>
		<?php } } ?>
			</tbody>
		</table>
	<?php /*$count = $stmt->rowCount();
	if ($count>0) { ?>
		<table border="1">
            <thead>
            	<tr>
	                <th>STT</th>
	                <th>SỐ VB</th>
	                <th>NGÀY PHÁT HÀNH</th>
	                <th>HỌ TÊN NLĐ</th>
	                
	                <th>SỐ SỔ</th>
	                <th>NƠI NHẬN VB</th>
	                <th>NGƯỜI DỰ THẢO</th>
            	</tr>
        	</thead>
        	<tbody>
		<?php
		$i = 1;
		while ($vb = $stmt->fetch()) {
		$qh = $vb['quan_huyen'];
		$query3 = $conn->query("SELECT dist_name FROM districts WHERE dist_id = $qh");
		$query3->execute();
		$dist3 = $query3->fetch();

		$qh1 = $vb['bhxhqh'];
		$query4 = $conn->query("SELECT dist_name FROM districts WHERE dist_id = $qh1");
		$query4->execute();
		$dist4 = $query4->fetch();

		$vb_nguoi_du_thao = $vb['nguoi_du_thao'];
		$query5 = $conn->query("SELECT fullname FROM users WHERE uid = $vb_nguoi_du_thao");
		$query5->execute();
		$row = $query5->fetch();

		$madv = $vb['ma_dv'];
		$stmt1 = $conn->prepare("SELECT ten_dv FROM dv_sdld WHERE ma_dv = ?");
		$stmt1->execute([$madv]);
		$dv = $stmt1->fetch();
		if ($vb['so_vb'] >= 1 && $vb['so_vb'] <= 9) {
			$so__vb = '0'.$vb['so_vb'];
		} else {
			$so__vb = $vb['so_vb'];
		}
		if ($vb['gioi_tinh'] == 1) {
			$gioi_tinh = 'Nam';
			$gioitinh = 'Ông ';
		} elseif ($vb['gioi_tinh'] == 2) {
			$gioi_tinh = 'Nữ';
			$gioitinh = 'Bà ';
		} else {
			$gioi_tinh = null;
			$gioitinh = null;
		}
		if ($vb['noi_nhan']==1) {
		 	$vb_noinhan = $gioitinh.$vb['ho_ten_nld'];
		} elseif ($vb['noi_nhan']==2) {
			$vb_noinhan = 'BHXH '.$dist3['dist_name'];
		} elseif ($vb['noi_nhan']==3) {
			$vb_noinhan = 'BHXH '.$dist4['dist_name'];
		} elseif ($vb['noi_nhan']==4) {
			$vb_noinhan = 'Phòng TN & TKQ TTHC';
		} elseif ($vb['noi_nhan']==5) {
			$vb_noinhan = $dv['ten_dv'];
		}

		if ($vb['ld_duyet']==2) {
			$ld_duyet = 'Dương Thị Minh Châu';
		} elseif ($vb['ld_duyet']==3) {
			$ld_duyet = 'Trần Thị Thu Hà';
		} elseif ($vb['ld_duyet']==4) {
			$ld_duyet = 'Bùi Anh Tuấn';
		}
		if ($vb['tinh_trang']==1) {
		 	$vb_tinhtrang = 'Dự thảo';
		} elseif ($vb['tinh_trang']==2) {
			$vb_tinhtrang = 'Đã xử lý';
		} elseif ($vb['tinh_trang']==3) {
			$vb_tinhtrang = 'Hủy dự thảo';
		}

		$month = date('m', strtotime($vb['ngay_phat_hanh']));
		if ($month == 1 || $month == 2) {
			$ngay_phat_hanh = DATE_FORMAT(new DateTime($vb['ngay_phat_hanh']), 'd/m/Y');
		} else {
			$ngay_phat_hanh = DATE_FORMAT(new DateTime($vb['ngay_phat_hanh']), 'd/n/Y');
		}
		?>
		<tr>
			<td>
				<?php echo $i++;?>
			</td>
			<td><?php echo $so__vb;?></td>
			<td><?php echo $ngay_phat_hanh; ?></td>
			<td><?php echo $vb['ho_ten_nld'];?></td>
			
			<td><?php echo $vb['so_so'];?></td>
			<td><?php echo $vb_noinhan;?></td>
			<td class="ndt"><?php echo $row['fullname'];?></td>
		</tr>
	<?php } ?>
	</tbody>
	<?php } else { ?>
		<tr>
			<td class="text-center" colspan="11">Không tìm thấy dữ liệu</td>
		</tr>
	<?php }*/ ?>
</body>
</html>