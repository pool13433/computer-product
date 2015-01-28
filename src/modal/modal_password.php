<?php
@session_start();
$username = $_SESSION['person']['per_username'];
$password_old_reset = '';
?>
<div id="modal-password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <form class="form-horizontal" name="frm-password" id="frm-password">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        <i class="glyphicon glyphicon-lock"></i> เปลี่ยนรหัสผ่าน
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="input-username" class="col-sm-4 control-label">username</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control validate[required]" 
                                       data-errormessage-value-missing="กรุณากรอก username"
                                       name="input-username" id="input-username" value="<?= $username ?>"/>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label for="input-password_old" class="col-sm-4 control-label">รหัสผ่าน เก่า</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control validate[required]" 
                                       data-errormessage-value-missing="กรุณากรอก รหัสผ่าน"
                                       name="input-password_old" id="input-password_old" value="<?= $password_old_reset ?>"/>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="input-password_new" class="col-sm-4 control-label">รหัสผ่าน ใหม่</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control validate[required]" 
                                       data-errormessage-value-missing="กรุณากรอก รหัสผ่าน ใหม่"
                                       name="input-password_new" id="input-password_new"/>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="input-password_new_re" class="col-sm-4 control-label">ยืนยัน ใหม่ รหัสผ่านอีกครั้ง</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control validate[required,equals[input-password_new]]" 
                                       data-errormessage-value-missing="กรุณากรอก ยืนยัน ใหม่ รหัสผ่านอีกครั้ง"
                                       data-errormessage-pattern-mismatch ="กรุณากรอก รหัสผ่านใหม่ ให้ตรงกัน"
                                       name="input-password_new_re" id="input-password_new_re"/>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-ok-circle"></i> บันทึก
                    </button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                        <i class="glyphicon glyphicon-remove-circle"></i> ปิด
                    </button>                    
                </div>
            </div>        
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var valid = $('#frm-password').validationEngine('attach', {
            promptPosition: "centerRight:-50",
            scroll: false,
            onValidationComplete: function(form, status) {
                if (status) {
                    post_form('frm-password', '../method/person.php?method=change_password');
                }
            }
        });
    });
</script>
