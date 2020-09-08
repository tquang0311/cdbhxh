<?php
//error_reporting(0);
if(isset($_POST['bophan'])){
	require "../libs/config.php";
	$bophan = $_POST['bophan'];
	$tu_ngay = $_POST['tu_ngay'];
	$den_ngay = $_POST['den_ngay'];
	$days = (strtotime($den_ngay) - strtotime($tu_ngay)) / (60 * 60 * 24);

	/*$date = date("d-m-Y");

	$ngayhomnay=getdate(); 
	$thu_trong_tuan=$ngayhomnay['wday'];

	$tam=$thu_trong_tuan-1; 
	$thu_hai_tuan_truoc = strtotime(date("Y-m-d", strtotime($date)) . " -$tam days -7 days"); 
	echo "Thứ hai ".date("d-m-Y",$thu_hai_tuan_truoc)."<br>"; 

	$tam2=7-$thu_trong_tuan; 
	$chu_nhat_tuan_truoc = strtotime(date("Y-m-d", strtotime($date)) . " +$tam2 days -7 days"); 
	echo "Chủ nhật ".date("d-m-Y",$chu_nhat_tuan_truoc)."<br>";*/
	?>
		<h6>Click vào họ tên để xem chi tiết</h6>
		<table class="table table-bordered">
			<tr class="bg-info text-white">
				<th>STT</th>
				<th>Họ tên</th>
			<?php
			$sql = "SELECT uid FROM users WHERE user_group = $bophan";
			$query = $conn->query($sql);
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$query->execute();
				/*echo "Tuần thứ: " . date('W', time());*/
			if ($bophan == 2) { ?>
				<th>Công việc đã hoàn thành</th>
				<th>Công việc phát sinh</th>
			</tr>
				<?php while ($row = $query->fetch()) { $uid[] = $row['uid']; }
				$list_uid = implode(',', $uid);
				$i = 1;
				$query1 = $conn->query("SELECT uid, fullname FROM users WHERE uid IN ($list_uid)");
				while ($row1 = $query1->fetch()) { ?>
			<tr class="onRow">
				<td><?php echo $i++; ?>
				<span class="u d-none"><?php $u_id = $row1['uid']; ?></span>
				<input type="hidden" name="name" value="<?php echo $row1['fullname']; ?>" disabled>
				<input type="hidden" name="bophan" class="bp" value="<?php echo $bophan; ?>" disabled>
				</td>
				<td><a href="#" title="Click để xem chi tiết" class='fullname btn btn-success'><?php echo $row1['fullname']; ?></a></td>
				<?php
				if ($tu_ngay == '' && $den_ngay == '') {
					$query2 = $conn->query("SELECT GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id");
				} else {
					$query2 = $conn->query("SELECT GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND ngay_nhap BETWEEN '$tu_ngay' AND '$den_ngay'");
				}
				$row2 = $query2->fetch(); ?>
				<td class="font-weight-bold">
					<?php
					$query3 = $conn->query("SELECT uid FROM users WHERE ld_phutrach = $u_id");
					/*while ($row3 = $query3->fetch()) {$u_i_d[] = $row3['uid'];}
					$list_phutrach = implode(',', $u_i_d);
					if ( $u_id == 2 ) {
						$query4 = $conn->query("SELECT SUM(tra_lai) + SUM(don_thu) AS cvdatduoc FROM data_hs WHERE uid IN ($list_phutrach)");
					} elseif ( $u_id == 3 ) {
						$query4 = $conn->query("SELECT SUM(tra_lai) + SUM(don_thu) AS cvdatduoc FROM data_hs WHERE uid IN ($list_phutrach)");
					} elseif ( $u_id == 4 ) {
						$query4 = $conn->query("SELECT SUM(tra_lai) + SUM(don_thu) AS cvdatduoc FROM data_hs WHERE uid IN ($list_phutrach)");
					}
					$row4 = $query4->fetch();
					echo $row4['cvdatduoc'];
					while ( $row3 = $query3->fetch()) {
						echo $row3['uid'].',';
					}*/
					if ( $u_id == 2 ) {
						$query4 = $conn->query("SELECT SUM(tra_lai) + SUM(don_thu) + SUM(hs_huongtn_tangmoi_chi_atm) AS cvdatduoc FROM data_hs WHERE uid IN (5,7,13,27,28,29,30,31,32,33,34)");
					} elseif ( $u_id == 3 ) {
						$query4 = $conn->query("SELECT SUM(tra_lai) + SUM(don_thu) + SUM(hs_tang_trongthang) + SUM(hs_thaydoi_trongthang) + SUM(sqd_thoihuongtuat) AS cvdatduoc FROM data_hs WHERE uid IN (9,11,17,18,19,20,21,22,23,24,25,26)");
					} elseif ( $u_id == 4 ) {
						$query4 = $conn->query("SELECT SUM(tra_lai) + SUM(don_thu) AS cvdatduoc FROM data_hs WHERE uid IN (6,8,10,12,14,15,16)");
					}
					$row4 = $query4->fetch();
					echo $row4['cvdatduoc'];
					?>
				</td>
				<td>
					<?php echo $row2['cv_phatsinh']; ?>
					<input type="hidden" name="cvphatsinh" value="<?php echo $row2['cv_phatsinh']; ?>" disabled>
					</td>
			</tr>
				<?php } }
			if ($bophan == 3) { ?>
				<th>Số HS tuần trước chuyển sang</th>
				<th>Số HS tiếp nhận</th>
				<th>Số HS trả lại</th>
				<th>Số lượng đơn thư phải trả lời</th>
				<th>Số HS sai phải điều chỉnh</th>
				<th>Báo cáo (định kì, đột xuất)</th>
				<th>Kiểm tra dữ liệu, chuyển chi trả</th>
				<th>Kiểm tra, chuyển dữ liệu 21AB sang kế toán, bưu điện (đợt/tuần)</th>
				<th>Công việc đạt được</th>
				<th>Công việc chưa đạt được</th>
				<th>Lý do</th>
				<th>Công việc phát sinh</th>
			</tr>
				<?php while ($row = $query->fetch()) { $uid[] = $row['uid']; }
				$list_uid = implode(',', $uid);
				$i = 1;
				$query1 = $conn->query("SELECT uid, fullname FROM users WHERE uid IN ($list_uid)");
				/*$query1->setFetchMode(PDO::FETCH_ASSOC);
				$query1->execute();*/
				while ($row1 = $query1->fetch()) { ?>
			<tr class="onRow">
				<td><?php echo $i++; ?>
				<span class="u d-none"><?php echo $u_id = $row1['uid']; ?></span>
				<input type="hidden" name="name" value="<?php echo $row1['fullname']; ?>" disabled>
				<input type="hidden" name="bophan" class="bp" value="<?php echo $bophan; ?>" disabled>
				</td>
				<td>
					<a href="#" title="Click để xem chi tiết" class='fullname btn btn-success'><?php echo $row1['fullname']; ?></a>
				</td>
				<?php
				if ($tu_ngay == '' && $den_ngay == '') {
					$query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(hs_sai_dieuchinh) AS hssaidieuchinh, SUM(bao_cao) AS baocao, SUM(ktdl_chuyenchitra) AS ktdlchuyenchitra, SUM(kt_chuyendl21ab) AS ktchuyendl21ab, SUM(cv_datduoc) AS cv_datduoc, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id");
					$query5 = $conn->query("SELECT COUNT(phieu_tra_id) AS tong_so_phieu_tra FROM phieu_tra_hs WHERE nguoi_tra = $u_id");
				} else {
					$query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(hs_sai_dieuchinh) AS hssaidieuchinh, SUM(bao_cao) AS baocao, SUM(ktdl_chuyenchitra) AS ktdlchuyenchitra, SUM(kt_chuyendl21ab) AS ktchuyendl21ab, SUM(cv_datduoc) AS cv_datduoc, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
					$query5 = $conn->query("SELECT COUNT(phieu_tra_id) AS tong_so_phieu_tra FROM phieu_tra_hs WHERE nguoi_tra = $u_id AND ngay_tra BETWEEN '$tu_ngay' AND '$den_ngay'");
				}
				/*$query2->setFetchMode(PDO::FETCH_ASSOC);
				$query2->execute();*/
				$row2 = $query2->fetch();
				$row5 = $query5->fetch();
				$tong_so_phieu_tra = $row5['tong_so_phieu_tra'];
				if ($tong_so_phieu_tra == 0) {
					$tong_so_phieu_tra = null;
				}
				?>
				<td></td>
				<td>
					<?php echo $row2['tonghsnhan']; ?>
					<input type="hidden" name="hsnhan" value="<?php echo $row2['tonghsnhan']; ?>" disabled>
				</td>
				<td>
					<?php echo $tong_so_phieu_tra; ?>
					<input type="hidden" name="tra_lai" value="<?php echo $tong_so_phieu_tra; ?>" disabled>
				</td>
				<td>
					
				</td>
				<td>
					<?php echo $row2['hssaidieuchinh']; ?>
					<input type="hidden" name="hssai_dc" value="<?php echo $row2['hssaidieuchinh']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['baocao']; ?>
					<input type="hidden" name="baocao" value="<?php echo $row2['baocao']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['ktdlchuyenchitra']; ?>
					<input type="hidden" name="ktdlchuyenchitra" value="<?php echo $row2['ktdlchuyenchitra']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['ktchuyendl21ab']; ?>
					<input type="hidden" name="ktchuyendl21ab" value="<?php echo $row2['ktchuyendl21ab']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_datduoc']; ?>
					<input type="hidden" name="cv_datduoc" value="<?php echo $row2['cv_datduoc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_chuadatduoc']; ?>
					<input type="hidden" name="cv_chuadatduoc" value="<?php echo $row2['cv_chuadatduoc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['ly_do']; ?>
					<input type="hidden" name="lydo" value="<?php echo $row2['ly_do']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_phatsinh']; ?>
					<input type="hidden" name="cvphatsinh" value="<?php echo $row2['cv_phatsinh']; ?>" disabled>
				</td>
			</tr>
					<?php } }
			if ($bophan == 4) { ?>
				<th>Số HS tuần trước chuyển sang</th>
				<th>Số HS tiếp nhận</th>
				<th>Số HS trả lại</th>
				<th>Số lượng đơn thư phải trả lời</th>
				<th>Số HS phải xin ý kiến BHVN, Sở Lao động</th>
				<th>Bóc tách HS điều chỉnh</th>
				<th>Công việc đạt được</th>
				<th>Công việc chưa đạt được</th>
				<th>Lý do</th>
				<th>Công việc phát sinh</th>
			</tr>
				<?php while ($row = $query->fetch()) { $uid[] = $row['uid']; }
				$list_uid = implode(',', $uid);
				$i = 1;
				$query1 = $conn->query("SELECT uid, fullname FROM users WHERE uid IN ($list_uid)");
				while ($row1 = $query1->fetch()) { ?>
			<tr class="onRow">
				<td><?php echo $i++; ?>
				<span class="u d-none"><?php echo $u_id = $row1['uid']; ?></span>
				<input type="hidden" name="name" value="<?php echo $row1['fullname']; ?>" disabled>
				<input type="hidden" name="bophan" class="bp" value="<?php echo $bophan; ?>" disabled>
				</td>
				<td>
					<a href="#" title="Click để xem chi tiết" class='fullname btn btn-success'><?php echo $row1['fullname']; ?></a>
				</td>
				<?php
				if ($tu_ngay == '' && $den_ngay == '') {
					$query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(hs_xinykien_bhxhvn) AS hsxinykienbhxhvn, SUM(boctach_dieuchinh) AS boctachdieuchinh, SUM(cv_datduoc) AS cv_datduoc, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id");
					$query5 = $conn->query("SELECT COUNT(phieu_tra_id) AS tong_so_phieu_tra FROM phieu_tra_hs WHERE nguoi_tra = $u_id");
				} else {
					$query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(hs_xinykien_bhxhvn) AS hsxinykienbhxhvn, SUM(boctach_dieuchinh) AS boctachdieuchinh, SUM(cv_datduoc) AS cv_datduoc, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
					$query5 = $conn->query("SELECT COUNT(phieu_tra_id) AS tong_so_phieu_tra FROM phieu_tra_hs WHERE nguoi_tra = $u_id AND ngay_tra BETWEEN '$tu_ngay' AND '$den_ngay'");
				}
				$row2 = $query2->fetch();
				$row5 = $query5->fetch();
				$tong_so_phieu_tra = $row5['tong_so_phieu_tra'];
				if ($tong_so_phieu_tra == 0) {
					$tong_so_phieu_tra = null;
				} ?>
				<td></td>
				<td>
					<?php echo $row2['tonghsnhan']; ?>
					<input type="hidden" name="hsnhan" value="<?php echo $row2['tonghsnhan']; ?>" disabled>
				</td>
				<td>
					<?php echo $tong_so_phieu_tra; ?>
					<input type="hidden" name="tra_lai" value="<?php echo $tong_so_phieu_tra; ?>" disabled>
				</td>
				<td>
					
				</td>
				<td>
					<?php echo $row2['hsxinykienbhxhvn']; ?>
					<input type="hidden" name="hsxinykienbhxhvn" value="<?php echo $row2['hsxinykienbhxhvn']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['boctachdieuchinh']; ?>
					<input type="hidden" name="boctachdieuchinh" value="<?php echo $row2['boctachdieuchinh']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_datduoc']; ?>
					<input type="hidden" name="cv_datduoc" value="<?php echo $row2['cv_datduoc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_chuadatduoc']; ?>
					<input type="hidden" name="cv_chuadatduoc" value="<?php echo $row2['cv_chuadatduoc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['ly_do']; ?>
					<input type="hidden" name="lydo" value="<?php echo $row2['ly_do']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_phatsinh']; ?>
					<input type="hidden" name="cvphatsinh" value="<?php echo $row2['cv_phatsinh']; ?>" disabled>	
				</td>
			</tr>
				<?php } }
			if ($bophan == 5) { ?>
				<th>Số HS tuần trước chuyển sang</th>
				<th>Số HS tiếp nhận</th>
				<th>Số HS trả lại</th>
				<th>Số lượng đơn thư phải trả lời</th>
				<th>Báo cáo tổng hợp ÔĐ-TS (đột xuất, định kỳ)</th>
				<th>Tổng hợp số liệu chuyển kế toán</th>
				<th>Bóc tách HS</th>
				<th>Công việc đạt được</th>
				<th>Công việc chưa đạt được</th>
				<th>Lý do</th>
				<th>Công việc phát sinh</th>
			</tr>
				<?php while ($row = $query->fetch()) { $uid[] = $row['uid']; }
				$list_uid = implode(',', $uid);
				$i = 1;
				$query1 = $conn->query("SELECT uid, fullname FROM users WHERE uid IN ($list_uid)");
				while ($row1 = $query1->fetch()) { ?>
			<tr class="onRow">
				<td><?php echo $i++; ?>
				<span class="u d-none"><?php echo $u_id = $row1['uid']; ?></span>
				<input type="hidden" name="name" value="<?php echo $row1['fullname']; ?>" disabled>
				<input type="hidden" name="bophan" class="bp" value="<?php echo $bophan; ?>" disabled>
				</td>
				<td>
					<a href="#" title="Click để xem chi tiết" class='fullname btn btn-success'><?php echo $row1['fullname']; ?></a>
				</td>
				<?php
				if ($tu_ngay == '' && $den_ngay == '') {
					$query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(baocao_odts) AS baocaoodts, SUM(tonghop_ketoan) AS tonghopketoan, SUM(boctach_xdnh) AS boctach_xdnh, SUM(cv_datduoc) AS cv_datduoc, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id");
					$query5 = $conn->query("SELECT COUNT(phieu_tra_id) AS tong_so_phieu_tra FROM phieu_tra_hs WHERE nguoi_tra = $u_id");
				} else {
					$query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(baocao_odts) AS baocaoodts, SUM(tonghop_ketoan) AS tonghopketoan, SUM(boctach_xdnh) AS boctach_xdnh, SUM(cv_datduoc) AS cv_datduoc, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
					$query5 = $conn->query("SELECT COUNT(phieu_tra_id) AS tong_so_phieu_tra FROM phieu_tra_hs WHERE nguoi_tra = $u_id AND ngay_tra BETWEEN '$tu_ngay' AND '$den_ngay'");
				}
				$row2 = $query2->fetch();
				$row5 = $query5->fetch();
				$tong_so_phieu_tra = $row5['tong_so_phieu_tra'];
				if ($tong_so_phieu_tra == 0) {
					$tong_so_phieu_tra = null;
				} ?>
				<td></td>
				<td>
					<?php echo $row2['tonghsnhan']; ?>
					<input type="hidden" name="hsnhan" value="<?php echo $row2['tonghsnhan']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['baocaoodts']; ?>
					<input type="hidden" name="baocaoodts" value="<?php echo $row2['baocaoodts']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['tonghopketoan']; ?>
					<input type="hidden" name="tonghopketoan" value="<?php echo $row2['tonghopketoan']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['boctach_xdnh']; ?>
					<input type="hidden" name="boctach_xdnh" value="<?php echo $row2['boctach_xdnh']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_datduoc']; ?>
					<input type="hidden" name="cv_datduoc" value="<?php echo $row2['cv_datduoc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_chuadatduoc']; ?>
					<input type="hidden" name="cv_chuadatduoc" value="<?php echo $row2['cv_chuadatduoc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['ly_do']; ?>
					<input type="hidden" name="lydo" value="<?php echo $row2['ly_do']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_phatsinh']; ?>
					<input type="hidden" name="cvphatsinh" value="<?php echo $row2['cv_phatsinh']; ?>" disabled>
				</td>
			</tr>
				<?php } }
			if ($bophan == 6) { ?>
				<th>Bóc tách HS</th>
				<th>Công việc phát sinh</th>
			</tr>
				<?php while ($row = $query->fetch()) { $uid[] = $row['uid']; }
				$list_uid = implode(',', $uid);
				$i = 1;
				$query1 = $conn->query("SELECT uid, fullname FROM users WHERE uid IN ($list_uid)");
				while ($row1 = $query1->fetch()) { ?>
			<tr class="onRow">
				<td><?php echo $i++; ?>
				<span class="u d-none"><?php echo $u_id = $row1['uid']; ?></span>
				<input type="hidden" name="name" value="<?php echo $row1['fullname']; ?>" disabled>
				<input type="hidden" name="bophan" class="bp" value="<?php echo $bophan; ?>" disabled>
				<input type="hidden" name="u" value="<?php echo $u_id; ?>" disabled>
				</td>
				<td>
					<a href="#" title="Click để xem chi tiết" class='fullname btn btn-success'><?php echo $row1['fullname']; ?></a>
				</td>
				<?php
				if ($tu_ngay == '' && $den_ngay == '') {
					$query2 = $conn->query("SELECT SUM(boctach_xddh) AS boctachxddh, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id");
				} else {
					$query2 = $conn->query("SELECT SUM(boctach_xddh) AS boctachxddh, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
				}
				$row2 = $query2->fetch(); ?>
				<td>
					<?php echo $row2['boctachxddh']; ?>
					<input type="hidden" name="boctachxddh" value="<?php echo $row2['boctachxddh']; ?>" disabled>
					</td>
				<td>
					<?php echo $row2['cv_phatsinh']; ?>
					<input type="hidden" name="cvphatsinh" value="<?php echo $row2['cv_phatsinh']; ?>" disabled>
					</td>
			</tr>
				<?php } }
			if ($bophan == 7) { ?>
				<th>Số quyết định thôi hưởng tuất</th>
				<th>Số lượng HS chuyển đến</th>
				<th>Số HS tăng</th>
				<th>Số HS điều chỉnh, thay đổi</th>
				<th>Công việc phát sinh</th>
			</tr>
				<?php while ($row = $query->fetch()) { $uid[] = $row['uid']; }
				$list_uid = implode(',', $uid);
				$i = 1;
				$query1 = $conn->query("SELECT uid, fullname FROM users WHERE uid IN ($list_uid)");
				while ($row1 = $query1->fetch()) { ?>
			<tr class="onRow">
				<td><?php echo $i++; ?>
				<span class="u d-none"><?php echo $u_id = $row1['uid']; ?></span>
				<input type="hidden" name="name" value="<?php echo $row1['fullname']; ?>" disabled>
				<input type="hidden" name="bophan" class="bp" value="<?php echo $bophan; ?>" disabled>
				</td>
				<td>
					<a href="#" title="Click để xem chi tiết" class='fullname btn btn-success'><?php echo $row1['fullname']; ?></a>
				</td>
				<?php
				if ($tu_ngay == '' && $den_ngay == '') {
					$query2 = $conn->query("SELECT SUM(sqd_thoihuongtuat) AS sqdthoihuongtuat, SUM(hs_chuyenden_qlc) AS hschuyendenqlc, SUM(hs_tang_trongthang) AS hstangtrongthang, SUM(hs_thaydoi_trongthang) AS hsthaydoitrongthang, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id");
				} else {
					$query2 = $conn->query("SELECT SUM(sqd_thoihuongtuat) AS sqdthoihuongtuat, SUM(hs_chuyenden_qlc) AS hschuyendenqlc, SUM(hs_tang_trongthang) AS hstangtrongthang, SUM(hs_thaydoi_trongthang) AS hsthaydoitrongthang, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
				}
				$row2 = $query2->fetch(); ?>
				<td>
					<?php echo $row2['sqdthoihuongtuat']; ?>
					<input type="hidden" name="sqdthoihuongtuat" value="<?php echo $row2['sqdthoihuongtuat']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['hschuyendenqlc']; ?>
					<input type="hidden" name="hschuyendenqlc" value="<?php echo $row2['hschuyendenqlc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['hstangtrongthang']; ?>
					<input type="hidden" name="hstangtrongthang" value="<?php echo $row2['hstangtrongthang']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['hsthaydoitrongthang']; ?>
					<input type="hidden" name="hsthaydoitrongthang" value="<?php echo $row2['hsthaydoitrongthang']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_phatsinh']; ?>
					<input type="hidden" name="cvphatsinh" value="<?php echo $row2['cv_phatsinh']; ?>" disabled>
				</td>
			</tr>
				<?php } }
			if ($bophan == 8) { ?>
				<th>Số HS tuần trước chuyển sang</th>
				<th>Số HS tiếp nhận</th>
				<th>Tổng hợp chuyển số liệu 21AB</th>
				<th>Công việc đạt được</th>
				<th>Công việc chưa đạt được</th>
				<th>Lý do</th>
				<th>Công việc phát sinh</th>
			</tr>
				<?php while ($row = $query->fetch()) { $uid[] = $row['uid']; }
				$list_uid = implode(',', $uid);
				$i = 1;
				$query1 = $conn->query("SELECT uid, fullname FROM users WHERE uid IN ($list_uid)");
				while ($row1 = $query1->fetch()) { ?>
			<tr class="onRow">
				<td><?php echo $i++; ?>
				<span class="u d-none"><?php echo $u_id = $row1['uid']; ?></span>
				<input type="hidden" name="name" value="<?php echo $row1['fullname']; ?>" disabled>
				<input type="hidden" name="bophan" class="bp" value="<?php echo $bophan; ?>" disabled>
				</td>
				<td>
					<a href="#" title="Click để xem chi tiết" class='fullname btn btn-success'><?php echo $row1['fullname']; ?></a>
				</td>
				<?php
				if ($tu_ngay == '' && $den_ngay == '') {
					$query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(tonghop_21ab) AS tonghop21ab, SUM(cv_datduoc) AS cv_datduoc, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id");
				} else {
					$query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(tonghop_21ab) AS tonghop21ab, SUM(cv_datduoc) AS cv_datduoc, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
				}
				$row2 = $query2->fetch(); ?>
				<td></td>
				<td>
					<?php echo $row2['tonghsnhan']; ?>
					<input type="hidden" name="hsnhan" value="<?php echo $row2['tonghsnhan']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['tonghop21ab']; ?>
					<input type="hidden" name="tonghop21ab" value="<?php echo $row2['tonghop21ab']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_datduoc']; ?>
					<input type="hidden" name="cv_datduoc" value="<?php echo $row2['cv_datduoc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_chuadatduoc']; ?>
					<input type="hidden" name="cv_chuadatduoc" value="<?php echo $row2['cv_chuadatduoc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['ly_do']; ?>
					<input type="hidden" name="lydo" value="<?php echo $row2['ly_do']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_phatsinh']; ?>
					<input type="hidden" name="cvphatsinh" value="<?php echo $row2['cv_phatsinh']; ?>" disabled>
				</td>
			</tr>
				<?php } }
			if ($bophan == 9) { ?>
				<th>Số HS hưởng TCTN tăng mới (chi qua ATM)</th>
				<th>Số lượt hưởng TCTN ( ATM)</th>
				<th>Số HS đề nghị hưởng hỗ trợ học nghề</th>
				<th>Số HS bảo lưu thời gian thất nghiệp</th>
				<th>Số HS thu hồi, chấm dứt, tạm dừng, tiếp tục hưởng</th>
				<th>In thẻ BHYT (lượt người)</th>
				<th>Công việc đạt được</th>
				<th>Công việc chưa đạt được</th>
				<th>Lý do</th>
				<th>Công việc phát sinh</th>
			</tr>
				<?php while ($row = $query->fetch()) { $uid[] = $row['uid']; }
				$list_uid = implode(',', $uid);
				$i = 1;
				$query1 = $conn->query("SELECT uid, fullname FROM users WHERE uid IN ($list_uid)");
				while ($row1 = $query1->fetch()) { ?>
			<tr class="onRow">
				<td><?php echo $i++; ?>
				<span class="u d-none"><?php echo $u_id = $row1['uid']; ?></span>
				<input type="hidden" name="name" value="<?php echo $row1['fullname']; ?>" disabled>
				<input type="hidden" name="bophan" class="bp" value="<?php echo $bophan; ?>" disabled>
				</td>
				<td>
					<a href="#" title="Click để xem chi tiết" class='fullname btn btn-success'><?php echo $row1['fullname']; ?></a>
				</td>
				<?php
				if ($tu_ngay == '' && $den_ngay == '') {
					$query2 = $conn->query("SELECT SUM(hs_huongtn_tangmoi_chi_atm) AS hshuongtntangmoichiatm, SUM(luot_huong_tctn_atm) AS luothuongtctnatm, SUM(hs_hotro_hocnghe) AS hshotrohocnghe, SUM(hs_baoluu_tgian_tn) AS hsbaoluutgiantn, SUM(hs_thuhoi_tn) AS hsthuhoitn, SUM(in_the_bhyt) AS in_the_bhyt, SUM(cv_datduoc) AS cv_datduoc, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id");
				} else {
					$query2 = $conn->query("SELECT SUM(hs_huongtn_tangmoi_chi_atm) AS hshuongtntangmoichiatm, SUM(luot_huong_tctn_atm) AS luothuongtctnatm, SUM(hs_hotro_hocnghe) AS hshotrohocnghe, SUM(hs_baoluu_tgian_tn) AS hsbaoluutgiantn, SUM(hs_thuhoi_tn) AS hsthuhoitn, SUM(in_the_bhyt) AS in_the_bhyt, SUM(cv_datduoc) AS cv_datduoc, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
				}
				$row2 = $query2->fetch(); ?>
				<td>
					<?php echo $row2['hshuongtntangmoichiatm']; ?>
					<input type="hidden" name="hshuongtntangmoichiatm" value="<?php echo $row2['hshuongtntangmoichiatm']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['luothuongtctnatm']; ?>
					<input type="hidden" name="luothuongtctnatm" value="<?php echo $row2['luothuongtctnatm']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['hshotrohocnghe']; ?>
					<input type="hidden" name="hshotrohocnghe" value="<?php echo $row2['hshotrohocnghe']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['hsbaoluutgiantn']; ?>
					<input type="hidden" name="hsbaoluutgiantn" value="<?php echo $row2['hsbaoluutgiantn']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['hsthuhoitn']; ?>
					<input type="hidden" name="hsthuhoitn" value="<?php echo $row2['hsthuhoitn']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['in_the_bhyt']; ?>
					<input type="hidden" name="in_the_bhyt" value="<?php echo $row2['in_the_bhyt']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_datduoc']; ?>
					<input type="hidden" name="cv_datduoc" value="<?php echo $row2['cv_datduoc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_chuadatduoc']; ?>
					<input type="hidden" name="cv_chuadatduoc" value="<?php echo $row2['cv_chuadatduoc']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['ly_do']; ?>
					<input type="hidden" name="lydo" value="<?php echo $row2['ly_do']; ?>" disabled>
				</td>
				<td>
					<?php echo $row2['cv_phatsinh']; ?>
					<input type="hidden" name="cvphatsinh" value="<?php echo $row2['cv_phatsinh']; ?>" disabled>
				</td>
			</tr>
				<?php } } ?>
		</table>
<?php } ?>