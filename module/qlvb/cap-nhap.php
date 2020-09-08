<?php
chdir('../');
require('../controller/qlvb.php');
$c_qlvb = new c_qlvb();
if ($_GET['action']=='view') {
$vb_data = $c_qlvb->getVb();
$districts = $c_qlvb->getDistricts();
$wards = $c_qlvb->getWardsByDistId($vb_data['get_vb']->quan_huyen);
$dvSdls = $c_qlvb->getDvsdld($vb_data['get_vb']->ma_dv);
?>
<script>CKEDITOR.replace('noi_dung');</script>
    <form>
        <div class="row">
                    <input type="hidden" class="vbi" value="<?php echo $vb_data['get_vb']->vb_id;?>">
                    <?php if ($vb_data['get_vb']->user_group==3 || $vb_data['get_vb']->user_group==4 || $vb_data['get_vb']->user_group==8) { ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text required">Họ tên NLĐ</span>
                            </div>
                            <input type="text" class="form-control ho-ten-nld" value="<?php echo $vb_data['get_vb']->ho_ten_nld;?>">
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Số sổ</span>
                            </div>
                            <input type="text" class="form-control so-so" value="<?php echo $vb_data['get_vb']->so_so;?>">
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Giới tính</span>
                            </div>
                            <select class="custom-select gender">
                                <option></option>
                                <option value="1" <?php if ($vb_data['get_vb']->gioi_tinh==1) { echo "selected"; }?>>Nam</option>
                                <option value="2" <?php if ($vb_data['get_vb']->gioi_tinh==2) { echo "selected"; }?>>Nữ</option>
                            </select>
                        </div>
                    </div>
                    <?php if ($_GET['vb_type']==3) {
                    if ($vb_data['get_vb']->user_group!=8) { ?>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Chức danh</span>
                            </div>
                            <input type="text" class="form-control chuc-danh" value="<?php echo $vb_data['get_vb']->chuc_danh;?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="row mt-2">
                    <?php if ($vb_data['get_vb']->user_group==8) { ?>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ngày sinh</span>
                            </div>
                            <input type="date" class="form-control ngay-sinh" value="<?php echo $vb_data['get_vb']->ngay_sinh;?>">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Đang hưởng CĐ</span>
                            </div>
                            <select class="custom-select cd-huong" <?php if ($vb_data['get_vb']->nguoi_du_thao=='07') { echo "disabled"; } ?>>
                                <option></option>
                                <option value="1" <?php if ($vb_data['get_vb']->cd_huong==1) { echo "selected"; }?>>Hưu trí</option>
                                <option value="2" <?php if ($vb_data['get_vb']->cd_huong==2) { echo "selected"; }?>>Tử tuất</option>
                                <option value="3" <?php if ($vb_data['get_vb']->cd_huong==3) { echo "selected"; }?>>Tai nạn lao động</option>
                                <option value="4" <?php if ($vb_data['get_vb']->cd_huong==4) { echo "selected"; }?>>Bệnh nghề nghiệp</option>
                                <option value="5" <?php if ($vb_data['get_vb']->cd_huong==5) { echo "selected"; }?>>Mất sức lao động</option>
                                <option value="6" <?php if ($vb_data['get_vb']->cd_huong==6) { echo "selected"; }?>>613</option>
                            </select>
                        </div>
                    </div>
                <?php } if ($_GET['vb_type']==3) { ?>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <?php } elseif ($_GET['vb_type']==4) { ?>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                <?php } ?>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <?php if ($_GET['vb_type']==3) {
                                        echo "CĐ cần giải quyết";
                                    } elseif ($_GET['vb_type']==4) {
                                        echo "ND đề nghị";
                                    } ?>
                                </span>
                            </div>
                            <input type="text" class="form-control cd-giai-quyet" value="<?php echo $vb_data['get_vb']->cd_giai_quyet;?>">
                        </div>
                    </div>
                    <?php if ($_GET['vb_type']==4) { ?>
                </div>
                <div class="row mt-2">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <?php if ($_GET['vb_type']==3) {
                                        echo "Nơi nhận lương hưu";
                                    } elseif ($_GET['vb_type']==4) {
                                        echo "Địa chỉ";
                                    } ?>
                                </span>
                            </div>
                            <select class="custom-select quan-huyen" required>
                                <option>==Quận/Huyện==</option>
                                <?php
                                foreach ($districts['list'] as $dist) { ?>
                                    <option value="<?=$dist->dist_id;?>"
                                    <?php if ($vb_data['get_vb']->quan_huyen==$dist->dist_id) {
                                        echo "selected";
                                    } ?>><?=$dist->dist_name;?></option>
                                <?php } ?>
                            </select>
                            <select class="custom-select phuong-xa">
                                <option>==Phường/Xã==</option>
                                <?php
                                foreach ($wards['list'] as $ward) { ?>
                                    <option value="<?=$ward->ward_id;?>"
                                    <?php if ($vb_data['get_vb']->phuong_xa==$ward->ward_id) {
                                        echo "selected";
                                    } ?>><?=$ward->ward_name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <?php } if ($vb_data['get_vb']->user_group == 3 || $vb_data['get_vb']->user_group == 4) { ?>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Số BB</span>
                            </div>
                            <input type="text" class="form-control so-bb" value="<?php echo $vb_data['get_vb']->so_bb;?>">
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($_GET['vb_type']==4) { ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <?php if ($vb_data['get_vb']->sdt != 0) {
                            $sdt = '0'.$vb_data['get_vb']->sdt;
                        } ?>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">SĐT</span>
                            </div>
                            <input type="number" class="form-control sdt" name="sdt" value="<?=$sdt;?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="row mt-2">
                    <?php if ($_GET['vb_type']==4) { ?>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email</span>
                            </div>
                            <input type="email" class="form-control email" name="email" value="<?=$vb_data['get_vb']->email;?>">
                        </div>
                    </div>
                    <?php } if ($_GET['vb_type']==3) { ?>
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                    <?php } elseif ($_GET['vb_type']==4) { ?>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <?php } ?>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nơi nhận VB</span>
                            </div>
                            <select class="custom-select noi-nhan">
                                <option></option>
                                <?php if ($_GET['vb_type']==3) { ?>
                                <option value="1" <?php if ($vb_data['get_vb']->noi_nhan==1) { echo "selected"; }?>>Người lao động</option>
                                <option value="2" <?php if ($vb_data['get_vb']->noi_nhan==2) { echo "selected"; }?>>Q/H (Nơi nhận lương hưu)</option>
                                <option value="3" <?php if ($vb_data['get_vb']->noi_nhan==3) { echo "selected"; }?>>Quận/Huyện (Khác)</option>
                                <option value="4" <?php if ($vb_data['get_vb']->noi_nhan==4) { echo "selected"; }?>>Phòng TN &amp; TKQ TTHC</option>
                                <option value="5" <?php if ($vb_data['get_vb']->noi_nhan==5) { echo "selected"; }?>>Đơn vị sử dụng lao động</option>
                                <?php } elseif ($_GET['vb_type']==4) { ?>
                                <option value="6" <?php if ($vb_data['get_vb']->noi_nhan==6) { echo "selected"; }?>>Phòng Thu</option>
                                <option value="7" <?php if ($vb_data['get_vb']->noi_nhan==7) { echo "selected"; }?>>Phòng Cấp sổ, thẻ</option>
                                <option value="8" <?php if ($vb_data['get_vb']->noi_nhan==8) { echo "selected"; }?>>BHXH Quận/Huyện</option>
                                <?php } ?>
                            </select>
                            <?php if ($_GET['vb_type']==3) {
                            if ($vb_data['get_vb']->user_group!=8) { ?>
                            <div class="input-group-prepend">
                                <span class="input-group-text">BHXH Q/H nhận VB</span>
                            </div>
                            <select class="custom-select bhxhqh">
                                <option></option>
                                <?php
                                foreach ($districts['list'] as $dist) { ?>
                                    <option value="<?=$dist->dist_id;?>"
                                    <?php if ($vb_data['get_vb']->bhxhqh==$dist->dist_id) {
                                        echo "selected";
                                    } ?>><?=$dist->dist_name;?></option>
                                <?php } ?>
                            </select>
                            <?php } else { ?>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nơi gửi VB</span>
                            </div>
                            <select class="custom-select">
                                <option></option>
                            </select>
                            <?php } } ?>
                        </div>
                    </div>
                    <?php if ($_GET['vb_type']==3) { ?>
                </div>
                <div class="row mt-2">
                    <?php } } ?>
                    <?php if ($vb_data['get_vb']->user_group==5) { ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Số BB (Phiếu tiếp nhận)</span>
                            </div>
                            <input type="text" class="form-control so-bb" value="<?php echo $vb_data['get_vb']->so_bb;?>" <?php if ($_GET['vb_type']==4) { echo "disabled"; } ?>>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ngày nhận</span>
                            </div>
                            <input type="date" class="form-control ngay-nhan" value="<?php echo $vb_data['get_vb']->ngay_nhan;?>">
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Đợt nhận</span>
                            </div>
                            <input type="date" class="form-control dot-nhan" value="<?php echo $vb_data['get_vb']->dot_nhan;?>">
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Mã đơn vị</span>
                            </div>
                            <input type="text" class="form-control ma-dv" value="<?php echo $vb_data['get_vb']->ma_dv;?>">
                        </div>
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tên ĐV</span>
                            </div>
                            <span class="form-control"><?=$dvSdls['dvsdld']->ten_dv;?></span>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">LĐ Duyệt</span>
                            </div>
                            <select class="custom-select ld-duyet">
                                <option value="3" <?php if ($vb_data['get_vb']->ld_duyet==3) { echo "selected"; }?>>Trần Thị Thu Hà</option>
                                <option value="4" <?php if ($vb_data['get_vb']->ld_duyet==4) { echo "selected"; }?>>Bùi Anh Tuấn</option>
                                <option value="37" <?php if ($vb_data['get_vb']->ld_duyet==37) { echo "selected"; }?>>Phạm Hắc Hải</option>
                                <option value="38" <?php if ($vb_data['get_vb']->ld_duyet==38) { echo "selected"; }?>>Nguyễn Quang Minh</option>
                            </select>
                        </div>
                    </div>
                </div>
        <div class="row mt-2">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2 bg-light">
                        <div class="form-group">
                            <label class="font-weight-bold">Nội dung chi tiết:</label>
                            <textarea name="noi_dung" id="noi_dung">
                                <?php echo $vb_data['get_vb']->noi_dung;?>
                            </textarea>
                        </div>
                    </div>
                </div>
        <div class="row mt-2">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <div class="form-group" id="btn-action">
                    <button class="btn btn-primary"><i class="fas fa-save"></i> Ghi</button>
                    <a href="../print/?vb_type=<?=$vb_data['get_vb']->loai_vb;?>&vb=<?=$vb_data['get_vb']->vb_id;?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i> In</a>
                </div>
            </div>
        </div>
    </form>
    <?php } elseif ($_GET['action']=='edit') {
        $vb_id = $_POST['vb'];
        isset($_POST['ho_ten_nld']) ? $ho_ten_nld = $_POST['ho_ten_nld'] : $ho_ten_nld = '';
        isset($_POST['gioi_tinh']) ? $gioi_tinh = $_POST['gioi_tinh'] : $gioi_tinh = 0;
        isset($_POST['chuc_danh']) ? $chuc_danh = $_POST['chuc_danh'] : $chuc_danh = '';
        isset($_POST['sdt']) ? $sdt = $_POST['sdt'] : $sdt = 0;
        isset($_POST['email']) ? $email = $_POST['email'] : $email = '';
        isset($_POST['so_so']) ? $so_so = $_POST['so_so'] : $so_so = '';
        isset($_POST['cd_giai_quyet']) ? $cd_giai_quyet = $_POST['cd_giai_quyet'] : $cd_giai_quyet = '';
        isset($_POST['quan_huyen']) ? $quan_huyen = $_POST['quan_huyen'] : $quan_huyen = '00';
        isset($_POST['phuong_xa']) ? $phuong_xa = $_POST['phuong_xa'] : $phuong_xa = 0;
        isset($_POST['noi_dung']) ? $noi_dung = $_POST['noi_dung'] : $noi_dung = '';
        isset($_POST['cd_huong']) ? $cd_huong = $_POST['cd_huong'] : $cd_huong = 0;
        isset($_POST['ngay_sinh']) ? $ngay_sinh = $_POST['ngay_sinh'] : $ngay_sinh = '0000-00-00';
        isset($_POST['ngay_chet']) ? $ngay_chet = $_POST['ngay_chet'] : $ngay_chet = '0000-00-00';
        isset($_POST['ngay_nhan']) ? $ngay_nhan = $_POST['ngay_nhan'] : $ngay_nhan = '0000-00-00';
        isset($_POST['dot_nhan']) ? $dot_nhan = $_POST['dot_nhan'] : $dot_nhan = '0000-00-00';
        isset($_POST['so_bb']) ? $so_bb = $_POST['so_bb'] : $so_bb = '';
        isset($_POST['ma_dv']) ? $ma_dv = $_POST['ma_dv'] : $ma_dv = 0;
        isset($_POST['noi_nhan']) ? $noi_nhan = $_POST['noi_nhan'] : $noi_nhan = 5;
        isset($_POST['tinh_trang']) ? $tinh_trang = $_POST['tinh_trang'] : $tinh_trang = 1;
        if ($_GET['vb_type']==3) {
            if ($noi_nhan==2) {
                $bhxhqh = $_POST['quan-huyen'];
            } elseif ($noi_nhan==3) {
                $bhxhqh = $_POST['bhxhqh'];
            } else {
                $bhxhqh = '00';
            }
        } elseif ($_GET['vb_type']==4) {
            $bhxhqh = $_POST['quan_huyen'];
            /*if ($noi_nhan==8) {
                $bhxhqh = $_POST['quan_huyen'];
            } else {
                $bhxhqh = '00';
            }*/
        }
        $ld_duyet = $_POST['ld_duyet'];
        $update_vb = $c_qlvb->updateVb('edit', $ho_ten_nld, $gioi_tinh, $ngay_sinh, $ngay_chet, $chuc_danh, $sdt, $email, $ngay_nhan, $dot_nhan, $so_so, $so_bb, $ma_dv, $noi_nhan, $bhxhqh, $cd_huong, $cd_giai_quyet, $quan_huyen, $phuong_xa, $noi_dung, $ld_duyet, $tinh_trang, $vb_id);?>
    <script>
        setTimeout(function(){
            $(document).find('div.alert').fadeOut(3000);
        }, 2000);
        $('#message').append("<div class='alert alert-success text-center success m-3 p-4' role='alert'><i class='fas fa-check-circle fa-2x float-left'></i><strong>Cập nhập dữ liệu thành công.</strong></div>");
    </script>
    <?php } ?>