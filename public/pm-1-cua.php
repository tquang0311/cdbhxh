<?php require('header.php');

$thutucs = array(
    0 => array(
        'ten_cdgq' => 'ODTS',
        'ten_ko_dau' => 'odts',
        'list_mathutuc' => array('630','630a','630b','630c','30101/HNO')
    ),
    1 => array(
        'ten_cdgq' => 'Hưu trí',
        'ten_ko_dau' => 'huutri',
        'list_mathutuc' => array('30502/HNO','30601/HNO','30602/HNO')
    ),
    2 => array(
        'ten_cdgq' => 'TNLĐ, BNN',
        'ten_ko_dau' => 'tnld_bnn',
        'list_mathutuc' => array('30402/HNO','30302/HNO')
    ),
    3 => array(
        'ten_cdgq' => '613',
        'ten_ko_dau' => 'hs613',
        'list_mathutuc' => array('312/HNO')
    ),
    4 => array(
        'ten_cdgq' => 'Điều chỉnh',
        'ten_ko_dau' => 'dieuchinh',
        'list_mathutuc' => array('31501a/HNO','31501b/HNO','31502a/HNO','31502b/HNO','31501a1/HNO','31502a1/HNO','31502b1/HNO')
    ),
    5 => array(
        'ten_cdgq' => 'Chuyển đi, chuyển đến',
        'ten_ko_dau' => 'chuyenden',
        'list_mathutuc' => array('31103/HNO','31101/HNO')
    ),
    6 => array(
        'ten_cdgq' => 'Thất nghiệp',
        'ten_ko_dau' => 'thatnghiep',
        'list_mathutuc' => array('317/HNO')
    ),
    7 => array(
        'ten_cdgq' => 'Khác (RUT)',
        'ten_ko_dau' => 'khac',
        'list_mathutuc' => array('R315/HNO','308/HNO')
    )
);

$canboxuly1 = array(
    0 => array(
        'id' => 45676,
        'ten' => 'Nguyễn Vũ Trinh Đông'
    ),
    1 => array(
        'id' => 45345,
        'ten' => 'Vũ Thanh Hà'
    ),
    2 => array(
        'id' => 45751,
        'ten' => 'Phạm Thị Kim Hoa'
    ),
    3 => array(
        'id' => 44688,
        'ten' => 'Vũ Thị Thùy Linh'
    ),
    4 => array(
        'id' => 45693,
        'ten' => 'Hoàng Mai Anh'
    ),
    5 => array(
        'id' => 44606,
        'ten' => 'Hoàng Thị Tuyết Mai'
    ),
    6 => array(
        'id' => 44408,
        'ten' => 'Nguyễn Kỳ Quân'
    ),
    7 => array(
        'id' => 45176,
        'ten' => 'Trương Tiến Quang'
    ),
    8 => array(
        'id' => 45290,
        'ten' => 'Hồ Thanh Tùng'
    ),
    9 => array(
        'id' => 44205,
        'ten' => 'Kiều Công Toại'
    ),
    10 => array(
        'id' => 45657,
        'ten' => 'Lê Hồng Hà'
    ),
    11 => array(
        'id' => 44386,
        'ten' => 'Nguyễn Thị Hạnh'
    ),
    12 => array(
        'id' => 44658,
        'ten' => 'Đỗ Thị Huế'
    ),
    13 => array(
        'id' => 44963,
        'ten' => 'Phạm Thị Thu Hương'
    ),
    14 => array(
        'id' => 44699,
        'ten' => 'Trần Diệu Hương'
    ),
    15 => array(
        'id' => 45143,
        'ten' => 'Phạm Thị Khánh Linh'
    ),
    16 => array(
        'id' => 45195,
        'ten' => 'Lê Mỹ Hạnh'
    ),
    17 => array(
        'id' => 45029,
        'ten' => 'Nguyễn Thuỳ Nhung'
    ),
    18 => array(
        'id' => 45419,
        'ten' => 'Lê Thị Oanh'
    ),
    19 => array(
        'id' => 44363,
        'ten' => 'Nguyễn Huy Sơn'
    ),
    20 => array(
        'id' => 44981,
        'ten' => 'Nguyễn Phương Thanh'
    ),
    21 => array(
        'id' => 45481,
        'ten' => 'Nguyễn Thị Mai Trúc'
    )
);
//print_r($canboxuly);
//die();
$canboxuly = array('Hồ Thanh Tùng','Hoàng Thị Tuyết Mai','Nguyễn Huy Sơn','Nguyễn Thị Hạnh','Phạm Thị Thu Hương','Nguyễn Phương Thanh','Nguyễn Thuỳ Nhung','Kiều Công Toại','Phạm Thị Kim Hoa','Nguyễn Vũ Trinh Đông','Phạm Thị Khánh Linh','Lê Hồng Hà','Trần Diệu Hương','Hoàng Mai Anh','Đỗ Thị Huế','Nguyễn Kỳ Quân','Vũ Thanh Hà','Nguyễn Thị Mai Trúc','Nguyễn Thị Thuý Hằng','Nguyễn Mạnh Tuân','Vũ Thị Thuỳ Linh','Lê Mỹ Hạnh','Thái Tân Cương','Lê Thị Oanh','Trương Tiến Quang');

$list_macqbhxh = array('001','00101','00102','00103','00104','00105','00106','00107','00108','00109','00110','00111','00112','00113','00114','00115','00116','00117','00118','00119','00120','00121','00122','00123','00124','00125','00126','00127','00128','00129','00131');
$list_IdCqbhxh = array(3921,4823,4824,3936,3938,3940,3941,3942,3943,3944,3945,3946,3947,3948,3949,3950,3952,4741,4742,4743,4744,4745,4746,4747,4748,4749,4750,4751,4752,4753,4954);
$list_tencqbhxh = array('Phòng TN & TKQ TTHC','BHXH Quận Ba Đình','BHXH Quận Hoàn Kiếm','BHXH Quận Tây Hồ','BHXH Quận Long Biên','BHXH Quận Cầu Giấy','BHXH Quận Đống Đa','BHXH Quận Hai Bà Trưng','BHXH Quận Hoàng Mai','BHXH Quận Thanh Xuân','BHXH Huyện Sóc Sơn','BHXH Huyện Đông Anh','BHXH Huyện Gia Lâm','BHXH Quận Nam Từ Liêm','BHXH Huyện Thanh Trì','BHXH Quận Hà Đông','BHXH Thị xã Sơn Tây','BHXH Huyện Ba Vì','BHXH Huyện Phúc Thọ','BHXH Huyện Đan Phượng','BHXH Huyện Hoài Đức','BHXH Huyện Quốc Oai','BHXH Huyện Thạch Thất','BHXH Huyện Chương Mỹ','BHXH Huyện Thanh Oai','BHXH Huyện Thường Tín','BHXH Huyện Phú Xuyên','BHXH Huyện Ứng Hòa','BHXH Huyện Mỹ Đức','BHXH Huyện Mê Linh','BHXH Quận Bắc Từ Liêm');
$listCqbhxh = array_combine($list_IdCqbhxh, $list_tencqbhxh);
$pageSize = array('10','30','50','100','200','350','500');
?>
<fieldset style="position:relative;" class="border border-info my-1">
    <legend class="w-auto mx-3" style="font-size:1.5rem;">
        <label class="col-form-label">Tìm kiếm hồ sơ:</label>
        <button class="btn btn-info mx-2 text-light" type="button" data-toggle="collapse" data-target="#formsearchTNHS" aria-expanded="false" aria-controls="formsearchTNHS">
            <span><i class="fas fa-caret-up"></i></span>
        </button>
    </legend>
    <span style="position:absolute;top:0;right:1%;background:#fff;" class="border rounded p-2 justify-content-end">Đã chọn: <b class="countchecked">0</b> HS</span>
    <div class="container-fluid mt-1 mb-2 form_search collapse show" id="formsearchTNHS">
        <form method="GET" autocomplete="off">
            <!--<div class="row">
              <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"></a>
                  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                </div>
              </div>
              <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                </div>
              </div>
            </div>-->
            <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                    <div class="input-group border rounded">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Trạng thái HS</span>
                        </div>
                        <div class="m-0 pl-2 pt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <?php if (isset($_GET['pagesize'])) { ?>
                                    <input type="hidden" name="pagesize" value="<?=$_GET['pagesize'];?>">
                                <?php } ?>
                                <input type="radio" id="chothuly" name="trangthaixuly" class="custom-control-input" value="1" checked>
                                <label class="custom-control-label" for="chothuly">Chờ thụ lý</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dangthuly" name="trangthaixuly" class="custom-control-input" value="2"
                                <?php if (isset($_GET['trangthaixuly']) && $_GET['trangthaixuly']==2) { echo "checked"; } ?>>
                                <label class="custom-control-label" for="dangthuly">Đang thụ lý</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="chotaobienban" name="trangthaixuly" class="custom-control-input" value="3"
                                <?php if (isset($_GET['trangthaixuly']) && $_GET['trangthaixuly']==3) { echo "checked"; } ?>>
                                <label class="custom-control-label" for="chotaobienban">Chờ tạo BB</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 cho_dang_thu_ly">
                    <div class="input-group border rounded">
                        <div class="input-group-prepend">
                            <span class="input-group-text">XLHS</span>
                        </div>
                        <div class="m-0 p-2">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="hosodunghan" name="hosodunghan" class="custom-control-input"
                                <?php if (isset($_GET['hosodunghan'])) { echo "checked"; } ?>>
                                <label class="custom-control-label" for="hosodunghan">Đúng hạn</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="hososapdenhan" name="hososapdenhan" class="custom-control-input"
                                <?php if (isset($_GET['hososapdenhan'])) { echo "checked"; } ?>>
                                <label class="custom-control-label" for="hososapdenhan">Cảnh báo</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="hosoxulymuon" name="hosoxulymuon" class="custom-control-input"
                                <?php if (isset($_GET['hosoxulymuon'])) { echo "checked"; } ?>>
                                <label class="custom-control-label" for="hosoxulymuon">Muộn</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cán bộ xử lý</span>
                        </div>
                        <select name="cbxl" class="custom-select">
                            <option value="">Tất cả</option>
                            <?php foreach ($canboxuly as $cbxl) { ?>
                                <option value="<?=$cbxl;?>"
                                <?php if (isset($_GET['cbxl']) && $_GET['cbxl'] == $cbxl) { echo "selected"; } ?>><?=$cbxl;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Chế độ giải quyết</span>
                        </div>
                        <select name="thutuc" class="custom-select">
                            <option value="">Tất cả</option>
                            <?php foreach ($thutucs as $thutuc) { ?>
                                <option value="<?php echo $mathutuc = implode(',', $thutuc['list_mathutuc']);?>"
                                <?php if (isset($_GET['thutuc']) && $_GET['thutuc'] == $mathutuc) { echo "selected"; } ?>><?=$thutuc['ten_cdgq'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cơ quan tổ chức</span>
                        </div>
                        <input type="text" id="cqbhxh" class="form-control" name="cqbhxh_ten" placeholder="Nhập tên cơ quan BHXH, mỗi tên cơ quan tách nhau bằng dấu chấm phẩy ;"
                        value="<?php if (isset($_GET['cqbhxh_ten'])) { echo $_GET['cqbhxh_ten']; } ?>">
                        <input type="hidden" id="listIdCqbhxh" name="cqbhxh"
                        <?php if (isset($_GET['cqbhxh'])) { echo "value=".$_GET['cqbhxh']; } ?>>
                        <!--<select name="cqbhxh" class="custom-select">
                            <?php foreach ($listCqbhxh as $Id => $cqbhxh) { ?>
                                <option value="<?=$Id;?>"
                                <?php if (isset($_GET['cqbhxh']) && $_GET['cqbhxh'] == $Id) {
                                    echo "selected";
                                } ?>><?=$cqbhxh;?></option>
                            <?php } ?>
                        </select>-->
                    </div>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Số HS</span>
                        </div>
                        <textarea class="form-control" rows="1" name="so_hs" id="So_HS" placeholder="Nhập dãy số trước dấu / đầu tiên của số hồ sơ, có thể tìm kiếm nhiều số hồ sơ cùng lúc, mỗi số hồ sơ tách nhau bằng dấu chấm phẩy ;"><?php if (isset($_GET['so_hs'])) { echo $_GET['so_hs']; } ?></textarea>
                    </div>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <button class="btn btn-primary w-100 h-100" name="search" title="Tìm kiếm"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</fieldset>
<?php
if (isset($_GET['search'])) {
    require('../module/pm_1_cua/get_data.php');
    /* foreach ($Hosos->lists as $list) {
        echo $list.'<br/>';
        foreach ($Hosos->hosos[$list] as $hs) {
            echo $hs->mathutuc.'<br/>';
        }
    } */
    //die();
?>
    <div class="container-fluid border-top pt-1 mt-2 viewOption">
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 border pt-1">
                Tìm thấy: <b><?=$Hosos->totalcount;?></b> bản ghi
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Sắp xếp theo</span>
                    </div>
                    <select id="sortBy" class="custom-select">
                        <option value="default">Mặc định</option>
                        <option value="cdgq"
                        <?php if (isset($_GET['sortBy']) && $_GET['sortBy']=='cdgq') { echo "selected"; } ?>>Chế độ giải quyết</option>
                        <option value="cbxl"
                        <?php if (isset($_GET['sortBy']) && $_GET['sortBy']=='cbxl') { echo "selected"; } ?>>Cán bộ xử lý</option>
                        <option value="noinhanhs"
                        <?php if (isset($_GET['sortBy']) && $_GET['sortBy']=='noinhanhs') { echo "selected"; } ?>>Nơi nhận hồ sơ</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Số bản ghi/Trang</span>
                    </div>
                    <select id="pageSize" class="custom-select">
                        <?php foreach ($pageSize as $ps) { ?>
                            <option value='<?=$ps;?>'
                            <?php if (isset($_GET['pagesize']) && $_GET['pagesize']==$ps) { echo "selected"; } ?>><?=$ps;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                Phân trang
            </div>
        </div>
    </div>

    <div class="container-fluid mt-2" id="dataHosos">
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <thead class="bg-info text-light">
                    <th>STT</th>
                    <th>
                        <input type="checkbox" onclick="checkall('hs', this);checkallByClass('checkallChild', this);" >
                    </th>
                    <th>XLHS</th>
                    <th>SỐ HỒ SƠ</th>
                    <th>ĐƠN VỊ</th>
                    <th>CHẾ ĐỘ GIẢI QUYẾT</th>
                    <th>CBXL</th>
                </thead>
                <tbody>
                <?php
                //print_r($Hosos->hosos);
        /*foreach ($Hosos->lists as $list) {
            echo $list.'<br/>';
            foreach ($Hosos->hosos[$list] as $hs) {
                echo $hs->mathutuc.'<br/>';
            }
        }*/
            foreach ($Hosos->lists as $keyofList => $list) {
                if ($list!='default') { ?>
                    <tr>
                        <td colspan="7" class="text-left">
                            <button class="btn btn-primary m-0 py-1 px-2" type="button" data-toggle="collapse" data-target=".hs1cua-<?=$keyofList;?>0" aria-expanded="false" aria-controls="hs1cua">
                                <span><i class="fas fa-caret-down"></i></span> <?=$list." (".count($Hosos->hosos[$list]).")";?>
                            </button>
                            <div class="custom-control custom-switch custom-control-inline m-0 px-5 pt-1">
                              <input type="checkbox" class="custom-control-input checkallChild" id="hs1cua-<?=$keyofList;?>" onclick="checkallByClass('hs1cua-<?=$keyofList;?>', this);">
                              <label class="custom-control-label" for="hs1cua-<?=$keyofList;?>">Chọn hết</label>
                            </div>
                        </td>
                    </tr>
                <?php }
                $i = 1;
                foreach ($Hosos->hosos[$list] as $hs) {
                    if ($hs->trangthaimau==0) {
                        $xlhs = 'Muộn';
                        $textColor = 'danger';
                    } elseif ($hs->trangthaimau==1) {
                        $xlhs = 'Đúng hạn';
                        $textColor = 'success';
                    } elseif ($hs->trangthaimau==2) {
                        $xlhs = 'Cảnh báo';
                        $textColor = 'warning';
                    }
                    foreach ($thutucs as $key => $thutuc) {
                        if (in_array($hs->mathutuc, $thutuc['list_mathutuc'])) {
                            $index = $key;
                        }
                    }
                    ?>
                    <tr class="collapse show hs1cua-<?=$keyofList;?>0">
                        <td><?=$i++;?></td>
                        <td>
                            <input type="checkbox" name='hs[]' class="hs1cua-<?=$keyofList;?>" data-macq="<?=$hs->macoquan;?>" data-buoc="<?=$hs->buocthucte;?>" data-ttxl="<?=$hs->dmtrangthaixulyid;?>" value="<?=$hs->id;?>">
                        </td>
                        <td class="text-<?=$textColor;?> font-weight-bold"><?=$xlhs;?></td>
                        <td class="sohs"><a href="https://tnhs.baohiemxahoi.gov.vn/#/chi-tiet-ho-so-cho-thu-ly?id=<?=$hs->hosoxulyid;?>" target="_blank"><?=$hs->sohoso;?></a></td>
                        <td>
                            <?=$hs->tendonvi;?>
                            <?php $hs->madonvi != null ? $ma_dv = ' - '.$hs->madonvi : $ma_dv = null;
                            echo $ma_dv; ?>
                        </td>
                        <td><?=$thutucs[$index]['ten_cdgq'];?></td>
                        <td><?=$hs->canboxuly;?></td>
                    </tr>
                <?php
                }
            } ?>
                </tbody>
            </table>
        </div>
        <div class="btn_action text-center">
        <?php if (isset($_GET['trangthaixuly'])) { ?>
            <?php if ($_GET['trangthaixuly']==1 || $_GET['trangthaixuly']==2) { ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#processAction" data-action="phancong" disabled><i class="fas fa-toolbox"></i> Phân công</button>
            <?php if ($_GET['trangthaixuly']==1) { ?>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#processAction" data-action="tiepnhan" disabled><i class="fas fa-toolbox"></i> Tiếp nhận</button>
            <?php } if ($_GET['trangthaixuly']==2) { ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#processAction" data-action="xuly" disabled><i class="fas fa-toolbox"></i> Xử lý</button>
            <?php } } elseif ($_GET['trangthaixuly']==3) { ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#processAction" data-action="taobienban" disabled><i class="fas fa-toolbox"></i> Tạo biên bản</button>
        <?php } } ?>
        </div>
    </div>
<div class="modal fade" id="processAction" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Xác nhận hành động</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times fa-2x"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="listItems">
        <span class="currentAction d-none"></span>
        <p class="processName"><span class="actionName"></span></p>
        <div class="listItems"></div>
        <div class="input-group phancong d-none">
            <div class="input-group-prepend">
                <span class="input-group-text">Chọn người thụ lý HS</span>
            </div>
            <input type="text" list="cbxl" class="choose_cbxl form-control" placeholder="Nhập tên người thụ lý">
            <datalist id="cbxl">
                <?php foreach ($canboxuly1 as $cbxl) {
                    echo "<option data-value='{$cbxl['id']}' value='{$cbxl['ten']}'></option>";
                } ?>
            </datalist>
        </div>
        <div class="border-top mt-2 pt-1 nextAction tiepnhan xuly d-none">
            Hành động tiếp theo:
            <div class="custom-control custom-checkbox custom-control-inline tiepnhan d-none" data-step="2">
                <input type="checkbox" id="xuly" class="custom-control-input"
                <?php if (isset($_GET['xuly'])) { echo "checked"; } ?>>
                <label class="custom-control-label" for="xuly">Xử lý</label>
            </div>
            <div class="custom-control custom-checkbox custom-control-inline tiepnhan xuly d-none" data-step="3">
                <input type="checkbox" id="taobienban" class="custom-control-input"
                <?php if (isset($_GET['taobienban'])) { echo "checked"; } ?>>
                <label class="custom-control-label" for="taobienban">Tạo biên bản</label>
            </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-ban"></i> Hủy
        </button>
        <button type="button" class="btn btn-success" id="agreeAction">
            <i class="far fa-check-square"></i> Đồng ý
        </button>
      </div>
    </div>
  </div>
</div>
<?php }
require('footer.php');?>