<?php
session_start();
require "../libs/config.php";
if (isset($_POST['bophan'])) {
$bophan = $_POST['bophan'];
$uid = $_POST['u'];
$tu_ngay = $_POST['tu_ngay'];
$den_ngay = $_POST['den_ngay']; ?>
<table class="table table-bordered">
    <thead class="bg-info text-white">
        <tr>
            <th>STT</th>
        <?php
        if ($bophan == 3 OR $bophan == 4 OR $bophan == 5) { ?>
            <th>Số HS tiếp nhận</th>
        <?php } ?>
<?php if ($bophan == 2) {}
        elseif ($bophan == 3) { ?>
            <th>Số HS sai phải điều chỉnh</th>
            <th>Báo cáo (định kì, đột xuất)</th>
            <th>Kiểm tra dữ liệu, chuyển chi trả</th>
            <th>Kiểm tra, chuyển dữ liệu 21AB sang kế toán, bưu điện (đợt/tuần)</th>
<?php } elseif ($bophan == 4) { ?>
            <th>Số HS xin ý kiến BHVN, Sở Lao động</th>
            <th>Bóc tách HS điều chỉnh</th>
<?php } elseif ($bophan == 5) { ?>
            <th>Báo cáo tổng hợp ÔĐ-TS (đột xuất, định kỳ)</th>
            <th>Tổng hợp số liệu chuyển kế toán</th>
            <th>Bóc tách HS</th>
<?php } elseif ($bophan == 6) { ?>
            <th>Bóc tách HS</th>
<?php } elseif ($bophan == 7) { ?>
            <th>Số quyết định thôi hưởng tuất</th>
            <th>Số lượng HS chuyển đến</th>
            <th>Số HS tăng</th>
            <th>Số HS điều chỉnh, thay đổi</th>
<?php } elseif ($bophan == 8) { ?>
            <th>Số HS tiếp nhận</th>
            <th>Tổng hợp chuyển số liệu 21AB</th>
<?php } elseif ($bophan == 9) { ?>
            <th>Số HS hưởng TCTN tăng mới (chi qua ATM)</th>
            <th>Số lượt hưởng TCTN ( ATM)</th>
            <th>Số HS đề nghị hưởng hỗ trợ học nghề</th>
            <th>Số HS bảo lưu thời gian thất nghiệp</th>
            <th>Số HS thu hồi, chấm dứt, tạm dừng, tiếp tục hưởng</th>
            <th>In thẻ BHYT (lượt người)</th>
<?php } if ($bophan != 6 && $bophan != 7) { ?>
            <th>CV đạt được</th>
            <th>CV chưa đạt được</th>
            <th>Lý do</th>
<?php } ?>
            <th>CV phát sinh</th>
            <th>Giai đoạn</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    if ($bophan == 2) {
        if ($tu_ngay == '' && $den_ngay == '') {
            $query = $conn->query("SELECT cv_phatsinh, ngay_nhap FROM data_hs WHERE uid = $uid");
        } else {
            $query = $conn->query("SELECT cv_phatsinh, ngay_nhap FROM data_hs WHERE uid = $uid AND ngay_nhap BETWEEN '$tu_ngay' AND '$den_ngay'");
        }
        while ($row = $query->fetch()) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['cv_phatsinh']; ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['ngay_nhap']), 'd/m/Y'); ?></td>
        </tr>
    <?php } } elseif ($bophan == 3) {
        if ($tu_ngay == '' && $den_ngay == '') {
            $query = $conn->query("SELECT themsl, hs_sai_dieuchinh, bao_cao, ktdl_chuyenchitra, kt_chuyendl21ab, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid");
        } else {
            $query = $conn->query("SELECT themsl, hs_sai_dieuchinh, bao_cao, ly_do, ktdl_chuyenchitra, kt_chuyendl21ab, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
        }
        while ($row = $query->fetch()) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['themsl']; ?></td>
            <td><?php echo $row['hs_sai_dieuchinh']; ?></td>
            <td><?php echo $row['bao_cao']; ?></td>
            <td><?php echo $row['ktdl_chuyenchitra']; ?></td>
            <td><?php echo $row['kt_chuyendl21ab']; ?></td>
            <td><?php echo $row['cv_datduoc']; ?></td>
            <td><?php echo $row['cv_chuadatduoc']; ?></td>
            <td><?php echo $row['ly_do']; ?></td>
            <td><?php echo $row['cv_phatsinh']; ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['tu_ngay']), 'd/m/Y'); ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['den_ngay']), 'd/m/Y'); ?></td>
        </tr>
    <?php } } elseif ($bophan == 4) {
        if ($tu_ngay == '' && $den_ngay == '') {
            $query = $conn->query("SELECT datahs_id, themsl, hs_xinykien_bhxhvn, boctach_dieuchinh, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid");
        } else {
            $query = $conn->query("SELECT datahs_id, themsl, hs_xinykien_bhxhvn, boctach_dieuchinh, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
        }
        while ($row = $query->fetch()) { ?>
        <tr>
            <td>
                <?php echo $i++; ?>
                <input type="hidden" name="usg" value="<?php echo $bophan; ?>" disabled>
                <input type="hidden" name="data" value="<?php echo $row['datahs_id']; ?>" disabled>
            </td>
            <td>
                <input type="number" name="themsl" class="form-control" value="<?php echo $row['themsl']; ?>" disabled>
            </td>
            <td>
                <input type="number" name="hs_xinykien_bhxhvn" class="form-control" value="<?php echo $row['hs_xinykien_bhxhvn']; ?>" disabled>
            </td>
            <td>
                <input type="number" name="hs_xinykien_bhxhvn" class="form-control" value="<?php echo $row['boctach_dieuchinh']; ?>" disabled>
            </td>
            <td>
                <input type="number" name="hs_xinykien_bhxhvn" class="form-control" value="<?php echo $row['cv_datduoc']; ?>" disabled>
            </td>
            <td>
                <input type="number" name="hs_xinykien_bhxhvn" class="form-control" value="<?php echo $row['cv_chuadatduoc']; ?>" disabled>
            </td>
            <td>
                <input type="number" name="hs_xinykien_bhxhvn" class="form-control" value="<?php echo $row['ly_do']; ?>" disabled>                
            </td>
            <td>
                <input type="number" name="hs_xinykien_bhxhvn" class="form-control" value="<?php echo $row['cv_phatsinh']; ?>" disabled>
            </td>
            <td>
                <?php echo DATE_FORMAT(new DateTime($row['tu_ngay']), 'd/m/Y').' - '.DATE_FORMAT(new DateTime($row['den_ngay']), 'd/m/Y'); ?>
            </td>
        </tr>
    <?php } } elseif ($bophan == 5) {
        if ($tu_ngay == '' && $den_ngay == '') {
            $query = $conn->query("SELECT themsl, baocao_odts, tonghop_ketoan, boctach_xdnh, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid");
        } else {
            $query = $conn->query("SELECT themsl, baocao_odts, tonghop_ketoan, boctach_xdnh, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
        }
        while ($row = $query->fetch()) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['themsl']; ?></td>
            <td><?php echo $row['baocao_odts']; ?></td>
            <td><?php echo $row['tonghop_ketoan']; ?></td>
            <td><?php echo $row['boctach_xdnh']; ?></td>
            <td><?php echo $row['cv_datduoc']; ?></td>
            <td><?php echo $row['cv_chuadatduoc']; ?></td>
            <td><?php echo $row['ly_do']; ?></td>
            <td><?php echo $row['cv_phatsinh']; ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['tu_ngay']), 'd/m/Y'); ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['den_ngay']), 'd/m/Y'); ?></td>
        </tr>
    <?php } } elseif ($bophan == 6) {
        if ($tu_ngay == '' && $den_ngay == '') {
            $query = $conn->query("SELECT boctach_xddh, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid");
        } else {
            $query = $conn->query("SELECT boctach_xddh, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
        }
        while ($row = $query->fetch()) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['boctach_xddh']; ?></td>
            <td><?php echo $row['cv_phatsinh']; ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['tu_ngay']), 'd/m/Y'); ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['den_ngay']), 'd/m/Y'); ?></td>
        </tr>
    <?php } } elseif ($bophan == 7) {
        if ($tu_ngay == '' && $den_ngay == '') {
            $query = $conn->query("SELECT sqd_thoihuongtuat, hs_chuyenden_qlc, hs_tang_trongthang, hs_thaydoi_trongthang, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid");
        } else {
            $query = $conn->query("SELECT sqd_thoihuongtuat, hs_chuyenden_qlc, hs_tang_trongthang, hs_thaydoi_trongthang, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
        }
        while ($row = $query->fetch()) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['sqd_thoihuongtuat']; ?></td>
            <td><?php echo $row['hs_chuyenden_qlc']; ?></td>
            <td><?php echo $row['hs_tang_trongthang']; ?></td>
            <td><?php echo $row['hs_thaydoi_trongthang']; ?></td>
            <td><?php echo $row['cv_phatsinh']; ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['tu_ngay']), 'd/m/Y'); ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['den_ngay']), 'd/m/Y'); ?></td>
        </tr>
    <?php } } elseif ($bophan == 8) {
        if ($tu_ngay == '' && $den_ngay == '') {
            $query = $conn->query("SELECT themsl, tonghop_21ab, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid");
        } else {
            $query = $conn->query("SELECT themsl, tonghop_21ab, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
        }
        while ($row = $query->fetch()) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['themsl']; ?></td>
            <td><?php echo $row['tonghop_21ab']; ?></td>
            <td><?php echo $row['cv_datduoc']; ?></td>
            <td><?php echo $row['cv_chuadatduoc']; ?></td>
            <td><?php echo $row['ly_do']; ?></td>
            <td><?php echo $row['cv_phatsinh']; ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['tu_ngay']), 'd/m/Y'); ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['den_ngay']), 'd/m/Y'); ?></td>
        </tr>
    <?php } } elseif ($bophan == 9) {
        if ($tu_ngay == '' && $den_ngay == '') {
            $query = $conn->query("SELECT hs_huongtn_tangmoi_chi_atm, luot_huong_tctn_atm, hs_hotro_hocnghe, hs_baoluu_tgian_tn, hs_thuhoi_tn, in_the_bhyt, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid");
        } else {
            $query = $conn->query("SELECT hs_huongtn_tangmoi_chi_atm, luot_huong_tctn_atm, hs_hotro_hocnghe, hs_baoluu_tgian_tn, hs_thuhoi_tn, in_the_bhyt, cv_datduoc, cv_chuadatduoc, ly_do, cv_phatsinh, tu_ngay, den_ngay FROM data_hs WHERE uid = $uid AND tu_ngay BETWEEN '$tu_ngay' AND '$den_ngay' AND den_ngay BETWEEN '$tu_ngay' AND '$den_ngay'");
        }
        while ($row = $query->fetch()) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['hs_huongtn_tangmoi_chi_atm']; ?></td>
            <td><?php echo $row['luot_huong_tctn_atm']; ?></td>
            <td><?php echo $row['hs_hotro_hocnghe']; ?></td>
            <td><?php echo $row['hs_baoluu_tgian_tn']; ?></td>
            <td><?php echo $row['hs_thuhoi_tn']; ?></td>
            <td><?php echo $row['in_the_bhyt']; ?></td>
            <td><?php echo $row['cv_datduoc']; ?></td>
            <td><?php echo $row['cv_chuadatduoc']; ?></td>
            <td><?php echo $row['ly_do']; ?></td>
            <td><?php echo $row['cv_phatsinh']; ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['tu_ngay']), 'd/m/Y'); ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($row['den_ngay']), 'd/m/Y'); ?></td>
        </tr>
    <?php } } ?>
        <?php if ($uid == $_SESSION['uid']) { ?>
        <tr class="edit">
            <td>
                <button class="btn btn-primary" name="update"><i class="fas fa-edit"></i> Sửa</button>
            </td>
        </tr>
            <?php } ?>
    </tbody>
</table>
<?php } elseif (isset($_POST['da_id'])) {
    $datahs_id = $_POST['da_id'];
    echo $datahs_id;
} ?>