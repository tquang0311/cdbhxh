<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đánh giá, xếp loại tháng</title>
    <style>
        *{margin:0;padding:0}
        body{padding:10px;font-size:1.2em;}
        .group{margin:10px;}
        span{font-style:italic;font-weight:normal;}
        h3{text-align:center;}
        table{margin:10px;font-size:0.9em;}
        th,td{padding:5px;}
        .group-name{font-weight:bold;}
        #footer span{font-style:normal;}
        .tick{padding:15px 20px;display:inline-block;width:20%;height:auto;margin:0;}
        .tick span{border:1px #000 solid;display:block;padding:5px 10px;margin:10px 20%;width:30%;text-align:center;}
        .headings{font-weight:bold;}
        p{padding:8px;}
        tr td:not(:nth-child(2)){text-align:center;}
        #main>p{padding-left:100px;}
    </style>
</head>
<body onload="window.print();">
<?php
require "libs/config.php";
$tu_ngay = $_POST['start-date'];
$den_ngay = $_POST['end-date'];
$u_id = $_SESSION['uid'];
$ythuc1 = $_POST['ythuc1'];
$ythuc2 = $_POST['ythuc2'];
$ythuckyluat = $ythuc1 + $ythuc2;
$tham_muu = $_POST['tham-muu'];
$xay_dung = $_POST['xay-dung'];
$kiem_tra = $_POST['kiem-tra'];
$to_chuc = $_POST['to-chuc'];
$bao_cao_kqnv = $_POST['bao-cao-kqnv'];
$thiet_lap = $_POST['thiet-lap'];
$phoi_hop = $_POST['phoi-hop'];
$sd_phanmem = $_POST['sd-phanmem'];
$van_ban = $_POST['van-ban'];
$nangluckynang = $tham_muu + $xay_dung + $kiem_tra + $to_chuc + $bao_cao_kqnv + $thiet_lap + $phoi_hop + $sd_phanmem + $van_ban;
$thuc_hien_nv = $_POST['thuc_hien_nv'];
$de_xuat = $_POST['de-xuat'];
$ghi_nhan = $_POST['ghi-nhan'];
$sang_tao = $_POST['sang-tao'];
$diemthuong = $de_xuat + $ghi_nhan + $sang_tao;
$tong_diem = $ythuckyluat + $nangluckynang + $thuc_hien_nv + $diemthuong;
    if ( $_SESSION['usg'] == 3 ) {
        $query = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(tra_lai) AS tonghstra, SUM(don_thu) AS tongdonthu, SUM(hs_sai_dieuchinh) AS hssaidieuchinh, SUM(bao_cao) AS baocao, SUM(ktdl_chuyenchitra) AS ktdlchuyenchitra, SUM(kt_chuyendl21ab) AS ktchuyendl21ab, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND ngay_nhap BETWEEN '$tu_ngay' AND '$den_ngay'");
    } elseif ( $_SESSION['usg'] == 4 ) {
        $query = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(tra_lai) AS tonghstra, SUM(don_thu) AS tongdonthu, SUM(hs_xinykien_bhxhvn) AS hsxinykienbhxhvn, SUM(boctach_dieuchinh) AS boctachdieuchinh, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND ngay_nhap BETWEEN '$tu_ngay' AND '$den_ngay'");
    } elseif ( $_SESSION['usg'] == 5 ) {
        $query = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(tra_lai) AS tonghstra, SUM(don_thu) AS tongdonthu, SUM(baocao_odts) AS baocaoodts, SUM(tonghop_ketoan) AS tonghopketoan, SUM(boctach_xdnh) AS boctach_xdnh, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND ngay_nhap BETWEEN '$tu_ngay' AND '$den_ngay'");
    } elseif ( $_SESSION['usg'] == 6 ) {
        $query = $conn->query("SELECT SUM(boctach_xddh) AS boctachxddh, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND ngay_nhap BETWEEN '$tu_ngay' AND '$den_ngay'");
    } elseif ( $_SESSION['usg'] == 7 ) {
        $query = $conn->query("SELECT SUM(sqd_thoihuongtuat) AS sqdthoihuongtuat, SUM(tonghop_qlc) AS tonghopqlc, SUM(hs_chuyenden_qlc) AS hschuyendenqlc, SUM(hs_tang_trongthang) AS hstangtrongthang, SUM(hs_thaydoi_trongthang) AS hsthaydoitrongthang, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND ngay_nhap BETWEEN '$tu_ngay' AND '$den_ngay'");
    } elseif ( $_SESSION['usg'] == 8 ) {
        $query = $conn->query("SELECT SUM(themsl) AS tonghsnhan, SUM(tonghop_21ab) AS tonghop21ab, SUM(van_thu) AS vanthu, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND ngay_nhap BETWEEN '$tu_ngay' AND '$den_ngay'");
    } elseif ( $_SESSION['usg'] == 9 ) {
        $query = $conn->query("SELECT SUM(hs_huongtn_tangmoi_chi_atm) AS hshuongtntangmoichiatm, SUM(luot_huong_tctn_atm) AS luothuongtctnatm, SUM(hs_hotro_hocnghe) AS hshotrohocnghe, SUM(hs_baoluu_tgian_tn) AS hsbaoluutgiantn, SUM(hs_thuhoi_tn) AS hsthuhoitn, SUM(in_the_bhyt) AS in_the_bhyt, SUM(cv_chuadatduoc) AS cv_chuadatduoc, GROUP_CONCAT(ly_do) AS ly_do, GROUP_CONCAT(cv_phatsinh) AS cv_phatsinh FROM data_hs WHERE uid = $u_id AND ngay_nhap BETWEEN '$tu_ngay' AND '$den_ngay'");
    }
    $row = $query->fetch();?>
<div class="group" id="header">
    <h4>PHÒNG CHẾ ĐỘ BHXH</h4>
    <h4>CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM<br/>Độc lập – Tự do – Hạnh phúc</h4>
</div>
<div id="main">
    <h3>PHIẾU ĐÁNH GIÁ, XẾP LOẠI HÀNG THÁNG<br/>
        <span>Tháng <?php echo $_POST['month'];?>/2019</span>
    </h3>
    <p>Họ và tên: <?php echo $_SESSION['fullname'];?></p>
    <p>Chức vụ: Chuyên viên</p>
    <table border="1">
        <thead>
            <tr>
                <th style="width:2%;">TT</th>
                <th style="width:48%;">Nội dung đánh giá</th>
                <th style="width:10%;">Điểm tối đa</th>
                <th style="width:10%;">Tồn tại</th>
                <th style="width:10%;">Điểm cá nhân tự chấm</th>
                <th style="width:10%;">Trưởng phòng/ban (và tương đương) đánh giá</th>
                <th style="width:10%;">Cấp có thẩm quyền đánh giá</th>
            </tr>
        </thead>
        <tbody>
            <tr class="headings">
                <td>I</td>
                <td>Ý THỨC TỔ CHỨC KỶ LUẬT</td>
                <td>20</td>
                <td></td>
                <td><?php echo $ythuckyluat;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Ý thức tổ chức kỷ luật; phẩm chất đạo đức; lối sống, tác phong, lề lối làm việc chuẩn mực, lành mạnh. Đoàn kết, thực hiện nguyên tắc tập trung dân chủ trong cơ quan, đơn vị</td>
                <td></td>
                <td></td>
                <td><?php echo $ythuc1;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Đơn vị xây dựng thang điểm chi tiết</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Thực hiện quy tắc ứng xử của cán bộ, công chức, viên chức, lao động hợp đồng trong các cơ quan thuộc thành phố Hà Nội</td>
                <td></td>
                <td></td>
                <td><?php echo $ythuc2;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Đơn vị xây dựng thang điểm chi tiết</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="headings">
                <td>II</td>
                <td>KẾT QUẢ THỰC HIỆN NHIỆM VỤ</td>
                <td>70</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="headings">
                <td>1</td>
                <td>Năng lực và kỹ năng</td>
                <td>20</td>
                <td></td>
                <td><?php echo $nangluckynang;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.1</td>
                <td>Chủ động nghiên cứu, cập nhật kịp thời các kiến thức pháp luật và chuyên môn nghiệp vụ để tham mưu, tổ chức thực hiện công việc có chất lượng</td>
                <td></td>
                <td></td>
                <td><?php echo $tham_muu;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.2</td>
                <td>Xây dựng kế hoạch công tác của các nhân rõ nội dung, tiến độ</td>
                <td></td>
                <td></td>
                <td><?php echo $xay_dung;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.3</td>
                <td>Triển khai, hướng dẫn, đôn đốc, kiểm tra các đơn vị, cá nhân liên quan trong thực hiện nhiệm vụ thuộc lĩnh vực tham mưu đạt hiệu quả</td>
                <td></td>
                <td></td>
                <td><?php echo $kiem_tra;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.4</td>
                <td>Tổ chức thực hiện nhiệm vụ, công việc theo đúng quy trình, quy định</td>
                <td></td>
                <td></td>
                <td><?php echo $to_chuc;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.5</td>
                <td>Báo cáo kịp thời, chính xác với lãnh đạo về tình hình, kết quả thực hiện nhiệm vụ được giao. Chủ động đề xuất tham mưu giải quyết công việc</td>
                <td></td>
                <td></td>
                <td><?php echo $bao_cao_kqnv;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.6</td>
                <td>Thiết lập hồ sơ công việc đầy đủ theo nội dung, công việc được phân công; lưu trữ hồ sơ, tài lệu đúng nguyên tắc </td>
                <td></td>
                <td></td>
                <td><?php echo $thiet_lap;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.7</td>
                <td>Chủ động giải quyết công việc và phối hợp tốt với các cá nhân, đơn vị có liên quan giải quyết công việc đạt hiệu quả</td>
                <td></td>
                <td></td>
                <td><?php echo $phoi_hop;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.8</td>
                <td>Sử dụng thành thạo các phần mềm, ứng dụng công nghệ thông tin đáp ứng yêu cầu công việc. Tham mưu chuẩn bị các nội dung, tài liệu, báo cáo…phục vụ cuộc họp hiệu quả</td>
                <td></td>
                <td></td>
                <td><?php echo $sd_phanmem;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.9</td>
                <td>Các văn bản ban hành thuộc lĩnh vực tham mưu đảm bảo đúng thể thức, quy trình, thủ tục, không có sai sót</td>
                <td></td>
                <td></td>
                <td><?php echo $van_ban;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="headings">
                <td>2</td>
                <td>Thực hiện nhiệm vụ theo kế hoạch, lịch công tác đảm bảo tiến độ, chất lượng</td>
                <td>50</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2.1</td>
                <td>Hoàn thành từ 90%-100% công việc theo kế hoạch, lịch công tác đảm bảo tiến độ và chất lượng</td>
                <td>45 -< 50</td>
                <td></td>
                <td><?php if ($thuc_hien_nv >= 45 AND $thuc_hien_nv <= 50 ) {
                    echo $thuc_hien_nv;
                } ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2.2</td>
                <td>Hoàn thành từ 80% đến dưới 90% công việc theo kế hoạch, lịch công tác đảm bảo tiến độ và chất lượng</td>
                <td>40 -< 45</td>
                <td></td>
                <td><?php if ($thuc_hien_nv >= 40 AND $thuc_hien_nv < 45 ) {
                    echo $thuc_hien_nv;
                } ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2.3</td>
                <td>Hoàn thành từ 70% - dưới 80% công việc theo kế hoạch, lịch công tác đảm bảo tiến độ và chất lượng</td>
                <td>35 -< 40</td>
                <td></td>
                <td><?php if ($thuc_hien_nv >= 35 AND $thuc_hien_nv < 40 ) {
                    echo $thuc_hien_nv;
                } ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2.4</td>
                <td>Hoàn thành dưới 70% công việc theo kế hoạch, lịch công tác đảm bảo tiến độ và chất lượng</td>
                <td>< 35</td>
                <td></td>
                <td><?php if ($thuc_hien_nv < 35 ) {
                    echo $thuc_hien_nv;
                } ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="headings">
                <td>*</td>
                <td>Tiêu chí đánh giá theo ví trí việc làm</td>
                <td>Được giao</td>
                <td>Đạt được</td>
                <td>Chưa đạt được</td>
                <td>Lý do</td>
                <td>Ghi chú</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Xét duyệt hồ sơ dài hạn:<br/>
                    - Số hồ sơ tiếp nhận (theo lượt giao dịch):
                    <?php if ($_SESSION['usg']==3) {echo $row['tonghsnhan'];}?><br/>
                    - Số hồ sơ trả lại: <?php if ($_SESSION['usg']==3) {echo $row['tonghstra'];}?><br/>
                    - Số lượng đơn thư phải trả lời:
                    <?php if ($_SESSION['usg']==3) {echo $row['tongdonthu'];}?><br/>
                    - Số hồ sơ sai phải điều chỉnh:
                    <?php if ($_SESSION['usg']==3) {echo $row['hssaidieuchinh'];}?><br/>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Xét duyệt hồ sơ ngắn hạn:<br/>
                    - Số hồ sơ tiếp nhận (theo lượng hồ sơ):
                    <?php if ($_SESSION['usg']==5) {echo $row['tonghsnhan'];}?><br/>
                    - Số hồ sơ trả lại:
                    <?php if ($_SESSION['usg']==5) {echo $row['tonghstra'];}?><br/>
                    - Số lượng đơn thư phải trả lời:
                    <?php if ($_SESSION['usg']==5) {echo $row['tongdonthu'];}?><br/>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Điều chỉnh các loại:<br/>
                    - Tổng số hồ sơ tiếp nhận (theo lượng hồ sơ):
                    <?php if ($_SESSION['usg']==4) {echo $row['tonghsnhan'];}?><br/>
                    - Số lượng đơn thư phải trả lời:
                    <?php if ($_SESSION['usg']==4) {echo $row['tongdonthu'];}?><br/>
                    - Số hồ sơ xin ý kiến BHVN, Sở LĐTBXH (hồ sơ vướng):
                    <?php if ($_SESSION['usg']==4) {echo $row['hsxinykienbhxhvn'];}?><br/>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Quản lý chi:<br/>
                    - Số hồ sơ tăng trong tháng:
                    <?php if ($_SESSION['usg']==7) {echo $row['hstangtrongthang'];}?><br/>
                    - Số hồ sơ điều chỉnh, thay đổi trong tháng:
                    <?php if ($_SESSION['usg']==7) {echo $row['hsthaydoitrongthang'];}?><br/>
                    - Số quyết định thôi hưởng tuất:
                    <?php if ($_SESSION['usg']==7) {echo $row['sqdthoihuongtuat'];}?><br/>
                    - Tổng hợp:<br/>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Giải quyết BH thất nghiệp:<br/>
                    - Số hồ sơ hưởng TCTN tăng mới:
                    <?php if ($_SESSION['usg']==9) {echo $row['hshuongtntangmoichiatm'];}?><br/>
                    - Số hồ sơ đề nghị hưởng hỗ trợ học nghề:
                    <?php if ($_SESSION['usg']==9) {echo $row['hshotrohocnghe'];}?><br/>
                    - Số lượt hưởng TCTN (tiền mặt, ATM):
                    <?php if ($_SESSION['usg']==9) {echo $row['luothuongtctnatm'];}?><br/>
                    - Số hồ sơ bảo lưu thời gian thất nghiệp:
                    <?php if ($_SESSION['usg']==9) {echo $row['hsbaoluutgiantn'];}?><br/>
                    - Số hồ sơ thu hồi, chấm dứt, tạm dừng, tiếp tục hưởng trong tháng:
                    <?php if ($_SESSION['usg']==9) {echo $row['hsthuhoitn'];}?><br/>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Hồ sơ chuyển đi, chuyển đến:<br/>
                    - Số lượng hồ sơ chuyển đến:
                    <?php if ($_SESSION['usg']==5) {echo $row['tonghsnhan'];}?><br/>
                    - Số lượng hồ sơ chuyển đi:
                    <?php if ($_SESSION['usg']==5) {echo $row['tonghsnhan'];}?><br/>
                    - Hồ sơ trả lại tỉnh:
                    <?php if ($_SESSION['usg']==5) {echo $row['tonghsnhan'];}?><br/>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Xác nhận giải quyết chế độ:<br/>
                    -Số lượng hồ sơ yêu cầu xác nhận (bao gồm cả tỉnh khác):<br/>
                    -Bảo lưu thất nghiệp (trước tháng 12/2012):<br/>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Báo cáo, tổng hợp:<br/>
                    - Báo cáo định kỳ:<br/>
                    - Báo cáo đột xuất:<br/>
                    - Tổng hợp số liệu chuyển các phần mềm:<br/>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Giao nhận, bóc tách, luân chuyển: X<br/>
                    - Tổng số hồ sơ:
                    <?php if ($_SESSION['usg']==5) {echo $row['tonghsnhan'];}?><br/>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Các công việc khác:
                <?php if ($_SESSION['usg']==5) {echo $row['tonghsnhan'];}?><br/>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Đơn vị xây dựng Quy định điểm trừ trong thực hiện nhiệm vụ</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="headings">
                <td>IV</td>
                <td>ĐIỂM THƯỞNG</td>
                <td>10</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Tham mưu, đề xuất giải pháp, mô hình mới đảm bảo chất lượng và tiến độ, được cấp có thẩm quyền phê duyệt</td>
                <td></td>
                <td></td>
                <td><?php echo $de_xuat;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Tham mưu có hiệu quả đối với các nhiệm vụ mới, khó, phức tạp theo phân công được lãnh đạo cơ quan, đơn vị ghi nhận</td>
                <td></td>
                <td></td>
                <td><?php echo $ghi_nhan;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Chủ động, sáng tạo, khoa học, cải tiến phương pháp làm việc, nâng cao hiệu quả công việc, có thành tích nổi bật</td>
                <td></td>
                <td></td>
                <td><?php echo $sang_tao;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="headings">
                <td></td>
                <td>Tổng điểm:</td>
                <td>100</td>
                <td></td>
                <td><?php echo $tong_diem;?></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<div id="footer">
    <h3>CÁ NHÂN TỰ XẾP LOẠI: <span>(Đánh dấu X vào một trong 04 ô tương ứng dưới đây):</span></h3>
    <div id="tick">
        <div class="tick">
            <span><?php if ($tong_diem > 90 AND $tong_diem <= 100) {
                echo "X";
            } else {
                echo "&nbsp;";
            } ?></span>
            Hoàn thành xuất sắc nhiệm vụ (Loại A) Từ 90 đến 100 điểm
        </div>
        <div class="tick">
            <span><?php if ($tong_diem > 70 AND $tong_diem <= 90) {
                echo "X";
            } else {
                echo "&nbsp;";
            } ?></span>
            Hoàn thành tốt nhiệm vụ (Loại B) Từ 70 đến ≤ 90 điểm
        </div>
        <div class="tick">
            <span><?php if ($tong_diem >= 50 AND $tong_diem <= 70) {
                echo "X";
            } else {
                echo "&nbsp;";
            } ?></span>
            Hoàn thành nhiệm vụ (Loại C) Từ 50 đến ≤ 70 điểm
        </div>
        <div class="tick">
            <span><?php if ($tong_diem < 50) {
                echo "X";
            } else {
                echo "&nbsp;";
            } ?></span>
            Không hoàn thành nhiệm vụ (Loại D) Dưới 50 điểm
        </div>
    </div>
    <div style="float:right;margin:15px 15% 30px auto;">
        <h4 style="text-align:center;">Người tự đánh giá<br/>
            <span><em>(Ký và ghi rõ họ tên)</em></span>
        </h4>
        <div style="margin:100px 0 20px;"><h3><?php echo $_SESSION['fullname']; ?></h3></div>
    </div>
    <div style="clear:both;width:500px;">
        <h4 style="display:inline;">* NHẬN XÉT, ĐÁNH GIÁ CỦA PHÓ TRƯỞNG PHÒNG:</h4>
        <div>
            <p>…………………………………………………………………………………………………………………………………………………………………………………………………………</p>
            <p>…………………………………………………………………………………………………………………………………………………………………………………………………………</p>
            <p>…………………………………………………………………………………………………………………………………………………………………………………………………………</p>
            <p>…………………………………………………………………………………………………………………………………………………………………………………………………………</p>
            <p>…………………………………………………………………………………………………………………………………………………………………………………………………………</p>
        </div>
        <h4 style="display:inline;">* NHẬN XÉT, ĐÁNH GIÁ CỦA TRƯỞNG PHÒNG:</h4>
        <div>
            <p>…………………………………………………………………………………………………………………………………………………………………………………………………………</p>
            <p>…………………………………………………………………………………………………………………………………………………………………………………………………………</p>
            <p>…………………………………………………………………………………………………………………………………………………………………………………………………………</p>
            <p>…………………………………………………………………………………………………………………………………………………………………………………………………………</p>
            <p>…………………………………………………………………………………………………………………………………………………………………………………………………………</p>
        </div>
        <div style="display:inline;">
            <h4 style="padding:8px;">Kết luận: <span>Xếp loại: …………………………………………</span></h4>
        </div>
    </div>
    <div style="float:right;margin:15px 15% 30px auto;">
        <h4 style="text-align:center;">
            <span><em>Ngày …… tháng …… năm 2019</em></span><br/>TRƯỞNG PHÒNG
        </h4>
        <div style="margin:100px 0 20px;"><h3>Dương Thị Minh Châu</h3></div>
    </div>
</div>
</body>
</html>