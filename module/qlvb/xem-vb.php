<?php
chdir('../');
require('../controller/qlvb.php');
$c_qlvb = new c_qlvb();
$vb_data = $c_qlvb->getVb();
$districts = $c_qlvb->getDistricts();
$wards = $c_qlvb->getWardsByDistId($vb_data['get_vb']->quan_huyen);
$dvSdls = $c_qlvb->getDvsdld($vb_data['get_vb']->ma_dv);
?>
        <div class="row">
                    <?php if ($vb_data['get_vb']->user_group==3 || $vb_data['get_vb']->user_group==4 || $vb_data['get_vb']->user_group==8) { ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Họ tên NLĐ</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $vb_data['get_vb']->ho_ten_nld;?>" disabled>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Số sổ</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $vb_data['get_vb']->so_so;?>" disabled>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Giới tính</span>
                            </div>
                            <select class="custom-select gender" disabled>
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
                            <input type="text" class="form-control" value="<?php echo $vb_data['get_vb']->chuc_danh;?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <?php } else { ?>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ngày sinh</span>
                            </div>
                            <input type="date" class="form-control" value="<?php echo $vb_data['get_vb']->ngay_sinh;?>">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Đang hưởng CĐ</span>
                            </div>
                            <select class="custom-select" <?php if ($vb_data['get_vb']->nguoi_du_thao=='07') { echo "disabled"; } ?> disabled>
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
                <?php } ?>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
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
                            <input type="text" class="form-control" value="<?php echo $vb_data['get_vb']->cd_giai_quyet;?>" disabled>
                        </div>
                    </div>
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
                            <select class="custom-select" disabled>
                                <option>==Quận/Huyện==</option>
                                <?php
                                foreach ($districts['list'] as $dist) { ?>
                                    <option value="<?=$dist->dist_id;?>"
                                    <?php if ($vb_data['get_vb']->quan_huyen==$dist->dist_id) {
                                        echo "selected";
                                    } ?>><?=$dist->dist_name;?></option>
                                <?php } ?>
                            </select>
                            <select class="custom-select" disabled>
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
                    <?php if ($_GET['vb_type']==4) { ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">SĐT</span>
                            </div>
                            <input type="number" class="form-control" name="sdt" value="0<?=$vb_data['get_vb']->sdt;?>" disabled>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email</span>
                            </div>
                            <input type="email" class="form-control" name="email" value="<?=$vb_data['get_vb']->email;?>" disabled>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="row mt-2">
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nơi nhận VB</span>
                            </div>
                            <select class="custom-select" disabled>
                                <option></option>
                                <?php if ($_GET['vb_type']==3) { ?>
                                <option value="1" <?php if ($vb_data['get_vb']->noi_nhan==1) { echo "selected"; }?>>Người lao động</option>
                                <option value="2" <?php if ($vb_data['get_vb']->noi_nhan==2) { echo "selected"; }?>>Q/H (Nơi nhận lương hưu)</option>
                                <option value="3" <?php if ($vb_data['get_vb']->noi_nhan==3) { echo "selected"; }?>>Quận/Huyện (Khác)</option>
                                <option value="4" <?php if ($vb_data['get_vb']->noi_nhan==4) { echo "selected"; }?>>Phòng TN &amp; TKQ TTHC</option>
                                <option value="5" <?php if ($vb_data['get_vb']->noi_nhan==5) { echo "selected"; }?>>Đơn vị sử dụng lao động</option>
                                <?php } elseif ($_GET['vb_type']==4) { ?>
                                <option value="6" <?php if ($vb_data['get_vb']->noi_nhan==6) { echo "selected"; }?>>Phòng Thu</option>
                                <option value="7" <?php if ($vb_data['get_vb']->noi_nhan==7) { echo "selected"; }?>>Phòng Cấp sổ</option>
                                <option value="8" <?php if ($vb_data['get_vb']->noi_nhan==8) { echo "selected"; }?>>Tổ Thu BHXH Quận/Huyện</option>
                                <?php } ?>
                            </select>
                            <?php if ($_GET['vb_type']==3) {
                            if ($vb_data['get_vb']->user_group!=8) { ?>
                            <div class="input-group-prepend">
                                <span class="input-group-text">BHXH Q/H nhận VB</span>
                            </div>
                            <select class="custom-select" disabled>
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
                            <select class="custom-select" disabled>
                                <option></option>
                            </select>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <?php } } if ($vb_data['get_vb']->user_group==5) { ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Số BB</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $vb_data['get_vb']->so_bb;?>" disabled>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ngày nhận</span>
                            </div>
                            <input type="date" class="form-control" value="<?php echo $vb_data['get_vb']->ngay_nhan;?>" disabled>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Đợt nhận</span>
                            </div>
                            <input type="date" class="form-control" value="<?php echo $vb_data['get_vb']->dot_nhan;?>" disabled>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Mã đơn vị</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $vb_data['get_vb']->ma_dv;?>" disabled>
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
                            <select class="custom-select" disabled>
                                <option value=""></option>
                                <option value="2" <?php if ($vb_data['get_vb']->ld_duyet==2) { echo "selected"; }?>>Dương Thị Minh Châu</option>
                                <option value="3" <?php if ($vb_data['get_vb']->ld_duyet==3) { echo "selected"; }?>>Trần Thị Thu Hà</option>
                                <option value="4" <?php if ($vb_data['get_vb']->ld_duyet==4) { echo "selected"; }?>>Bùi Anh Tuấn</option>
                                <option value="37" <?php if ($vb_data['get_vb']->ld_duyet==37) { echo "selected"; }?>>Phạm Hắc Hải</option>
                                <option value="38" <?php if ($vb_data['get_vb']->ld_duyet==38) { echo "selected"; }?>>Phạm Hắc Hải</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2 bg-light">
                        <div class="form-group">
                            <label class="font-weight-bold">Nội dung chi tiết:</label>
                            <div><?php echo $vb_data['get_vb']->noi_dung;?></div>
                        </div>
                    </div>
                </div>
        <div class="row mt-2">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <div class="form-group" id="btn-action">
                    <a href="../print/?vb_type=<?=$vb_data['get_vb']->loai_vb;?>&vb=<?=$vb_data['get_vb']->vb_id;?>" class="btn btn-primary w-25" target="_blank"><i class="fas fa-print"></i> In</a>
                </div>
            </div>
        </div>