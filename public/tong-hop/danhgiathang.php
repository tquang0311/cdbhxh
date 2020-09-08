<?php
session_start();
$tu_ngay = $_POST['tu_ngay'];
$den_ngay = $_POST['den_ngay'];
$montha = date('m', strtotime($_POST['tu_ngay']));
$monthb = date('m', strtotime($_POST['den_ngay'])); ?>
<span class="btn-close"><i class="text-white far fa-times-circle fa-2x"></i></span>
<?php if ($montha == $monthb) {
$tungay = DATE_FORMAT(new DateTime($_POST['tu_ngay']), 'm/Y');?>
<h5 class="name bg-info text-white text-center p-2">
                    TỰ ĐÁNH GIÁ, XẾP LOẠI THÁNG <?php echo $tungay; ?><br/>
                    HỌ TÊN: <?php echo mb_strtoupper($_SESSION['fullname']); ?>
                </h5>
<div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" id="noi-dung-danh-gia">
            <select class="custom-select">
                <option>CHỌN NỘI DUNG ĐÁNH GIÁ</option>
                <option value="1">Ý thức tổ chức kỷ luật</option>
                <option value="2">Kết quả thực hiện nhiệm vụ</option>
                <option value="3">Điểm thưởng</option>
            </select>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" id="ketqua-nv">
            <select class="custom-select">
                <option>CHỌN NỘI DUNG KẾT QUẢ THỰC HIỆN NHIỆM VỤ</option>
                <option value="1">Năng lực và kỹ năng</option>
                <option value="2">Thực hiện nhiệm vụ theo kế hoạch, lịch công tác đảm bảo tiến độ, chất lượng</option>
            </select>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
            <span id="diem-toi-da">ĐIỂM TỐI ĐA: <b>0</b></span>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <span id="tong-diem">TỔNG ĐIỂM TOÀN BỘ: <b>0</b>
                            </span>
        </div>
    </div>
    <form method="POST" id="chamdiemthang" action="../bao-cao.php" target="_blank">
    <input type="hidden" name="month" value="<?php echo $montha; ?>">
        <div id="ythuc-kyluat" class="noi-dung-danh-gia">
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Ý thức tổ chức kỷ luật; phẩm chất đạo đức; lối sống, tác phong, lề lối làm việc chuẩn mực, lành mạnh. Đoàn kết, thực hiện nguyên tắc tập trung dân chủ trong cơ quan, đơn vị</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="ythuc1" id="ythuc1" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>2</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Thực hiện quy tắc ứng xử của cán bộ, công chức, viên chức, lao động hợp đồng trong các cơ quan thuộc thành phố Hà Nội</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="ythuc2" id="ythuc2" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8"></div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <span class="tong-diem">TỔNG ĐIỂM: <b>0</b></span>
                </div>
            </div>
        </div>
        <div id="nangluc-kynang" class="noi-dung-danh-gia">
            <div class="row font-weight-bold">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1</span>
                </div>
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">
                    <span>Năng lực và kỹ năng</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1.1</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Chủ động nghiên cứu, cập nhật kịp thời các kiến thức pháp luật và chuyên môn nghiệp vụ để tham mưu, tổ chức thực hiện công việc có chất lượng</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="tham-muu" id="tham-muu" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1.2</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Xây dựng kế hoạch công tác của các nhân rõ nội dung, tiến độ</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="xay-dung" id="xay-dung" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1.3</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Triển khai, hướng dẫn, đôn đốc, kiểm tra các đơn vị, cá nhân liên quan trong thực hiện nhiệm vụ thuộc lĩnh vực tham mưu đạt hiệu quả</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="kiem-tra" id="kiem-tra" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1.4</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Tổ chức thực hiện nhiệm vụ, công việc theo đúng quy trình, quy định</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="to-chuc" id="to-chuc" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1.5</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Báo cáo kịp thời, chính xác với lãnh đạo về tình hình, kết quả thực hiện nhiệm vụ được giao. Chủ động đề xuất tham mưu giải quyết công việc</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="bao-cao-kqnv" id="bao-cao-kqnv" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1.6</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Thiết lập hồ sơ công việc đầy đủ theo nội dung, công việc được phân công; lưu trữ hồ sơ, tài lệu đúng nguyên tắc</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="thiet-lap" id="thiet-lap" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1.7</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Chủ động giải quyết công việc và phối hợp tốt với các cá nhân, đơn vị có liên quan giải quyết công việc đạt hiệu quả</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="phoi-hop" id="phoi-hop" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1.8</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Sử dụng thành thạo các phần mềm, ứng dụng công nghệ thông tin đáp ứng yêu cầu công việc. Tham mưu chuẩn bị các nội dung, tài liệu, báo cáo…phục vụ cuộc họp hiệu quả</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="sd-phanmem" id="sd-phanmem" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1.9</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Các văn bản ban hành thuộc lĩnh vực tham mưu đảm bảo đúng thể thức, quy trình, thủ tục, không có sai sót</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="van-ban" id="van-ban" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8"></div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <span class="tong-diem">TỔNG ĐIỂM: <b>0</b></span>
                </div>
            </div>
        </div>
        <div id="thuchien-nv" class="noi-dung-danh-gia">
            <div class="row font-weight-bold">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>2</span>
                </div>
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">
                    <span>Thực hiện nhiệm vụ theo kế hoạch, lịch công tác đảm bảo tiến độ, chất lượng</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8" id="thuchiennv">
                    Hoàn thành từ
                    <select name="thuchiennv">
                        <option></option>
                    	<option value="1">90% - 100% (45 -< 50 điểm)</option>
                        <option value="2">80% - dưới 90% (40 -< 45 điểm)</option>
                        <option value="3">70% - dưới 80% (35 -< 40 điểm)</option>
                        <option value="4">dưới 70% (< 35 điểm)</option>
                    </select>
                    công việc theo kế hoạch, lịch công tác đảm bảo tiến độ và chất lượng
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="thuc_hien_nv" id="thuc_hien_nv" min="1" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8"></div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <span class="tong-diem">TỔNG ĐIỂM: <b>0</b></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span><b>*</b></span>
                </div>
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11" id="tieu-chi-danh-gia">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tiêu chí đánh giá</th>
                                <th>Được giao</th>
                                <th>Đạt được</th>
                                <th>Chưa đạt được</th>
                                <th>Lý do</th>
                                <th>Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php if ($_SESSION['usg'] == 3) { ?>
                            	<td>Xét duyệt hồ sơ dài hạn:
                                    <br/> - Số hồ sơ tiếp nhận (theo lượt giao dịch):
                                    <br/> - Số hồ sơ trả lại:
                                    <br/> - Số lượng đơn thư phải trả lời:
                                    <br/> - Số hồ sơ sai phải điều chỉnh:
                                    <br/>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } elseif ($_SESSION['usg'] == 4) { ?>
                                <td>Điều chỉnh các loại:
                                    <br/> - Tổng số hồ sơ tiếp nhận (theo lượng hồ sơ):
                                    <br/> - Số lượng đơn thư phải trả lời:
                                    <br/> - Số hồ sơ xin ý kiến BHVN, Sở LĐTBXH (hồ sơ vướng):
                                    <br/>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } elseif ($_SESSION['usg'] == 5) { ?>
                                <td>Xét duyệt hồ sơ ngắn hạn:
                                    <br/> - Số hồ sơ tiếp nhận (theo lượng hồ sơ):
                                    <br/> - Số hồ sơ trả lại:
                                    <br/> - Số lượng đơn thư phải trả lời:
                                    <br/>
                                    </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } elseif ($_SESSION['usg'] == 6) { ?>
                                <td>Giao nhận, bóc tách, luân chuyển: X
                                    <br/> - Tổng số hồ sơ: 1095 hồ sơ
                                   	<br/>
                                    </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } elseif ($_SESSION['usg'] == 7) { ?>
                                <td>Quản lý chi:
                                    <br/> - Số hồ sơ tăng trong tháng:
                                    <br/> - Số hồ sơ điều chỉnh, thay đổi trong tháng:
                                    <br/> - Số quyết định thôi hưởng tuất:
                                    <br/> - Tổng hợp:
                                    <br/>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } elseif ($_SESSION['usg'] == 8) { ?>
                                <td>Hồ sơ chuyển đi, chuyển đến:
                                    <br/> - Số lượng hồ sơ chuyển đến:
                                    <br/> - Số lượng hồ sơ chuyển đi:
                                    <br/> - Hồ sơ trả lại tỉnh:
                                    <br/>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } elseif ($_SESSION['usg'] == 9) { ?>
                                <td>Giải quyết BH thất nghiệp:
                                    <br/> - Số hồ sơ hưởng TCTN tăng mới:
                                    <br/> - Số hồ sơ đề nghị hưởng hỗ trợ học nghề:
                                    <br/> - Số lượt hưởng TCTN (tiền mặt, ATM):
                                    <br/> - Số hồ sơ bảo lưu thời gian thất nghiệp:
                                    <br/> - Số hồ sơ thu hồi, chấm dứt, tạm dừng, tiếp tục hưởng trong tháng:
                                    <br/>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                        	<?php } ?>
                            <tr>
                                <td>Xác nhận giải quyết chế độ:
                                    <br/> -Số lượng hồ sơ yêu cầu xác nhận (bao gồm cả tỉnh khác):
                                    <br/> -Bảo lưu thất nghiệp (trước tháng 12/2012):
                                    <br/>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            	<td></td>
                            </tr>
                            <tr>
                                    <td>Báo cáo, tổng hợp:
                                    <br/> - Báo cáo định kỳ:
                                    <br/> - Báo cáo đột xuất:
                                    <br/> - Tổng hợp số liệu chuyển các phần mềm:
                                    <br/>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Các công việc khác:</td>
                                <td colspan="5"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="diem-thuong" class="noi-dung-danh-gia">
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>1</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Tham mưu, đề xuất giải pháp, mô hình mới đảm bảo chất lượng và tiến độ, được cấp có thẩm quyền phê duyệt</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="de-xuat" id="de-xuat" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>2</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Tham mưu có hiệu quả đối với các nhiệm vụ mới, khó, phức tạp theo phân công được lãnh đạo cơ quan, đơn vị ghi nhận</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="ghi-nhan" id="ghi-nhan" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                    <span>3</span>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <span>Chủ động, sáng tạo, khoa học, cải tiến phương pháp làm việc, nâng cao hiệu quả công việc, có thành tích nổi bật</span>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <input type="number" class="form-control" name="sang-tao" id="sang-tao" min="1">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8"></div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <span class="tong-diem">TỔNG ĐIỂM: <b>0</b></span>
                </div>
            </div>
        </div>
        <div class="row" id="print">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <button class="btn btn-primary w-25" name="print-rating-month" disabled><i class="fas fa-print"></i> GHI &#38; IN</button>
            </div>
        </div>
    </form>
</div>
<?php } else { ?>
    <h1 style="font-size:2.5em;" class="text-center text-danger">
    	Ngày bắt đầu và ngày kết thúc không nằm trong cùng 1 tháng
    </h1>
<?php } ?>