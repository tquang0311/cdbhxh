<?php
require "../libs/config.php";
$uid = $_SESSION['uid']; ?>
<div class="container">
	<form method="POST" id="hs-form" action="hs-submit.php">
	<input type="hidden" id="ug" value="<?php echo $user->user_group; ?>">
	<?php switch ($user->user_group) {
		case 3:
		case 4:
		case 5:
		case 8:
			$sql = "SELECT MAX(den_ngay) AS last_den_ngay, SUM(themsl) AS tongdanhan FROM data_hs WHERE uid = $uid";
			$query = $conn->query($sql);
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$query->execute();
			$row = $query->fetch();
			if (!$row['last_den_ngay']) {
				$ngay_tiep_theo = '2019-01-01';
			} else {
				$ngay_tiep_theo = date('Y-m-d',strtotime('+1 day',strtotime($row['last_den_ngay'])));
			}
			?>
			<h5 class="form-control text-center disabled mb-4" aria-disabled="true">Tổng số hồ sơ còn lại:
				<span id="total-hs">
					<b><?php echo $tongso_conlai = $row['tongdanhan'];?></b>
				</span>
				<input type="hidden" id="tongso-conlai" value="<?php echo $tongso_conlai; ?>">
			</h5>
			<?php break;
		
		default:
			break;
	} ?>
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="form-group">
					<input type="date" id="tu-ngay" class="form-control" name="tu-ngay" value="<?php echo $ngay_tiep_theo; ?>" min="<?php echo $ngay_tiep_theo; ?>" required>
					<label class="form-control-placeholder" for="tu-ngay">Từ ngày</label>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="form-group">
					<input type="date" id="den-ngay" class="form-control" name="den-ngay" value="<?php echo $ngay_tiep_theo; ?>" min="<?php echo $ngay_tiep_theo; ?>" required>
					<label class="form-control-placeholder" for="den-ngay">Đến ngày</label>
				</div>
			</div>
		</div>
		<div class="row">
	<?php
	switch ($user->user_group) {
		case 3:
		case 4:
		case 5: ?>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="form-group">
					<input type="number" id="themsl" class="form-control" name="themsl" min="1">
					<label class="form-control-placeholder" for="themsl">Tiếp nhận hồ sơ</label>
				</div>
			</div>
		<?php break;
		
		default:
			break;
	}
	if ($user->user_group == 2 ) { echo "</div>"; } 
	switch ($user->user_group) {
		case 3: ?>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
				<div class="form-group">
					<input type="number" id="hs-sai-dieuchinh" class="form-control" name="hs-sai-dieuchinh" min="1">
					<label class="form-control-placeholder" for="hs-sai-dieuchinh">
						Số hồ sơ sai phải điều chỉnh (Lệch dữ liệu TST)
					</label>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<input type="number" id="bao-cao" class="form-control" name="bao-cao" min="1">
					<label class="form-control-placeholder" for="bao-cao">
						Báo cáo (định kì, đột xuất)
					</label>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="number" id="ktdl_chuyenchitra" class="form-control" name="ktdl_chuyenchitra" min="1" <?php if ($_SESSION['uid'] != 6) { echo "readonly"; } ?>>
					<label class="form-control-placeholder" for="ktdl_chuyenchitra">
						Kiểm tra dữ liệu, chuyển chi trả
					</label>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="number" id="kt_chuyendl21ab" class="form-control" name="kt_chuyendl21ab" min="1"
					<?php if ($_SESSION['uid'] != 13) { echo "readonly"; } ?>>
					<label class="form-control-placeholder" for="kt_chuyendl21ab">
						Kiểm tra, chuyển dữ liệu 21AB sang kế toán, bưu điện (đợt/tuần)
					</label>
				</div>
			</div>
		</div>
		<?php break;
		case 5: ?>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
				<div class="form-group">
					<input type="number" id="baocao-odts" class="form-control" name="baocao-odts" min="1">
					<label class="form-control-placeholder" for="baocao-odts">
						Báo cáo tổng hợp ÔĐ-TS (đột xuất, định kỳ)
					</label>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="number" id="tonghop-ketoan" class="form-control" name="tonghop-ketoan" min="1">
					<label class="form-control-placeholder" for="tonghop-ketoan">
						Tổng hợp số liệu chuyển kế toán
					</label>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="number" id="boctach-xdnh" class="form-control" name="boctach-xdnh" min="1">
					<label class="form-control-placeholder" for="boctach-xdnh">
						Bóc tách hồ sơ
					</label>
				</div>
			</div>
		</div>
		<?php break;
		case 4: ?>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
				<div class="form-group">
					<input type="number" id="hs-xinykien-bhxhvn" class="form-control" name="hs-xinykien-bhxhvn" min="1">
					<label class="form-control-placeholder" for="hs-xinykien-bhxhvn">
						Số hồ sơ phải xin ý kiến BHVN, Sở Lao động
					</label>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
					<input type="number" id="boctach-dieuchinh" class="form-control" name="boctach-dieuchinh" min="1">
					<label class="form-control-placeholder" for="boctach-dieuchinh">
						Bóc tách hồ sơ điều chỉnh
					</label>
				</div>
			</div>
		</div>
		<?php break;
		case 7: ?>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="form-group">
					<input type="number" id="sqd-thoihuongtuat" class="form-control" name="sqd-thoihuongtuat" min="1">
					<label class="form-control-placeholder" for="sqd-thoihuongtuat">
						Số quyết định thôi hưởng tuất
					</label>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="form-group">
					<input type="number" id="hs-chuyenden-qlc" class="form-control" name="hs-chuyenden-qlc" min="1">
					<label class="form-control-placeholder" for="hs-chuyenden-qlc">
						Số lượng hồ sơ chuyển đến
					</label>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="form-group">
					<input type="number" id="hs-tang-trongthang" class="form-control" name="hs-tang-trongthang" min="1">
					<label class="form-control-placeholder" for="hs-tang-trongthang">
						Số hồ sơ tăng
					</label>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="form-group">
					<input type="number" id="hs-thaydoi-trongthang" class="form-control" name="hs-thaydoi-trongthang" min="1">
					<label class="form-control-placeholder" for="hs-thaydoi-trongthang">
						Số hồ sơ điều chỉnh, thay đổi
					</label>
				</div>
			</div>
		</div>
		<?php break;
		case 9: ?>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="number" id="hs-huongtn-tangmoi-chi-atm" class="form-control" name="hs-huongtn-tangmoi-chi-atm" min="1">
					<label class="form-control-placeholder" for="hs-huongtn-tangmoi-chi-atm">
						Số hồ sơ hưởng TCTN tăng mới(hình thức chi qua ATM)
					</label>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="number" id="luot-huong-tctn-atm" class="form-control" name="luot-huong-tctn-atm" min="1">
					<label class="form-control-placeholder" for="luot-huong-tctn-atm">
						Số lượt hưởng TCTN ( ATM)
					</label>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="number" id="hs-hotro-hocnghe" class="form-control" name="hs-hotro-hocnghe" min="1">
					<label class="form-control-placeholder" for="hs-hotro-hocnghe">
						Số hồ sơ đề nghị hưởng hỗ trợ học nghề
					</label>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="number" id="hs-baoluu-tgian-tn" class="form-control" name="hs-baoluu-tgian-tn" min="1">
					<label class="form-control-placeholder" for="hs-baoluu-tgian-tn">
						Số hồ sơ bảo lưu thời gian thất nghiệp
					</label>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="number" id="hs-thuhoi-tn" class="form-control" name="hs-thuhoi-tn" min="1">
					<label class="form-control-placeholder" for="hs-thuhoi-tn">
						Số hồ sơ thu hồi, chấm dứt, tạm dừng, tiếp tục hưởng
					</label>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="number" id="in-the-bhyt" class="form-control" name="in-the-bhyt" min="1">
					<label class="form-control-placeholder" for="in-the-bhyt">
						In thẻ BHYT (lượt người)
					</label>
				</div>
			</div>
		</div>
		<?php break;
		case 8: ?>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="form-group">
					<input type="number" id="themsl" class="form-control" name="themsl" min="1">
					<label class="form-control-placeholder" for="themsl">Tiếp nhận hồ sơ</label>
				</div>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
				<div class="form-group">
					<input type="number" id="tonghop-21ab" class="form-control" name="tonghop-21ab" min="1">
					<label class="form-control-placeholder" for="tonghop-21ab">
						Tổng hợp chuyển số liệu 21AB
					</label>
				</div>
			</div>
		</div>
		<?php break;
		case 6: ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="form-group">
					<input type="number" id="boctach-xddh" class="form-control" name="boctach-xddh" min="1">
					<label class="form-control-placeholder" for="boctach-xddh">
						Bóc tách hồ sơ
					</label>
				</div>
			</div>
		</div>
		<?php break;
		
		default:
			break;
	}
	?>
		<div class="row">
			<?php
			if ($user->user_group != 6 && $user->user_group != 2 && $user->user_group != 7) { ?>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="form-group">
					<input type="number" id="cv_datduoc" class="form-control" name="cv_datduoc" min="1">
					<label class="form-control-placeholder" for="cv_datduoc">Công việc đã đạt được</label>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="form-group">
					<input type="number" id="cv_chuadatduoc" class="form-control" name="cv_chuadatduoc" min="1">
					<label class="form-control-placeholder" for="cv_chuadatduoc">Công việc chưa đạt được</label>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<input type="text" id="ly-do" class="form-control" name="ly-do">
					<label class="form-control-placeholder" for="ly-do">Lý do công việc chưa đạt được</label>
				</div>
			</div>
			<?php } ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="form-group">
					<textarea id="cvphatsinh" class="form-control" name="cvphatsinh" rows="3"></textarea>
					<label class="form-control-placeholder" for="cvphatsinh">Công việc phát sinh</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="form-group text-center">
					<button class="btn btn-primary w-25" name="save-hs" id="btn-savehs"><i class="fas fa-save"></i> Ghi</button>
				</div>
			</div>
			<!--<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<a href="#" class="btn btn-danger w-100"><i class="fas fa-plus-circle"></i> Thêm ngày nghỉ phép</a>
			</div>-->
		</div>
	</form>

	<form method="POST" id="dayoff-form" action="dayoff-submit.php">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group">
					<label>Chọn ngày nghỉ phép</label>
					<input type="date" id="ngay-nghi" class="form-control" name="day-off" min="2019-01-01" max="<?php echo $date; ?>" required>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<label class="d-block">Loại ngày nghỉ phép</label>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" id="inlineCheckbox1" value="1" name='loai-ngay-nghi-phep' required>
					<label class="form-check-label" for="inlineCheckbox1">Nghỉ cả ngày</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" id="inlineCheckbox2" value="2" name='loai-ngay-nghi-phep' required>
					<label class="form-check-label" for="inlineCheckbox2">Nghỉ nửa ngày</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="form-group text-center">
					<button class="btn btn-primary w-100" name="save-dayoff"><i class="fas fa-save"></i> Lưu</button>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<a href="#" class="btn btn-danger w-100 them-dl-baocao"><i class="fas fa-plus-circle"></i> Thêm dữ liệu báo cáo</a>
			</div>
		</div>
	</form>
</div>
<?php
if (isset($_SESSION['success'])) { ?>
	<div class='alert alert-success text-center success mt-2' role='alert'>
    	<h5><strong><?php echo $_SESSION['success']; ?></strong></h5>
    </div>
<?php }
if (isset($_SESSION['error'])) { ?>
	<div class='alert alert-danger text-center mt-2' role='alert'>
    	<h5><strong><?php echo $_SESSION['error']; ?></strong></h5>
    </div>
<?php } ?>