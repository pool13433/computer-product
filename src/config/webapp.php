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
