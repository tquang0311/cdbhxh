<?php require "header.php"; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2 border-right border-secondary p-3">
      <ul class="nav nav-pills d-block mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link
          <?php if (isset($_GET['view']) && $_GET['view']=='edit' || $_GET['view']=='addnew'){echo 'active';} ?>"
        id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
          <i class="fas fa-plus-circle"></i> Thêm, sửa HS
        </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link
          <?php if (isset($_GET['search']) && $_GET['search']=='filter_process' || $_SERVER['QUERY_STRING']==null) { echo "active"; } ?>"
        id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
          <i class="fas fa-search-plus"></i> Tra cứu & Xử lý dữ liệu
        </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link
          <?php if (isset($_GET['search']) && $_GET['search']=='phieutrinh_tbctg') { echo "active"; } ?>"
        id="v-pills-phieutrinh-tbctg-tab" data-toggle="pill" href="#v-pills-phieutrinh-tbctg" role="tab" aria-controls="v-pills-phieutrinh-tbctg" aria-selected="false">
          <i class="far fa-list-alt"></i> Phiếu trình TBCTG
        </a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link
          <?php if (isset($_GET['tab']) && $_GET['tab']=='ds_datao') { echo "active"; } ?>"
          href="javascript:void(0);">
            <i class="far fa-list-alt"></i> Danh sách đã tạo
          </a>
          <ul class="nav nav-pills d-block mt-2" id="pill-tab" role="tablist">
            <li class="nav-item ml-3" role="presentation">
              <a class="nav-link
              <?php if (isset($_GET['tab']) && $_GET['tab']=='ds_datao' && isset($_GET['search']) && $_GET['search']=='bbbghs') { echo "active"; } ?>"
            id="v-pills-listbb-tab" data-toggle="pill" href="#v-pills-listbb" role="tab" aria-controls="v-pills-listbb" aria-selected="false">
                <i class="far fa-list-alt"></i> BBBGHS
              </a>
            </li>
            <li class="nav-item ml-3" role="presentation">
              <a class="nav-link
              <?php if (isset($_GET['tab']) && $_GET['tab']=='ds_datao' && isset($_GET['search']) && $_GET['search']=='phieutrinh_datao') { echo "active"; } ?>"
            id="v-pills-phieutrinh-datao-tab" data-toggle="pill" href="#v-pills-phieutrinh-datao" role="tab" aria-controls="v-pills-phieutrinh-datao" aria-selected="false">
              <i class="far fa-list-alt"></i> Phiếu trình
              </a>
            </li>
          </ul>
        </a>
        </li>
      </ul>
    </div>
    <div class="col-10">
      <div class="tab-content" id="v-pills-tabContent">
        <!--THÊM MỚI-->
        <div class="tab-pane fade
        <?php if (isset($_GET['view']) && $_GET['view']=='edit' || $_GET['view']=='addnew'){echo 'show active';} ?>"
        id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <?php if (isset($_GET['view']) && $_GET['view']=='edit') {
          $action_url = 'chinh-sua.php';
        } else {
          $action_url = 'them-moi.php';
        } ?>
        <form action="../module/chungtu_omts/<?=$action_url;?>" method="POST" id="chung_tu_omts" autocomplete="off">
          <fieldset class="border border-info px-5 py-3">
            <legend class="w-auto mx-5"><label class="col-form-label">
              <?php if (isset($_GET['view']) && $_GET['view']=='edit') {
                $legendTitle = 'Chỉnh sửa ';
              } else {
                $legendTitle = 'Thêm mới ';
              }
              echo $legendTitle.'dữ liệu'; ?>
            </label></legend>
            <div class="row">
              <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null) { require "../module/chungtu_omts/get_hs_by_id.php"; ?>
                <input type="hidden" id="hsID" name="hsId" value="<?=$_GET['hs'];?>" readonly>
                <?php
                $so_hs = substr($hsomts['hs']->so_hs, 0, 5);
                $tbctg = $c_chungtu_omts->search_TBCTG($hsomts['hs']->so_hs, $hsomts['hs']->ma_dv);
                if (!$tbctg['tbctg']) {
                  $ctg = null;
                } else {
                  $ctg = 'Số '.$tbctg['tbctg']['so_tb'].' ngày '.$tbctg['tbctg']['ngay_ph'];
                }
              } ?>
              <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right" for="so_hs">Số hồ sơ</label>
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="input-group">
                  <input type="number" class="form-control" id="so_hs" name="so_hs" min="1" max="99999"
                  <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null) { echo "value='{$so_hs}'"; } ?> autofocus required>
                  <div class="input-group-append">
                    <span class="input-group-text"><span class="loaihs"></span>/2020/001</span>
                  </div>
                </div>
              </div>
              <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right" for="loai_hs">Loại hồ sơ</label>
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <select name="loai_hs" id="loai_hs" class="custom-select" required>
                  <option value=""></option>
                  <option value="1"
                  <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null && $hsomts['hs']->loai_hs == 1 || isset($_GET['loaihs']) && $_GET['loaihs']==1) { echo "selected"; } ?>>Hồ sơ điện tử</option>
                  <option value="2"
                  <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null && $hsomts['hs']->loai_hs == 2 || isset($_GET['loaihs']) && $_GET['loaihs']==2) { echo "selected"; } ?>>Hồ sơ giấy</option>
                  <option value="3"
                  <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null && $hsomts['hs']->loai_hs == 3 || isset($_GET['loaihs']) && $_GET['loaihs']==3) { echo "selected"; } ?>>Hồ sơ bưu điện</option>
                </select>
              </div>
            </div>
            <div class="row mt-2">
              <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right" for="ma_dv">Mã đơn vị</label>
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <input type="text" class="form-control" id="ma_dv" name="ma_dv"
                <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null) { echo "value='{$hsomts['hs']->ma_dv}'"; } ?> required>
              </div>
              <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right" for="so_luong">Số lượng</label>
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <input type="number" class="form-control" id="so_luong" name="so_luong"
                <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null) { echo "value='{$hsomts['hs']->so_luong}'"; } ?> required>
              </div>
            </div>
            <div class="row mt-2">
              <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right">Tên đơn vị</label>
              <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <input type="text" class="form-control ten_dv"
                <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null) { echo "value='{$hsomts['hs']->ten_dv}'"; } ?> disabled>
              </div>
            </div>
            <div class="row mt-2">
              <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right" for="chi_tiet_hs">Số TBCTG</label>
              <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <input type="number" min="1" id="chi_tiet_hs" class="form-control" placeholder="Nhập số Thông báo chứng từ giả" name="chi_tiet_hs"
                <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null) { echo "value='{$hsomts['hs']->so_tbctg}'"; } ?>
                <?php if (!isset($_GET['view']) || empty($hsomts['hs']->so_tbctg) || (isset($hsomts['hs']->so_tbctg) && $hsomts['hs']->so_tbctg == 0)) { ?>
                  disabled
                <?php } ?>
                required>
              </div>
            </div>
            <div class="row mt-2">
              <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right" for="ghi_chu">Ghi chú</label>
              <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <input type="text" id="ghi_chu" class="form-control" name="ghi_chu"
                <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null) { echo "value='{$hsomts['hs']->ghi_chu}'"; } ?>>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <?php if (isset($_GET['view']) && $_GET['view']=='edit' && isset($_GET['hs']) && $_GET['hs']!=null) { $confirmText = 'Xác nhận chỉnh sửa dữ liệu hồ sơ?'; } else { $confirmText = 'Xác nhận thêm dữ liệu mới?'; } ?>
                <button class="btn btn-primary w-25 action" data-confirm='<?=$confirmText;?>'><i class="fas fa-save"></i> Ghi</button>
                <button type="reset" class="btn btn-warning w-25"><i class="far fa-file"></i> Nhập lại</button>
                <a class="btn btn-info float-right" href="/cdbhxh/public/chung-tu-tra-don-vi.php?tu_ngay_nhap=&den_ngay_nhap=&so_hs=&ma_dv=&nguoi_nhap=<?=$user->uid;?>&tinh_trang=1&search=filter_process"><i class="fas fa-check"></i> Kết thúc</a>
              </div>
            </div>
          </fieldset>
        </form>
        </div>
        <!--HẾT THÊM MỚI-->

        <!--TRA CỨU & XỬ LÝ DL-->
        <div class="tab-pane fade 
        <?php if (isset($_GET['search']) && $_GET['search']=='filter_process' || $_SERVER['QUERY_STRING']==null) { echo "show active"; } ?>"
        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="container-fluid mt-1 form_search">
    <form method="GET" autocomplete="off">
      <fieldset class="border border-info p-2">
        <legend class="w-auto mx-3">
          <label class="col-form-label p-0">Tìm kiếm hồ sơ</label>
          <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" title="Mở rộng/Thu nhỏ">
            <i class="fas fa-sort"></i>
          </button>
        </legend>
    <!--<div class="row">
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
        <div class="input-group">
          <div class="input-group-prepend">
              <span class="input-group-text">Ngày nhập</span>
              <span class="input-group-text">Từ</span>
            </div>
          <input type="date" name="s-date" value="<?php if (isset($_GET['s-date'])) { echo $_GET['s-date']; } ?>" class="form-control s-date">
          <div class="input-group-prepend">
              <span class="input-group-text">Đến</span>
            </div>
          <input type="date" name="e-date" value="<?php if (isset($_GET['e-date'])) { echo $_GET['e-date']; } ?>" class="form-control e-date">
        </div>
      </div>
    </div>-->
    <div class="collapse" id="collapseExample">
      <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Ngày nhập hồ sơ</span>
            </div>
            <div class="input-group-prepend">
                <span class="input-group-text">Từ</span>
            </div>
            <input type="date" class="form-control" name="tu_ngay_nhap" value="<?php if (isset($_GET['tu_ngay_nhap'])) { echo $_GET['tu_ngay_nhap']; } ?>">
            <div class="input-group-prepend">
                <span class="input-group-text">Đến</span>
            </div>
            <input type="date" class="form-control" name="den_ngay_nhap" value="<?php if (isset($_GET['den_ngay_nhap'])) { echo $_GET['den_ngay_nhap']; } ?>">
          </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Loại HS</span>
            </div>
            <select name="loai_hs" class="custom-select">
              <option value="">Tất cả</option>
              <option value="1" <?php if (isset($_GET['loai_hs']) && $_GET['loai_hs']==1) { echo "selected"; } ?>> Hồ sơ điện tử</option>
              <option value="2" <?php if (isset($_GET['loai_hs']) && $_GET['loai_hs']==2) { echo "selected"; } ?>>Hồ sơ giấy</option>
              <option value="3" <?php if (isset($_GET['loai_hs']) && $_GET['loai_hs']==3) { echo "selected"; } ?>>Hồ sơ bưu điện</option>
            </select>
          </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 pt-1">
          <span>Đã chọn: <b class="countchecked">0</b> HS</span>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Số hồ sơ</span>
            </div>
            <input type="text" class="form-control" id="SoHS" name="so_hs" placeholder="Có thể tìm nhiều số HS cùng lúc (Mỗi số hồ sơ tách nhau bằng dấu chấm phẩy ;)" value="<?php if (isset($_GET['so_hs'])) { echo $_GET['so_hs']; } ?>">
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Mã ĐV</span>
            </div>
            <input type="text" class="form-control" name="ma_dv" value="<?php if (isset($_GET['ma_dv'])) { echo $_GET['ma_dv']; } ?>">
          </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <div class="input-group border rounded">
            <div class="input-group-prepend">
                <span class="input-group-text">CB Xử lý</span>
            </div>
            <div class="custom-control custom-checkbox ml-2 mt-1">
              <input type="checkbox" class="custom-control-input" name='nguoi_nhap' id="nguoi_nhap" value="<?=$user->uid;?>" <?php if (isset($_GET['nguoi_nhap']) && $_GET['nguoi_nhap']==$user->uid) { echo "checked"; } ?>>
              <label class="custom-control-label" for="nguoi_nhap">Tôi</label>
            </div>
          </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Trạng thái HS</span>
            </div>
            <select name="tinh_trang" class="custom-select">
              <option value="">Tất cả</option>
              <option value="1"
              <?php if (isset($_GET['tinh_trang']) && $_GET['tinh_trang']==1) { echo 'selected';} ?>>
              Chờ xử lý</option>
              <option value="2"
              <?php if (isset($_GET['tinh_trang']) && $_GET['tinh_trang']==2) { echo 'selected';} ?>>
              Chờ bàn giao</option>
              <option value="3"
              <?php if (isset($_GET['tinh_trang']) && $_GET['tinh_trang']==3) { echo 'selected';} ?>>
              Đã tạo BBBG</option>
              <option value="4"
              <?php if (isset($_GET['tinh_trang']) && $_GET['tinh_trang']==4) { echo 'selected';} ?>>
              Chờ xử lý (Bị từ chối)</option>
            </select>
          </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <!--<button class="btn btn-primary w-75" id="btn-search" name="search" value="filter_process"><i class="fas fa-search"></i> Tìm kiếm</button>-->
            <div class="input-group" title="Số bản ghi/Trang">
              <button class="btn btn-primary w-75" id="btn-search" name="search" value="filter_process"><i class="fas fa-search"></i> Tìm kiếm</button>
              <select class="custom-select number_record"
              <?php if (empty($_SERVER['QUERY_STRING'])) {
                echo "disabled";
              } ?>>
                <option value="20"
                <?php if (isset($_GET['number_record']) && $_GET['number_record']==20) {
                  echo "selected";} ?>>20</option>
                <option value="50"
                <?php if (isset($_GET['number_record']) && $_GET['number_record']==50) {
                  echo "selected";} ?>>50</option>
                <option value="100"
                <?php if (isset($_GET['number_record']) && $_GET['number_record']==100) {
                  echo "selected";} ?>>100</option>
              </select>
            </div>
        </div>
      </div>
    </div>
    </fieldset>
    </form>
  </div>
  <form action="../module/chungtu_omts/submit.php" method="POST" id="ct_omts">
              <div class="table-responsive mt-2">
            <table class="table table-hover table-bordered text-center">
                <thead class="bg-info text-white">
                  <tr>
                      <th rowspan="2">STT</th>
                      <th rowspan="2">
                        <?php if (isset($_GET['search']) && $_GET['search']=='filter_process') { ?>
                          <input type="checkbox" name="chkall-item" onclick="checkall('hs', this);">
                        <?php } ?>
                      </th>
                      <th rowspan="2">TRẠNG THÁI</th>
                      <th rowspan="2">SỐ HỒ SƠ</th>
                      <th rowspan="2">TÊN ĐƠN VỊ - MÃ ĐƠN VỊ</th>
                      <th rowspan="2">SL</th>
                      <th rowspan="2">TBCTG</th>
                      <th rowspan="2">GHI CHÚ</th>
                      <th rowspan="2">CB XỬ LÝ</th>
                      <th colspan="2">NGÀY, GIỜ</th>
                    </tr>
                    <tr>
                      <th>NHẬP HS</th>
                      <th>XLHS</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if (isset($_GET['search']) && $_GET['search']=='filter_process') { require "../module/chungtu_omts/tim-kiem.php"; } ?>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-2 btn_action">
          <?php if ($user->user_group==5) { ?>
            <button class="btn btn-primary action" name="da_xu_ly" id="da_xu_ly" data-action='processed' disabled><i class="far fa-check-square"></i> Đã xử lý</button>
            <button class="btn btn-danger action" name="xoa_hs" id="xoa_hs" data-action='delete' disabled><i class="far fa-trash-alt"></i> Xóa</button>
          <?php } if ($user->uid==30) { ?>
          <button class="btn btn-secondary action" name="tao_bbbg" id="tao_bbbg" data-action='creatlist' disabled><i class="far fa-file-alt"></i> Tạo biên bản</button>
          <button class="btn btn-warning action" name="tu_choi" id="tu_choi" data-action='deny' disabled><i class="fas fa-user-times"></i> Từ chối</button>
          <?php } ?>
        </div>
      </form>
        </div>
        <!--HẾT TRA CỨU & XỬ LÝ DL-->

        <!--PHIẾU TRÌNH TBCTG-->
        <div class="tab-pane fade
        <?php if (isset($_GET['search']) && $_GET['search']=='phieutrinh_tbctg') { echo "show active"; } ?>"
          id="v-pills-phieutrinh-tbctg" role="tabpanel" aria-labelledby="v-pills-phieutrinh-tbctg-tab">
          <div class="container-fluid mt-1 form_search">
                <form method="GET" autocomplete="off">
      <div class="row mt-2">
        <!--<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Ngày tạo</span>
            </div>
            <div class="input-group-prepend">
                <span class="input-group-text">Từ</span>
            </div>
            <input type="date" class="form-control" name="tu_ngay_bghs" value="<?php if (isset($_GET['tu_ngay_bghs'])) { echo $_GET['tu_ngay_bghs']; } ?>">
            <div class="input-group-prepend">
                <span class="input-group-text">Đến</span>
            </div>
            <input type="date" class="form-control" name="den_ngay_bghs" value="<?php if (isset($_GET['den_ngay_bghs'])) { echo $_GET['den_ngay_bghs']; } ?>">
          </div>
        </div>-->
      </div>
      <div class="row mt-2">
        <!--<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Số hồ sơ</span>
            </div>
            <input type="text" class="form-control" name="so_hs" value="<?php if (isset($_GET['so_hs'])) { echo $_GET['so_hs']; } ?>">
          </div>
        </div>-->
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <button class="btn btn-primary w-100" id="btn-search" name="search" value="phieutrinh_tbctg"><i class="fas fa-search"></i> Tìm kiếm</button>
        </div>
      </div>
      </form>
          </div>
          <form action="../module/chungtu_omts/taophieutrinh_tbctg.php" method="POST" id="ct_omts">
              <div class="table-responsive mt-2">
            <table class="table table-hover table-bordered text-center">
                <thead class="bg-info text-white">
                  <tr>
                      <th rowspan="2">STT</th>
                      <?php if ($user->uid==30 || $user->uid==18) { ?>
                      <th rowspan="2">
                      <?php if (isset($_GET['search']) && $_GET['search']=='phieutrinh_tbctg') { ?>
                        <input type="checkbox" name="chkall-item" onclick="checkall('hs', this);">
                      <?php } ?>
                      </th>
                      <?php } ?>
                      <th colspan="2">TRẠNG THÁI</th>
                      <th rowspan="2">SỐ BB</th>
                      <th rowspan="2">NGÀY NHẬP</th>
                      <th rowspan="2" class="no_whitespace">ĐƠN VỊ</th>
                      <th rowspan="2">CBXL</th>
                      <th rowspan="2">LĐ DUYỆT</th>
                    </tr>
                    <tr>
                      <th>XLHS</th>
                      <th>PHIẾU TRÌNH</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if (isset($_GET['search']) && $_GET['search']=='phieutrinh_tbctg') { require "../module/chungtu_omts/timkiem_tbctg.php"; } ?>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-2 btn_action">
          <?php if ($user->uid==30 || $user->uid==18) { ?>
          <button class="btn btn-primary action" name="tao_bbbg" id="tao_bbbg" data-action='creatlist' disabled><i class="far fa-file-alt"></i> Tạo phiếu trình</button>
          <?php } ?>
        </div>
      </form>
        </div>
        <!--HẾT PHIẾU TRÌNH TBCTG-->

        <!--DS BB ĐÃ TẠO-->
        <div class="tab-pane fade
        <?php if (isset($_GET['search']) && $_GET['search']=='bbbghs') { echo "show active"; } ?>"
          id="v-pills-listbb" role="tabpanel" aria-labelledby="v-pills-listbb-tab">
          <div class="container-fluid mt-1 form_search">
                <form method="GET" autocomplete="off">
      <div class="row mt-2">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Ngày BGHS</span>
            </div>
            <div class="input-group-prepend">
                <span class="input-group-text">Từ</span>
            </div>
            <input type="date" class="form-control" name="tu_ngay_bghs" value="<?php if (isset($_GET['tu_ngay_bghs'])) { echo $_GET['tu_ngay_bghs']; } ?>">
            <div class="input-group-prepend">
                <span class="input-group-text">Đến</span>
            </div>
            <input type="date" class="form-control" name="den_ngay_bghs" value="<?php if (isset($_GET['den_ngay_bghs'])) { echo $_GET['den_ngay_bghs']; } ?>">
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Số hồ sơ</span>
            </div>
            <input type="text" class="form-control" name="so_hs" value="<?php if (isset($_GET['so_hs'])) { echo $_GET['so_hs']; } ?>">
          </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <input type="hidden" name="tab" value="ds_datao">
          <button class="btn btn-primary w-100" id="btn-search" name="search" value="bbbghs"><i class="fas fa-search"></i> Tìm kiếm</button>
        </div>
      </div>
      </form>
          </div>
              <div class="table-responsive mt-2">
            <table class="table table-hover table-bordered text-center">
                <thead>
                  <tr class="bg-info text-white">
                      <th>STT</th>
                      <th class="no_whitespace">THÀNH PHẦN BIÊN BẢN</th>
                      <th>NGÀY, GIỜ TẠO</th>
                      <th>THAO TÁC</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if (isset($_GET['search']) && $_GET['search']=='bbbghs') { require "../module/chungtu_omts/get_listbb.php"; } ?>
                </tbody>
            </table>
        </div>
        </div>
        <!--HẾT DS BB ĐÃ TẠO-->

        <!--DS PHIẾU TRÌNH ĐÃ TẠO-->
        <div class="tab-pane fade
        <?php if (isset($_GET['search']) && $_GET['search']=='phieutrinh_datao') { echo "show active"; } ?>"
          id="v-pills-phieutrinh-datao" role="tabpanel" aria-labelledby="v-pills-phieutrinh-datao-tab">
          <div class="container-fluid mt-1 form_search">
                <form method="GET" autocomplete="off">
      <div class="row mt-2">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Ngày tạo</span>
            </div>
            <div class="input-group-prepend">
                <span class="input-group-text">Từ</span>
            </div>
            <input type="date" class="form-control" name="tu_ngay_tao" value="<?php if (isset($_GET['tu_ngay_tao'])) { echo $_GET['tu_ngay_tao']; } ?>">
            <div class="input-group-prepend">
                <span class="input-group-text">Đến</span>
            </div>
            <input type="date" class="form-control" name="den_ngay_tao" value="<?php if (isset($_GET['den_ngay_tao'])) { echo $_GET['den_ngay_tao']; } ?>">
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <input type="hidden" name="tab" value="ds_datao">
          <button class="btn btn-primary w-100" id="btn-search" name="search" value="phieutrinh_datao"><i class="fas fa-search"></i> Tìm kiếm</button>
        </div>
      </div>
      </form>
          </div>
              <div class="table-responsive mt-2">
            <table class="table table-hover table-bordered text-center">
                <thead>
                  <tr class="bg-info text-white">
                      <th>STT</th>
                      <th class="no_whitespace">DANH SÁCH ĐƠN VỊ</th>
                      <th>NGƯỜI TẠO</th>
                      <th>NGÀY TẠO</th>
                      <th>THAO TÁC</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if (isset($_GET['search']) && $_GET['search']=='phieutrinh_datao') { require "../module/chungtu_omts/phieutrinh_datao.php"; } ?>
                </tbody>
            </table>
        </div>
        </div>
        <!--HẾT DS PHIẾU TRÌNH ĐÃ TẠO-->
        <div class="tab-pane fade" id="v-pills-pm1cua" role="tabpanel" aria-labelledby="v-pills-pm1cua-tab">
          <iframe src="https://tnhs.baohiemxahoi.gov.vn/views/hoso/tra-cuu.html" ></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if (isset($_GET['search']) && $_GET['search']=='filter_process') { ?>
<div id="chungtu_omts_info" class="container-fluid popup" style="width:60%;top:15%;left:20%;">
  <div class="border border-primary shadow table-responsive-md">
    <span class="btn-close"><i class="text-white far fa-times-circle fa-2x"></i></span>
    <h4 class="bg-info text-white text-center p-2">QUÁ TRÌNH XỬ LÝ HỒ SƠ</h4>
    <div class="data"></div>
  </div>
</div>
<?php } require('footer.php');?>