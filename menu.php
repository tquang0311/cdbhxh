<?php
  if ($user->role == '2' && $user->password != "e10adc3949ba59abbe56e057f20f883e") { ?>
  <div class="d-inline dropdown mr-1">
    <a class="btn btn-info" href="/cdbhxh/public/huong-dan-su-dung.html" target="_blank" id="dropdownMenuLink">
      <i class="fas fa-book"></i> Hướng dẫn sử dụng
    </a>
  </div>
  <div class="d-inline dropdown mr-1">
    <button type="button" class="btn btn-info dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-tasks"></i> Quản lý văn bản
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
      <a class="dropdown-item" href="/cdbhxh/public/phieu-tra.php">Phiếu trả & Phiếu đề nghị</a>
    </div>
  </div>
  <?php if ($user->user_group==5 || $user->uid == 32) { ?>
  <div class="d-inline dropdown mr-1">
    <button type="button" class="btn btn-info dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-procedures"></i> ODTS
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
      <a class="dropdown-item" href="chung-tu-tra-don-vi.php">Chứng từ OM-TS chưa thanh toán trả đơn vị</a>
    </div>
  </div>
  <?php } if ($user->uid==32) { ?>
  <div class="d-inline dropdown mr-1">
    <a class="btn btn-info" href="/cdbhxh/public/pm-1-cua.php" id="dropdownMenuLink">
       <i class="fas fa-toolbox"></i> PM 1 cửa
    </a>
  </div>
  <?php } ?>
  <div class="d-inline dropdown mr-1">
    <a class="btn btn-info" href="/cdbhxh/public/de-xuat-sua-doi.php" id="dropdownMenuLink">
       <i class="fas fa-tools"></i> Đề xuất sửa đổi
    </a>
  </div>
  <?php } elseif ($user->role == '1') { ?>
  <div class="d-inline dropdown mr-1">
    <a class="btn btn-info" href="/cdbhxh/public/quan-ly-tai-khoan/" id="dropdownMenuLink">
      <i class="fas fa-users"></i> Quản lý tài khoản
    </a>
  </div>
  <div class="d-inline dropdown mr-1">
    <a class="btn btn-info" href="/cdbhxh/public/dieu-chuyen-can-bo/" id="dropdownMenuLink">
      <i class="fas fa-retweet"></i> Điều chuyển cán bộ
    </a>
  </div>
  <?php } ?>
  <div class="d-inline dropdown mr-1">
    <button type="button" class="btn btn-info dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user"></i>
      Tài khoản: <span id="fn"><?=$user->fullname;?></span>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
      <a class="dropdown-item" href="/cdbhxh/public/thong-tin-ca-nhan.php"><i class="fas fa-info-circle"></i> Thông tin cá nhân</a>
      <a class="dropdown-item" href="/cdbhxh/public/doi-mat-khau.php"><i class="fas fa-key"></i> Đổi mật khẩu</a>
      <a class="dropdown-item" href="/cdbhxh/public/dang-xuat.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
    </div>
  </div>