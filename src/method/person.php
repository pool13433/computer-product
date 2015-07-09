<?php

session_start();
include '../config/webapp.php';
include '../config/connect.php';
if (!empty($_SESSION)){
    $person = $_SESSION['person'];
    $ses_id = $person['per_id'];
}
$msg = '';
$url = '';
switch ($_GET['method']) {
    case 'login':
        if (!empty($_POST)):
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM person WHERE per_username = '$username' AND per_password = '$password'";
            //$sql .= " AND per_status = 1";
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
                        $url = 'backend/index.php?page=home';
                        break;
                    case 3:
                        $url = 'backend/index.php?page=home';
                        break;
                    default:
                        break;
                }
                echo returnJson('success', 'information', 'ลงชื่อเข้าใช้งานระบบสำเร็จ', $url);
            else:
                echo returnJson('error', 'error', 'ไม่มีข้อมูล ในระบบ', '');
            endif;
        endif;
        break;
    case 'logout':
        if (!empty($_SESSION['person'])):
            unset($_SESSION['person']);
        endif;
        if (empty($_SESSION['person'])):
            echo returnJson('success', 'information', 'ออกจากระบบ', '');
        endif;
        break;
    case 'register':
        if (!empty($_POST)):
            // ########### variable ##########
            $per_fname = $_POST['input-fname'];
            $per_lname = $_POST['input-lname'];
            $per_username = $_POST['input-username'];
            $per_password = $_POST['input-password_1'];
            $per_idcard = $_POST['input-idcard'];
            $per_address = $_POST['input-address'];
            $per_mobile = $_POST['input-mobile'];
            $per_email = $_POST['input-email'];
            // ########### variable ##########
            
            
            // สร้างไหม่ต้องตรวจสอบ ข้อมูลก่อนว่าเคยสร้างไปหรือยัง
            $sql = " SELECT * FROM person WHERE per_fname = '$per_fname' AND per_lname = '$per_lname'";
            $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
            $row = mysql_num_rows($query);
            if ($row > 0) {
                exit(returnJson('error', 'เกิดข้อผิดพลาด', 'ข้อมูลถูกใช้งาน ไม่สามารถสร้างใหม่ได้', ''));
            }


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
            $sql .= " 0,NOW(),";
            $sql .= " 0,1";
            $sql .= " )";
            $msg = 'สมัครสมาชิกเรียบร้อย กรุณา ล๊อกอินเข้าสู่ระบบ';

            $query = mysql_query($sql) or die(mysql_error() . 'sql ::==' . $sql);
            if ($query):
                echo returnJson('success', 'information', $msg, 'index.php?page=login');
            else:
                echo returnJson('error', 'error', $msg, '');
            endif;
        endif;
        break;
    case 'create':
        if (!empty($_POST)):
            // ########### variable ##########
            $per_id = $_POST['input-id'];
            $per_prefix = $_POST['combo-prefix'];
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
                $sql .= "  pre_id,`per_fname`,";
                $sql .= " `per_lname`, `per_username`, `per_password`,";
                $sql .= " `per_idcard`, `per_address`, `per_mobile`, ";
                $sql .= " `per_email`, `per_createdate`,";
                $sql .= " `per_createby`, `per_updatedate`,";
                $sql .= " `per_updateby`, `per_status`) VALUES (";
                $sql .= " $per_prefix,'$per_fname',";
                $sql .= " '$per_lname','$per_username','$per_password',";
                $sql .= " '$per_idcard','$per_address','$per_mobile',";
                $sql .= " '$per_email',NOW(),";
                $sql .= " $ses_id,NOW(),";
                $sql .= " $ses_id,$per_status";
                $sql .= " )";
                $msg = 'เพิ่มผู้ใช้งาน สำเร็จ';
            else: // update
                $sql = " UPDATE `person` SET";
                $sql .= " pre_id = $per_prefix,";
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
                $sql .= " WHERE `per_id`=$per_id";
                $msg = 'แก้ไขผู้ใช้งาน สำเร็จ';
            endif;

            $query = mysql_query($sql) or die(mysql_error());
            if ($query):
                echo returnJson('success', 'information', $msg, 'index.php?page=list-person');
            else:
                echo returnJson('error', 'error', $msg, '');
            endif;
        endif;
        break;
    case 'delete':
        $id = $_POST['id'];
        $query = mysql_query("DELETE FROM person WHERE per_id = $id") or die(mysql_error());
        if ($query):
            echo returnJson('success', 'information', 'ลบข้อมูลสำเร็จ', '');
        endif;
        break;
    case 'change_password':
        if (!empty($_POST)):
            if (!empty($_POST['input-username']) && !empty($_POST['input-password_new'])):
                $username_old = $_POST['input-username'];
                $password_old = $_POST['input-password_old'];
                $password_new = $_POST['input-password_new'];
                $password_new_re = $_POST['input-password_new_re'];

                // ########## ตรวจสอบ รหัสผ่านเก่า #########
                $sql = "SELECT * FROM person WHERE per_username = '$username_old' ";
                $sql .= " AND per_password = '$password_old'";
                $query = mysql_query($sql) or die(mysql_error());
                $row = mysql_num_rows($query);
                // ########## ตรวจสอบ รหัสผ่านเก่า #########            

                if ($row > 0): // รหัสผ่านเก่าถูกต้อง
                    $sql = " UPDATE person SET";
                    $sql .= " per_password = '$password_new'";
                    $sql .= " WHERE per_username = '$username_old' and per_id = $ses_id";
                    $query = mysql_query($sql) or die(mysql_error());
                    if ($query):
                        echo returnJson('success', 'ตรวจสอบจากระบบ', 'แก้ไขรหัสผ่านใหม่สำเร็จ', 'index.php?page=home');
                    else:
                        echo returnJson('error', 'ตรวจสอบจากระบบ', 'แก้ไขรหัสผ่านใหม่ ไม่ผ่าน', '');
                    endif;
                else: // รหัสผ่านเก่าผิด
                    echo returnJson('error', 'ตรวจสอบจากระบบ', 'รหัสผ่านเก่า ไม่ถูกต้อง กรุณาตรวจสอบ', '');
                endif;
            else:
                echo returnJson('error', 'ตรวจสอบจากระบบ', 'ไม่พบค่าในการแก้ไขรหัสผ่าน', '');
            endif;
        endif;
        break;
    case 'change_profile':
        if (!empty($_POST)):
            // ########### variable ##########
            $per_id = $_POST['input-id'];
            $per_fname = $_POST['input-fname'];
            $per_lname = $_POST['input-lname'];
            $per_idcard = $_POST['input-idcard'];
            $per_address = $_POST['input-address'];
            $per_mobile = $_POST['input-mobile'];
            $per_email = $_POST['input-email'];
            // ########### variable ##########
            $sql = " UPDATE person SET ";
            $sql .= " per_fname = '$per_fname',";
            $sql .= " per_lname = '$per_lname',";
            $sql .= " per_idcard = '$per_idcard',";
            $sql .= " per_address = '$per_address',";
            $sql .= " per_mobile = '$per_mobile',";
            $sql .= " per_email = '$per_email'";
            $sql .= " WHERE per_id = $ses_id";
            $query = mysql_query($sql) or die(mysql_error() . 'sql ::==' . $sql);
            if ($query):
                // ################# set session ############
                $sql = " SELECT * FROM person WHERE  per_id = $ses_id";
                $query = mysql_query($sql) or die(mysql_error());
                $data = mysql_fetch_assoc($query);
                $_SESSION['person'] = $data;
                // ################# set session ############
                echo returnJson('success', 'ตรวจสอบจากระบบ', 'แก้ไขข้อมูลส่วนตัว สำเร็จ', 'index.php?page=home');
            else:
                echo returnJson('error', 'ตรวจสอบจากระบบ', 'แก้ไขข้อมูลส่วนตัว ไม่ สำเร็จ', '');
            endif;
        endif;
        break;
    default:
        break;
}

