<?php
include '../config/connect.php';
$id = '';
if (!empty($_GET['id'])) {
    $sql = "SELECT * FROM repair_in WHERE repin_id = " . $_GET['id'];
    $query = mysql_query($sql) or die(mysql_error());
    $data = mysql_fetch_assoc($query);
    $id = $data['equ_id'];
}
?>
<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-th-large"></i> หน้าจอทำรายการซ่อมเครื่องคอมพิวเตอร์
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=list-repair_in" class="btn btn-warning">
                <i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <form class="form-horizontal" name="frm-repair_in" id="frm-repair_in">
                <div class="form-group">
                    <label class="col-sm-2 label label-info">ข้อมูลใบซ่อม</label>                    
                </div>   
                <div class="form-group">
                    <label for="input-code" class="col-sm-2 control-label">เลขที่ใบซ่อม</label>
                    <div class="col-sm-3">
                        <input type="hidden" name="equ_id" value="<?= $id ?>"/>
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก เลขที่ใบซ่อม"
                               name="input-code" id="input-code"/>
                    </div>
                    <label class="col-sm-2 control-label"></label>
                    <label for="input-createdate" class="col-sm-2 control-label">วันที่ซ่อม</label>
                    <div class="col-sm-3 input-append date">
                        <div class="input-group">
                            <input type="text" class="form-control validate[required]"
                                   data-errormessage-value-missing="กรุณากรอก วันที่ซ่อม"
                                   name="input-createdate" id="datetext_1" readonly/>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="datebtn_1">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 label label-info">ข้อมูลลูกค้า</label>                    
                </div>   
                <div class="form-group">
                    <label for="input-fname" class="col-sm-2 control-label">ชื่อ</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก ชื่อ"
                               name="input-fname" id="input-fname"/>
                    </div>
                    <label for="input-lname" class="col-sm-1 control-label">สกุล</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก สกุล"
                               name="input-lname" id="input-lname"/>
                    </div>
                    <label for="input-address" class="col-sm-1 control-label">ที่อยู่</label>
                    <div class="col-sm-4">
                        <textarea class="form-control validate[required]" 
                                  data-errormessage-value-missing="กรุณากรอก ที่อยู่"
                                  name="input-address" id="input-address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 label label-info">ข้อมูลเครื่องคอมพิวเตอร์</label>                    
                </div>   
                <div class="form-group">
                    <label for="input-fname" class="col-sm-2 control-label">ยี้ห้อ</label>
                    <div class="col-sm-2">
                        <?php include '../config/combo-brand.php'; ?>
                    </div>
                    <label for="input-lname" class="col-sm-1 control-label">รุ่น</label>
                    <div class="col-sm-2">
                        <?php include '../config/combo-model.php'; ?>
                    </div>       
                    <label for="input-serial_number" class="col-sm-2 control-label">เลขเครื่อง</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก เลขเครื่อง"
                               name="input-serial_number" id="input-serial_number"/>
                    </div>  
                </div>
                <div class="form-group">
                    <label for="input-problem" class="col-sm-2 control-label">อาการเสีย</label>
                    <div class="col-sm-8">
                        <select class="form-control validate[required]" id="combo-problem"   multiple                             
                                data-errormessage-value-missing="กรุณากรอก อาการเสีย"
                                name="input-equipment" id="input-equipment">                              
                            <?php
                            $sql_problem = "SELECT * FROM problem";
                            $query_problem = mysql_query($sql_problem) or die(mysql_error());
                            while ($data_problem = mysql_fetch_array($query_problem)):
                                ?>
                                <option value="<?= $data_problem['prob_id'] ?>"><?= $data_problem['prob_name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <input type="hidden" name="hidden-problem" id="hidden-problem"/>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="combo-equipment" class="col-sm-2 control-label">การซ่อม-อะไหล่ที่ต้องเปลี่ยน</label>
                    <div class="col-sm-8">
                        <select class="form-control validate[required]" id="combo-equipment" multiple                             
                                data-errormessage-value-missing="กรุณาเลือก อะไหล่ที่ต้องเปลี่ยน"
                                name="input-equipment" id="input-equipment">  
                            <?php
                            $sql_equipment = "SELECT * FROM equipment";
                            $query_equipment = mysql_query($sql_equipment) or die(mysql_error());
                            while ($data_equipment = mysql_fetch_array($query_equipment)):
                                ?>
                                <option value="<?= $data_equipment['equ_id'] ?>"><?= $data_equipment['equ_name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <input type="hidden" name="hidden-equipment" id="hidden-equipment"/>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="input-fname" class="col-sm-2 control-label">สถานะ</label>
                    <div class="col-sm-8">
                        <label class="label label-info">รอซ่อม</label>
                    </div>                    
                </div>
                <div class="form-group">
                    <label class="col-sm-2 label label-info">ข้อมูลการชำระเงิน</label>                    
                </div>   
                <div class="form-group">
                    <label for="input-equipment" class="col-sm-2 control-label">วิธีการชำระเงิน</label>
                    <div class="col-sm-8">
                        <textarea class="form-control validate[required]" 
                                  data-errormessage-value-missing="กรุณากรอก อะไหล่ที่ต้องเปลี่ยน"
                                  name="input-equipment" id="input-equipment"></textarea>
                    </div>                    
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">
                            <i class="glyphicon glyphicon-saved"></i> บันทึก
                        </button>
                        <a href="index.php?page=list-repair_in" class="btn btn-warning">
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
        $('select[name=combo-brand]').on('change', function() {
            find_model(this);
        });
        var valid = $('#frm-repair_in').validationEngine('attach', {
            promptPosition: "centerLeft:50",
            scroll: false,
            onValidationComplete: function(form, status) {
                console.log('status :' + status);
                if (status == true) {
                    post_form('frm-repair_in', '../method/repair_in.php?method=create');
                }
            }
        });
        valid.css({
            'box-shadow': '2px 2px 2px 2px #888888',
            'padding': '20px',
        });

        // ###########select 2 #####################
        var selectProblem = $('#combo-problem').select2({
            placeholder: "-- คลิกเลือก อาการเสีย --",
            allowClear: true,
            closeOnSelect: true,
            //tags: true,            
            width: '70%',
        }).on("select2-open", function() {
            $('#hidden-problem').val(selectProblem.select2('val'));
        }).on("select2-selecting", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-problem').val(e.val);
        }).on("change", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-problem').val(e.val);
        });


        var selectEquipment = $('#combo-equipment').select2({
            placeholder: "-- คลิกเลือก อะไหล่ที่ต้องเปลี่ยน --",
            allowClear: true,
            closeOnSelect: true,
            //tags: true,            
            width: '70%',
        }).on("select2-open", function() {
            $('#hidden-equipment').val(selectEquipment.select2('val'));
        }).on("select2-selecting", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-equipment').val(e.val);
        }).on("change", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-equipment').val(e.val);
        });
        // ###########select 2 #####################
    });
    
</script>

