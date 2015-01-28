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
            if (empty($_POST['input-id'])) { // UPDATE 
                $sql = " INSERT INTO `color`(";
                $sql .= " `col_name`,`col_createdate`, ";
                $sql .= " `col_createby`, `col_updatedate`, `col_updateby`)";
                $sql .= " VALUES (";
                $sql .= " '$name',NOW(),";
                $sql .= " $per_id,NOW(),$per_id";
                $sql .= " )";
                $title = 'information';
                $msg = 'เพิ่ม สี ใหม่ สำเร็จ';
            } else { // NEW                               
                $sql = " UPDATE `color` SET ";
                $sql .= " `col_name`='$name',";
                $sql .= " `col_updatedate`=NOW(),";
                $sql .= " `col_updateby`=$per_id";
                $sql .= " WHERE col_id = $id";
                $title = 'information';
                $msg = 'แก้ไข สี สำเร็จ';
            }
            $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
            if ($query) {
                echo returnJson('success', $title, $msg, 'index.php?page=list-color');
            } else {
                echo returnJson('error', $title, $msg, '');
            }
        }
        break;
    case 'delete':
        $id = $_POST['id'];
        $query = mysql_query("DELETE FROM color WHERE col_id = $id") or die(mysql_error());
        if ($query) {
            echo returnJson('success', 'information', 'ลบสำเร็จ', '');
        }
        break;
    default:
        break;
}



