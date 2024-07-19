<?php 

function ktra_tk($tai_khoan,$matkhau){
    $sql = "SELECT * FROM `db_taikhoan` WHERE ten_tk = '".$tai_khoan."' AND matkhau = '".$matkhau."'";  
    $taikhoan = pdo_query_one($sql); 
    return $taikhoan;
}
function dangxuat(){
    if (isset($_SESSION['user'])) {
        session_destroy();
        session_unset();
    }
}

//lien quan den dinh dang ngay roi 
?>

