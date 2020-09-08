<?php
session_start();
require('../controller/user.php');
$c_user = new c_user();
if (isset($_POST['btn-login'])){
  $username = $_POST['username'];
  $password = md5(addslashes($_POST['password']));
  $user = $c_user->login($username, $password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link rel="shortcut icon" href="asset/images/logo_BHXH.png"> 
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">-->
  <link rel="stylesheet" href="asset/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="asset/bootstrap/bootstrap.min.css">
  <style>
  .icon{
    top:0;
    left:15px;
    font-size:25px;
  }
  .viewpass{
    top:0;
    right:10px;
    opacity:0.5;
    cursor:pointer;
    font-size:25px;
  }
  #background .color{
    position:fixed;
    width:100%;
    height:100%;
    background:rgba(255,255,255,0.5);
    top:0;
    z-index:5;
  }
  #background .color:hover{
    background:none;
  }
  .card, .container{
    z-index:10;
  }
  .login{
    opacity:0.7;
  }
  .login:hover{
    opacity:1;
  }
  </style>
</head>
<script>
  function scrollTomid(){
    var y = screen.availHeight;
    window.scrollTo( 0, y );
  }
</script>
<body onload="scrollTomid();">
  <div class="card fixed-top">
    <div class="card-header bg-info text-white">
      <h2 class="text-center"><b>CĐBHXH</b></h2>
      </div>
  </div>
    
  <div class="container" style="position:fixed;top:25%;left:30%;width:35%;">
    <div class="login bg-white shadow-lg justify-content-center">
  <div class="card-header bg-info text-white text-center">
    <h4>ĐĂNG NHẬP HỆ THỐNG</h4>
    <?php if (isset($_SESSION['login_error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle text-danger"></i>
            <strong>Không thể đăng nhập!</strong><br/><?php echo $_SESSION['login_error']; ?>
        </div>
     <?php } ?>
  </div>

  <div class="card-body">
    <form method="POST">
  <div class="form-group position-relative">
    <input type="text" class="form-control pl-5 pr-5" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên đăng nhập" required>
    <span class="icon position-absolute text-info"><i class="fas fa-user"></i></span>
  </div>
  <div class="form-group position-relative">
    <input type="password" class="form-control pass pl-5 pr-5" name="password" id="exampleInputPassword1" placeholder="Mật khẩu" required>
    <span class="icon position-absolute text-info"><i class="fas fa-lock"></i></span>
    <span class="viewpass position-absolute"><i class="fas fa-eye-slash"></i></span>
  </div>
  <div class="text-center">
  <button class="shadow btn btn-info w-100" name="btn-login">
    <i class="fas fa-sign-in-alt"></i> Đăng nhập
  </button>
  <div class="border-top border-secondary mt-3 p-3">
    <a href="/cdbhxh/public/huong-dan-su-dung.html" class="bg-primary text-light p-2" target="_blank" style="text-decoration:none;">HƯỚNG DẪN SỬ DỤNG</a>
  </div>
  </div>
</form>
  </div>
</div>
  </div>
  </div>
  <div id="background">
    <img src="asset/images/background.jpg" width="100%" style="margin-top:70px;">
    <div class="color"></div>
  </div>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
<script src="asset/js/jquery-3.3.1.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/bootstrap/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('.viewpass').mousedown(function(){
    $('.pass').prop('type','text');
    $('.viewpass').find('i').attr('class','fas fa-eye');
  }).mouseup(function(){
    $('.pass').prop('type','password');
    $('.viewpass').find('i').attr('class','fas fa-eye-slash');
  });
});
</script>
</body>
</html>