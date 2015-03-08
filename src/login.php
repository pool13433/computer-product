<div class="container">
    <form class="form-signin" id="frm-login">
        <h3 class="form-signin-heading">ลงชื่อเข้าใช้งทนระบบ ซ่อมคอมพิวเตอร์ออนไลน์</h3>        
        <label for="input-username" class="sr-only">Username</label>
        <input type="text" id="input-username" class="form-control validate[required]" 
               data-errormessage-value-missing="กรุณากรอก username" placeholder="Username">
        <label for="input-password" class="sr-only">Password</label>
        <input type="password" id="input-password" class="form-control validate[required]" 
               data-errormessage-value-missing="กรุณากรอก password" placeholder="Password">
        <div class="checkbox">
            <label>
                <input type="checkbox" id="cookie" value="1"> จำข้อมูลฉันไว้
            </label>
        </div>
        <button class="btn btn-lg btn-success btn-block" type="submit">
            <i class="glyphicon glyphicon-log-in"></i> เข้าระบบ
        </button>
        <hr/>
        <div style="text-align: center">
            <a href="javascript:void(0)" class="btn btn-info btn-sm">
                <i class="glyphicon glyphicon-question-sign"></i> ลืมรหัสผ่าน
            </a>
            ||
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-register">
                <i class="glyphicon glyphicon-registration-mark"></i> ลงทะเบียนใหม่
            </button>
        </div>
    </form>
</div>
<?php include './modal/modal_register.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        var valid = $('#frm-login').validationEngine('attach', {
            promptPosition: "centerRight",
            scroll: false,
            onValidationComplete: function(form, status) {
                if (status) {
                    login();
                }
            }
        });
        valid.css({
            'box-shadow': '2px 2px 2px 2px #888888',
            'padding': '20px',
        });
    });

</script>