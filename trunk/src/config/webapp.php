<?php

define('MAINPAGE', 'login.php');
//1= employee,2=repairer,3=customer
define('EMPLOYEE', 1);
define('REPAIRNAME', 2);
define('CUSTOMER', 3);

function msgBox($type, $msg) {
    return '<div class="alert alert-' . $type . '" role="alert">' . $msg . '</div>';
}

function returnJson($status, $title, $msg, $url) {
    return json_encode(array(
        'status' => $status,
        'title' => $title,
        'msg' => $msg,
        'url' => $url
            )
    );
}

function List_RepairStatus() {
    return array(
        '0' => 'รอมอบหมายช่าง',
        '1' => 'มอบหมายช่าง รอประเมินราคา',
        '2' => 'ประเมินราคา เสร็จสิ้น',
        '3' => 'ประเมินราคา ไม่ผ่าน (ไม่สามารถซ่อมได้)',
        '4' => 'อนุมัติการซ่อม',
        '5' => 'ไม่อนุมัติการซ่อม',
        '6' => 'กำลังซ่อม',        
        '7' => 'ซ่อมเสร็จ สำเร็จ',
        '8' => 'ซ่อมไม่ได้ เกิดปัญหา',
        '9' => 'รับเครื่องเสร็จสิ้น ปิดการซ่อม',
    );
}
function List_RepairStatusBG() {
    return array(
        '0' => 'warning',
        '1' => 'success',
        '2' => 'success',
        '3' => 'danger',
        '4' => 'success',
        '5' => 'danger',
        '6' => 'info',        
        '7' => 'success',
        '8' => 'danger',
        '9' => 'success',
    );
}

function List_PersonStatus() {
    return array(
        '0' => 'register',
        '1' => 'เจ้าของร้าน',
        '2' => 'พนักงานซ่อม',
        '3' => 'พนักงานร้าน',
    );
}

function List_SystemOS() {
    return array(
        'XP' => 'Windown XP',
        'ME' => 'Windown ME',
        '98' => 'Windown 98',
        '2000' => 'Windown 2000',
        '7' => 'Windown 7',
        '8' => 'Windown 8',
        'LINUX' => 'Linux',
    );
}

function getDataList($params, $list) {
    $array = $list;
    if (!empty($params)):
        $result = "";
        foreach ($array as $key => $value):
            if ($key == $params):
                $result = $value;
            endif;
        endforeach;
        return $result;
    endif;
}

function Get_Person($params) {
    $array = List_PersonStatus();
    if (!empty($params)):
        $result = "";
        foreach ($array as $key => $value):
            if ($key == $params):
                $result = $value;
            endif;
        endforeach;
        return $result;
    endif;
}

function List_Day() {
    return array(
        '1' => 'อาทิตย์',
        '2' => 'จันทร์',
        '3' => 'อังคาร',
        '4' => 'พุธ',
        '5' => 'พฤหัสบดี',
        '6' => 'ศุกร์',
        '7' => 'เสาร์',
    );
}

function Get_Day($params) {
    $array = List_Day();
    if (!empty($params)):
        $result = "";
        foreach ($array as $key => $value):
            if ($key == $params):
                $result = $value;
            endif;
        endforeach;
        return $result;
    endif;
}

function generateNextNumber($value, $digit, $prefix) {
    return $prefix . str_pad((intval($value)+1), $digit, "0", STR_PAD_LEFT);
}

function change_dateDMY_TO_YMD($beforDate) {
    $array = explode("/", $beforDate);
    return $array[2] . "-" . $array[1] . "-" . $array[0];
}

function change_dateYMD_TO_DMY($beforDate) {
    if (!empty($beforDate)) {
        $array = explode("-", $beforDate);
        return $array[2] . "/" . $array[1] . "/" . $array[0];
    } else {
        return "";
    }
}

function format_date($format, $date) {
    $date_format = new DateTime($date);
    $new_date = $date_format->format($format);
    return $new_date;
}

function array_post_to_string($array) {
    $result = '';
    for ($i = 0; $i < count($array); $i++):
        if ($i == (count($array) - 1)):
            $result += $array[$i];
        else:
            $result += $array[$i] . ',';
        endif;
    endfor;
    return $result;
}

function remove_string_empty($post) {
    $resutl = '';
    if (isset($post) && !empty($post)) {
        $resutl = $post;
    }
    return $resutl;
}

function remove_string_is_null($post) {
    $resutl = '';
    if (!is_null($post)) {
        $resutl = $post;
    }
    return $resutl;
}
