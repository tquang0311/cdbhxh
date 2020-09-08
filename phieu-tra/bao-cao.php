<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tổng hợp phiếu trả</title>
	<style>
		body{margin:0.5em;padding:0.5em;}
		@page{margin:1cm 2cm;}
		caption{font-size:1.5em;font-weight:bold;}
		td{padding:5px;}
	</style>
</head>
<body>
<?php
session_start();
	require "../libs/config.php";
	isset($_GET['s-date']) ? $tu_ngay = $_GET['s-date'] : null;
	isset($_GET['e-date']) ? $den_ngay = $_GET['e-date'] : null;
	$quarter1 = ceil(date('m', strtotime($tu_ngay))/3);
	$quarter2 = ceil(date('m', strtotime($den_ngay))/3);
	if ($quarter1==$quarter2) {
		$year = date('Y', strtotime($tu_ngay));
		$quarter='QUÝ '.$quarter1.' NĂM '.$year;
	} else {
		$quarter= 'TỪ '.DATE_FORMAT(new DateTime($tu_ngay), 'd/m/Y').' ĐẾN '.DATE_FORMAT(new DateTime($den_ngay), 'd/m/Y');
	}
	switch ($_GET['type']) {
		case 1:
			$stmt = $conn->prepare("SELECT pt.*, dist.dist_name, us.fullname, dv.ten_dv FROM qlvb pt INNER JOIN districts dist ON pt.bhxhqh = dist.dist_id INNER JOIN users us ON pt.nguoi_du_tdao = us.uid INNER JOIN dv_sdld dv ON pt.ma_dv = dv.ma_dv WHERE pt.ngay_phat_hanh BETWEEN ? AND ?");
			break;
		case 2:
			$stmt = $conn->prepare("SELECT DISTINCT(pt.bhxhqh), dist.dist_name FROM qlvb pt INNER JOIN districts dist ON pt.bhxhqh = dist.dist_id WHERE ngay_phat_hanh BETWEEN ? AND ? AND noi_nhan IN (2,3) AND user_group IN(3,4) AND tinh_trang IN(1,2) ORDER BY bhxhqh");
			break;

		default:
			break;
	}
		$stmt->execute([$tu_ngay, $den_ngay]);
			$count = $stmt->rowCount();
			if ($count>0) { ?>
				<table border="1" align="center">
					<caption>BẢNG TỔNG HỢP PHIẾU TRẢ HỒ SƠ <?php echo $quarter;?><br/>
						TỔNG: <?=array_sum($_SESSION['pt']);?> PHIẾU TRẢ
					</caption>
		            	<tr style="font-weight:bold;">
		            		<td style="widtd:1%;">S<br/>T<br/>T</td>
			                <td style="widtd:1%;">SỐ VB</td>
			                <td style="widtd:1%;">NGÀY PH</td>
			                <?php if ($_GET['type']==1) { ?>
			                <td>HỌ TÊN</td>
			                <td>SỐ SỔ</td>
			            	<?php } ?>
			            	<?php if ($_GET['type']==2) { ?>
			            	<td style="widtd:8%;">HỌ TÊN - SỐ SỔ</td>
			            	<?php } ?>
			                <?php if ($_GET['type']==1) { ?>
			                <td style="widtd:10%;">NƠI NHẬN VB</td>
							<?php } ?>
			                <td style="widtd:5%;">NGƯỜI DỰ THẢO</td>
			                <?php if ($_GET['type']==2) { ?>
			                <td style="width:auto;">NỘI DUNG</td>
							<?php } ?>
		            	</tr>
				<?php
				$result = $stmt->fetchAll(PDO::FETCH_OBJ);
				$i = 1;
				foreach ($result as $pt) {
					if ($_GET['type']==1) {
						if ($pt->so_vb >= 1 && $pt->so_vb <= 9) {
							$so_vb = '0'.$pt->so_vb;
						} else {
							$so_vb = $pt->so_vb;
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
						 	$pt_noinhan = $gioitinh.$pt->ho_ten_nld;
						} elseif ($pt->noi_nhan==2) {
							$pt_noinhan = 'BHXH '.$pt->dist_name;
						} elseif ($pt->noi_nhan==3) {
							$pt_noinhan = 'BHXH '.$pt->dist_name;
						} elseif ($pt->noi_nhan==4) {
							$pt_noinhan = 'Phòng TN & TKQ TTdC';
						} elseif ($pt->noi_nhan==5) {
							$pt_noinhan = $pt->ten_dv;
						}
						$montd = date('m', strtotime($pt->ngay_phat_hanh));
						if ($montd == 1 || $montd == 2) {
							$ngay_phat_hanh = DATE_FORMAT(new DateTime($pt->ngay_phat_hanh), 'd/m/Y');
						} else {
							$ngay_phat_hanh = DATE_FORMAT(new DateTime($pt->ngay_phat_hanh), 'd/n/Y');
						}
					}
				?>
				<!--
				<tr>
					<td><?=$i++;?></td>
					<td><?=$so_vb;?></td>
					<td><?=$ngay_phat_hanh;?></td>
					<td><?=$pt->ho_ten_nld;?></td>
					<td><?=$pt->so_so;?></td>
					<td><?=$pt_noinhan;?></td>
					<td><?=$pt->fullname;?></td>
				</tr>
				-->
					<?php if ($_GET['type']==2) { ?>
						<tr>
							<td style="font-weight:bold;" colspan="7"><?=$pt->bhxhqh.' - BHXH '.$pt->dist_name.' ('.$_SESSION['pt'][$pt->bhxhqh].')';?></td>
						</tr>
						<?php $stmt1 = $conn->prepare("SELECT pt1.*, us.username FROM qlvb pt1 INNER JOIN users us ON pt1.nguoi_du_thao = us.uid WHERE $pt->bhxhqh = pt1.bhxhqh AND pt1.noi_nhan NOT IN(6,7) AND pt1.tinh_trang IN(1,2) AND pt1.ngay_phat_hanh BETWEEN ? AND ?");
						$stmt1->execute([$tu_ngay, $den_ngay]);
						$result1 = $stmt1->fetchAll(PDO::FETCH_OBJ);
						$count1 = $stmt1->rowCount();
						$_SESSION['pt'][$pt->bhxhqh] = $count1;
						$i = 1;
						foreach ($result1 as $key => $pt1) { ?>
							<?php $montd1 = date('m', strtotime($pt1->ngay_phat_hanh));
							if ($montd1 == 1 || $montd1 == 2) {
								$ngay_phat_hanh1 = DATE_FORMAT(new DateTime($pt1->ngay_phat_hanh), 'd/m/Y');
							} else {
								$ngay_phat_hanh1 = DATE_FORMAT(new DateTime($pt1->ngay_phat_hanh), 'd/n/Y');
							} ?>
							<tr>
								<td><?=$i++;?></td>
								<td><?=$pt1->so_vb;?></td>
								<td><?=$ngay_phat_hanh1;?></td>
								<td><?=$pt1->ho_ten_nld.' - '.$pt1->so_so;?></td>
								<td><?=$pt1->username;?></td>
								<td style="padding-top:10px;"><?=$pt1->noi_dung;?></td>
							</tr>
						<?php } } } ?>
			<?php } else { ?>
			<h1 style="text-align:center;color:red;font-size:2em;" colspan="11">Không tìm tdấy dữ liệu</h1>
			<?php }
		/*$stmt1 = $conn->prepare("SELECT DISTINCT(bhxhqh) AS qh1 FROM qlvb WHERE ngay_phat_hanh BETWEEN ? AND ? AND noi_nhan IN (2,3) AND user_group IN(3,4) ORDER BY bhxhqh, quan_huyen");
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
	        <tdead>
	         	<tr>
		            <td>STT</td>
		            <td>BHXH QUẬN/HUYỆN</td>
		            <td>SỐ PHIẾU TRẢ</td>
	            </tr>
	        </tdead>
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
		<?php } } */?>
		</table>
	
</body>
</html>