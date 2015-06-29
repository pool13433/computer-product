<?php
@session_start();
$data = $_SESSION['person'];
$id = $data['per_id'];
$fname = $data['per_fname'];
$lname = $data['per_lname'];
$idcard = $data['per_idcard'];
$address = $data['per_address'];
$mobile = $data['per_mobile'];
$email = $data['per_email'];
$createdate = $data['per_createdate'];
$createby = $data['per_createby'];
$updatedate = $data['per_updatedate'];
$updateby = $data['per_updateby'];
$perstatus = $data['per_status'];
?>

<!-- Modal -->
<div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="form-horizontal" name="frm-profile" id="frm-profile">               
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        <i class="glyphicon glyphicon-user"></i> เปลี่ยนข้อมูลส่วนตัว
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input-fname" class="col-sm-2 control-label">ชื่อ</label>
                        <div class="col-sm-4">
                            <input type="hidden" name="input-id" value="<?= $id ?>"/>
                            <input type="text" class="form-control validate[required]" 
                                   data-errormessage-value-missing="กรุณากรอก ชื่อไทย"
                                   name="input-fname" id="input-fname" value="<?= $fname ?>"/>
                        </div>
                        <label for="input-lname" class="col-sm-2 control-label">นามสกุล</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control validate[required]" 
                                   data-errormessage-value-missing="กรุณากรอก ชื่อไทย"
                                   name="input-lname" id="input-lname" value="<?= $lname ?>"/>
                        </div>
                    </div>         
                    <div class="form-group">
                        <label for="input-idcard" class="col-sm-2 control-label">รหัสบัตรประชาชน</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control validate[required,minSize[13],maxSize[13],custom[integer]]" 
                                   data-errormessage-value-missing="กรุณากรอก รหัสบัตรประชาชน"
                                   data-errormessage-range-overflow="กรุณากรอก รหัสบัตร 13 ตัวอักษร"
                                   data-errormessage-range-underflow="กรุณากรอก รหัสบัตร 13 ตัวอักษร"
                                   data-errormessage-custom-error ="กรุณากรอก รหัสบัตร เป็นตัวเลขเท่านั้น"
                                   name="input-idcard" id="input-idcard" value="<?= $idcard ?>"/>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="input-address" class="col-sm-2 control-label">ที่อยู่</label>
                        <div class="col-sm-8">
                            <textarea class="form-control validate[required]" 
                                      data-errormessage-value-missing="กรุณากรอก ที่อยู่"
                                      name="input-address" id="input-address" ><?= $address ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-mobile" class="col-sm-2 control-label">โทรศัพท์</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control validate[required,custom[phone],minSize[10]]" 
                                   data-errormessage-value-missing="กรุณากรอก โทรศัพท์"
                                   data-errormessage-range-underflow="กรุณากรอก โทรศัพท์ 10 ให้ครบ"
                                   data-errormessage-custom-error ="กรุณากรอก โทรศัพท์ เป็นตัวเลขเท่านั้น"
                                   name="input-mobile" id="input-mobile" value="<?= $mobile ?>"/>
                        </div>
                        <label for="input-email" class="col-sm-2 control-label">อีเมลล์</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control validate[required,custom[email]]" 
                                   data-errormessage-value-missing="กรุณากรอก อีเมลล์"
                                   data-errormessage-custom-error ="กรุณากรอก อีเมลล์ ให้ถูกต้อง"
                                   name="input-email" id="input-email" value="<?= $email ?>"/>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="glyphicon glyphicon-ok-circle"></i> บันทึก                        
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-remove-circle"></i> ยกเลิก               
                    </button>                    
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var valid = $('#frm-profile').validationEngine('attach', {
            promptPosition: "centerLeft",
            scroll: false,
            onValidationComplete: function(form, status) {
                if (status == true) {
                    post_form('frm-profile', '../method/person.php?method=change_profile');
                }
            }
        });
    });
</script>
