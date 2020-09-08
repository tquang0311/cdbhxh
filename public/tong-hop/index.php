<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        header('Location: dang-nhap/');
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-d');?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Tổng hợp</title>
        <link rel="shortcut icon" href="../asset/images/favicon.ico"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="../asset/css/style.css">
        <style>
            .container{margin-top:20px;}
            #tbl-hs,#time,#week,#month,#quarter,#year,#start-date,#end-date,#btn-action,#ketqua-nv,#diem-thuong,#print,#chamdiemthang > div,#sua-phieu-tra{display:none;}
            .onRow{cursor:pointer;}
            th,td{white-space:nowrap;padding:3px;}
            .fullname{text-decoration:none !important;}
            #edit{display:none;position:absolute;top:35%;left:0;z-index:20;padding:20px;}
            h4{position:fixed;text-align:center;width:96%;z-index:15;}
            .btn-action{position:absolute;bottom:0;left:10px;text-align:center;}
            #chamdiemthang .row{padding:10px;}
        </style>
    </head>
    <body>
      <h1 class="text-center text-danger m-5">Mục này chưa hoàn thiện, vui lòng quay lại sau.</h1>
        <?php
            die; ?>
            <?phprequire "../header.php";
            require "tonghop-form.php"
            ?>
        <div id='detail' class="w-100">
            <div class="border border-primary shadow table-responsive-md">
                <span class="btn-close"><i class="text-white far fa-times-circle fa-2x"></i></span>
                <h4 class="bg-info text-white text-center p-2">
                  <span class="name"></span>
                </h4>
                <div id="data" class="mt-5">
                  <form method="POST" target="_blank" action="update.php"></form>
                </div>
            </div>
        </div>
        <div id='edit' class="w-100">
            <div class="border border-primary shadow table-responsive-md">
                <div class="data" class="mt-5"></div>
            </div>
        </div>
        <div id='danh-gia-thang' class="w-100">
            <div class="border border-primary shadow table-responsive-md" style="max-height:700px;">
            
            </div>
        </div>
        </div>
        <div id="background" class="w-100 h-100"></div>
        <?php
        if (isset($_SESSION['update'])) { ?>
          <div class='alert alert-success text-center' role='alert'>
              <h5><strong><?php echo $_SESSION['update']; ?></strong></h5>
          </div>
        <?php } ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="../asset/js/script.js"></script>
        <script>
            $(document).ready(function(){
                $("#bo-phan select,#start-date input,#end-date input").change(function(){
                    var bophan = $('#bo-phan select').val();
                       var tu_ngay = $('#start-date input').val();
                       var den_ngay = $('#end-date input').val();
                       $("#time select").change(function(){
                           var time = $(this).val();
                           if(time == 5) {
                               $('#start-date input,#end-date input').removeAttr('readonly');
                               $('#week,#month,#quarter,#year').hide();
                           } else {
                               $('#start-date input,#end-date input').attr('readonly', true);
                           }
                       })
                    if (bophan != '') {
                           $.ajax({
                               url: 'tonghop-bophan.php',
                               type: 'POST',
                               dataType: 'html',
                               data: { 
                                   bophan: bophan,
                                   tu_ngay: tu_ngay,
                                   den_ngay: den_ngay
                               }
                           }).done(function(data) {
                               $('#time,#btn-action,#start-date,#end-date').show();
                               $("#tbl-hs").html(data).show();
                                if (tu_ngay == '' || den_ngay == '') {
                                   $('#print-week-total,#rating-month').attr('disabled',true);
                               } else {
                                   $('#print-week-total,#rating-month').removeAttr('disabled');
                               }
                               $('.onRow').click(function(){
                                   $(this).parents('.table-responsive-md').find('.onRow').each(function (index, element) {
                                       $(element).removeClass('table-info');
                                       $(element).find('input').attr('disabled',true);
                                   });
                                   $(this).addClass('table-info');
                                   $(this).find('input').removeAttr('disabled');
                                   /*$(this).find('.fullname').attr('checked',true);
                                   $(this).siblings().find('.fullname').removeAttr('checked');*/
                                   var count = $('.table-responsive-md').find('.table-info').length;
                                   if (count == 0 || tu_ngay == '' || den_ngay == '') {
                                       $('#print-week').attr('disabled',true);
                                   } else {
                                       $('#print-week').removeAttr('disabled');
                                   }   
                               });
                               $('.fullname').click(function(e) {
                                   e.preventDefault();
                                   var parent = $(this).parents('.onRow');
                                   var name = $(this).text();
                                   var bophan = parent.find('.bp').val();
                                   var u = parent.find('.u').text();
                                   $.ajax({
                                       url: 'chi-tiet.php',
                                       type: 'POST',
                                       dataType: 'html',
                                       data: { 
                                           bophan: bophan,
                                           u: u,
                                           tu_ngay: tu_ngay,
                                           den_ngay: den_ngay
                                       }
                                   }).done(function(detail) {
                                       $('#detail,#background').fadeIn();
                                       $('#detail .name').text('Họ tên: ' + name);
                                       $('#data form').html(detail);
                                       $('tr').click(function(){
                                        $(this).parents('tbody').find('tr').not('.edit').each(function (index, element) {
                                           $(element).removeClass('table-info');
                                           $(element).find('input').attr('disabled',true);
                                         });
                                        $(this).addClass('table-info').find('input').removeAttr('disabled');
                                        /*var dataid = $(this).parents('tr').find('.data').text();
                                        $.ajax({
                                           url: 'chinh-sua.php',
                                           type: 'POST',
                                           dataType: 'html',
                                           data: { dataid: dataid }
                                        }).done(function(edit) {
                                          $('#edit,#background').fadeIn();
                                          $('#edit .data').html(edit);
                                          $('#update').click(function(){
                                            var da_id = $(this).parents('form').find('.data').val();
                                            $('#detail').fadeOut();
                                            $.ajax({
                                               url: 'chi-tiet.php',
                                               type: 'POST',
                                               dataType: 'html',
                                               data: { da_id: da_id }
                                            }).done(function(update) {
                                              $('#detail').fadeIn();
                                              $('#data').html(update);
                                              $('#edit').fadeOut();
                                            });
                                          });
                                          $('#cancel').click(function(){
                                            $('#edit').fadeOut();
                                          });
                                        });*/
                                      });
                                   });    
                                   popup_close();
                               });
                               $('#rating-month').click(function(e) {
                                   e.preventDefault();                       
                                   var start_date = $('#start-date input').val();
                                   var end_date = $('#end-date input').val();
                                   $.ajax({
                                       url: 'danhgiathang.php',
                                       type: 'POST',
                                       dataType: 'html',
                                       data: {
                                           tu_ngay: start_date,
                                           den_ngay: end_date
                                       }
                                   }).done(function(danh_gia_thang) {
                                           $('#danh-gia-thang,#background').fadeIn();
                                           $('#danh-gia-thang .table-responsive-md').html(danh_gia_thang);
                                           $('#noi-dung-danh-gia select').change(function() {
                                           var val = $(this).val();
                                           var diemtoida = $('#diem-toi-da b');
                                           const ythuckyluat = 20;
                                           const ketquanv = 70;
                                           const nangluckynang = 20;
                                           const thuchiennv = 50;
                                           const diemthuong = 10;
                                           if ( val == 1 ) {
                                               diemtoida.text(ythuckyluat);
                                               $('#ythuc-kyluat,#print').show();
                                               $('#nangluc-kynang,#thuchien-nv,#ketqua-nv,#diem-thuong').hide();
                                           } else if ( val == 2 ) {
                                               diemtoida.text(ketquanv);
                                               $('#ketqua-nv').show();
                                               $('#ythuc-kyluat,#nangluc-kynang,#thuchien-nv,#diem-thuong').hide();
                                               $('#ketqua-nv select').change(function(){
                                                   var vall = $(this).val();
                                                   if ( vall == 1 ) {
                                                       diemtoida.text(nangluckynang);
                                                       $('#nangluc-kynang,#print').show();
                                                       $('#ythuc-kyluat,#thuchien-nv,#diem-thuong').hide();
                                                   } else if ( vall == 2 ) {
                                                       diemtoida.text(thuchiennv);
                                                       $('#thuchien-nv,#print').show();
                                                       $('#ythuc-kyluat,#nangluc-kynang,#diem-thuong').hide();
                                                   }
                                               });
                                           } else if ( val == 3 ) {
                                               diemtoida.text(diemthuong);
                                               $('#diem-thuong,#print').show();
                                               $('#ythuc-kyluat,#nangluc-kynang,#thuchien-nv,#ketqua-nv').hide();
                                           } else {
                                               diemtoida.text(0);
                                               $('#chamdiemthang').hide();
                                           }
                                           $('#ythuc-kyluat input').change(function(){
                                               var ythuc1 = Number($('#ythuc1').val());
                                               var ythuc2 = Number($('#ythuc2').val());
                                               var ythuc_kyluat = ythuc1 + ythuc2;
                                               
                                               var diem_toi_da = Number(diemtoida.text());
                                               var tongdiem = $(this).parents('.noi-dung-danh-gia').find('.tong-diem');
                                               tongdiem.html('TỔNG ĐIỂM: <b>'+ythuc_kyluat+'</b>');
                                               var _tong_diem = Number(tongdiem.find('b').text());
                                               if ( _tong_diem > diem_toi_da ) {
                                                    tongdiem.addClass('text-danger').html('TỔNG ĐIỂM: <b>'+ythuc_kyluat+'</b><br/>(Đã vượt quá số điểm tối đa cho phép)');
                                               } else {
                                                tongdiem.removeClass('text-danger').html('TỔNG ĐIỂM: <b>'+ythuc_kyluat+'</b>');
                                               }
                                               tong_diem();
                                           });
                                           $('#nangluc-kynang input').change(function(){
                                               var tham_muu = Number($('#tham-muu').val());
                                               var xay_dung = Number($('#xay-dung').val());
                                               var kiem_tra = Number($('#kiem-tra').val());
                                               var to_chuc = Number($('#to-chuc').val());
                                               var bao_cao_kqnv = Number($('#bao-cao-kqnv').val());
                                               var thiet_lap = Number($('#thiet-lap').val());
                                               var phoi_hop = Number($('#phoi-hop').val());
                                               var sd_phanmem = Number($('#sd-phanmem').val());
                                               var van_ban = Number($('#van-ban').val());
                                               var nangluc_kynang = tham_muu + xay_dung + kiem_tra + to_chuc + bao_cao_kqnv + thiet_lap + phoi_hop + sd_phanmem + van_ban;
                                               
                                               var diem_toi_da = Number(diemtoida.text());
                                               var tongdiem = $(this).parents('.noi-dung-danh-gia').find('.tong-diem');
                                               tongdiem.html('TỔNG ĐIỂM: <b>'+nangluc_kynang+'</b>');
                                               var _tong_diem = Number(tongdiem.find('b').text());
                                               if ( _tong_diem > diem_toi_da ) {
                                                    tongdiem.addClass('text-danger').html('TỔNG ĐIỂM: <b>'+nangluc_kynang+'</b><br/>(Đã vượt quá số điểm tối đa cho phép)');
                                               } else {
                                                    tongdiem.removeClass('text-danger').html('TỔNG ĐIỂM: <b>'+nangluc_kynang+'</b>');
                                               }
                                               tong_diem();
                                           });
                                           $('#thuchiennv select').change(function(){
                                                var val_thuchien_nv = $(this).val();
                                                var diem_toi_da = Number(diemtoida.text());
                                                var tongdiem = $(this).parents('.noi-dung-danh-gia').find('.tong-diem');
                                               $('#thuc_hien_nv').removeAttr('readonly');
                                               if ( val_thuchien_nv == 1 ) {
                                                $( "#thuc_hien_nv" ).val(50).attr({min:45,max:50});
                                                tong_diem_thuchiennv();
                                               } else if ( val_thuchien_nv == 2 ) {
                                                $( "#thuc_hien_nv" ).val(44).attr({min:40,max:44});
                                                tong_diem_thuchiennv();
                                               } else if ( val_thuchien_nv == 3 ) {
                                                $( "#thuc_hien_nv" ).val(39).attr({min:35,max:39});
                                                tong_diem_thuchiennv();
                                               } else if ( val_thuchien_nv == 4 ) {
                                                $( "#thuc_hien_nv" ).val(34).attr({min:1,max:34});
                                                tong_diem_thuchiennv();
                                               } else {
                                                $('#thuc_hien_nv').val(1).attr('readonly',true);
                                                tong_diem_thuchiennv();
                                               }
                                               tong_diem();
                                               function tong_diem_thuchiennv() {
                                                var _thuchiennv = Number($('#thuc_hien_nv').val());
                                                tongdiem.find('b').text(_thuchiennv);
                                                var __tong_diem = Number(tongdiem.find('b').text());
                                                var _diem_toi_da = Number($('#diem-toi-da b').text());
                                                $('#thuc_hien_nv').change(function(){
                                                    var aaaaaaa = Number($(this).val());
                                                    tongdiem.find('b').text(aaaaaaa);
                                                    var _tong__diem = Number(tongdiem.find('b').text());
                                                    tong_diem();
                                                    if ( _tong__diem > _diem_toi_da ) {
                                                    tongdiem.addClass('text-danger').html('TỔNG ĐIỂM: <b>'+_tong__diem+'</b><br/>(Đã vượt quá số điểm tối đa cho phép)');
                                                    } else {
                                                        tongdiem.removeClass('text-danger').html('TỔNG ĐIỂM: <b>'+_tong__diem+'</b>');
                                                    }
                                                });
                                               }
                                           });
                                           $('#diem-thuong input').change(function(){
                                               var de_xuat = Number($('#de-xuat').val());
                                               var ghi_nhan = Number($('#ghi-nhan').val());
                                               var sang_tao = Number($('#sang-tao').val());
                                               var diem_thuong = de_xuat + ghi_nhan + sang_tao;
                                               
                                               var diem_toi_da = Number(diemtoida.text());
                                               var tongdiem = $(this).parents('.noi-dung-danh-gia').find('.tong-diem');
                                               tongdiem.html('TỔNG ĐIỂM: <b>'+diem_thuong+'</b>');
                                               var _tong_diem = Number(tongdiem.find('b').text());
                                               if ( _tong_diem > diem_toi_da ) {
                                                    tongdiem.addClass('text-danger').html('TỔNG ĐIỂM: <b>'+diem_thuong+'</b><br/>(Đã vượt quá số điểm tối đa cho phép)');
                                               } else {
                                                    tongdiem.removeClass('text-danger').html('TỔNG ĐIỂM: <b>'+diem_thuong+'</b>');
                                               }
                                               tong_diem();
                                           });
                                            function tong_diem() {
                                                var y_thuc_ky_luat = Number($('#ythuc-kyluat .tong-diem b').text());
                                                var nang_luc_ky_nang = Number($('#nangluc-kynang .tong-diem b').text());
                                                var _thuc_hien_nv = Number($('#thuchien-nv .tong-diem b').text());
                                                var _diem_thuong = Number($('#diem-thuong .tong-diem b').text());
                                                $('#tong-diem b').text(y_thuc_ky_luat + nang_luc_ky_nang + _thuc_hien_nv + _diem_thuong);
                                                var tong__diem = Number($('#tong-diem b').text());
                                                if ( tong__diem == 0 || y_thuc_ky_luat > ythuckyluat || nang_luc_ky_nang > nangluckynang || _thuc_hien_nv > thuchiennv || _diem_thuong > diemthuong ) {
                                                    $('#print button').attr('disabled',true);
                                                } else {
                                                    $('#print button').removeAttr('disabled');
                                                }
                                           }
                                       });
                                        popup_close();
                                   });    
                               });
                           });
                    } else {
                        alert('Bạn hãy chọn 1 bộ phận nghiệp vụ');
                        $('#time,#tbl-hs,#btn-action,#start-date,#end-date').hide();
                    }
                });
               });
                setTimeout(function(){
                    $(document).find("div.alert").fadeOut(4000);
                },2500);
                $("#time select").change(function(){
                    var time = $(this).val();
                    if (time == 1) {
                        $('#week').show();
                        $('#month,#quarter,#year').hide();
                    } else if (time == 2) {
                        $('#month').show();
                        $('#week,#quarter,#year').hide();
                    } else if (time == 3) {
                        $('#quarter').show();
                        $('#week,#month,#year').hide();
                    } else if (time == 4) {
                        $('#year').show();
                        $('#week,#month,#quarter').hide();
                    } else if (time == '') {
                        $('#week,#month,#quarter,#year,#start-date,#end-date').hide();
                    }
                });
                $("#week select,#month select,#quarter select,#year select").change(function(){
                  $('#start-date,#end-date').show();
                });
                $('#pills-congvan-tab').click(function(){
                  $('.onRow').click(function(){
                    $(this).parents('.table-responsive-md').find('.onRow').each(function (index, element) {
                    $(element).removeClass('table-info');
                    $(element).find('input').attr('disabled',true);
                  });
                    $(this).addClass('table-info');
                    $(this).find('input').removeAttr('disabled');
                    var count = $('#pills-congvan').find('.table-info').length;
                    if (count == 0) {
                      $('#pills-congvan button').attr('disabled',true);
                    } else {
                      $('#pills-congvan button').removeAttr('disabled');
                    }   
                  });
                });
                   function popup_close() {
                       $('.btn-close').click(function(){
                           $('#detail,#danh-gia-thang,#sua-phieu-tra,#background').fadeOut();
                       });
                   }
              $(window).unload(function() {
                <?php
                unset($_SESSION['update']);
                ?>
              });
        </script>
    </body>
</html>