<?php
if (isset($_GET['term']) && isset($_COOKIE['auth1cua'])) {
    $url = 'https://tnhs.baohiemxahoi.gov.vn/gateway/api/GetValues';

    $trangthaixuly = array(1,2);
    foreach ($trangthaixuly as $ttxl) {
        $data = array(
            'denngay' => DATE_FORMAT(new DateTime($currentDate), 'd/m/Y'),
            'dmcoquantochucid' => 3921,
            'hosodunghan' => "1",
            'hososapdenhan' => "1",
            'hosoxulymuon' => "1",
            'loaidanhgiaid' => null,
            'loaihosoid' => '0,1,2,3,5,4,6,21',
            'malinhvuc' => '',
            'mathutuc' => '',
            'nguoidungid' => 45236,
            'orderby' => 0,
            'pagenumber' => 1,
            'pagesize' => 10,
            'phongbanid' => 95,
            'sohoso' => $_GET['term'],
            'trangthaixuly' => $ttxl,
            'tungay' => "01/05/2019"
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
                'user: '.$auth1cua->userName,
                'User-Agent: '.$_SERVER['HTTP_USER_AGENT']
            )
        );
        $result_chothuly_dangthuly = curl_exec($ch1);
        curl_close($ch1);
        $result_chothuly_dangthuly = json_decode($result_chothuly_dangthuly);
        if ($result_chothuly_dangthuly->totalcount > 0) {
            foreach ($result_chothuly_dangthuly->hosos as $hs) {
                $list_sohs_chothuly_dangthuly[] = $hs->sohoso;
            }
            unset($result_chothuly_dangthuly);
        }
    }

        if (isset($_GET['cqbhxh']) && $_GET['cqbhxh']!=null) {
            $cqbhxhs = explode(',', $_GET['cqbhxh']);
            foreach ($cqbhxhs as $cqbhxh) {
                $data = array(
                    'PaginationRequest' => array(
                        'PageIndex' => 1,
                        'PageSize' => 1500
                    ),
                    'dmcoquantochucid' => $cqbhxh,
                    'dmphongbantaoid' => 95,
                    'loaihoso' => -1,
                    'nguoidungid' => 0,
                    'phongbanid' => 0,
                    'trangthaotaobb' => 0
                );
                $data_string = json_encode($data);
                $ch2=curl_init($url);
                curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch2, CURLOPT_POST, 1);
                curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch2, CURLOPT_ENCODING, 'gzip, deflate, br');
                curl_setopt($ch2, CURLOPT_HTTPHEADER,
                    array(
                        'Accept: application/json, text/plain, */*',
                        'Accept-Language: vi-VN,vi;q=0.9,en-GB;q=0.8,en;q=0.7,fr-FR;q=0.6,fr;q=0.5,en-US;q=0.4',
                        'Access-Control-Allow-Methods: POST',
                        'Access-Control-Allow-Origin: https://tnhs.baohiemxahoi.gov.vn',
                        'Authorization: Bearer '.$auth1cua->token,
                        'code: 668',
                        'Connection: keep-alive',
                        'Content-Length: ' . strlen($data_string),
                        'Content-Type: application/json;charset=UTF-8',
                        'Cookie: viewHosoParram=%7B%22dmcoquantochucid%22%3A3921%2C%22loaihosoid%22%3A%220%2C1%2C2%2C3%2C5%2C4%2C6%2C21%22%2C%22loaidanhgiaid%22%3A%22%22%2C%22tungay%22%3A%2204%2F10%2F2019%22%2C%22denngay%22%3A%2203%2F12%2F2019%22%2C%22hosodunghan%22%3A%220%22%2C%22hosoxulymuon%22%3A%221%22%2C%22hososapdenhan%22%3A%220%22%2C%22malinhvuc%22%3A%22%22%2C%22mathutuc%22%3A%22%22%2C%22nguoidungid%22%3A45236%2C%22phongbanid%22%3A95%2C%22trangthaixuly%22%3A2%2C%22pagenumber%22%3A1%2C%22pagesize%22%3A15%2C%22orderby%22%3A0%7D; history=%5B%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Ftra-cuu-ho-so%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Fho-so-cho-thu-ly%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Fhome%22%2C%22https%3A%2F%2Ftnhs.baohiemxahoi.gov.vn%2F%23%2Fnhap-ho-so%22%5D',
                        'func: 139',
                        'Host: tnhs.baohiemxahoi.gov.vn',
                        'Origin: https://tnhs.baohiemxahoi.gov.vn',
                        'Referer: https://tnhs.baohiemxahoi.gov.vn/',
                        'Sec-Fetch-Mode: cors',
                        'Sec-Fetch-Site: same-origin',
                        'user: cuong_cs',
                        'User-Agent: '.$_SERVER['HTTP_USER_AGENT']
                    )
                );
                $result_chotaobienban = curl_exec($ch2);
                curl_close($ch2);
                $result_chotaobienban = json_decode($result_chotaobienban);
                if ($result_chotaobienban->totalCount > 0) {
                    foreach ($result_chotaobienban->hosos as $hs) {
                        if (strpos($hs->sohoso, $_GET['term']) !== false && $hs->loaidanhgiahosoid == 1) {
                            $list_sohs_chotaobienban[] = $hs->sohoso;
                        }
                    }
                }
                unset($result_chotaobienban);
            }
        }
    if (isset($list_sohs_chothuly_dangthuly) && isset($list_sohs_chotaobienban)) {
        $list_sohs = array_merge($list_sohs_chothuly_dangthuly, $list_sohs_chotaobienban);
    } elseif (isset($list_sohs_chothuly_dangthuly) && empty($list_sohs_chotaobienban)) {
        $list_sohs = $list_sohs_chothuly_dangthuly;
    } elseif (empty($list_sohs_chothuly_dangthuly) && isset($list_sohs_chotaobienban)) {
        $list_sohs = $list_sohs_chotaobienban;
    } else {
        $list_sohs = array('Không tìm thấy số hồ sơ');
    }
    //print_r($list_sohs);
    echo json_encode($list_sohs);
}
?>