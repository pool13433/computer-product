<?php
include '../config/connect.php';
$id = '';
$code = '';
$repair_createdate = '';
$repair_getdate = '';
$per_id = '';
$per_fname = '';
$per_lname = '';
$per_idcard = '';
$per_address = '';
$brand = '';
$model = '';
$problem_other = '';
$payment = '';
$serial_number = '';
$createdate = '';
$createby = '';
$updatedate = '';
$updateby = '';
$status = '';
if (!empty($_GET['id'])) {
    $sql = "SELECT * FROM repair r";
    $sql .= " LEFT JOIN person p ON p.per_id = r.per_id";
    $sql .= " WHERE r.rep_id = " . $_GET['id'];
    $query = mysql_query($sql) or die(mysql_error());
    $data = mysql_fetch_assoc($query);
    $id = $data['rep_id'];
    $code = $data['rep_code'];
    $repair_createdate = $data['rep_repair_createdate'];
    $repair_getdate = $data['rep_repair_getdate'];
    $per_id = $data['per_id'];
    $per_fname = $data['per_fname'];
    $per_lname = $data['per_lname'];
    $per_address = $data['per_address'];
    $per_idcard = $data['per_idcard'];
    $brand = $data['bra_id'];
    $model = $data['mod_id'];
    $serial_number = $data['rep_serial_number'];
    $problem_other = $data['rep_problem_other'];
    $payment = $data['rep_payment'];
    $createdate = $data['rep_createdate'];
    $createby = $data['rep_createby'];
    $updatedate = $data['rep_updatedate'];
    $updateby = $data['rep_updateby'];
    $status = $data['rep_status'];
}
if (empty($code)) {
    $query_auto = mysql_query('SELECT rep_id FROM repair ORDER BY rep_id DESC limit 0,1') or die(mysql_error());
    $result = mysql_fetch_assoc($query_auto);
    $code = generateNextNumber($result['rep_id'], 8, 'RP');
}
// ############## check permission disabled #############
if ($_SESSION['person']['per_status'] == EMPLOYEE) { // พนักงานจะสามารถแก้ไขได้ทั้งหน้า
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            //$('.form-control,.btn').attr('disabled', true);
             $('input:not(:disabled):not([readonly])').each(function() {
                $(this).attr('visible',true);
            });
        });
    </script>
    <?php
} else if ($_SESSION['person']['per_status'] == REPAIRNAME) { // ช่างซ่อมเห็นได้บางส่วน
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            //$('.form-control,.btn').attr('disabled', true);
//            $('input:not(:visible):not([readonly])').each(function() {
//                $(this).foo();
//            });
        });
    </script>
    <?php
} else if ($_SESSION['person']['per_status'] == CUSTOMER) { // ลูกค้า
    ?>
    <script type="text/javascript">
    </script>
    <?php
}
// ############## check permission disabled #############
?>
<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-th-large"></i> หน้าจอทำรายการซ่อมเครื่องคอมพิวเตอร์
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=list-repair" class="btn btn-warning">
                <i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <form class="form-horizontal" name="frm-repair" id="frm-repair">
                <div class="form-group">
                    <label class="col-sm-2 label label-info">ข้อมูลใบซ่อม</label>                    
                </div>   
                <div class="form-group">
                    <label for="input-code" class="col-sm-2 control-label">เลขที่ใบซ่อม</label>
                    <div class="col-sm-3">
                        <input type="hidden" name="input-id" id="input-id" value="<?= $id ?>"/>
                        <input type="text" class="form-control" 
                               data-validation-engine="validate[required]"
                               data-errormessage-value-missing="กรุณากรอก เลขที่ใบซ่อม" value="<?= $code ?>"
                               name="input-code" id="input-code"/>
                    </div>
                    <label class="col-sm-2 control-label"></label>
                    <label for="input-createdate" class="col-sm-2 control-label">วันที่ซ่อม</label>
                    <div class="col-sm-3 input-append date">
                        <div class="input-group">
                            <input type="text" class="form-control" data-date-format="dd/mm/yyyy"
                                   data-validation-engine="validate[required]"
                                   data-errormessage-value-missing="กรุณากรอก วันที่ซ่อม" value="<?= format_date('d-m-Y', $repair_createdate) ?>"
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
                    <div class="col-sm-3">
                        <input type="hidden" name="input-per_id" value="<?= $per_id ?>"/>
                        <input type="text" class="form-control" 
                               data-validation-engine="validate[required]"
                               data-errormessage-value-missing="กรุณากรอก ชื่อ" value="<?= $per_fname ?>"
                               name="input-fname" id="input-fname"/>
                    </div>
                    <label for="input-lname" class="col-sm-1 control-label">สกุล</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="<?= $per_lname ?>"
                               data-validation-engine="validate[required]"
                               data-errormessage-value-missing="กรุณากรอก สกุล"
                               name="input-lname" id="input-lname"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-idcard" class="col-sm-2 control-label">รหัสบัตร</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" maxlength="13"
                               data-validation-engine="validate[required,maxSize[13],minSize[13]]"
                               data-errormessage-value-missing="กรุณากรอก รหัสบัตร"
                               data-errormessage-range-underflow="กรุณากรอก รหัสบัตร 13 หลัก"
                               data-errormessage-range-overflow="กรุณากรอก รหัสบัตร 13 หลัก" value="<?= $per_idcard ?>"
                               name="input-idcard" id="input-idcard"/>
                    </div>
                    <label for="input-address" class="col-sm-1 control-label">ที่อยู่</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" 
                                  data-validation-engine="validate[required]"
                                  data-errormessage-value-missing="กรุณากรอก ที่อยู่"
                                  name="input-address" id="input-address"><?= $per_address ?></textarea>
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
                        <input type="text" class="form-control" value="<?= $serial_number ?>"
                               data-validation-engine="validate[required]"
                               data-errormessage-value-missing="กรุณากรอก เลขเครื่อง"
                               name="input-serial_number" id="input-serial_number"/>
                    </div>  
                </div>
                <div class="form-group">
                    <label for="input-problem" class="col-sm-2 control-label">อาการเสีย</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="combo-problem"   multiple  
                                data-validation-engine="validate[required]"
                                data-errormessage-value-missing="กรุณาเลือก อาการเสีย"
                                name="input-equipment" id="input-equipment">                              
                                    <?php
                                    $sql_problem = "SELECT * FROM problem";
                                    $query_problem = mysql_query($sql_problem) or die(mysql_error());
                                    while ($data_problem = mysql_fetch_array($query_problem)):
                                        ?>
                                <option value="<?= $data_problem['prob_id'] ?>"><?= $data_problem['prob_name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <input type="hidden" name="hidden-problem" id="hidden-problem"
                               class="form-control validate[required]"                           
                               data-errormessage-value-missing="กรุณากรอก อาการเสีย"/>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="input-problem_other" class="col-sm-2 control-label">อาการเสีย หรือ ปัญหา อื่นๆ</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" 
                                  name="input-problem_other" id="input-problem_other"><?= $problem_other ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="combo-equipment" class="col-sm-2 control-label">การซ่อม-อะไหล่ที่ต้องเปลี่ยน</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="combo-equipment" multiple                             
                                data-validation-engine="validate[required]"
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
                    <label for="combo-accessory" class="col-sm-2 control-label">อุปกรณ์ที่ติดเครื่องมา</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="combo-accessory" multiple                             
                                data-validation-engine="validate[required]"
                                data-errormessage-value-missing="กรุณาเลือก อุปกรณ์เสริมที่ติดเครื่อง"
                                name="input-accessory" id="input-accessory">  
                                    <?php
                                    $sql_accessory = "SELECT * FROM accessory";
                                    $query_accessory = mysql_query($sql_accessory) or die(mysql_error());
                                    while ($data_accessory = mysql_fetch_array($query_accessory)):
                                        ?>
                                <option value="<?= $data_accessory['acc_id'] ?>"><?= $data_accessory['acc_name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <input type="hidden" name="hidden-accessory" id="hidden-accessory"/>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="input-fname" class="col-sm-2 control-label">สถานะ</label>
                    <div class="col-sm-8">
                        <label class="label label-<?= getDataList($status, List_RepairStatusBG())?>"><?= getDataList($status, List_RepairStatus())?></label>
                    </div>                    
                </div>
                <div class="form-group">
                    <label class="col-sm-2 label label-info">ข้อมูลการชำระเงิน</label>                    
                </div>   
                <div class="form-group">
                    <label for="input-equipment" class="col-sm-2 control-label">วิธีการชำระเงิน</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" 
                                  data-validation-engine="validate[required]"
                                  data-errormessage-value-missing="กรุณากรอก วิธีการชำระเงิน"
                                  name="input-payment" id="input-payment"><?= $payment ?></textarea>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="input-createdate" class="col-sm-2 control-label">วันที่มารับเครื่อง</label>
                    <div class="col-sm-3 input-append date">
                        <div class="input-group">
                            <input type="text" class="form-control validate[required]"
                                   data-errormessage-value-missing="กรุณากรอก วันที่ซ่อม" value="<?= format_date('d-m-Y', $repair_createdate) ?>"
                                   data-date-format="dd/mm/yyyy" name="input-getdate" id="datetext_2" readonly/>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="datebtn_2">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">
                            <i class="glyphicon glyphicon-saved"></i> บันทึก
                        </button>
                        <a href="index.php?page=list-repair" class="btn btn-warning">
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
        var selectProblem = $('#combo-problem').select2();
        var selectEquipment = $('#combo-equipment').select2();
        var selectAccessory = $('#combo-accessory').select2();
        // ################ load default data ######
        var edit_id = $('#input-id').val();
        console.log('edit_id ::==' + edit_id);
        if (edit_id != '') {
            $.post('../method/repair.php?method=get_default_select2',
                    {
                        id: edit_id,
                    }, function(defaultData) {
                selectProblem.select2("data", defaultData.problems);
                $('#hidden-problem').val(selectProblem.select2('val'));

                selectEquipment.select2("data", defaultData.equipments);
                $('#hidden-equipment').val(selectEquipment.select2('val'));
                
                selectAccessory.select2("data", defaultData.accessory);
                $('#hidden-accessory').val(selectAccessory.select2('val'));
            }, 'json');
        }
        // ################ load default data ######

        var valid = $('#frm-repair').validationEngine('attach', {
            promptPosition: "centerLeft:50",
            scroll: false,
            onValidationComplete: function(form, status) {
                console.log('status :' + status);
                if (status) {
                    post_form('frm-repair', '../method/repair.php?method=create');
                }
            }
        });
        valid.css({
            'box-shadow': '2px 2px 2px 2px #888888',
            'padding': '20px',
        });

        // ###########select 2 #####################
        selectProblem.select2({
            placeholder: "-- คลิกเลือก อาการเสีย --",
            allowClear: true,
            closeOnSelect: true,
            //tags: true,            
            width: '100%',
        }).on("select2-open", function() {
            $('#hidden-problem').val(selectProblem.select2('val'));
        }).on("select2-selecting", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-problem').val(e.val);
        }).on("change", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-problem').val(e.val);
        });


        selectEquipment.select2({
            placeholder: "-- คลิกเลือก อะไหล่ที่ต้องเปลี่ยน --",
            allowClear: true,
            closeOnSelect: true,
            //tags: true,            
            width: '100%',
        }).on("select2-open", function() {
            $('#hidden-equipment').val(selectEquipment.select2('val'));
        }).on("select2-selecting", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-equipment').val(e.val);
        }).on("change", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-equipment').val(e.val);
        });
        
        selectAccessory.select2({
            placeholder: "-- คลิกเลือก อุปกรณ์เสริมที่ติดเครื่อง --",
            allowClear: true,
            closeOnSelect: true,
            //tags: true,            
            width: '100%',
        }).on("select2-open", function() {
            $('#hidden-accessory').val(selectEquipment.select2('val'));
        }).on("select2-selecting", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-accessory').val(e.val);
        }).on("change", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-accessory').val(e.val);
        });
        // ###########select 2 #####################
    });
    function validateProblem(field, rules, i, options) {
        /*console.log('field ::==' + field);
         console.log('\n rules ::==' + rules);
         console.log('\n i ::==' + i);
         console.log('\n options ::==' + options);*/
        var problem = $('#hidden-problem').val();
        //console.log('\n problem ::=='+problem);
        if (problem == '') {
            //return 'กรุณาเลือก อาการเสีย';
            return options.allrules.validate2fields.alertText;
        }
    }
    function validateEquipment() {
        var problem = $('#hidden-equipment').val();
        if (problem == '') {
            return 'กรุณาเลือก อะไหล่ที่ต้องเปลี่ยน';
        }
    }
</script>

