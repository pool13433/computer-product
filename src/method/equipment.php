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
            $brand = $_POST['combo-brand'];
            $color = $_POST['combo-color'];
            $model = $_POST['combo-model'];
            $equipment_type = $_POST['combo-equipment_type'];
            $warranty = remove_string_empty($_POST['input-warranty']);
            $price = remove_string_empty($_POST['input-price']);
            $weight = remove_string_is_null($_POST['input-weight']);
            $capacity = remove_string_is_null($_POST['input-capacity']);
            $size = remove_string_is_null($_POST['input-size']);
            $interface = remove_string_empty($_POST['input-interface']);
            $spinspeed = remove_string_empty($_POST['input-spinspeed']);
            $support = $_POST['hidden-support'];
            
            if (empty($_POST['input-id'])) { // สร้างไหม่ต้องตรวจสอบ ข้อมูลก่อนว่าเคยสร้างไปหรือยัง
                $sql = " SELECT * FROM equipment WHERE equ_name = '$name'";
                $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
                $row = mysql_num_rows($query);
                if ($row > 0) {
                    exit(returnJson('error', 'เกิดข้อผิดพลาด', 'ข้อมูลถูกใช้งาน ไม่สามารถสร้างใหม่ได้', ''));
                }
            }

            if (empty($_POST['input-id'])) { // INSERT 
                $sql = " INSERT INTO `equipment`(";
                $sql .= " `equ_name`, `equ_desc`,";
                $sql .= " `bra_id`, `col_id`, `mod_id`, `equtyp_id`,`equ_warranty`,";
                $sql .= " `equ_price`, `equ_weight`, `equ_capacity`,";
                $sql .= " `equ_size`, `equ_interface`, `equ_spinspeed`,";
                $sql .= " `equ_support`, `equ_createdate`, `equ_createby`,";
                $sql .= " `equ_updatedate`, `equ_updateby`) VALUES (";
                $sql .= " '$name','$desc',";
                $sql .= " $brand,$color,$model,$equipment_type,'$warranty',";
                $sql .= " '$price','$weight','$capacity',";
                $sql .= " '$size','$interface','$spinspeed',";
                $sql .= " '$support',NOW(),$per_id,";
                $sql .= " NOW(),$per_id";
                $sql .= " )";
                $title = 'information';
                $msg = 'เพิ่ม อุปกรณ์ ใหม่ สำเร็จ';
            } else { // UPDATE                               
                $sql = " UPDATE `equipment` SET ";
                $sql .= " `equ_name`='$name',";
                $sql .= " `equ_desc`='$desc',`bra_id`=$brand,";
                $sql .= " `col_id`=$color,`mod_id`=$model,";
                $sql .= " `equtyp_id` = $equipment_type,";
                $sql .= " `equ_warranty`='$warranty',`equ_price`='$price',";
                $sql .= " `equ_weight`='$weight',`equ_capacity`='$capacity',";
                $sql .= " `equ_size`='$size',`equ_interface`='$interface',";
                $sql .= " `equ_spinspeed`='$spinspeed',`equ_support`='$support',";
                $sql .= " `equ_updatedate`=NOW(),`equ_updateby`=$per_id";
                $sql .= " WHERE `equ_id`= $id";

                $title = 'information';
                $msg = 'แก้ไข อุปกรณ์ สำเร็จ';
            }
            $query = mysql_query($sql) or die(mysql_error() . 'sql :' . $sql);
            if ($query) {
                //echo 'break';
                echo returnJson('success', $title, $msg, 'index.php?page=list-equipment');
            } else {
                echo returnJson('error', $title, $msg, '');
            }
        }
        break;
    case 'delete':
        $id = $_POST['id'];
        $query = mysql_query("DELETE FROM equipment WHERE equ_id = $id") or die(mysql_error());
        if ($query) {
            echo returnJson('success', 'information', 'ลบสำเร็จ', '');
        }
        break;

    case 'set_default':
        if (!empty($_POST)):
            $equ_id = $_POST['id'];
            $sql = "SELECT * FROM equipment WHERE equ_id = $equ_id";
            $query = mysql_query($sql) or die(mysql_error());
            $result = mysql_fetch_assoc($query);
            $results = [];
            $datas = [];
            $datas = explode(',', $result['equ_support']);
            foreach ($datas as $value):
                $results[] = array(
                    'id' => $value,
                    'text' => getDataList($value, List_SystemOS()),
                );
            endforeach;
            echo json_encode($results);
        endif;
        break;
    default:
        break;
}



