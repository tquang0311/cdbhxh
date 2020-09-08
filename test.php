<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$ngay_phat_hanh = date('Y-m-d');
echo $ngay_phat_hanh;
echo $time = date('H:i');
die();
$date = date("d-m-Y");// current date 
echo $date."<br>"; 
echo $week = date('M', strtotime($date));
$ngayhomnay=getdate(); 
$thu_trong_tuan=$ngayhomnay['wday'];

$tam=$thu_trong_tuan-1; 
$ngaythuhai = strtotime(date("Y-m-d", strtotime($date)) . " -$tam days"); 
echo "Thứ hai ".date("d-m-Y",$ngaythuhai)."<br>"; 

$tam2=7-$thu_trong_tuan; 
$chunhat = strtotime(date("Y-m-d", strtotime($date)) . " +$tam2 days"); 
echo "Chủ nhật ".date("d-m-Y",$chunhat)."<br>"; 

/*$d=strtotime("tomorrow");
echo date("d-m-Y", $d) . "<br>";

$d=strtotime("previous Monday");
echo date("d-m-Y", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("d-m-Y", $d) . "<br>";
*/
?>
<?php
$host     =     $_SERVER['HTTP_HOST']; //-- ví dụ: Bạn vào http://sinhvienit.net/forum/showthread.php?t=2053 thì kết quả là sinhvienit.net
$self     =     $_SERVER['PHP_SELF']; //-- ví dụ: Bạn vào http://sinhvienit.net/forum/showthread.php?t=2053 thì kết quả là /forum/showthread.php
$time     =     $_SERVER['REQUEST_TIME']; //--Thời gian mà Client gửi request, Ở dạng TIME _STAMP
$query     =    $_SERVER['QUERY_STRING'];//-- ví dụ: Bạn vào http://sinhvienit.net/forum/showthread.php?t=2053 thì kết quả là t=2053
$root     =     $_SERVER['DOCUMENT_ROOT']; //--Thư mục gốc chứa mã nguồn. VD: /home/sinhvienit/public_html (Đối với Linux) hay C:\www (Đối với windows)
$r         =     $_SERVER['HTTP_REFERER']; //--Cái này bạn đang trên http://www.google.com.vn/search?q=sinhvienit mà click vào link tới sinhvienit.net thì nó có giá trị http://www.google.com.vn/search?q=sinhvienit
$rh     =     $_SERVER['REMOTE_HOST']; //--Hostname của người truy cập
$rp     =     $_SERVER['REMOTE_PORT']; //--Port mà trình duyệt mở ra để kết nối tới server
$url     =     $_SERVER['REQUEST_URI']; //-- ví dụ: Bạn vào http://sinhvienit.net/forum/showthread.php?t=2053 thì kết quả là /forum/showthread.php?t=2053
$sname    =    $_SERVER['SERVER_NAME'];//--Tên của server (Gần giống với computername) ở máy PC của mình. Ví dụ server.sinhvienit.net
$ips        =    $_SERVER['SERVER_ADDR'];//--IP của server
$ipc        =    $_SERVER['REMOTE_ADDR'];//--IP của người truy cập
$br        =    $_SERVER['HTTP_USER_AGENT'];//--Thông tin về trình duyệt của người truy cập

echo '01. HTTP_HOST: '.$host.'<br>';
echo '02. PHP_SELF: '.$self.'<br>';
echo '03. REQUEST_TIME: '.$time.'<br>';
echo '04. QUERY_STRING: '.$query.'<br>';
echo '05. DOCUMENT_ROOT: '.$root.'<br>';
echo '06. HTTP_REFERER: '.$r.'<br>';
echo '07. REMOTE_HOST: '.$rh.'<br>';
echo '08. REMOTE_PORT: '.$rp.'<br>';
echo '09. URL: '.$url.'<br>';
echo '10. Server Name: '.$sname.'<br>';
echo '11. IP Server: '.$ips.'<br>';
echo '12. IP Client: '.$ipc.'<br>';
echo '13. Trình duyệt: '.$br.'<br>';
?>