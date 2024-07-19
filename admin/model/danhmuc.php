<?php
//ko co ma danh muc vi co auto tang id roi
    function insert_dm($ten_dm,$mota,$hinh){
        $sql="INSERT INTO `db_danhmuc`(`ten_dm`,`mota`, `img` ) VALUES ('$ten_dm','$mota','$hinh');";
        pdo_execute($sql);
    }

    function get_ds_dm_all(){
        $sql= "SELECT * FROM `db_danhmuc`";
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function get_dm_one($ma_dm){
        $sql= "SELECT * FROM `db_danhmuc` WHERE ma_dm=".$ma_dm;
        $listdm = pdo_query_one($sql);
        return $listdm;
    }

    function update_dm($ma_dm, $ten_dm, $mota, $hinh) {
        if ($hinh != "") {
            $sql = "UPDATE db_danhmuc SET ma_dm='" . $ma_dm . "', ten_dm='" . $ten_dm . "', mota='" . $mota . "', img='" . $hinh . "' WHERE ma_dm='" . $ma_dm . "'";
        } else {
            $sql = "UPDATE db_danhmuc SET ma_dm='" . $ma_dm . "', ten_dm='" . $ten_dm . "', mota='" . $mota . "' WHERE ma_dm='" . $ma_dm . "'";
        }
    
        pdo_execute($sql);
    }
    function delete_dm($ma_dm){
        $sql="DELETE FROM `db_danhmuc` WHERE ma_dm=".$ma_dm;
        pdo_execute($sql);
    }
?>