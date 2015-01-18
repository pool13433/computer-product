<?php

define('MAINPAGE', 'login.php');

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

function List_PersonStatus() {
    return array(
        '0' => 'register',
        '1' => 'เจ้าของร้าน',
        '2' => 'พนักงานซ่อม',
        '3' => 'พนักงานร้าน',
    );
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

