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
            $ses_id = $person['per_id'];
            $id = $_POST['input_id'];
            $code = $_POST['input_code'];
            $repair_createdate = $_POST['input_repair_createdate'];
            $repair_getdate = $_POST['input_repar_getdate'];
            $per_id = $_POST['input-per_id'];
            $per_fname = $_POST['input-fname'];
            $per_lname = $_POST['input-lname'];
            $per_address = $_POST['input-address'];
            $per_idcard = $_POST['input-idcard'];
            $brand = $_POST['bra_id'];
            $model = $_POST['mod_id'];
            $problem_other = $_POST['input_problem_other'];
            $createdate = $_POST['input_createdate'];
            $createby = $_POST['input_createby'];
            $updatedate = $_POST['input_updatedate'];
            $updateby = $_POST['input_updateby'];
            $status = $_POST['input_status'];

// ################## manage person ##########
            if (empty($_POST['input-per_id'])): // new customer
                $sql_person = " INSERT INTO `person`(";
                $sql_person .= "  `per_fname`, `per_lname`, `per_username`,";
                $sql_person .= " `per_password`, `per_idcard`, `per_address`, `per_mobile`, ";
                $sql_person .= " `per_email`, `per_createdate`, `per_createby`, `per_updatedate`, ";
                $sql_person .= " `per_updateby`, `per_status`) VALUES (";
                $sql_person .= " '$per_fname','$per_lname','',";
                $sql_person .= " '','$per_idcard','$per_address','',";
                $sql_person .= " '',NOW(),$ses_id,NOW(),";
                $sql_person .= " $ses_id,1";
                $sql_person .= " )";
            else: // edit customer
                $sql_person = " UPDATE `person` SET";
                $sql_person .= " `per_fname` = '$per_fname', `per_lname` = '$per_lname',";
                $sql_person .= "  `per_idcard` = '$per_idcard', `per_address` = '$per_address',";
                $sql_person .= "  `per_updatedate` = NOW(), `per_updateby` = $ses_id";
                $sql_person .= " WHERE `per_id`=$per_id";
            endif;
            $query_person = mysql_query($sql_person) or die(mysql_error());
            $insert_id = mysql_insert_id();

            if (!empty($_POST['input-per_id'])):
                $insert_id = $per_id;
            endif;
            // ################## manage person ##########
            // ################## manage repair ##########
            if (empty($_POST['input-id'])) { // INSERT 
                $sql = " INSERT INTO `repair`(";
                $sql .= " `rep_code`, `rep_repair_createdate`, ";
                $sql .= " `rep_repair_getdate`, `per_id`, `bra_id`, ";
                $sql .= " `mod_id`, `rep_problem_other`, `rep_createdate`, ";
                $sql .= " `rep_createby`, `rep_updatedate`, `rep_updateby`, ";
                $sql .= " `rep_status`) VALUES (";
                $sql .= " '$code','" . change_dateDMY_TO_YMD($repair_createdate) . "',";
                $sql .= " '" . change_dateDMY_TO_YMD($repair_getdate) . "',$insert_id,$brand,";
                $sql .= " $model,'$problem_other',NOW(),";
                $sql .= " $ses_id,NOW(),$ses_id,0";
                $sql .= " )";

                $title = 'information';
                $msg = 'เพิ่ม ใบซ่อมเครื่องคอม ใหม่ สำเร็จ';
            } else { // NEW                               
                $sql = " UPDATE `repair` SET";
                $sql .= " `rep_code`='$code',";
                $sql .= " `rep_repair_createdate`='" . change_dateDMY_TO_YMD($repair_createdate) . "',";
                $sql .= " `rep_repair_getdate`='" . change_dateDMY_TO_YMD($repair_getdate) . "',";
                $sql .= " `per_id`=$insert_id,`bra_id`=$brand,";
                $sql .= " `mod_id`=$model,`rep_problem_other`='$problem_other',";
                $sql .= " `rep_updatedate`=NOW(),`rep_updateby`=$ses_id";
                $sql .= "  WHERE `rep_id`=$id";



                $title = 'information';
                $msg = 'แก้ไข ปัญหา/สาเหตุ สำเร็จ';
            }
            // ################## manage repair ##########
            $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
            if ($query) {
                echo returnJson('success', $title, $msg, 'index.php?page=list-problem');
            } else {
                echo returnJson('error', $title, $msg, '');
            }
        }
        break;
    case 'delete':
        $id = $_POST['id'];
        $query = mysql_query("DELETE FROM problem WHERE prob_id = $id") or die(mysql_error());
        if ($query) {
            echo returnJson('success', 'information', 'ลบสำเร็จ', '');
        }
        break;
    default:
        break;
}



