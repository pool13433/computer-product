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

            if (empty($_POST['input-id'])) { // สร้างไหม่ต้องตรวจสอบ ข้อมูลก่อนว่าเคยสร้างไปหรือยัง
                $sql = " SELECT * FROM accessory WHERE acc_name = '$name'";
                $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
                $row = mysql_num_rows($query);
                if ($row > 0) {
                    exit(returnJson('error', 'เกิดข้อผิดพลาด', 'ข้อมูลถูกใช้งาน ไม่สามารถสร้างใหม่ได้', ''));
                }
            }

            if (empty($_POST['input-id'])) { // INSERT 
                $sql = " INSERT INTO `accessory`(";
                $sql .= " `acc_name`, `acc_desc`, `acc_createdate`, ";
                $sql .= " `acc_createby`, `acc_updatedate`, `acc_updateby`)";
                $sql .= " VALUES (";
                $sql .= " '$name','$desc',NOW(),";
                $sql .= " $per_id,NOW(),$per_id";
                $sql .= " )";
                $title = 'information';
                $msg = 'เพิ่ม อุปกรณ์เสริมที่ติดเครื่องซ่อม ใหม่ สำเร็จ';
            } else { // UPDATE                               
                $sql = " UPDATE `accessory` SET ";
                $sql .= " `acc_name`='$name',";
                $sql .= " `acc_desc`='$desc',";
                $sql .= " `acc_updatedate`=NOW(),";
                $sql .= " `acc_updateby`=$per_id";
                $sql .= " WHERE acc_id = $id";
                $title = 'information';
                $msg = 'แก้ไข อุปกรณ์เสริมที่ติดเครื่องซ่อม สำเร็จ';
            }
            $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
            if ($query) {
                echo returnJson('success', $title, $msg, 'index.php?page=list-accessory');
            } else {
                echo returnJson('error', $title, $msg, '');
            }
        }
        break;
    case 'delete':
        $id = $_POST['id'];
        $query = mysql_query("DELETE FROM accessory WHERE acc_id = $id") or die(mysql_error());
        if ($query) {
            echo returnJson('success', 'information', 'ลบสำเร็จ', '');
        }
        break;
    default:
        break;
}



