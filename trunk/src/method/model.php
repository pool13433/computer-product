<?php

session_start();
include '../config/connect.php';
include '../config/webapp.php';
$person = $_SESSION['person'];
$msg = '';
$title = 'error';
switch ($_GET['method']) {
    case 'create':
        if (!empty($_POST)) {
            $per_id = $person['per_id'];
            $id = $_POST['input-id'];
            $nameth = $_POST['input-nameth'];
            $nameeng = $_POST['input-nameeng'];
            $brand = $_POST['combo-brand'];
            if (empty($_POST['input-id'])) { // UPDATE 
                $sql = " INSERT INTO `model`(";
                $sql .= " `mod_nameth`, `mod_nameeng`,`bra_id`, `mod_createdate`, ";
                $sql .= " `mod_createby`, `mod_updatedate`, `mod_updateby`)";
                $sql .= " VALUES (";
                $sql .= " '$nameth','$nameeng',$brand,NOW(),";
                $sql .= " $per_id,NOW(),$per_id";
                $sql .= " )";
                $title = 'information';
                $msg = 'เพิ่ม รุ่นคอมพิวเตอร์ ใหม่ สำเร็จ';
            } else { // NEW                               
                $sql = " UPDATE `model` SET ";
                $sql .= " `mod_nameth`='$nameth',";
                $sql .= " `mod_nameeng`='$nameeng',";
                $sql .= " `bra_id`=$brand,";
                $sql .= " `mod_updatedate`=NOW(),";
                $sql .= " `mod_updateby`=$per_id";
                $sql .= " WHERE mod_id = $id";
                $title = 'information';
                $msg = 'แก้ไข รุ่นคอมพิวเตอร์ สำเร็จ';
            }
            $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
            if ($query) {
                echo returnJson('success', $title, $msg, 'index.php?page=list-model');
            } else {
                echo returnJson('error', $title, $msg, '');
            }
        }
        break;
    case 'delete':
        $id = $_POST['id'];
        $query = mysql_query("DELETE FROM model WHERE mod_id = $id") or die(mysql_error());
        if ($query) {
            echo returnJson('success', 'information', 'ลบสำเร็จ', '');
        }
        break;
    case 'find_model':
        if (!empty($_POST)):
            $list = [];
            $brand = $_POST['brand'];
            $sql = " SELECT * FROM model WHERE 1=1 ";
            if (!empty($_POST['brand'])):
                $sql .= " AND bra_id = $brand";
            endif;
            $sql .= " ORDER BY mod_nameth ASC";
            //echo 'sql ::=='.$sql;
            $query = mysql_query($sql) or die(mysql_error());
            while ($row = mysql_fetch_array($query)) {
                $list[] = $row;
            }
            echo json_encode($list);
        endif;
        break;
    default:
        break;
}



