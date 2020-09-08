<?php
if (isset($_COOKIE['auth1cua'])) {
    require('load_auth_1cua.php');

    $url = 'https://tnhs.baohiemxahoi.gov.vn/gateway/api/GetValues';

    $trangthaixuly = array(1,2);
    foreach ($trangthaixuly as $ttxl) {
        $data = array(
            'denngay' => DATE_FORMAT(new DateTime($currentDate), 'd/m/Y'),
            'dmcoquantochucid' => 3921,
            'hosodunghan' => "0",
            'hososapdenhan' => "0",
            'hosoxulymuon' => "1",
            'loaidanhgiaid' => null,
            'loaihosoid' => '0,1,2,3,5,4,6,21',
            'nguoidungid' => 45236,
            'pagenumber' => 1,
            'pagesize' => 500,
            'phongbanid' => 95,
            'trangthaixuly' => $ttxl,
            'tungay' => "01/01/2019"
        );

        $data_string = json_encode($data);
        $ch1=curl_init($url);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch1, CURLOPT_ENCODING, 'gzip, deflate, br');
        curl_setopt($ch1, CURLOPT_HTTPHEADER,
            array(
                'Accept: application/json, text/plain, */*',
                'Accept-Language: vi-VN,vi;q=0.9,en-GB;q=0.8,en;q=0.7,fr-FR;q=0.6,fr;q=0.5,en-US;q=0.4',
                'Access-Control-Allow-Methods: POST',
                'Access-Control-Allow-Origin: https://tnhs.baohiemxahoi.gov.vn',
                'Authorization: Bearer '.$auth1cua->token,
                'code: 380',
                'Connection: keep-alive',
                'Content-Length: ' . strlen($data_string),
                'Content-Type: application/json;charset=UTF-8',
                'Cookie: viewHosoParram=%7B%22dmcoquantochucid%22%3A3921%2C%22loaihosoid%22%3A%220%2C1%2C2%2C3%2C5%2C4%2C6%2C21%22%2C%22loaidanhgiaid%22%3A%22%22%2C%22tungay%22%3A%2204%2F10%2F2019%22%2C%22denngay%22%3A%2203%2F12%2F2019%22%2C%22hosodunghan%22%3A%220%22%2C%22hosoxulymuon%22%3A%221%22%2C%22hososapdenhan%22%3A%220%22%2C%22malinhvuc%22%3A%22%22%2C%22mathutuc%22%3A%22%22%2C%22nguoidungid%22%3A45236%2C%22phongbanid%22%3A95%2C%22trangthaixuly%22%3A2%2C%22pagenumber%22%3A1%2C%22pagesize%22%3A15%2C%22orderby%22%3A0%7D; history=%5B%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Ftra-cuu-ho-so%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Fho-so-cho-thu-ly%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Fhome%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Fnhap-ho-so%22%5D',
                'func: 54',
                'Host: tnhs.baohiemxahoi.gov.vn',
                'Origin: https://tnhs.baohiemxahoi.gov.vn',
                'Referer: https://tnhs.baohiemxahoi.gov.vn/',
                'Sec-Fetch-Mode: cors',
                'Sec-Fetch-Site: same-origin',
                'user: cuong_cs',
                'User-Agent: '.$_SERVER['HTTP_USER_AGENT']
            )
        );
        $result = curl_exec($ch1);
        curl_close($ch1);
        $result = json_decode($result);
        $count[$ttxl] = 0;
        foreach ($result->hosos as $key => $hs) {
            if ($hs->canboxuly == $user->fullname) {
                $count[$ttxl]++;
            }
        }
    }
}
?>