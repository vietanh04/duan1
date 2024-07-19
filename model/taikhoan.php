<?php 

function ktra_tk($ten_tk,$matkhau){
    $sql = "SELECT * FROM `db_taikhoan` WHERE ten_tk ='".$ten_tk."' AND matkhau = '".$matkhau."'";  
    echo $sql;
    $taikhoan = pdo_query_one($sql); 
    return $taikhoan;
}
function dangxuat(){
    if (isset($_SESSION['ten_tk'])) {
        session_destroy();
        session_unset();
    }
}

function get_all_tk(){
    $sql = "SELECT * from db_taikhoan order by ma_tk desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
function delete_taikhoan($id)
{
    $sql = "DELETE from db_taikhoan where ma_tk=" . $id;
    pdo_execute($sql);
}
function dangky_tk($ten_tk,$matkhau,$email){
    $sql ="INSERT INTO `db_taikhoan`(`ten_tk`,`matkhau`,`email`) VALUES ('$ten_tk','$matkhau','$email')";
    pdo_execute($sql);
}


?>