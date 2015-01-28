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
            $name = $_POST['input-name'];
            $desc = $_POST['input-desc'];
            if (empty($_POST['input-id'])) { // UPDATE 
                $sql = " INSERT INTO `equipment_type`(";
                $sql .= " `equtyp_name`, `equtyp_desc`, `equtyp_createdate`, ";
                $sql .= " `equtyp_createby`, `equtyp_updatedate`, `equtyp_updateby`)";
                $sql .= " VALUES (";
                $sql .= " '$name','$desc',NOW(),";
                $sql .= " $per_id,NOW(),$per_id";
                $sql .= " )";
                $title = 'information';
                $msg = 'เพิ่ม ประเภทอุปกรณ์ ใหม่ สำเร็จ';
            } else { // NEW                               
                $sql = " UPDATE `equipment_type` SET ";
                $sql .= " `equtyp_name`='$name',";
                $sql .= " `equtyp_desc`='$desc',";
                $sql .= " `equtyp_updatedate`=NOW(),";
                $sql .= " `equtyp_updateby`=$per_id";
                $sql .= " WHERE equtyp_id = $id";
                $title = 'information';
                $msg = 'แก้ไข ประเภทอุปกรณ์ สำเร็จ';
            }
            $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
            if ($query) {
                echo returnJson('success', $title, $msg, 'index.php?page=list-equipment_type');
            } else {
                echo returnJson('error', $title, $msg, '');
            }
        }
        break;
    case 'delete':
        $id = $_POST['id'];
        $query = mysql_query("DELETE FROM equipment_type WHERE equtyp_id = $id") or die(mysql_error());
        if ($query) {
            echo returnJson('success', 'information', 'ลบสำเร็จ', '');
        }
        break;
    default:
        break;
}



