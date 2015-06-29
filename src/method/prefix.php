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
            
            if (empty($_POST['input-id'])) { // สร้างไหม่ต้องตรวจสอบ ข้อมูลก่อนว่าเคยสร้างไปหรือยัง
                $sql = " SELECT * FROM prefix WHERE pre_name = '$name'";
                $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
                $row = mysql_num_rows($query);
                if ($row > 0) {
                    exit(returnJson('error', 'เกิดข้อผิดพลาด', 'ข้อมูลถูกใช้งาน ไม่สามารถสร้างใหม่ได้', ''));
                }
            }
            
            if (empty($_POST['input-id'])) { // INSERT 
                $sql = " INSERT INTO `prefix`(";
                $sql .= " `pre_name`,`pre_createdate`, ";
                $sql .= " `pre_createby`, `pre_updatedate`, `pre_updateby`)";
                $sql .= " VALUES (";
                $sql .= " '$name',NOW(),";
                $sql .= " $per_id,NOW(),$per_id";
                $sql .= " )";
                $title = 'information';
                $msg = 'เพิ่ม คำนำหน้าชื่อ ใหม่ สำเร็จ';
            } else { // NEW                               
                $sql = " UPDATE `prefix` SET ";
                $sql .= " `pre_name`='$name',";
                $sql .= " `pre_updatedate`=NOW(),";
                $sql .= " `pre_updateby`=$per_id";
                $sql .= " WHERE pre_id = $id";
                $title = 'information';
                $msg = 'แก้ไข คำนำหน้าชื่อ สำเร็จ';
            }
            $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
            if ($query) {
                echo returnJson('success', $title, $msg, 'index.php?page=list-prefix');
            } else {
                echo returnJson('error', $title, $msg, '');
            }
        }
        break;
    case 'delete':
        $id = $_POST['id'];
        $query = mysql_query("DELETE FROM prefix WHERE pre_id = $id") or die(mysql_error());
        if ($query) {
            echo returnJson('success', 'information', 'ลบสำเร็จ', '');
        }
        break;
    default:
        break;
}



