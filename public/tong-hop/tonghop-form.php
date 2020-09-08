<?php $now = date('Y-m-d');?>
<div class="container-fluid" id='tbl-data'>
  <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-hoso-tab" data-toggle="pill" href="#pills-hoso" role="tab" aria-controls="pills-hoso" aria-selected="true">Công việc</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-dayoff-tab" data-toggle="pill" href="#pills-dayoff" role="tab" aria-controls="pills-dayoff" aria-selected="false">Nghỉ phép</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-hoso" role="tabpanel" aria-labelledby="pills-hoso-tab">
      <form method="POST" action="../bao-cao.php" id="bchs" target="_blank">
        <div class="row">
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" id="bo-phan">
            <label>Chọn bộ phận</label>
            <select class="custom-select">
              <option></option>
              <?php
              require "../libs/config.php";
              $query1 = $conn->query("SELECT * FROM user_group WHERE group_id IN (2,3,4,5,6,7,8,9)");
              while ($row1 = $query1->fetch()) {
                echo "<option value=".$row1['group_id'].">".$row1['group_name']."</option>";
              } ?>
            </select>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" id="time">
            <label>Thời gian</label>
            <select class="custom-select">
              <option></option>
              <option value="1">Tuần</option>
              <!--<option value="2">Tháng</option>
              <option value="3">Quý</option>
              <option value="4">Năm</option>-->
              <option value="5">Thời gian cụ thể</option>
            </select>
          </div>
          <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1" id="week">
            <label>Tuần</label>
            <select class="custom-select">
              <option></option>
              <?php
              $week = date('W', strtotime($now));
                for ($i = 1; $i <= $week; $i++) {
                    echo "<option value=$i>Tuần $i</option>";
                }
                ?>
            </select>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" id="month">
            <label>Tháng</label>
            <select class="custom-select">
              <option></option>
              <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<option value=$i>Tháng $i</option>";
                }
                ?>
            </select>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" id="quarter">
            <label>Quý</label>
            <select class="custom-select">
              <option></option>
              <?php
                for ($i = 1; $i <= 4; $i++) {
                    echo "<option value=$i>Quý $i</option>";
                }
                ?>
            </select>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" id="year">
            <label>Năm</label>
            <select class="custom-select">
              <option></option>
              <option value="1">Năm 2019</option>
            </select>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" id="start-date">
            <label>Từ ngày</label>
            <input type="date" class="form-control" name="tu_ngay" min="2019-01-01" max="<?php echo $date;?>" readonly>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" id="end-date">
            <label>Đến ngày</label>
            <input type="date" class="form-control" name="den_ngay" min="2019-01-01" max="<?php echo $date;?>" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="table-responsive-md mt-2" id="tbl-hs" style="max-height:450px;"></div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center m-2" id="btn-action">
            <button id='print-week' class="btn btn-primary" name="print-week" disabled>
              Báo cáo tuần
            </button>
            <?php if ($_SESSION['uid'] == 13) { ?>
            <button id='print-week-total' class="btn btn-primary" name="print-week-total" disabled>
              Tổng hợp tuần
            </button>
            <?php } ?>
            <button id='rating-month' class="btn btn-primary" name="rating-month" disabled>
              Đánh giá tháng
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="tab-pane fade" id="pills-dayoff" role="tabpanel" aria-labelledby="pills-dayoff-tab">
      <div class="table-responsive-md">
        <table class="table table-hover table-bordered">
          <thead>
            <tr class="bg-info text-white">
              <th>STT</th>
              <th>HỌ TÊN</th>
              <th>Số ngày phép được nghỉ</th>
              <th>Số ngày phép đã nghỉ</th>
              <th>Số ngày phép còn lại</th>
              <th>Ngày nghỉ phép cụ thể</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM users WHERE role = 2";
              $query = $conn->query($sql);
              $query->setFetchMode(PDO::FETCH_ASSOC);
              $query->execute();
              $i = 1;
              while ($row = $query->fetch()) {
              ?>
            <tr class="onRow">
              <td><?php
                echo $i++;
                ?></td>
              <td><?php
                echo $row['fullname'];
                ?></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <?php
              }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>