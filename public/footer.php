    <div id="popup-banner" class="container popup">
        <div class="border border-primary shadow table-responsive-md" style="top:0px;left:5%;">
            <span class="btn-close"><i class="text-white far fa-times-circle fa-2x"></i></span>
            <!--<h4 class="bg-info w-100 text-white text-center p-2">THÔNG BÁO</h4>-->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-new-update-tab" data-toggle="pill" href="#pills-new-update" role="tab" aria-controls="pills-new-update" aria-selected="true"><h5>CẬP NHẬP MỚI</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-phieutra-tab" data-toggle="pill" href="#pills-phieutra" role="tab" aria-controls="pills-phieutra" aria-selected="false"><h5>VĂN BẢN ĐANG DỰ THẢO</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-note-tab" data-toggle="pill" href="#pills-note" role="tab" aria-controls="pills-note" aria-selected="false"><h5>LƯU Ý</h5></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-new-update" role="tabpanel" aria-labelledby="pills-new-update-tab">
                    <div class="text-danger">
                        <h3>- Phần mềm mới cập nhập thêm, mọi người nhấn Ctrl + F5 để phần mềm hoạt động chính xác nhé.</h3>
                        <hr/>
                        <?php if ($user->user_group == 5) { ?>
                        <h3>- ODTS:</h3>
                        <h3>+ Khi nhập mới chứng từ trả đơn vị sẽ tự động kiểm tra nếu có dữ liệu Thông báo chứng từ giả thì phải nhập số lưu tại văn thư vào.</h3>
                        <hr/>
                        <?php } ?>
                        <h3>- Phiếu trả, phiếu đề nghị:</h3>
                        <h3>+ Thay đổi chức năng tích đã xử lý: tích chọn dữ liệu cần cập nhập tương tự PM TNHS rồi nhấn nút Đã xử lý -> nhấn OK để xác nhận (chỉ cập nhập đối với những dòng dữ liệu đã tích chọn vào ô vuông).</h3>
                        <h3>+ Các chức năng còn lại như Xem, Sửa và Hủy dự thảo vẫn như cũ (chỉ cập nhập đối với dòng dữ liệu có màu xanh da trời)</h3>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-phieutra" role="tabpanel" aria-labelledby="pills-phieutra-tab">
                <?php
                $uid = $user->uid ;
                $query = $conn->query("SELECT GROUP_CONCAT(so_vb) AS so_vb, GROUP_CONCAT(vb_id) AS vb_id, GROUP_CONCAT(ngay_phat_hanh) AS ngay_phat_hanh, COUNT(vb_id) AS sl FROM qlvb WHERE nguoi_du_thao = $uid AND tinh_trang = 1");
                $row = $query->fetch();
                if ($row['sl']>0) { ?>
                    <h4 class="text-danger">Bạn có <?=$row['sl'];?> văn bản đang dự thảo:
                    <?php
                    $list_vb = array($row['vb_id']=> (object) [
                        'so_vb' => $row['so_vb'],
                        'ngay_ph' => $row['ngay_phat_hanh']
                    ]);
                    //print_r($list_vb);
                    //$vbi = explode(',', $list_vb);
                    foreach ($list_vb as $vbid => $value) {
                        $vb_id = explode(',', $vbid);
                        $sovb = explode(',', $value->so_vb);
                        $now = strtotime(date('Y-m-d'));
                        $ngayph = explode(',', $value->ngay_ph);
                        for ($i=0; $i < count($vb_id); $i++) {
                            $datediff = abs($now - strtotime($ngayph[$i]));
                            $count_date = floor($datediff / (60*60*24));
                            if ($count_date>=20) {
                                $arr_count_qua_han[] = $sovb[$i];
                            }
                            ?>
                        <a class="btn btn-primary" href="../print/?vb_type=3&vb=<?=$vb_id[$i];?>" target="_blank"><?=$sovb[$i].' ('.$count_date.' ngày)';?></a>
                        <?php }
                    } ?></h4>
                <?php } else { ?>
                    <h4 class="text-success">Toàn bộ phiếu trả của bạn đã được xử lý</h4>
                <?php }
                $conn = null;
                ?>
                <h4>Mọi người lưu ý nếu phiếu trả đã được lãnh đạo duyệt, ký và đóng dấu xong thì phải tích vào nút <img src="asset/images/hdsd/btn-da-xu-ly.png"> và chuyển văn thư lưu bản giấy thì mới kết thúc quy trình.</h4>
                <img src="asset/images/hdsd/quy-trinh-xu-ly.png" width="100%">
                <?php require('../module/pm_1_cua/count_hschammuon.php');?>
                <span class="qua-han" data-quahanptpdn="<?=count($arr_count_qua_han);?>" data-chammuonchothuly="<?=$count[1];?>" data-chammuondangthuly="<?=$count[2];?>"></span>
                </div>
                <div class="tab-pane fade" id="pills-note" role="tabpanel" aria-labelledby="pills-note-tab">
                    <h4>Khi in thì mọi người làm theo hướng dẫn như hình dưới để văn bản hiển thị chuẩn nhất, chỉ cần làm 1 lần duy nhất là được.</h4>
                    <img src="asset/images/print.png" width="100%">
                </div>
            </div>
        </div>
    </div>
    <div id="message" class="p-3">
    	<?php
    	if (isset($_SESSION['success'])) { ?>
    		<div class='alert alert-success text-center success m-3 p-4' role='alert'>
    			<i class='fas fa-check-circle fa-2x float-left'></i>
    			<strong><?=$_SESSION['success'];?></strong>
    		</div>
    	<?php } ?>
    </div>
	<div id="background" class="w-100 h-100"></div>
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>CKEDITOR.replace('noi-dung');</script>
<script src="asset/js/jquery-3.3.1.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/jquery-ui/jquery-ui.min.js"></script>
<script src="asset/bootstrap/bootstrap.min.js"></script>
<!--<script src="asset/alertifyjs/alertify.min.js"></script>-->
<script src="asset/js/script.js"></script>
<script>
   	$(window).on("unload", function(e) {
	    <?php
	    	unset($_SESSION['success']);
	    	unset($_SESSION['error']);
	   	?>
	});
</script>
</body>
</html>