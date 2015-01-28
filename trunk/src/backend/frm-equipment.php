<?php
include '../config/connect.php';
$id = '';
$name = '';
$desc = '';
$brand = '';
$equipment = '';
$model = '';
$color = '';
$warranty = '';
$price = '';
$weight = '';
$capacity = '';
$size = '';
$interface = '';
$spinspeed = '';
$support = '';
$createdate = '';
$createby = '';
$updatedate = '';
$updateby = '';
if (!empty($_GET['id'])) {
    $sql = "SELECT * FROM equipment WHERE equ_id = " . $_GET['id'];
    $query = mysql_query($sql) or die(mysql_error());
    $data = mysql_fetch_assoc($query);
    $id = $data['equ_id'];
    $name = $data['equ_name'];
    $desc = $data['equ_desc'];
    $brand = $data['bra_id'];
    $equipment = $data['equ_id'];
    $model = $data['mod_id'];
    $color = $data['col_id'];
    $equipment_type = $data['equtyp_id'];
    $warranty = $data['equ_warranty'];
    $price = $data['equ_price'];
    $weight = $data['equ_weight'];
    $capacity = $data['equ_capacity'];
    $size = $data['equ_size'];
    $interface = $data['equ_interface'];
    $spinspeed = $data['equ_spinspeed'];
    $support = $data['equ_support'];
    $createdate = $data['equ_createdate'];
    $createby = $data['equ_createby'];
    $updatedate = $data['equ_updatedate'];
    $updateby = $data['equ_updateby'];
}
?>
<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-th-large"></i> อุปกรณ์
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=list-equipment" class="btn btn-warning">
                <i class="glyphicon glyphicon-arrow-left"></i> ย้อนกลับ
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <form class="form-horizontal" name="frm-equipment" id="frm-equipment">
                <div class="form-group">
                    <label for="input-name" class="col-sm-2 control-label">ชื่อ</label>
                    <div class="col-sm-3">
                        <input type="hidden" name="input-id" id="input-id" value="<?= $id ?>"/>
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก ชื่อ"
                               name="input-name" id="input-name" value="<?= $name ?>"/>
                    </div>
                    <label for="input-desc" class="col-sm-1 control-label">อธิบาย</label>
                    <div class="col-sm-6">
                        <textarea class="form-control validate[required]" 
                                  data-errormessage-value-missing="กรุณากรอก อธิบาย"
                                  name="input-desc" id="input-desc" ><?= $desc ?></textarea>
                    </div>
                </div>   
                <div class="form-group">
                    <label for="input-fname" class="col-sm-2 control-label">ยี้ห้อ</label>
                    <div class="col-sm-3">
                        <?php include '../config/combo-brand.php'; ?>
                    </div>
                    <label for="input-lname" class="col-sm-1 control-label">รุ่น</label>
                    <div class="col-sm-3">
                        <?php include '../config/combo-model.php'; ?>
                    </div> 
                </div>  
                <div class="form-group">
                    <label for="input-fname" class="col-sm-2 control-label">ประเภท อุปกรณ์</label>
                    <div class="col-sm-3">
                        <?php include '../config/combo-equipment_type.php'; ?>
                    </div>
                    <label for="input-lname" class="col-sm-1 control-label">สี</label>
                    <div class="col-sm-2">
                        <?php include '../config/combo-color.php'; ?>
                    </div>  
                </div>  
                <div class="form-group">
                    <label for="input-warranty" class="col-sm-2 control-label">ประกัน</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก ประกัน"
                               name="input-warranty" id="input-warranty" value="<?= $warranty ?>"/>
                    </div>
                    <label for="input-price" class="col-sm-1 control-label">ราคา</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control validate[required]" 
                               data-errormessage-value-missing="กรุณากรอก ราคา"
                               name="input-price" id="input-price" value="<?= $price ?>"/>
                    </div>
                    <label for="input-weight" class="col-sm-2 control-label">น้ำหนัก</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" 
                               name="input-weight" id="input-weight" value="<?= $weight ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-capacity" class="col-sm-2 control-label">ความจุ</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control"                                
                               name="input-capacity" id="input-capacity" value="<?= $capacity ?>"/>
                    </div>
                    <label for="input-size" class="col-sm-1 control-label">ขนาด</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control"
                               name="input-size" id="input-size" value="<?= $size ?>"/>
                    </div>
                    <label for="input-interface" class="col-sm-2 control-label">การเชื่อมต่อ</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" placeholder="2.0 , 3.0"
                               name="input-interface" id="input-interface" value="<?= $interface ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-spinspeed" class="col-sm-2 control-label">ความเร็วรอบ</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control"                                
                               name="input-spinspeed" id="input-spinspeed" value="<?= $spinspeed ?>"/>
                    </div>
                    <label for="input-support" class="col-sm-1 control-label">สนับสนุน</label>
                    <div class="col-sm-7">
                        <?php include '../config/combo-os.php'; ?>
                        <input type="hidden" name="hidden-support" id="hidden-support"/>
                    </div>  
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">
                            <i class="glyphicon glyphicon-saved"></i> บันทึก
                        </button>
                        <a href="index.php?page=list-equipment" class="btn btn-warning">
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
        var selectSupport = $('#combo-support').select2();
        var hidden = $('#hidden-support');
        // ################ load default data ######
        var edit_id = $('#input-id').val();
        console.log('edit_id ::==' + edit_id);
        if (edit_id != '') {
            $.post('../method/equipment.php?method=set_default',
                    {
                        id: edit_id,
                    }, function(defaultData) {
                selectSupport.select2("data", defaultData);
                hidden.val(selectSupport.select2('val'));
            }, 'json');
        }
        // ################ load default data ######
        $('select[name=combo-brand]').on('change', function() {
            find_model(this);
        });
        var valid = $('#frm-equipment').validationEngine('attach', {
            promptPosition: "centerLeft:30",
            scroll: false,
            onValidationComplete: function(form, status) {
                if (status) {
                    post_form('frm-equipment', '../method/equipment.php?method=create');
                }
            }
        });
        valid.css({
            'box-shadow': '2px 2px 2px 2px #888888',
            'padding': '20px',
        });

        // ###########select 2 #####################
        selectSupport.select2({
            placeholder: "-- คลิกเลือก ระบบปฏิบัติการที่สนับสนุน --",
            allowClear: true,
            closeOnSelect: true,
            //tags: true,      
            width: '70%',
        }).on("select2-open", function() {
            hidden.val(selectSupport.select2('val'));
        }).on("select2-selecting", function(e) {
            //alert('value ' + select2.select2('val'));
            hidden.val(e.val);
        }).on("change", function(e) {
            //alert('value ' + select2.select2('val'));
            hidden.val(e.val);
        });
        // ###########select 2 #####################
    });
</script>
