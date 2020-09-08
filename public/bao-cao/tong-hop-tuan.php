<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Báo cáo tổng hợp tuần</title>
    <style>
        *{margin:0;padding:0}
        body{padding:10px;}
        .group{margin:10px;}
        span{font-style:italic;font-weight:normal;}
        h3{text-align:center;}
        table{margin:10px;font-size:0.9em;}
        th,td{padding:5px;}
        .group-name{font-weight:bold;}
        /*tr td:not(:nth-child(3)){text-align:center;}*/
    </style>
</head>
<body>
<?php
require "libs/config.php";
$tungay = $_POST['tu_ngay'];
$denngay = $_POST['den_ngay'];
$tu_ngay = DATE_FORMAT(new DateTime($_POST['tu_ngay']), 'd/m/Y');
$den_ngay = DATE_FORMAT(new DateTime($_POST['den_ngay']), 'd/m/Y');
$weeka = date('W', strtotime($_POST['tu_ngay']));
$weekb = date('W', strtotime($_POST['den_ngay']));
if ($weeka == $weekb) { ?>
<div class="group">
    <span style="font-style:normal;">BẢO HIỂM XÃ HỘI THÀNH PHỐ HÀ NỘI</span>
    <h4>PHÒNG CHẾ ĐỘ BHXH</h4>
</div>
<div id="title">
    <h3>BÁO CÁO<br/>
        Tổng hợp kết quả thực hiện của cán bộ, viên chức, LĐHĐ<br/>
        <span>Tuần thứ: <?php echo $weeka." từ ngày ".$tu_ngay." đến ngày ".$den_ngay;?></span>
    </h3>
    <table border="1">
        <thead>
            <tr>
                <th style="width:2%;">TT</th>
                <th style="width:13%;">Họ và tên</th>
                <th style="width:30%;">Các nhiệm vụ chính</th>
                <th style="width:10%;">Công việc được giao <span>(lượt giao dịch/hồ sơ)</span></th>
                <th style="width:10%;">Kết quả đạt được trong tuần <span>(lượt giao dịch/hồ sơ)</span></th>
                <th style="width:10%;">Công việc chưa đạt được <span>(lượt giao dịch/hồ sơ)</span></th>
                <th style="width:25%;">Lý do</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="group-name" colspan="7">I - Lãnh đạo phòng</td>
            </tr>
            <tr>
                <td rowspan="6">1</td>
                <td rowspan="6">Dương Thị Minh Châu</td>
                <td>Ký, thẩm định hồ sơ (bao gồm HS điều chỉnh, xét duyệt dài hạn, chi trả BHTN)</td>
                <td></td>
                <td></td>
                <td rowspan="5"></td>
                <td rowspan="5"></td>
            </tr>
            <tr>
                <td>Số lượng hồ sơ trả lại:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Ký duyệt danh sách chi 1 lần chuyển quận huyện:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Báo cáo trong kỳ</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tiếp công dân:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Công việc phát sinh:</td>
                <td colspan="4"></td>
            </tr>

            <tr>
                <td rowspan="6">2</td>
                <td rowspan="6">Trần Thị Thu Hà</td>
                <td>Ký, thẩm định hồ sơ (bao gồm HS điều chỉnh, xét duyệt ngắn hạn, xét duyệt dài hạn)</td>
                <td></td>
                <td></td>
                <td rowspan="5"></td>
                <td rowspan="5"></td>
            </tr>
            <tr>
                <td>Số lượng đơn thư phải trả lời:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Số lượng công văn gửi BHVN, Sở LĐ:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Số lượng hồ sơ trả lại:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tiếp công dân:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Công việc phát sinh:</td>
                <td colspan="4"></td>
            </tr>

            <tr>
                <td rowspan="6">3</td>
                <td rowspan="6">Bùi Anh Tuấn</td>
                <td>Ký, thẩm định hồ sơ (bao gồm hồ sơ xét duyệt dài hạn)</td>
                <td></td>
                <td></td>
                <td rowspan="5"></td>
                <td rowspan="5"></td>
            </tr>
            <tr>
                <td>Số lượng đơn thư phải trả lời:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Số lượng công văn gửi BHVN, Sở LĐ:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Số lượng hồ sơ trả lại:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tiếp công dân:</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Công việc phát sinh:</td>
                <td colspan="4"></td>
            </tr>
            <?php
            $query = $conn->query("SELECT * FROM user_group WHERE group_id IN (3,4,5,6,7,8,9)"); ?>
            <?php while ($row = $query->fetch()){?>
                <tr>
                    <td class="group-name" colspan="7"><?php echo $row['group_name'];?></td>
                </tr>
                <?php $gid = $row['group_id'];
                $query1 = $conn->query("SELECT * FROM users WHERE user_group = $gid");
                while ($row1 = $query1->fetch()){
                    $uid = $row1['uid'];?>
                <tr>
                    <td <?php if ($gid == 3) {
                        if ($uid == 6 OR $uid == 13) {
                            echo "rowspan='7'";
                        } else {
                            echo "rowspan='6'";
                        }
                    } elseif ($gid == 4) {
                        echo "rowspan='7'";
                    } elseif ($gid == 5) {
                        if ($uid == 17) {
                            echo "rowspan='7'";
                        } else {
                            echo "rowspan='6'";
                        }
                    } elseif ($gid == 6) {
                        if ($uid == 33) {
                            echo "rowspan='2'";
                        } else {
                            echo "rowspan='3'";
                        }
                    } elseif ($gid == 7) {
                        echo "rowspan='6'";
                    } elseif ($gid == 8) {
                        echo "rowspan='6'";
                    } elseif ($gid == 9) {
                        echo "rowspan='6'";
                    }
                    ?>>
                    <?php echo $uid-1;?>
                    </td>
                    <td <?php if ($gid == 3) {
                        if ($uid == 6 OR $uid == 13) {
                            echo "rowspan='7'";
                        } else {
                            echo "rowspan='6'";
                        }
                    } elseif ($gid == 4) {
                        echo "rowspan='7'";
                    } elseif ($gid == 5) {
                        if ($uid == 17) {
                            echo "rowspan='7'";
                        } else {
                            echo "rowspan='6'";
                        }
                    } elseif ($gid == 6) {
                        if ($uid == 33) {
                            echo "rowspan='2'";
                        } else {
                            echo "rowspan='3'";
                        }
                    } elseif ($gid == 7) {
                        echo "rowspan='6'";
                    } elseif ($gid == 8) {
                        echo "rowspan='6'";
                    } elseif ($gid == 9) {
                        echo "rowspan='6'";
                    }
                    ?>>
                    <?php echo $row1['fullname'];?>
                    </td>
                    <?php if ($gid == 3) {
                        $query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(tra_lai) AS tonghstra, SUM(don_thu) AS tongdonthu, SUM(hs_sai_dieuchinh) AS hssaidieuchinh, SUM(bao_cao) AS baocao, SUM(ktdl_chuyenchitra) AS ktdlchuyenchitra, SUM(kt_chuyendl21ab) AS ktchuyendl21ab, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $uid AND ngay_nhap BETWEEN '$tungay' AND '$denngay'");
                        $row2 = $query2->fetch();?>
                    <td>Số hồ sơ tuần trước chuyển sang:</td>
                    <td></td>
                    <td></td>
                    <td <?php if ($uid == 6 OR $uid == 13) {
                            echo "rowspan='6'";
                        } else {
                            echo "rowspan='5'";
                        } ?>>
                        <?php echo $row2['cv_chuadatduoc']; ?>
                    </td>
                    <td <?php if ($uid == 6 OR $uid == 13) {
                            echo "rowspan='6'";
                        } else {
                            echo "rowspan='5'";
                        } ?>>
                        <?php echo $row2['ly_do']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Số hồ sơ tiếp nhận trong tuần (theo lượt giao dịch)</td>
                    <td><?php echo $row2['tonghsnhan']; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ trả lại</td>
                    <td></td>
                    <td><?php echo $row2['tonghstra']; ?></td>
                </tr>
                <tr>
                    <td>Số lượng đơn thư phải trả lời:</td>
                    <td></td>
                    <td><?php echo $row2['tongdonthu']; ?></td>
                </tr>
                <tr>
                    <td>Số hồ sơ sai phải điều chỉnh: (Lệch Dữ liệu TST)</td>
                    <td></td>
                    <td><?php echo $row2['hssaidieuchinh']; ?></td>
                </tr>
                <?php if ($uid == 6) { ?>
                <tr>
                    <td>Kiểm tra dữ liệu, chuyển chi trả</td>
                    <td></td>
                    <td><?php echo $row2['ktdlchuyenchitra']; ?></td>
                </tr>
                <?php } elseif ($uid == 13) { ?>
                <tr>
                    <td>Chuyển dữ liệu 21AB sang kế toán, bưu điện (đợt/tuần)</td>
                    <td></td>
                    <td><?php echo $row2['ktchuyendl21ab']; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Công việc phát sinh</td>
                    <td colspan="4"><?php echo $row2['cv_phatsinh']; ?></td>
                </tr>
                    <?php } elseif ($gid == 4) {
                        $query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(tra_lai) AS tonghstra, SUM(don_thu) AS tongdonthu, SUM(hs_xinykien_bhxhvn) AS hsxinykienbhxhvn, SUM(boctach_dieuchinh) AS boctachdieuchinh, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $uid AND ngay_nhap BETWEEN '$tungay' AND '$denngay'");
                        $row2 = $query2->fetch(); ?>
                    <td>Số hồ sơ tuần trước chuyển sang:</td>
                    <td></td>
                    <td></td>
                    <td rowspan="6"><?php echo $row2['cv_chuadatduoc']; ?></td>
                    <td rowspan="6"><?php echo $row2['ly_do']; ?></td>
                </tr>
                <tr>
                    <td>Số hồ sơ tiếp nhận trong tuần (theo lượt giao dịch)</td>
                    <td><?php echo $row2['tonghsnhan']; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số lượng đơn thư phải trả lời:</td>
                    <td></td>
                    <td><?php echo $row2['tongdonthu']; ?></td>
                </tr>
                <tr>
                    <td>Số hồ sơ phải xin ý kiến BHVN, Sở Lao động:</td>
                    <td></td>
                    <td><?php echo $row2['hsxinykienbhxhvn']; ?></td>
                </tr>
                <tr>
                    <td>Số hồ sơ trả lại:</td>
                    <td></td>
                    <td><?php echo $row2['tonghstra']; ?></td>
                </tr>
                <tr>
                    <td>Bóc tách hồ sơ điều chỉnh:</td>
                    <td></td>
                    <td><?php echo $row2['boctachdieuchinh']; ?></td>
                </tr>
                <tr>
                    <td>Công việc phát sinh</td>
                    <td colspan="4"><?php echo $row2['cv_phatsinh']; ?></td>
                </tr>
                    <?php } elseif ($gid == 5) {
                        $query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(tra_lai) AS tonghstra, SUM(don_thu) AS tongdonthu, SUM(baocao_odts) AS baocaoodts, SUM(tonghop_ketoan) AS tonghopketoan, SUM(boctach_xdnh) AS boctach_xdnh, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $uid AND ngay_nhap BETWEEN '$tungay' AND '$denngay'");
                        $row2 = $query2->fetch(); ?>
                    <td>Số hồ sơ tuần trước chuyển sang:</td>
                    <?php if ($uid == 21) { ?>
                    <td rowspan="6" colspan="4">Nghỉ Thai sản</td>
                    <?php } else { ?>
                    <td></td>
                    <td></td>
                    <td <?php if ($uid == 17) {
                            echo "rowspan='6'";
                        } else {
                            echo "rowspan='5'";
                        } ?>>
                    <?php echo $row2['cv_chuadatduoc']; ?>
                    </td>
                    <td <?php if ($uid == 17) {
                            echo "rowspan='6'";
                        } else {
                            echo "rowspan='5'";
                        } } ?>>
                    <?php echo $row2['ly_do']; ?>
                    </td>
                </tr>

                <?php if ($uid == 21) { ?>
                <tr>
                    <td>Số tiếp nhận ( theo lượng hồ sơ):</td>
                </tr>
                <tr>
                    <td>Số hồ sơ trả lại:</td>
                </tr>
                <tr>
                    <td>Số lượng đơn thư phải trả lời:</td>
                </tr>
                <tr>
                    <td>Tổng hợp số liệu chuyển kế toán</td>
                </tr>
                <tr>
                    <td>Công việc phát sinh</td>
                </tr>
                <?php } else { ?>
                <tr>
                    <td>Số tiếp nhận ( theo lượng hồ sơ):</td>
                    <td><?php echo $row2['tonghsnhan']; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ trả lại:</td>
                    <td></td>
                    <td><?php echo $row2['tonghstra']; ?></td>
                </tr>
                <tr>
                    <td>Số lượng đơn thư phải trả lời:</td>
                    <td></td>
                    <td><?php echo $row2['tongdonthu']; ?></td>
                </tr>
                <tr>
                    <td>Tổng hợp số liệu chuyển kế toán</td>
                    <td></td>
                    <td><?php echo $row2['tonghopketoan']; ?></td>
                </tr>
                <?php if ($uid == 17) { ?>
                <tr>
                    <td>Bóc tách hồ sơ</td>
                    <td></td>
                    <td><?php echo $row2['boctach_xdnh']; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Công việc phát sinh</td>
                    <td colspan="4"><?php echo $row2['cv_phatsinh']; ?></td>
                </tr>

                    <?php } } elseif ($gid == 6) {
                        $query2 = $conn->query("SELECT SUM(boctach_xddh) AS boctachxddh, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $uid AND ngay_nhap BETWEEN '$tungay' AND '$denngay'");
                        $row2 = $query2->fetch();
                        if ($uid == 32) { ?>
                <td>Tổng số hồ sơ giao nhận:</td>
                    <td></td>
                    <td></td>
                    <td <?php if ($uid != 33) {
                            echo "rowspan='2'";
                        } ?>>
                    </td>
                    <td <?php if ($uid != 33) {
                            echo "rowspan='2'";
                        } ?>>
                    </td>
                </tr>
                <?php }
                if ($uid != 32) { ?>
                    <td>Tổng số hồ sơ bóc tách</td>
                    <td></td>
                    <td><?php echo $row2['boctachxddh']; ?></td>
                    <td <?php if ($uid != 33) {
                            echo "rowspan='2'";
                        } ?>>
                    </td><td <?php if ($uid != 33) {
                            echo "rowspan='2'";
                        } ?>>
                    </td>
                </tr>
                <?php } if ($uid != 33) { ?>
                <tr>
                    <td>Luân chuyển hồ sơ hàng ngày</td>
                    <td>X</td>
                    <td></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Công việc phát sinh:</td>
                    <td colspan="4"><?php echo $row2['cv_phatsinh']; ?></td>
                </tr>
                    <?php } elseif ($gid == 7) {
                        $query2 = $conn->query("SELECT SUM(sqd_thoihuongtuat) AS sqdthoihuongtuat, SUM(tonghop_qlc) AS tonghopqlc, SUM(hs_chuyenden_qlc) AS hschuyendenqlc, SUM(hs_tang_trongthang) AS hstangtrongthang, SUM(hs_thaydoi_trongthang) AS hsthaydoitrongthang, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $uid AND ngay_nhap BETWEEN '$tungay' AND '$denngay'");
                        $row2 = $query2->fetch(); ?>
                <td>Số hồ sơ tăng trong tuần:</td>
                    <td></td>
                    <td><?php echo $row2['hstangtrongthang']; ?></td>
                    <td rowspan="5"><?php echo $row2['cv_chuadatduoc']; ?></td>
                    <td rowspan="5"><?php echo $row2['ly_do']; ?></td>
                </tr>
                <tr>
                    <td>Số hồ sơ điều chỉnh, thay đổi trong tuần:</td>
                    <td></td>
                    <td><?php echo $row2['hsthaydoitrongthang']; ?></td>
                </tr>
                <tr>
                    <td>Số quyết định thôi hưởng tuất:</td>
                    <td></td>
                    <td><?php echo $row2['sqdthoihuongtuat']; ?></td>
                </tr>
                <tr>
                    <td>Tổng hợp:</td>
                    <td></td>
                    <td><?php echo $row2['tonghopqlc']; ?></td>
                </tr>
                <tr>
                    <td>Số lượng hồ sơ chuyển đến:</td>
                    <td></td>
                    <td><?php echo $row2['hschuyendenqlc']; ?></td>
                </tr>
                <tr>
                    <td>Công việc phát sinh:</td>
                    <td colspan="4"><?php echo $row2['cv_phatsinh']; ?></td>
                </tr>
                    <?php } elseif ($gid == 8) {
                        $query2 = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(tonghop_21ab) AS tonghop21ab, SUM(van_thu) AS vanthu, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $uid AND ngay_nhap BETWEEN '$tungay' AND '$denngay'");
                        $row2 = $query2->fetch(); ?>
                <td>Số lượng hồ sơ chuyển đến, đi tuần trước chuyển sang</td>
                    <td></td>
                    <td></td>
                    <td rowspan="5"><?php echo $row2['cv_chuadatduoc']; ?></td>
                    <td rowspan="5"><?php echo $row2['ly_do']; ?></td>
                </tr>
                <tr>
                    <td>Số lượng hồ sơ chuyển đến, đi tiếp nhận trong tuần</td>
                    <td><?php echo $row2['tonghsnhan']; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ trả lại:</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tổng hợp chuyển số liệu 21AB (đợt/tuần)</td>
                    <td></td>
                    <td><?php echo $row2['tonghop21ab']; ?></td>
                </tr>
                <tr>
                    <td>Công tác văn thư của phòng</td>
                    <td></td>
                    <td><?php echo $row2['vanthu']; ?></td>
                </tr>
                <tr>
                    <td>Công việc phát sinh:</td>
                    <td colspan="4"><?php echo $row2['cv_phatsinh']; ?></td>
                </tr>
                    <?php } elseif ($gid == 9) {
                        $query2 = $conn->query("SELECT SUM(hs_huongtn_tangmoi_chi_atm) AS hshuongtntangmoichiatm, SUM(luot_huong_tctn_atm) AS luothuongtctnatm, SUM(hs_hotro_hocnghe) AS hshotrohocnghe, SUM(hs_baoluu_tgian_tn) AS hsbaoluutgiantn, SUM(hs_thuhoi_tn) AS hsthuhoitn, SUM(in_the_bhyt) AS in_the_bhyt, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $uid AND ngay_nhap BETWEEN '$tungay' AND '$denngay'");
                        $row2 = $query2->fetch(); ?>
                <td>Số hồ sơ hưởng TCTN tăng mới (chi qua ATM)</td>
                    <td></td>
                    <td><?php echo $row2['hshuongtntangmoichiatm']; ?></td>
                    <td rowspan="5"><?php echo $row2['cv_chuadatduoc']; ?></td>
                    <td rowspan="5"><?php echo $row2['ly_do']; ?></td>
                </tr>
                 <?php if ($uid != 29) { ?>
                <tr>
                    <td>Số hồ sơ đề nghị hưởng hỗ trợ học nghề: </td>
                    <td></td>
                    <td><?php echo $row2['hshotrohocnghe']; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Số lượt hưởng TCTN ( ATM):</td>
                    <td></td>
                    <td><?php echo $row2['luothuongtctnatm']; ?></td>
                </tr>
                <tr>
                    <td>Số hồ sơ bảo lưu thời gian thất nghiệp: </td>
                    <td></td>
                    <td><?php echo $row2['hsbaoluutgiantn']; ?></td>
                </tr>
                <?php if ($uid != 28) { ?>
                <tr>
                    <td>Số hồ sơ thu hồi, chấm dứt, tạm dừng, tiếp tục hưởng trong tháng:</td>
                    <td></td>
                    <td><?php echo $row2['hsthuhoitn']; ?></td>
                </tr>
                <?php } else { ?>
                <tr>
                    <td>In thẻ BHYT: (lượt người)</td>
                    <td></td>
                    <td><?php echo $row2['in_the_bhyt']; ?></td>
                </tr>
                <?php } ?>
                <?php if ($uid == 29) { ?>
                <tr>
                    <td>Số hồ sơ chấm dứt hưởng TCTN chuyển hưởng hưu</td>
                    <td></td>
                    <td><?php echo $row2['vanthu']; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Công việc phát sinh:</td>
                    <td colspan="4"><?php echo $row2['cv_phatsinh']; ?></td>
                </tr>
                    <?php }
                    }
                } ?>
        </tbody>
    </table>
</div>
<?php } else { ?>
    <h1 style="font-size:3em;color:red;margin-top:25%;text-align:center;">Ngày bắt đầu và kết thúc không nằm trong cùng 1 tuần</h1>
<?php } ?>
</body>
</html>