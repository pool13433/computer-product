<?php

session_start();
include '../config/webapp.php';
include '../config/connect.php';

if (!empty($_SESSION)):
    $person = $_SESSION['person'];
    $ses_id = $person['per_id'];
endif;
$msg = '';
$url = '';
switch ($_GET['method']) {
    case 'login':
        if (!empty($_POST)):
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM person WHERE per_username = '$username' AND per_password = '$password'";
            $sql .= " AND per_status = 1";
            $query = mysql_query($sql) or die(mysql_error());
            $row = mysql_num_rows($query);
            if ($row > 0): // เจอผู้ใช้งาน
                $person = mysql_fetch_assoc($query);
                $_SESSION['person'] = $person;
                switch ($person['per_status']) {
                    case 1:
                        $url = 'backend/index.php?page=home';
                        break;
                    case 2:
                        $url = 'frontend/index.php?page=home';
                        break;
                    default:
                        break;
                }
                echo returnJson('success', 'information', 'ลงชื่อเข้าใช้งานระบบสำเร็จ', $url);
            else:
                echo returnJson('danger', 'error', 'ไม่มีข้อมูล ในระบบ', '');
            endif;
        endif;
        break;
    case 'logout':

        break;
    case 'register':

        break;
    case 'create':
        if (!empty($_POST)):
            // ########### variable ##########
            $per_id = $_POST['input-id'];
            $per_fname = $_POST['input-fname'];
            $per_lname = $_POST['input-lname'];
            $per_username = $_POST['input-username'];
            $per_password = $_POST['input-password'];
            $per_idcard = $_POST['input-idcard'];
            $per_address = $_POST['input-address'];
            $per_mobile = $_POST['input-mobile'];
            $per_email = $_POST['input-email'];
            $per_status = $_POST['combo-person'];
            // ########### variable ##########
            if (empty($_POST['input-id'])): // insert
                $sql = " INSERT INTO `person`(";
                $sql .= "  `per_fname`,";
                $sql .= " `per_lname`, `per_username`, `per_password`,";
                $sql .= " `per_idcard`, `per_address`, `per_mobile`, ";
                $sql .= " `per_email`, `per_createdate`,";
                $sql .= " `per_createby`, `per_updatedate`,";
                $sql .= " `per_updateby`, `per_status`) VALUES (";
                $sql .= " '$per_fname',";
                $sql .= " '$per_lname','$per_username','$per_password',";
                $sql .= " '$per_idcard','$per_address','$per_mobile',";
                $sql .= " '$per_email',NOW(),";
                $sql .= " $ses_id,NOW(),";
                $sql .= " $ses_id,$per_status";
                $sql .= " )";
                $msg = 'เพิ่มผู้ใช้งาน สำเร็จ';
            else: // update
                $sql = " UPDATE `person` SET";
                $sql .= " `per_fname`='$per_fname',";
                $sql .= " `per_lname`='$per_lname',";
                $sql .= " `per_username`='$per_username',";
                $sql .= " `per_password`='$per_password',";
                $sql .= " `per_idcard`='$per_idcard',";
                $sql .= " `per_address`='$per_address',";
                $sql .= " `per_mobile`='$per_mobile',";
                $sql .= " `per_email`='$per_email',";
                $sql .= " `per_updatedate`=NOW(),";
                $sql .= " `per_updateby`=$ses_id,";
                $sql .= " `per_status`=$per_status";
                $sql .= " WHERE `per_id`=$ses_id";
                $msg = 'แก้ไขผู้ใช้งาน สำเร็จ';
            endif;

            $query = mysql_query($sql) or die(mysql_error());
            if ($query):
                echo returnJson('success', 'information', $msg, 'index.php?page=list-person');
            else:
                echo returnJson('danger', 'error', $msg, '');
            endif;
        endif;
        break;
    case 'delete':
        $id = $_POST['id'];
        $query = mysql_query("DELETE FROM person WHERE per_id = $id") or die(mysql_error());
        if($query):
            echo returnJson('success', 'information', 'ลบข้อมูลสำเร็จ', '');
        endif;
        break;
    default:
        break;
}

