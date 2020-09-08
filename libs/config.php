<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=xeploaiccvc;','root','');
    $conn->exec("set names utf8");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e) {
    echo "ERROR! Lỗi kết nối CSDL";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}
?>