<?php
include '../config/connect.php';
$id = "";
$name = "";
$desc = "";
if (!empty($_GET['id'])) {
    $sql = "SELECT * FROM problem WHERE prob_id = " . $_GET['id'];
    $query = mysql_query($sql) or die(mysql_error());
    $data = mysql_fetch_assoc($query);
    $id = $data['prob_id'];
    $name = $data['prob_name'];
    $desc = $data['prob_desc'];
}
?>
<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-th-large"></i> หน้าจอ อาการเสีย
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=list-problem" class="btn btn-warning">
                <i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <form class="form-horizontal" name="frm-problem" id="frm-problem">
                <div class="form-group">
                    <label for="input-name" class="col-sm-2 control-label">ชื่อปัญหา</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="input-id" value="<?= $id ?>"/>
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก ชื่อปัญหา"
                               name="input-name" id="input-name" value="<?= $name ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-nameeng" class="col-sm-2 control-label">อธิบาย ปัญหา</label>
                    <div class="col-sm-6">
                        <textarea class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก อธิบาย ปัญหา"
                               name="input-desc" id="input-desc"><?=$desc?></textarea>
                    </div>
                </div>    
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">
                            <i class="glyphicon glyphicon-saved"></i> บันทึก
                        </button>
                        <a href="index.php?page=list-problem" class="btn btn-warning">
                            <i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var valid = $('#frm-problem').validationEngine('attach', {
            promptPosition: "centerRight",
            scroll: false,
            onValidationComplete: function(form, status) {
                console.log('status :' + status);
                if (status == true) {
                    post_form('frm-problem', '../method/problem.php?method=create');
                }
            }
        });
        valid.css({
            'box-shadow': '2px 2px 2px 2px #888888',
            'padding': '20px',
        });
    });
</script>