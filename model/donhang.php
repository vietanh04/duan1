<?php 
function taodonhang($madh, $tongdonhang, $pttt, $hoten, $address, $email, $tel) {
    $conn = pdo_get_connection();
    $sql = "INSERT INTO tbl_order (madh, tongdonhang, pttt, hoten, address, email, tel)
            VALUES ('".$madh."', '".$tongdonhang."', '".$pttt."', '".$hoten."', '".$address."', '".$email."', '".$tel."')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    return $last_id;
}

function addtocart($iddh, $idpro, $tensp, $img, $dongia, $soluong) {
    $conn = pdo_get_connection();
    $sql = "INSERT INTO tbl_cart (iddh, idpro, tensp, img, dongia, soluong)
            VALUES ('".$iddh."', '".$idpro."', '".$tensp."', '".$img."', '".$dongia."', '".$soluong."')";
    $conn->exec($sql);
}

function getshowcart($iddh) {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare("SELECT * FROM tbl_cart WHERE iddh = '".$iddh."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function getorderinfo($iddh) {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare("SELECT * FROM tbl_order WHERE id = '".$iddh."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}




?>