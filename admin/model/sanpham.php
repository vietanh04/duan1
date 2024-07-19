<?php

function loadall_sanpham_home()
{
    $sql = "select * from sanpham where 1 order by id desc limit 0,9";
    $listsp = pdo_query($sql);
    return $listsp;
}
// Sản phẩm bán chạy
function loadall_sanpham_top10()
{
    $sql = "select * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsp = pdo_query($sql);
    return $listsp;
}
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "SELECT * FROM db_sanpham where 1 ";
    if ($kyw != "") {
        $sql .= " and ten_sp like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and ma_dm ='" . $iddm . "'";
    }
    $sql .= " order by ma_sp desc";
    $listsp = pdo_query($sql);
    return $listsp;
}
function get_sanpham($ma_dm = 0)
{
    $sql = "SELECT * FROM db_sanpham where trang_thai = 0";
    if ($ma_dm > 0) {
        $sql .= " and ma_dm ='" . $ma_dm . "'";
    }
    $sql .= " order by ma_dm desc";
    $listsp = pdo_query($sql);
    return $listsp;
}
function loadone_sanpham($ma_sp)
{
    $sql = "select * from db_sanpham where ma_sp = " . $ma_sp;
    $listsp = pdo_query_one($sql);
    return $listsp;
}
// Sản phẩm cùng loại
function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}
// Thêm sản phẩm
function insert_sanpham($ten_sp, $hinh, $gia, $mota, $ma_dm, $ngay_tao, $trang_thai, $ngay_cap_nhat)
{
    $sql = "INSERT INTO `db_sanpham`(`ten_sp`,`img`, `gia`, `mota`, `ma_dm`, `ngay_tao`, `trang_thai`, `ngay_cap_nhat`) VALUES ('$ten_sp','$hinh', $gia, '$mota', $ma_dm, '$ngay_tao', $trang_thai, '$ngay_cap_nhat')";
    echo $sql;
    pdo_execute($sql);
}
// Cập nhật sản phẩm


function update_sanpham($ma_sp, $ten_sp, $hinh, $gia, $mota, $ma_dm, $ngay_tao, $trang_thai, $ngay_cap_nhat)
{
    if ($hinh != "") {
        $sql = "UPDATE db_sanpham SET ma_sp='" . $ma_sp . "', ten_sp='" . $ten_sp . "',img='" . $hinh . "', mota='" . $mota . "',ma_dm='" . $ma_dm . "',ngay_tao='" . $ngay_tao . "',trang_thai='" . $trang_thai . "',ngay_cap_nhat='" . $ngay_cap_nhat . "'  WHERE ma_sp='" . $ma_sp . "'";
    } else {
        $sql = "UPDATE db_sanpham SET ma_sp='" . $ma_sp . "', ten_sp='" . $ten_sp . "', mota='" . $mota . "',ma_dm='" . $ma_dm . "',ngay_tao='" . $ngay_tao . "',trang_thai='" . $trang_thai . "',ngay_cap_nhat='" . $ngay_cap_nhat . "'  WHERE ma_sp='" . $ma_sp . "'";
    }
    pdo_execute($sql);
}


// Xóa sản phẩm
function delete_sanpham($ma_sp)
{
    $sql = "delete from db_sanpham WHERE ma_sp=" . $ma_sp;
    pdo_execute($sql);
}
function insert_anh_sanpham($ma_sp, $mo_ta, $anh)
{
    $sql = "INSERT INTO `db_sp_img`(`ma_sp`,`anh1`, `mo_ta` ) VALUES ('$ma_sp','$mo_ta','$anh');";
    pdo_execute($sql);
}
function insert_join_sp($ma_sp, $ten_sp, $gia, $mota, $ma_dm, $ngay_tao, $trang_thai, $ngay_cap_nhat)
{
    $sql = "INSERT INTO `db_sanpham`(`ma_sp`,`ten_sp`,`gia`,mota`,`ma_dm`,`ngay_tao`,`trang_thai`,`ngay_cap_nhat`) 
    SELECT $ma_sp,$ten_sp,$gia, $mota, $ma_dm, $ngay_tao, $trang_thai, $ngay_cap_nhat
    FROM db_danhmuc
    WHERE db_danhmuc.ma_dm =" . $ma_dm;
    pdo_execute($sql);
}
function chitiet_sp()
{
    $sql = "SELECT db_sanpham.*, db_sp_img.anh1
    FROM db_sanpham
    LEFT JOIN db_sp_img ON db_sanpham.ma_sp = db_sp_img.ma_sp;";
    $listct = pdo_query($sql);
    return $listct;
}
// insert_sanpham('fdfd','eee',1,'2222',2,'12-12-2020',0,'12-12-2021');
function get_all_sp(){
    $sql = "SELECT * from db_sanpham";
    $listsp = pdo_query($sql);
    return $listsp;
}
?>