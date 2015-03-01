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
            $rep_id = $_POST['input-id'];
            $code = $_POST['input-code'];
            $repair_createdate = change_dateDMY_TO_YMD($_POST['input-createdate']);
            $repair_getdate = change_dateDMY_TO_YMD($_POST['input-getdate']);
            $per_id = $_POST['input-per_id'];
            $per_fname = $_POST['input-fname'];
            $per_lname = $_POST['input-lname'];
            $per_address = $_POST['input-address'];
            $per_idcard = $_POST['input-idcard'];
            $brand = $_POST['combo-brand'];
            $model = $_POST['combo-model'];
            $problem_other = $_POST['input-problem_other'];
            $serial_number = $_POST['input-serial_number'];
            $problem = $_POST['hidden-problem'];
            $equipment = $_POST['hidden-equipment'];
            $payment = $_POST['input-payment'];
            //exit('stop');
            //
            // ################## check person id ##########
            $sql_idcard = mysql_query("SELECT * FROM person WHERE per_idcard = '$per_idcard'") or die(mysql_error());
            $result_person = mysql_fetch_assoc($sql_idcard);
            $result_idcard = mysql_num_rows($sql_idcard);
            // ################## check person id ##########
            // 
            // ################## manage person ##########
            if ((empty($_POST['input-per_id']) && $result_idcard == 0) ||
                    (!empty($_POST['input-per_id']) && $result_idcard == 0)) { // new customer และ ไม่เคยที่ รหัส ในระบบ
                $sql_person = " INSERT INTO `person`(";
                $sql_person .= "  `per_fname`, `per_lname`, `per_username`,";
                $sql_person .= " `per_password`, `per_idcard`, `per_address`, `per_mobile`, ";
                $sql_person .= " `per_email`, `per_createdate`, `per_createby`, `per_updatedate`, ";
                $sql_person .= " `per_updateby`, `per_status`) VALUES (";
                $sql_person .= " '$per_fname','$per_lname','',";
                $sql_person .= " '','$per_idcard','$per_address','',";
                $sql_person .= " '',NOW(),$ses_id,NOW(),";
                $sql_person .= " $ses_id," . CUSTOMER;
                $sql_person .= " )";
            } else if ((empty($_POST['input-per_id']) && $result_idcard > 0) ||
                    (!empty($_POST['input-per_id']) && $result_idcard > 0)) { // ลูกค้าฝหม่ และมีรหัสในระบบ
                $sql_person = " UPDATE `person` SET";
                $sql_person .= " `per_fname` = '$per_fname', `per_lname` = '$per_lname',";
                $sql_person .= "  `per_idcard` = '$per_idcard', `per_address` = '$per_address',";
                $sql_person .= "  `per_updatedate` = NOW(), `per_updateby` = $ses_id";
                $sql_person .= " WHERE `per_idcard`='$per_idcard'";
            } else { // edit customer
                $sql_person = " UPDATE `person` SET";
                $sql_person .= " `per_fname` = '$per_fname', `per_lname` = '$per_lname',";
                $sql_person .= "  `per_idcard` = '$per_idcard', `per_address` = '$per_address',";
                $sql_person .= "  `per_updatedate` = NOW(), `per_updateby` = $ses_id";
                $sql_person .= " WHERE `per_id`=$per_id";
            }
            $query_person = mysql_query($sql_person) or die(mysql_error());
            $insert_id = mysql_insert_id();

            if ((empty($_POST['input-per_id']) && $result_idcard == 0) ||
                    (!empty($_POST['input-per_id']) && $result_idcard == 0)) {
                $insert_id = $insert_id;
            } else if ((empty($_POST['input-per_id']) && $result_idcard > 0) ||
                    (!empty($_POST['input-per_id']) && $result_idcard > 0)) {
                $insert_id = $result_person['per_id'];
            }
// ################## manage person ##########
// ################## manage repair ##########
            if (empty($_POST['input-id'])) { // INSERT 
                $sql = " INSERT INTO `repair`(";
                $sql .= " `rep_code`, `rep_repair_createdate`, ";
                $sql .= " `rep_repair_getdate`, `per_id`, `bra_id`, rep_serial_number,";
                $sql .= " `mod_id`,rep_problem,rep_equipment, `rep_problem_other`, rep_payment,`rep_createdate`, ";
                $sql .= " `rep_createby`, `rep_updatedate`, `rep_updateby`, ";
                //$sql .= " `rep_repairers`, `rep_expect_startdate`, `rep_expect_enddate`,";
                //$sql .= " `rep_estimate_price`, `rep_actual_startdate`, `rep_actual_enddate`, `rep_repair_remark`,";
                $sql .= " `rep_status`) VALUES (";
                $sql .= " '$code','$repair_createdate',";
                $sql .= " '$repair_getdate',$insert_id,$brand,'$serial_number',";
                $sql .= " $model,'$problem','$equipment','$problem_other','$payment',NOW(),";
                $sql .= " $ses_id,NOW(),$ses_id,0"; // 0 = รอมอบหมายช่าง
                $sql .= " )";

                $title = 'information';
                $msg = 'เพิ่ม ใบซ่อมเครื่องคอม ใหม่ สำเร็จ';
            } else { // Update                               
                $sql = " UPDATE `repair` SET";
                $sql .= " `rep_code`='$code',";
                $sql .= " `rep_repair_createdate`='$repair_createdate',";
                $sql .= " `rep_repair_getdate`='$repair_getdate',";
                $sql .= " `per_id`=$insert_id,`bra_id`=$brand,";
                $sql .= " rep_serial_number = '$serial_number',";
                $sql .= " rep_problem = '$problem',rep_equipment = '$equipment',";
                $sql .= " `mod_id`=$model,`rep_problem_other`='$problem_other',";
                $sql .= " rep_payment = '$payment',";
                $sql .= " `rep_updatedate`=NOW(),`rep_updateby`=$ses_id";
                $sql .= "  WHERE `rep_id`=$rep_id";

                $title = 'information';
                $msg = 'แก้ไข ใบซ่อมเครื่องคอม สำเร็จ';
            }
            //echo 'sql ::=='.$sql;
            //exit('stop');
// ################## manage repair ##########
            $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
            if ($query) {
                echo returnJson('success', $title, $msg, 'index.php?page=list-repair');
            } else {
                echo returnJson('error', $title, $msg, '');
            }
        }
        break;
    case 'delete':
        $id = $_POST['id'];
        $query = mysql_query("DELETE FROM repair WHERE rep_id = $id") or die(mysql_error());
        if ($query) {
            echo returnJson('success', 'information', 'ลบสำเร็จ', '');
        }
        break;
    case 'get_default_select2':
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $result = [];

            // ############# repair ###############
            $query_repair = mysql_query("SELECT * FROM repair WHERE rep_id = $id") or die(mysql_error());
            $dataRepair = mysql_fetch_assoc($query_repair);
            $rowRepair = mysql_num_rows($query_repair);
            // ############# repair ###############
            if ($rowRepair > 0) {
                // ############# problem ###############
                $problems = array();
                if (!empty($dataRepair['rep_problem'])) {
                    $sql_problem = " SELECT * FROM problem";
                    $sql_problem .= " WHERE prob_id in (" . $dataRepair ['rep_problem'] . ")";
                    $query_problem = mysql_query($sql_problem) or die(mysql_error() . 'sql ::==' . $sql_problem);
                    while ($objproblem = mysql_fetch_array($query_problem)) {
                        $problems[] = array(
                            'id' => $objproblem['prob_id'],
                            'text' => $objproblem['prob_name'],
                        );
                    }
                }
                // ############# problem ###############
                // ############# equipment ###############
                $equipments = array();
                if (!empty($dataRepair['rep_equipment'])) {
                    $sql_equipment = " SELECT * FROM equipment";
                    $sql_equipment .= " WHERE equ_id in ( " . $dataRepair ['rep_equipment'] . ")";
                    $query_equipment = mysql_query($sql_equipment) or die(mysql_error() . 'sql ::==' . $sql_equipment);
                    while ($objequipment = mysql_fetch_array($query_equipment)) {
                        $equipments[] = array(
                            'id' => $objequipment['equ_id'],
                            'text' => $objequipment['equ_name'],
                        );
                    }
                }
            }
            // ############# equipment ###############
            echo json_encode(array(
                'problems' => $problems,
                'equipments' => $equipments,
            ));
        }
        break;
    case 'assign_repairman': // มอบหมายงาน
        if(!empty($_POST)){
            $rep_id = $_POST['input-id'];
            $repairman = $_POST['combo-repairman'];
            $expect_startdate = change_dateDMY_TO_YMD($_POST['input-expect_startdate']);
            $expect_enddate = change_dateDMY_TO_YMD($_POST['input-expect_enddate']);
            $sql = " UPDATE repair SET ";
            $sql .= " rep_repairers = $repairman,";
            $sql .= " rep_expect_startdate = '$expect_startdate',";
            $sql .= " rep_expect_enddate = '$expect_enddate',";
            $sql .= " rep_status = 1"; // 1 = มอบหมายเสร็จสิ้น
            $sql .= " WHERE rep_id = $rep_id";
            $query = mysql_query($sql) or die(mysql_error().'sql ::=='.$sql);
            if ($query) {
                echo returnJson('success', 'information', 'มอบหมายงานซ่อมให้ช่าง เรียบร้อย', 'index.php?page=list-repairman');
            } else {
                echo returnJson('error', 'error', 'มอบหมายงาน ไม่ได้เกิดปัญหา', '');
            }
        }
        break;
    default:
        break;
}



