<?php require "header.php"; ?>
	<div class="container-fluid mt-1 form_search">
		<form method="GET" autocomplete="off">
		<div class="row">
			<div class="col-xs-5 col-sm-5 col-md-6 col-lg-5 col-xl-5">
				<div class="input-group">
					<span class="countchecked d-none">0</span>
					<div class="input-group-prepend">
				    	<span class="input-group-text">Ngày PH</span>
				  	</div>
					<input type="date" name="s-date" value="<?php if (isset($_GET['s-date'])) { echo $_GET['s-date']; } ?>" class="form-control s-date">
					<div class="input-group-prepend">
				    	<span class="input-group-text">Đến</span>
				  	</div>
					<input type="date" name="e-date" value="<?php if (isset($_GET['e-date'])) { echo $_GET['e-date']; } ?>" class="form-control e-date">
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">Họ tên NLĐ</span>
					</div>
					<input type="text" class="form-control" name="name" value="<?php if (isset($_GET['name'])) { echo $_GET['name']; } ?>">
				</div>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">Số VB</span>
					</div>
					<input type="number" class="form-control" name="svb" value="<?php if (isset($_GET['svb'])) { echo $_GET['svb']; } ?>" min="1">
				</div>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">Mã ĐV</span>
					</div>
					<input type="text" class="form-control" name="mdv" value="<?php if (isset($_GET['mdv'])) { echo $_GET['mdv']; } ?>">
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">Số sổ</span>
					</div>
					<input type="number" class="form-control" name="ss" value="<?php if (isset($_GET['ss'])) { echo $_GET['ss']; } ?>" min="1">
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">Nơi nhận VB</span>
					</div>
					<select name="noinhan" class="custom-select noinhan">
						<option value="">Tất cả</option>
						<optgroup label="Phiếu trả">
							<option value="1" <?php if (isset($_GET['noinhan']) && $_GET['noinhan']==1) { echo "selected"; } ?>>Người lao động</option>
							<option value="2" <?php if (isset($_GET['noinhan']) && $_GET['noinhan']==2) { echo "selected"; } ?>>BHXH Q/H(Nơi nhận lương hưu)</option>
							<option value="3" <?php if (isset($_GET['noinhan']) && $_GET['noinhan']==3) { echo "selected"; } ?>>BHXH Quận/Huyện (Khác)</option>
							<option value="4" <?php if (isset($_GET['noinhan']) && $_GET['noinhan']==4) { echo "selected"; } ?>>Phòng TN &amp; TKQ TTHC</option>
							<option value="5" <?php if (isset($_GET['noinhan']) && $_GET['noinhan']==5) { echo "selected"; } ?>>Đơn vị sử dụng lao động</option>
						</optgroup>
						<optgroup label="Phiếu đề nghị">
							<option value="6" <?php if (isset($_GET['noinhan']) && $_GET['noinhan']==6) { echo "selected"; } ?>>Phòng Thu</option>
							<option value="7" <?php if (isset($_GET['noinhan']) && $_GET['noinhan']==7) { echo "selected"; } ?>>Phòng Cấp sổ, thẻ</option>
							<option value="8" <?php if (isset($_GET['noinhan']) && $_GET['noinhan']==8) { echo "selected"; } ?>>BHXH Quận/Huyện</option>
						</optgroup>
					</select>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">BHXH Quận/Huyện</span>
					</div>
					<select name="bhxhqh" class="custom-select bhxhqh">
						<option value="">Tất cả</option>
						<?php
						$query = $conn->query("SELECT * FROM districts");
						$query->setFetchMode(PDO::FETCH_ASSOC);
						$query->execute();
			 				while($dist = $query->fetch()) { ?>
			 					<option value="<?php echo $dist['dist_id']; ?>" <?php if(isset($_GET['bhxhqh']) && ($_GET['bhxhqh']==$dist['dist_id'])) { echo "selected"; } ?>><?php echo $dist['dist_name']; ?></option>
			 			<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">LĐ duyệt</span>
					</div>
					<select name="ldduyet" class="custom-select">
						<option value="">Tất cả</option>
						<option value="2" <?php if (isset($_GET['ldduyet']) && $_GET['ldduyet']==2) { echo "selected"; } ?>>Dương Thị Minh Châu</option>
						<option value="3" <?php if (isset($_GET['ldduyet']) && $_GET['ldduyet']==3) { echo "selected"; } ?>>Trần Thị Thu Hà</option>
						<option value="4" <?php if (isset($_GET['ldduyet']) && $_GET['ldduyet']==4) { echo "selected"; } ?>>Bùi Anh Tuấn</option>
						<option value="37" <?php if (isset($_GET['ldduyet']) && $_GET['ldduyet']==37) { echo "selected"; } ?>>Phạm Hắc Hải</option>
						<option value="38" <?php if (isset($_GET['ldduyet']) && $_GET['ldduyet']==38) { echo "selected"; } ?>>Nguyễn Quang Minh</option>
					</select>
				</div>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">Trạng thái</span>
					</div>
					<select name="status" class="custom-select">
						<option value="">Tất cả</option>
						<option value="1" <?php if (isset($_GET['status']) && $_GET['status']==1) { echo "selected"; } ?>>Dự thảo</option>
						<option value="2" <?php if (isset($_GET['status']) && $_GET['status']==2) { echo "selected"; } ?>>Đã xử lý</option>
						<option value="3" <?php if (isset($_GET['status']) && $_GET['status']==3) { echo "selected"; } ?>>Hủy dự thảo</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">Từ khóa nội dung VB</span>
					</div>
					<input type="text" class="form-control" name="keyword" value="<?php if (isset($_GET['keyword'])) { echo $_GET['keyword']; } ?>">
				</div>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">Loại VB</span>
					</div>
					<select name="loai-vb" class="custom-select loaivb">
						<option value="">Tất cả</option>
						<option value="3" <?php if (isset($_GET['loai-vb']) && $_GET['loai-vb']==3) { echo "selected"; } ?>>Phiếu trả</option>
						<option value="4" <?php if (isset($_GET['loai-vb']) && $_GET['loai-vb']==4) { echo "selected"; } ?>>Phiếu đề nghị</option>
					</select>
				</div>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<?php if ($user->user_group!=2) { ?>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name='user' id="user" value="<?=$_SESSION['uid'];?>" <?php if (isset($_GET['user'])) { echo "checked"; } ?>>
					<label class="custom-control-label" for="user">User cá nhân</label>
				</div>
				<?php } else {
				$userList = $c_user->load_UserList(); ?>
				<div class="input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text">CB Dự thảo</span>
					</div>
					<select name="user" class="custom-select user">
						<option value="">Tất cả</option>
						<?php foreach ($userList['list'] as $user_) { ?>
							<option value="<?=$user_->uid;?>"><?=$user_->fullname;?></option>
						<?php } ?>
					</select>
				</div>
				<?php } ?>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
				<button class="btn btn-primary w-100" id="btn-search" name="search-vb"><i class="fas fa-search"></i> Tìm kiếm</button>
			</div>
		</div>
		</form>
	</div>

	<div class="container-fluid mt-2" id="data-vb">
		<div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <thead>
                	<tr class="bg-info text-white">
	                    <th>STT</th>
	                    <th><input type="checkbox" name="chkall-item" onclick="checkall('hs', this);"></th>
	                    <th>SỐ VB</th>
	                    <th>NGÀY PH</th>
	                    <th>HỌ TÊN NLĐ</th>
	                    <th>GIỚI TÍNH</th>
	                    <th>SỐ SỔ</th>
	                    <th class="column-pt">SỐ BB</th>
	                    <th>NƠI NHẬN VB</th>
	                    <th>NGƯỜI DỰ THẢO</th>
	                    <th>LĐ DUYỆT</th>
	                    <th>LOẠI VB</th>
	                    <th>TRẠNG THÁI</th>
                  	</tr>
                </thead>
                <tbody>
                	<?php if (isset($_GET['search-vb'])) { require "../module/qlvb/tim-kiem.php"; } ?>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-2 btn_action">
				<a href="javascript:void(0);" id="tong-hop" class="btn btn-primary"><i class="fas fa-list-alt"></i> Báo cáo</a>
			    <button id='view-vb' class="btn btn-primary" disabled>
	               <i class="far fa-eye"></i> Xem &amp; In
	            </button>
			<?php switch ($user->user_group) {
				case 3:
				case 4:
				case 5:
				case 8: ?>
        	<a href="javascript:void(0);" id='add-vb' class="btn btn-primary">
               <i class="fas fa-plus-circle"></i> Thêm mới
            </a>
            <button id='edit-vb' class="btn btn-info btn-action" disabled>
               <i class="fas fa-edit"></i> Sửa
            </button>
            <button id='da-duyet' class="btn btn-success action" disabled>
               <i class="fas fa-check-circle"></i> Đã xử lý
            </button>
            <button id='huy-dt' class="btn btn-danger btn-action" disabled>
               <i class="fas fa-times-circle"></i> Hủy dự thảo
            </button>
            <?php break;
				default:
					break;
			}
			if ($user->uid==33) { ?>
			<button id='tu-choi' class="btn btn-warning" disabled>
	            <i class="fas fa-times-circle"></i> Từ chối
	        </button>
			<?php } ?>
        </div>
	</div>

	<div class="container-fluid popup" id="add-new">
		<div class="border border-primary shadow table-responsive-md">
			<span class="btn-close"><i class="text-white far fa-times-circle fa-2x"></i></span>
			<h4 class="text-center text-white bg-info p-2">THÊM MỚI</h4>
			<form method="POST" autocomplete="off" action="../module/qlvb/them-moi.php">
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 loai-vb">
						<div class="input-group border border-secondary">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary text-light required">Loại VB</span>
							</div>
							<div class="form-check form-check-inline ml-2">
								  <input class="form-check-input" type="radio" id="loaivb-pt" name="loai-vb" value="3" required
								  <?php if ($user->user_group==5) { echo "checked"; } ?>>
								  <label class="form-check-label" for="loaivb-pt">Phiếu trả</label>
							</div>
							<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" id="loaivb-pdn" name="loai-vb" value="4" required
								  <?php if ($user->user_group==5) { echo "disabled"; } ?>>
								  <label class="form-check-label" for="loaivb-pdn">Phiếu đề nghị</label>
							</div>
						</div>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
						<span class="input-group-text"><b>Ghi chú:</b>&nbsp;Chỗ nào có dấu <span class="required"></span>&nbsp;là bắt buộc phải nhập dữ liệu.</span>
					</div>
				</div>
					<div class="row mt-2">
						<?php if ($user->user_group==3 || $user->user_group==4 || $user->user_group==8) { ?>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text required">Họ tên NLĐ</span>
								</div>
								<input type="text" class="form-control ho-ten-nld" name="ho-ten-nld" required>
							</div>
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text required">Số sổ</span>
								</div>
								<input type="number" class="form-control so-so" name="so-so" min="1" required>
							</div>
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text required">Giới tính</span>
								</div>
								<select class="custom-select" name="gioi-tinh" required>
									<option></option>
									<option value="1">Nam</option>
									<option value="2">Nữ</option>
								</select>
							</div>
						</div>
						<?php if ($user->user_group!=8) { ?>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 add-pt">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Chức danh&Nơi công tác</span>
								</div>
								<input type="text" class="form-control" name="chuc-danh" placeholder="Phân tách nhau bằng dấu chấm phẩy">
							</div>
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 add-pdn">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text required">ND đề nghị giải quyết</span>
								</div>
								<input type="text" class="form-control" name="cd-giai-quyet" required>
							</div>
						</div>
						<?php } else { ?>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Ngày sinh</span>
								</div>
								<input type="date" class="form-control" name="ngay-sinh">
							</div>
						</div>
						<?php } } ?>
					</div>
				<div class="add-pt">
					<?php if ($user->user_group==3 || $user->user_group==4 || $user->user_group==8) { ?>
					<div class="row mt-2">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Đang hưởng CĐ</span>
								</div>
								<select class="custom-select" name="cd-huong" <?php if ($user->uid=='07') { echo "disabled"; } ?>>
									<option></option>
									<option value="1">Hưu trí</option>
									<option value="2">Tử tuất</option>
									<option value="3">Tai nạn lao động</option>
									<option value="4">Bệnh nghề nghiệp</option>
									<option value="5">Mất sức lao động</option>
									<option value="6">613</option>
								</select>
							</div>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text required">CĐ cần giải quyết</span>
								</div>
								<input type="text" class="form-control" name="cd-giai-quyet" <?php if ($user->user_group==8) { echo "disabled"; } ?>>
							</div>
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
							<div class="input-group">
								<?php if ($user->uid!='07') { ?>
								<div class="input-group-prepend">
									<span class="input-group-text">Nơi nhận lương hưu</span>
								</div>
								<select class="custom-select quan-huyen" name="quan-huyen">
									<option value="00">==Quận/Huyện==</option>
									<?php
									$query->execute();
									while($dist = $query->fetch()) {
				 						echo "<option value=".$dist['dist_id'].">".$dist['dist_name']."</option>";
				 					} ?>
								</select>
								<select class="custom-select phuong-xa" name="phuong-xa">
									<option value="00">==Phường/Xã==</option>
								</select>
								<?php } else { ?>
								<div class="input-group-prepend">
									<span class="input-group-text">Ngày chết</span>
								</div>
								<input type="date" class="form-control" name="ngay-chet">
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="row mt-2">
						<?php if ($user->user_group==3 || $user->user_group==4 || $user->user_group==8) { ?>
						<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Nơi nhận VB</span>
								</div>
								<select class="custom-select" name="noi-nhan" required>
									<option value="1">Người lao động</option>
									<!--<option value="2">Q/H (Nơi nhận lương hưu)</option>-->
									<option value="3" <?php if ($user->user_group==3 && $user->uid!='07') { echo "selected"; } ?>>BHXH Quận/Huyện</option>
									<option value="4" <?php if ($user->user_group==8 || $user->uid=='07') { echo "selected"; } ?>>Phòng TN &amp; TKQ TTHC</option>
									<option value="6">Đơn vị Sử dụng lao động</option>
								</select>
								<?php if ($user->user_group!=8) { ?>
								<div class="input-group-prepend bh-xhqh">
									<span class="input-group-text">BHXH Q/H nhận VB</span>
								</div>
								<select class="custom-select bh-xhqh" name="bhxhqh">
									<option value="00"></option>
									<?php
									$query->execute();
									while($dist = $query->fetch()) {
				 						echo "<option value=".$dist['dist_id'].">".$dist['dist_name']."</option>";
				 					}?>
								</select>
								<?php } else { ?>
								<div class="input-group-prepend">
									<span class="input-group-text">Nơi gửi VB</span>
								</div>
								<select class="custom-select" name="noi-gui" required>
									<option></option>
									<?php
									$query1 = $conn->query("SELECT * FROM provincs");
									$query1->setFetchMode(PDO::FETCH_ASSOC);
									$query1->execute();
						 				while($prov = $query1->fetch()) { ?>
						 					<option value="<?php echo $prov['prov_id']; ?>"><?php echo $prov['prov_name']; ?></option>
						 			<?php } ?>
								</select>
								<?php } ?>
							</div>
						</div>
						<?php } if ($user->user_group==5 || $user->user_group==3 || $user->user_group==4 && $user->uid!='07') { ?>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Số BB (Phiếu tiếp nhận)</span>
								</div>
								<input type="text" class="form-control" name="so-bb"
								value="<?php if ($user->user_group==5) { echo "/2020/001"; } ?>">
							</div>
						</div>
						<?php } if ($user->user_group==5) { ?>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text required">Ngày nhận</span>
								</div>
								<input type="date" class="form-control" name="ngay-nhan" required>
							</div>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text required">Đợt nhận</span>
								</div>
								<input type="date" class="form-control" name="dot-nhan" placeholder="Đợt nhận" required>
							</div>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text required">Mã đơn vị</span>
								</div>
								<input type="text" class="form-control ma-dv" name="ma-dv" placeholder="Mã đơn vị" required>
							</div>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Tên ĐV</span>
								</div>
								<span class="form-control ten-dv"></span>
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="row mt-2">
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">LĐ Duyệt</span>
								</div>
								<select class="custom-select" name="ld-duyet" required>
									<option value="">==Chọn Lãnh đạo duyệt==</option>
									<?php
									$query2 = $conn->query("SELECT uid, fullname FROM users WHERE user_group = 2 AND role = 2");
									$query2->setFetchMode(PDO::FETCH_ASSOC);
									$query2->execute();
						 				while($ld = $query2->fetch()) { ?>
						 					<option
						 					value="<?php echo $ld['uid']; ?>"
						 					<?php if ($ld['uid']==$user->ld_phutrach) { echo "selected"; } ?>>
						 					<?php echo $ld['fullname']; ?>
						 					</option>
						 			<?php } ?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<?php if ($user->user_group!=5) { ?>
				<div class="add-pdn">
					<div class="row mt-2">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Số BB</span>
								</div>
								<input type="text" class="form-control" name="so-bb">
							</div>
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text required">Địa chỉ</span>
								</div>
								<select class="custom-select quan-huyen" name="quan-huyen" required>
									<option value="">==Quận/Huyện==</option>
									<?php
									$query->execute();
									while($dist = $query->fetch()) {
				 						echo "<option value=".$dist['dist_id'].">".$dist['dist_name']."</option>";
				 					} ?>
								</select>
								<select class="custom-select phuong-xa" name="phuong-xa">
									<option value="">==Phường/Xã==</option>
								</select>
							</div>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">SĐT</span>
								</div>
								<input type="text" class="form-control" name="sdt" minlength="10" maxlength="10">
							</div>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Email</span>
								</div>
								<input type="email" class="form-control" name="email">
							</div>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Nơi nhận VB</span>
								</div>
								<select class="custom-select" name="noi-nhan">
									<option value=""></option>
									<option value="6">Phòng Thu</option>
									<option value="7">Phòng Cấp sổ, thẻ</option>
									<option value="8">BHXH Quận/Huyện</option>
								</select>
							</div>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">LĐ Duyệt</span>
								</div>
								<select class="custom-select" name="ld-duyet" required>
									<option value="">==Chọn Lãnh đạo duyệt==</option>
									<?php
									$query2 = $conn->query("SELECT uid, fullname FROM users WHERE user_group = 2 AND role = 2");
									$query2->setFetchMode(PDO::FETCH_ASSOC);
									$query2->execute();
						 				while($ld = $query2->fetch()) { ?>
						 					<option
						 					value="<?php echo $ld['uid']; ?>"
						 					<?php if ($ld['uid']==$user->ld_phutrach) { echo "selected"; } ?>>
						 					<?php echo $ld['fullname']; ?>
						 					</option>
						 			<?php } ?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="row mt-2">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="form-group">
							<label><b class="required">Nội dung chi tiết:</b></label>
							<textarea class="form-control" id="noi-dung" name="noi-dung">
								<?php if ($user->user_group==5) { ?>
									<table border="1" cellpadding="1" cellspacing="1" style="width:100%">
										<tbody>
											<tr>
												<th>TT</th>
												<th>Họ và t&ecirc;n</th>
												<th>S&ocirc;́ s&ocirc;̉ BHXH</th>
												<th>Từ ngày ... đ&ecirc;́n ngày ...</th>
												<th>S&ocirc;́ ti&ecirc;̀n</th>
												<th>Nơi KCB</th>
											</tr>
											<tr>
												<td colspan="7"><strong>A- Chế độ ốm đau</strong></td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>Không nhập dấu ngăn cách</td>
												<td>&nbsp;</td>
											</tr>
										</tbody>
									</table>
								<?php } ?>
							</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
						<div class="form-group">
							<button class="btn btn-primary w-25"><i class="fas fa-save"></i> Ghi &amp; In</button>
						</div>
					</div>
				</div>
			</form>
		<div class="mess"></div>
		</div>
	</div>
	<div id='tonghop' class="container popup w-50" style="top:20%;left:25%;">
		<div class="border border-primary shadow table-responsive-md">
			<span class="btn-close"><i class="text-white far fa-times-circle fa-2x"></i></span>
			<h4 class="bg-info text-white text-center p-2">BÁO CÁO</h4>
			<form method="GET" action="../phieu-tra/bao-cao.php" target="_blank">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
							<label><b>Từ ngày</b></label>
							<input type="date" name="s-date" value="<?php if (isset($_GET['s-date'])) { echo $_GET['s-date']; } ?>" class="form-control s-date" required>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
							<label><b>Đến ngày</b></label>
							<input type="date" name="e-date" value="<?php if (isset($_GET['e-date'])) { echo $_GET['e-date']; } ?>" class="form-control e-date" required>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<label class="d-block"><b>Biểu mẫu cần in</b></label>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" id="inlineCheckbox1" value="1" name='type' required>
							<label class="form-check-label" for="inlineCheckbox1">Lưu trữ văn thư</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" id="inlineCheckbox2" value="2" name='type' required>
							<label class="form-check-label" for="inlineCheckbox2">Chấm điểm quận, huyện</label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
						<button class="btn btn-primary w-50"><i class="fas fa-file-export"></i> Xuất báo cáo</button>
					</div>
				</div>
			</form>
		</div>
    </div>
	<div id='xem-phieu-tra' class="container-fluid popup">
		<div class="border border-primary shadow table-responsive-md">
			<span class="btn-close"><i class="text-white far fa-times-circle fa-2x"></i></span>
			<h4 class="bg-info text-white text-center p-2">XEM VĂN BẢN</h4>
			<div class="data"></div>
		</div>
    </div>

	<div id='sua-phieu-tra' class="container-fluid popup">
		<div class="border border-primary shadow table-responsive-md">
			<span class="btn-close"><i class="text-white far fa-times-circle fa-2x"></i></span>
			<h4 class="bg-info text-white text-center p-2">CHỈNH SỬA</h4>
			<div class="data"></div>
			<div class="mess"></div>
		</div>
    </div>
<?php require('footer.php');?>