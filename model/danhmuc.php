<?php
    function insert_dm($ten_dm,$mota, $hinh){
        $sql="INSERT INTO `db_danhmuc`(`ten_dm`,`mota`, `img` ) VALUES ('$ten_dm','$mota,'$hinh')";
        pdo_execute($sql);
    }

    function get_ds_dm_all(){
        $sql= "SELECT * FROM `db_danhmuc` order by ma_dm desc";
        $listdm = pdo_query($sql);
        return $listdm;
    }
    function get_dm_one($iddm){
        $sql= "SELECT * FROM `db_danhmuc` WHERE ma_dm=".$iddm;
        $listdm = pdo_query_one($sql);
        return $listdm;
    }

    function update_dm($ten_dm,$mota,$anh,$iddm){
        $sql="UPDATE `db_danhmuc` SET `ten_dm`='$ten_dm'";
        if (!$anh == "") {
            $sql.= " ,`img`='$anh'";
        }
        $sql .=" ,`mota`='$mota' WHERE id=".$iddm;
        pdo_execute($sql);
    }
    function delete_dm($iddm){
        $sql="DELETE FROM `db_danhmuc` WHERE ma_dm=".$iddm;
        pdo_execute($sql);
    }
?>