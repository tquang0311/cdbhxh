<?php
//error_reporting(0);
if (isset($_COOKIE['auth1cua'])) {
    require('load_auth_1cua.php');
    /*isset($_GET['hosodunghan']) ? $hosodunghan = "1" : $hosodunghan = "0";
    isset($_GET['hososapdenhan']) ? $hososapdenhan = "1" : $hososapdenhan = "0";
    isset($_GET['hosoxulymuon']) ? $hosoxulymuon = "1" : $hosoxulymuon = "0";
    isset($_GET['pagesize']) ? $pagesize = $_GET['pagesize'] : $pagesize = 10;

    $list_hs = explode(';', $_GET['so_hs']);
    array_pop($list_hs);
    $listHs = implode(',', $list_hs);*/

    $url = 'https://tnhs.baohiemxahoi.gov.vn/gateway/api/GetValues';

    $data = array(
        'Nguoithuchien' => 45236,
        'Hosos' => '26721363',
        'dmphongbanguiid' => 95,
        'hanhdong' => 3,
        'Currenttrangthaixuly' => 2,
        'Loaidanhgias' => 1,
        'Ghichutrinhky' => "",
        'buocs' => 2,
        'yeucaupheduyet' => 0
        'Loaihoso' => 4,
        'Soluongchuyengiao' => 1,
        'Dmcoquantochuctiep' => 0,
        'Dmphongbantiep' => 0
    );
    $data_string = json_encode($data);
    $ch=curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
    curl_setopt($ch, CURLOPT_HTTPHEADER,
        array(
            'Accept: application/json, text/plain, */*',
            'Accept-Language: vi-VN,vi;q=0.9,en-GB;q=0.8,en;q=0.7,fr-FR;q=0.6,fr;q=0.5,en-US;q=0.4',
            'Access-Control-Allow-Methods: POST',
            'Access-Control-Allow-Origin: https://tnhs.baohiemxahoi.gov.vn',
            'Authorization: Bearer '.$auth1cua->token,
            'code: 750',
            'Connection: keep-alive',
            'Content-Length: ' . strlen($data_string),
            'Content-Type: application/json;charset=UTF-8',
            'Cookie: viewHosoParram=%7B%22dmcoquantochucid%22%3A3921%2C%22loaihosoid%22%3A%220%2C1%2C2%2C3%2C5%2C4%2C6%2C21%22%2C%22loaidanhgiaid%22%3A%22%22%2C%22tungay%22%3A%2204%2F10%2F2019%22%2C%22denngay%22%3A%2203%2F12%2F2019%22%2C%22hosodunghan%22%3A%220%22%2C%22hosoxulymuon%22%3A%221%22%2C%22hososapdenhan%22%3A%220%22%2C%22malinhvuc%22%3A%22%22%2C%22mathutuc%22%3A%22%22%2C%22nguoidungid%22%3A45236%2C%22phongbanid%22%3A95%2C%22trangthaixuly%22%3A2%2C%22pagenumber%22%3A1%2C%22pagesize%22%3A15%2C%22orderby%22%3A0%7D; history=%5B%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Ftra-cuu-ho-so%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Fho-so-cho-thu-ly%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Fhome%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Fnhap-ho-so%22%5D',
            'func: 130',
            'Host: tnhs.baohiemxahoi.gov.vn',
            'Origin: https://tnhs.baohiemxahoi.gov.vn',
            'Referer: https://tnhs.baohiemxahoi.gov.vn/',
            'Sec-Fetch-Mode: cors',
            'Sec-Fetch-Site: same-origin',
            'user: '.$auth1cua->userName,
            'User-Agent: '.$_SERVER['HTTP_USER_AGENT']
        )
    );
    $result = curl_exec($ch);
    curl_close($ch);
    $Hosos_oldArray = json_decode($result);
    print_r($Hosos_oldArray);
}
?>