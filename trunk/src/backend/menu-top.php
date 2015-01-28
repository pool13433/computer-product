<?php
if (!isset($_SESSION)) {
    @session_start();
}
$person = '';
$ses_id = '';
$per_fname = '';
$per_lname = '';
$per_status = '';
if (!empty($_SESSION['person'])):
    $person = $_SESSION['person'];
    $ses_id = $person['per_id'];
    $per_fname = $person['per_fname'];
    $per_lname = $person['per_lname'];
    $per_status = $person['per_status'];
endif;
?>
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-home"></i> ระบบซ่อมคอมพิวเตอร์ออนไลน์
                
            </a>            
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" id="btn-password" data-toggle="modal" data-target="#modal-password">
                        <i class="glyphicon glyphicon-lock"></i> เปลี่ยนรหัสผ่าน
                    </a>
                </li>
                <li>
                    <a href="#" id="btn-profile" data-toggle="modal" data-target="#modal-profile">
                        <i class="glyphicon glyphicon-user"></i> ประวัติส่วนตัว
                    </a>
                </li>
                <li><a href="#" onclick="logout()"><i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ</a></li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav>
<?php include '../modal/modal_password.php'; ?>
<?php include '../modal/modal_profile.php'; ?>