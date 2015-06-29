<?php
include '../config/connect.php';
$id = '';
$prefix = '';
$fname = '';
$lname = '';
$username = '';
$password = '';
$password_re = '';
$idcard = '';
$address = '';
$mobile = '';
$email = '';
$createdate = '';
$createby = '';
$updatedate = '';
$updateby = '';
$perstatus = '';
if (!empty($_GET['id'])) {
    $sql = "SELECT * FROM person WHERE per_id = " . $_GET['id'];
    $query = mysql_query($sql) or die(mysql_error());
    $data = mysql_fetch_assoc($query);
    $id = $data['per_id'];
    $prefix = $data['pre_id'];
    $fname = $data['per_fname'];
    $lname = $data['per_lname'];
    $username = $data['per_username'];
    $password = $data['per_password'];
    $idcard = $data['per_idcard'];
    $address = $data['per_address'];
    $mobile = $data['per_mobile'];
    $email = $data['per_email'];
    $createdate = $data['per_createdate'];
    $createby = $data['per_createby'];
    $updatedate = $data['per_updatedate'];
    $updateby = $data['per_updateby'];
    $perstatus = $data['per_status'];
}
?>
<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-user"></i> หน้าจอเพิ่มผู้ใช้งานระบบ
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=list-person" class="btn btn-warning">
                <i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <form class="form-horizontal" name="frm-person" id="frm-person">
                <div class="form-group">
                    <label for="input-username" class="col-sm-2 control-label">username</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก username"
                               name="input-username" id="input-username" value="<?= $username ?>"/>
                    </div>
                </div>   
                <div class="form-group">
                    <label for="input-password" class="col-sm-2 control-label">รหัสผ่าน</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก รหัสผ่าน"
                               name="input-password" id="input-password" value="<?= $password ?>"/>
                    </div>
                    <label for="input-password_re" class="col-sm-3 control-label">ยืนยัน รหัสผ่านอีกครั้ง</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control validate[required,equals[input-password]]" 
                               data-errormessage-value-missing="กรุณากรอก รหัสผ่านอีกครั้ง"
                               data-errormessage-pattern-mismatch ="กรุณากรอก รหัสผ่านให้ตรงกัน"
                               name="input-password_re" id="input-password_re" value="<?= $password ?>"/>
                    </div>
                </div>   
                <hr/>
                <div class="form-group">
                    <label for="input-fname" class="col-sm-2 control-label">นำหน้าชื่อ</label>
                    <div class="col-sm-2">
                        <input type="hidden" name="input-id" value="<?= $id ?>"/>
                        <?php include '../config/combo-prefix.php'; ?>
                    </div>
                    <label for="input-fname" class="col-sm-2 control-label">ชื่อ-สกุล</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก ชื่อ" placeholder="ชื่อ"
                               name="input-fname" id="input-fname" value="<?= $fname ?>"/>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก นามสกุล" placeholder="นามสกุล"
                               name="input-lname" id="input-lname" value="<?= $lname ?>"/>
                    </div>
                </div>         
                <div class="form-group">
                    <label for="input-idcard" class="col-sm-2 control-label">รหัสบัตรประชาชน</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control validate[required,minSize[13],maxSize[13],custom[integer]]" 
                               data-errormessage-value-missing="กรุณากรอก รหัสบัตรประชาชน" placeholder="รหัสบัตรประชาชน"
                               data-errormessage-range-overflow="กรุณากรอก รหัสบัตร 13 ตัวอักษร" maxlength="13"
                               data-errormessage-range-underflow="กรุณากรอก รหัสบัตร 13 ตัวอักษร"
                               data-errormessage-custom-error ="กรุณากรอก รหัสบัตร เป็นตัวเลขเท่านั้น"
                               name="input-idcard" id="input-idcard" value="<?= $idcard ?>"/>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="input-address" class="col-sm-2 control-label">ที่อยู่</label>
                    <div class="col-sm-8">
                        <textarea class="form-control validate[required]"  placeholder="ที่อยู่"
                                  data-errormessage-value-missing="กรุณากรอก ที่อยู่"
                                  name="input-address" id="input-address" ><?= $address ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-mobile" class="col-sm-2 control-label">โทรศัพท์</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control validate[required,custom[phone],minSize[10]]" 
                               data-errormessage-value-missing="กรุณากรอก โทรศัพท์" placeholder="โทรศัพท์"
                               data-errormessage-range-underflow="กรุณากรอก โทรศัพท์ 10 ให้ครบ" maxlength="10"
                               data-errormessage-custom-error ="กรุณากรอก โทรศัพท์ เป็นตัวเลขเท่านั้น"
                               name="input-mobile" id="input-mobile" value="<?= $mobile ?>"/>
                    </div>
                    <label for="input-email" class="col-sm-2 control-label">อีเมลล์</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control validate[required,custom[email]]" 
                               data-errormessage-value-missing="กรุณากรอก อีเมลล์" placeholder="อีเมลล์"
                               data-errormessage-custom-error ="กรุณากรอก อีเมลล์ ให้ถูกต้อง"
                               name="input-email" id="input-email" value="<?= $email ?>"/>
                    </div>
                </div>   
                <div class="form-group">
                    <label for="input-address" class="col-sm-2 control-label">สถานะ</label>
                    <div class="col-sm-3">
                        <?php include '../config/combo-person.php'; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">
                            <i class="glyphicon glyphicon-saved"></i> บันทึก
                        </button>
                        <a href="index.php?page=list-person" class="btn btn-warning">
                            <i class="glyphicon glyphicon-arrow-left"></i> ยกเลิก
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var valid = $('#frm-person').validationEngine('attach', {
            promptPosition: "centerLeft",
            scroll: false,
            onValidationComplete: function (form, status) {
                if (status == true) {
                    post_form('frm-person', '../method/person.php?method=create');
                }
            }
        });
        valid.css({
            'box-shadow': '2px 2px 2px 2px #888888',
            'padding': '20px',
        });
    });
</script>
