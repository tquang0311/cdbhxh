  <?php
  require "../libs/config.php";
  require "header.php";
if (isset($_POST['change-pass'])) {
  $old_pass = md5($_POST['old-pass']);
  $new_pass = md5($_POST['new-pass']);
  $conf_new_pass = md5($_POST['conf-new-pass']);
  if ($old_pass != $user->password) {
    $error = "Mật khẩu cũ không chính xác";
   } elseif ($new_pass != $conf_new_pass) {
    $error = "Xác nhận mật khẩu mới không trùng khớp";
   } else {
    $sql = "UPDATE users SET password=? WHERE uid=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$new_pass, $_SESSION['uid']]);
    $user->password = $new_pass;
    $success = "Đổi mật khẩu thành công";
   }
}
if ($user->password == "e10adc3949ba59abbe56e057f20f883e") { ?>
    <h3 class="text-danger text-center">Bạn đang để mật khẩu mặc định, nên đổi ngay bây giờ</h3>
<?php } ?>
      <div class="container">
    <div class="row justify-content-lg-center">
    <div class="w-50 shadow-lg card m-5">
  <div class="card-header bg-info text-white text-center">
    <h3>ĐỔI MẬT KHẨU</h3>
    <?php if (isset($error)) { ?>
      <div class="alert alert-warning" role="alert">
          <h6><strong>Lỗi!</strong> <?php echo $error; ?></h6>
      </div>
    <?php } elseif (isset($success)) {
      header('Location: /cdbhxh/');
    } ?>
  </div>
  <div class="card-body">
    <form method="POST">
  <div class="form-group">
    <input type="password" class="form-control" id="exampleInputPassword1" name="old-pass" placeholder="Mật khẩu cũ" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="exampleInputPassword1" name="new-pass" placeholder="Mật khẩu mới" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="exampleInputPassword1" name="conf-new-pass" placeholder="Xác nhận mật khẩu mới" required>
  </div>
  <div class="text-center">
  <button type="submit" class="shadow btn btn-info w-100" name="change-pass">Xác nhận</button>
  </div>
</form>
  </div>
</div>
  </div>
  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>