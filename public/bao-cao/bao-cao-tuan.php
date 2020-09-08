<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Báo cáo tuần</title>
    <style>
        *{margin:0;padding:0}
        body>div{margin:10px 30px;padding:10px;}
        #header,#container,#footer{padding: 10px;}
        h1{text-align:center;font-size:1.5em;}
        #header>h2{text-align:center;font-size:1.2em;}
        thead{font-size:0.7em;}
        tbody{font-size:0.8em;}
        p{font-size:1.1em;}
        th,td{padding:3px;}
        td:nth-child(n+2){text-align:center;}
        .group_name{font-weight:bold;}
        span{font-style:italic;font-weight:normal;display:block;}
    </style>
    <style media="print">
        h1 {display:none;}
    </style>
</head>
<body onload="window.print();">
<?php
error_reporting(0);
    $bophan = $_POST['bophan'];
    $tu_ngay = DATE_FORMAT(new DateTime($_POST['tu_ngay']), 'd/m');
    $den_ngay = DATE_FORMAT(new DateTime($_POST['den_ngay']), 'd/m');
    $name = mb_strtoupper($_POST['name']);
    if ($bophan == 3 OR $bophan == 4 OR $bophan == 5) {
        $hsnhan = $_POST['hsnhan'];
        $hstra = $_POST['hstra'];
        $donthu = $_POST['donthu'];
    }
    if ($bophan == 3) {
        $hssai_dc = $_POST['hssai_dc'];
        $baocao = $_POST['baocao'];
        $ktdlchuyenchitra = $_POST['ktdlchuyenchitra'];
        $ktchuyendl21ab = $_POST['ktchuyendl21ab'];
    }
    if ($bophan == 4) {
        $hsxinykienbhxhvn = $_POST['hsxinykienbhxhvn'];
        $boctachdieuchinh = $_POST['boctachdieuchinh'];
    }
    if ($bophan == 5) {
        $baocaoodts = $_POST['baocaoodts'];
        $tonghopketoan = $_POST['tonghopketoan'];
        $boctach_xdnh = $_POST['boctach_xdnh'];
    }
    if ($bophan == 6) {
        $boctachxddh = $_POST['boctachxddh'];
        $u = $_POST['u'];
    }
    if ($bophan == 7) {
        $sqdthoihuongtuat = $_POST['sqdthoihuongtuat'];
        $tonghopqlc = $_POST['tonghopqlc'];
        $hschuyendenqlc = $_POST['hschuyendenqlc'];
        $hstangtrongthang = $_POST['hstangtrongthang'];
        $hsthaydoitrongthang = $_POST['hsthaydoitrongthang'];
    }
    if ($bophan == 8) {
        $hsnhan = $_POST['hsnhan'];
        $tonghop21ab = $_POST['tonghop21ab'];
        $vanthu = $_POST['vanthu'];
    }
    if ($bophan == 9) {
        $hshuongtntangmoichiatm = $_POST['hshuongtntangmoichiatm'];
        $luothuongtctnatm = $_POST['luothuongtctnatm'];
        $hshotrohocnghe = $_POST['hshotrohocnghe'];
        $hsbaoluutgiantn = $_POST['hsbaoluutgiantn'];
        $hsthuhoitn = $_POST['hsthuhoitn'];
        $in_the_bhyt = $_POST['in_the_bhyt'];
    }
    $cv_chuadatduoc = $_POST['cv_chuadatduoc'];
    $lydo = $_POST['lydo'];
    $cvphatsinh = $_POST['cvphatsinh'];
    $weeka = date('W', strtotime($_POST['tu_ngay']));
    $weekb = date('W', strtotime($_POST['den_ngay']));
if ($weeka == $weekb) {
    require "libs/config.php";?>
<h1>BÁO CÁO CÔNG VIỆC THEO TUẦN</h1>
<div>
    <div id='header'>
        <h2>Báo cáo kết quả thực hiện công việc của cán bộ, viên chức, LĐHĐ</h2>
        <h2><i>Tuần thứ: <?php echo $weeka." từ ngày ".$tu_ngay." đến ngày ".$den_ngay; ?></i></h2>
        <div><p><b>Họ tên cán bộ:</b> <?php echo $name; ?></p></div>
    </div>
    <div id='container'>
        <table border="1">
            <thead>
                <tr>
                    <th style="width: 40%;">Các nhiệm vụ chính</th>
                    <th style="width: 10%;">Công việc được giao <span>(lượt giao dịch/hồ sơ)</span></th>
                    <th style="width: 10%;">Kết quả đạt được trong tuần <span>(lượt giao dịch/hồ sơ)</span></th>
                    <th style="width: 10%;">Công việc chưa đạt được <span>(lượt giao dịch/hồ sơ)</span></th>
                    <th style="width: 30%;">Lý do</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="group_name">I - Bộ phận xét duyệt dài hạn:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ tuần trước chuyển sang:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ tiếp nhận trong tuần (theo lượt giao dịch):</td>
                    <td><?php if($bophan == 3){echo $hsnhan;} ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ trả lại:</td>
                    <td></td>
                    <td><?php if($bophan == 3){echo $hstra;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số lượng đơn thư phải trả lời:</td>
                    <td></td>
                    <td><?php if($bophan == 3){echo $donthu;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ sai phải điều chỉnh: (Lệch Dữ liệu TST):</td>
                    <td></td>
                    <td><?php if($bophan == 3){echo $hssai_dc;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Báo cáo (định kì, đột xuất):</td>
                    <td></td>
                    <td><?php if($bophan == 3){echo $baocao;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kiểm tra dữ liệu, chuyển chi trả:</td>
                    <td></td>
                    <td><?php if($bophan == 3){echo $ktdlchuyenchitra;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kiểm tra, chuyển dữ liệu 21AB sang kế toán, bưu điện (đợt/tuần):</td>
                    <td></td>
                    <td><?php if($bophan == 3){echo $ktchuyendl21ab;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Công việc chưa đạt được:</td>
                    <td></td>
                    <td></td>
                    <td><?php if($bophan == 3){echo $cv_chuadatduoc;} ?></td>
                    <td><?php if($bophan == 3){echo $lydo;} ?></td>
                </tr>
                <tr>
                    <td>Công việc phát sinh:</td>
                    <td colspan="3"><?php if($bophan == 3){echo $cvphatsinh;} ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="group_name">II- Bộ phận xét duyệt ngắn hạn:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ tuần trước chuyển sang:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số tiếp nhận ( theo lượng hồ sơ):</td>
                    <td><?php if($bophan == 5){echo $hsnhan;} ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ trả lại:</td>
                    <td></td>
                    <td><?php if($bophan == 5){echo $hstra;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số lượng đơn thư phải trả lời:</td>
                    <td></td>
                    <td><?php if($bophan == 5){echo $donthu;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Báo cáo tổng hợp ÔĐ-TS (đột xuất, định kỳ):</td>
                    <td></td>
                    <td><?php if($bophan == 5){echo $baocaoodts;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tổng hợp số liệu chuyển kế toán:</td>
                    <td></td>
                    <td><?php if($bophan == 5){echo $tonghopketoan;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Bóc tách hồ sơ:</td>
                    <td></td>
                    <td><?php if($bophan == 5){echo $boctach_xdnh;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Công việc chưa đạt được:</td>
                    <td></td>
                    <td></td>
                    <td><?php if($bophan == 5){echo $cv_chuadatduoc;} ?></td>
                    <td><?php if($bophan == 5){echo $lydo;} ?></td>
                </tr>
                <tr>
                    <td>Công việc phát sinh:</td>
                    <td colspan="3"><?php if($bophan == 5){echo $cvphatsinh;} ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="group_name">III - Bộ phận điều chỉnh:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ tuần trước chuyển sang:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ tiếp nhận ( theo lượt giao dịch):</td>
                    <td><?php if($bophan == 4){echo $hsnhan;} ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số đơn thư phải trả lời:</td>
                    <td></td>
                    <td><?php if($bophan == 4){echo $donthu;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ phải xin ý kiến BHVN, Sở Lao động:</td>
                    <td></td>
                    <td><?php if($bophan == 4){echo $hsxinykienbhxhvn;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ trả lại:</td>
                    <td></td>
                    <td><?php if($bophan == 4){echo $hstra;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Bóc tách hồ sơ điều chỉnh:</td>
                    <td></td>
                    <td><?php if($bophan == 4){echo $boctachdieuchinh;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Công việc chưa đạt được:</td>
                    <td></td>
                    <td></td>
                    <td><?php if($bophan == 4){echo $cv_chuadatduoc;} ?></td>
                    <td><?php if($bophan == 4){echo $lydo;} ?></td>
                </tr>
                <tr>
                    <td>Công việc phát sinh:</td>
                    <td colspan="3"><?php if($bophan == 4){echo $cvphatsinh;} ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="group_name">IV- Quản lý chi:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ tăng trong tháng:</td>
                    <td></td>
                    <td><?php if($bophan == 7){echo $hstangtrongthang;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ điều chỉnh, thay đổi trong tháng:</td>
                    <td></td>
                    <td><?php if($bophan == 7){echo $hsthaydoitrongthang;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số quyết định thôi hưởng tuất:</td>
                    <td></td>
                    <td><?php if($bophan == 7){echo $sqdthoihuongtuat;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tổng hợp:</td>
                    <td></td>
                    <td><?php if($bophan == 7){echo $tonghopqlc;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số lượng hồ sơ chuyển đến:</td>
                    <td></td>
                    <td><?php if($bophan == 7){echo $hschuyendenqlc;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Công việc chưa đạt được:</td>
                    <td></td>
                    <td></td>
                    <td><?php if($bophan == 7){echo $cv_chuadatduoc;} ?></td>
                    <td><?php if($bophan == 7){echo $lydo;} ?></td>
                </tr>
                <tr>
                    <td>Công việc phát sinh:</td>
                    <td colspan="3"><?php if($bophan == 7){echo $cvphatsinh;} ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="group_name">V- Thất nghiệp</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ hưởng TCTN tăng mới: (hình thức chi qua ATM)</td>
                    <td></td>
                    <td><?php if($bophan == 9){echo $hshuongtntangmoichiatm;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ đề nghị hưởng hỗ trợ học nghề:</td>
                    <td></td>
                    <td><?php if($bophan == 9){echo $hshotrohocnghe;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số lượt hưởng TCTN ( ATM):</td>
                    <td></td>
                    <td><?php if($bophan == 9){echo $luothuongtctnatm;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ bảo lưu thời gian thất nghiệp:</td>
                    <td></td>
                    <td><?php if($bophan == 9){echo $hsbaoluutgiantn;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số hồ sơ thu hồi, chấm dứt, tạm dừng, tiếp tục hưởng:</td>
                    <td></td>
                    <td><?php if($bophan == 9){echo $hsthuhoitn;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>In thẻ BHYT (lượt người):</td>
                    <td></td>
                    <td><?php if($bophan == 9){echo $in_the_bhyt;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Công việc chưa đạt được:</td>
                    <td></td>
                    <td></td>
                    <td><?php if($bophan == 9){echo $cv_chuadatduoc;} ?></td>
                    <td><?php if($bophan == 9){echo $lydo;} ?></td>
                </tr>
                <tr>
                    <td>Công việc phát sinh:</td>
                    <td colspan="3"><?php if($bophan == 9){echo $cvphatsinh;} ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="group_name">VI- Hồ sơ chuyển đi, chuyển đến:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số lượng hồ sơ chuyển đến, đi tuần trước chuyển sang:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Số lượng hồ sơ chuyển đến, đi tiếp nhận trong tuần:</td>
                    <td><?php if($bophan == 8){echo $hsnhan;} ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tổng hợp chuyển số liệu 21AB:</td>
                    <td></td>
                    <td><?php if($bophan == 8){echo $tonghop21ab;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Công tác văn thư của phòng</td>
                    <td></td>
                    <td><?php if($bophan == 8){echo $vanthu;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Công việc chưa đạt được:</td>
                    <td></td>
                    <td></td>
                    <td><?php if($bophan == 8){echo $cv_chuadatduoc;} ?></td>
                    <td><?php if($bophan == 8){echo $lydo;} ?></td>
                </tr>
                <tr>
                    <td>Công việc phát sinh</td>
                    <td colspan="3"><?php if($bophan == 8){echo $cvphatsinh;} ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="group_name">VII- Bộ phận giao nhận, bóc tách:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Bóc tách hồ sơ:</td>
                    <td></td>
                    <td><?php if($bophan == 6){echo $boctachxddh;} ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Công việc phát sinh:</td>
                    <td colspan="3"><?php if($bophan == 6){echo $cvphatsinh;} ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Luân chuyển hồ sơ hàng ngày:</td>
                    <td colspan="3"><?php if($bophan == 6){
                        if ($u == 32 OR $u == 34) {
                            echo 'X';
                    } } ?></td>
                    <td></td>
                </tr>              
            </tbody>
        </table>
    </div>
</div>
<?php } else { ?>
    <h1 style="font-size:3em;color:red;margin-top:25%;">Ngày bắt đầu và kết thúc không nằm trong cùng 1 tuần</h1>
<?php } ?>
</body>
</html>